<?php

/**
 * GeoGebra question renderer class.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
defined('MOODLE_INTERNAL') || die ();

/**
 * Generates the output for geogebra questions.
 */
class qtype_geogebra_renderer extends qtype_renderer {

    /**
     * Generate the display of the formulation part of the question. This is the
     * area that contains the question text, and the controls for students to
     * input their answers.
     *
     * We store base64 string and the answer string (in the form of zeros and ones) in a hidden field and load the applet and
     * some javascript used to update the hidden fields.
     *
     * @param question_attempt         $qa      the question attempt to display.
     * @param question_display_options $options controls what should and should not be displayed.
     * @return string HTML fragment.
     */
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {
        global $PAGE, $CFG;
        $PAGE->requires->js(new moodle_url('https://cdn.geogebra.org/apps/deployggb.js'));

        $result = '';

        /* @var $question qtype_geogebra_question */
        $question = $qa->get_question();

        $b64current = $qa->get_last_qt_var('ggbbase64');
        $b64inputname = $qa->get_qt_field_name('ggbbase64');

        $b64inputattributes = array(
                'type'  => 'hidden',
                'name'  => $b64inputname,
                'value' => $b64current,
                'id'    => $b64inputname,
                'size'  => 80,
        );

        $result .= html_writer::empty_tag('input', $b64inputattributes);

        $xmlcurrent = $qa->get_last_qt_var('ggbxml');
        $xmlinputname = $qa->get_qt_field_name('ggbxml');

        $xmlinputattributes = array(
                'type'  => 'hidden',
                'name'  => $xmlinputname,
                'value' => $xmlcurrent,
                'id'    => $xmlinputname,
                'size'  => 80,
        );

        $result .= html_writer::empty_tag('input', $xmlinputattributes);

        $answercurrent = $qa->get_last_qt_var('answer');
        $answerinputname = $qa->get_qt_field_name('answer');

        $answerinputattributes = array(
                'type'  => 'hidden',
                'name'  => $answerinputname,
                'value' => $answercurrent,
                'id'    => $answerinputname,
                'size'  => 80,
        );

        $result .= html_writer::empty_tag('input', $answerinputattributes);

        $exercisecurrent = $qa->get_last_qt_var('exerciseresult');
        $exerciseinputname = $qa->get_qt_field_name('exerciseresult');

        $exerciseinputattributes = array(
                'type'  => 'hidden',
                'name'  => $exerciseinputname,
                'value' => $exercisecurrent,
                'id'    => $exerciseinputname,
                'size'  => 80,
        );

        $result .= html_writer::empty_tag('input', $exerciseinputattributes);
        $questiontext = $question->format_questiontext($qa);

        $result .= html_writer::tag('div', $questiontext, array('class' => 'qtext', 'style' => 'visibility: hidden;'));

        $ggbdivname = $qa->get_qt_field_name('ggbdiv');
        $result .= html_writer::div('', '', array('id' => $ggbdivname));

        $responsevars = array();
        if (!empty($question->answers)) {
            foreach ($question->answers as $answer) {
                $responsevars[] = $answer->answer;
            }
        }

        $options = array('parameters'          => $question->ggbparameters,
                         'views'               => $question->ggbviews,
                         'codebase'            => $question->ggbcodebaseversion,
                         'html5NoWebSimple'    => true,
                         'div'                 => $ggbdivname,
                         'vars'                => $question->currentvals,
                         'b64input'            => $b64inputname,
                         'xmlinput'            => $xmlinputname,
                         'answerinput'         => $answerinputname,
                         'exerciseresultinput' => $exerciseinputname,
                         'responsevars'        => $responsevars,
                         'slot'                => $qa->get_slot(),
                         'lang'                => current_language()
        );

        // Loading the js in fullpath works on local test but not on server???
        $module = array('name'     => 'form_ggbq',
                        'fullpath' => new moodle_url($CFG->wwwroot . '/question/type/geogebra/ggbq.js'));
        $PAGE->requires->js_init_call('M.form_ggbq.init', array($options), true, $module);

        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag('div',
                    $question->get_validation_error(array('answer'         => $answercurrent,
                                                          'ggbxml'         => $xmlcurrent,
                                                          'ggbbase64'      => $b64current,
                                                          'exerciseresult' => $exercisecurrent)),
                    array('class' => 'validationerror'));
        }

        return $result;
    }

    /**
     * Generate the specific feedback. This is feedback that varies according to
     * the response the student gave.
     *
     * We just concatenate all the feedbacks that match the answerstring.
     *
     * @param question_attempt $qa the question attempt to display.
     * @return string HTML fragment.
     */
    public function specific_feedback(question_attempt $qa) {
        /* @var $question qtype_geogebra_question */
        $question = $qa->get_question();
        $feedback = '';
        if (!$qa->get_state()->is_gave_up()) {
            $itemid = 0;
            if ($question->isexercise) {
                $exerciseresult = json_decode($qa->get_last_qt_var('exerciseresult'));
                $singleCorrectIgnoreOthers = false;
                foreach ($exerciseresult as $assignment) {
                    if (0.999 < $assignment->fraction) {
                        $singleCorrectIgnoreOthers = true;
                        if ($assignment->hint) {
                            if ($feedback) {
                                $feedback .= "<br>";
                            };
                            $feedback .= $question->format_text($assignment->hint, FORMAT_HTML,
                                    $qa, 'question', 'answerfeedback', $itemid++);
                        }
                    }
                }
                foreach ($exerciseresult as $assignment) {
                    if (!$singleCorrectIgnoreOthers || $assignment->fraction < 0) {
                        if ($assignment->hint) {
                            if ($feedback) {
                                $feedback .= "<br>";
                            };
                            $feedback .= $question->format_text($assignment->hint, FORMAT_HTML,
                                    $qa, 'question', 'answerfeedback', $itemid++);
                        }
                    }
                }
            } else {
                $response = $qa->get_last_qt_var('answer');
                $i = 0;
                foreach ($question->answers as $answer) {
                    if ((bool)substr($response, $i, 1)) {
                        $feedback .= $question->format_text($answer->feedback, $answer->feedbackformat,
                                $qa, 'question', 'answerfeedback', $answer->id);
                    }
                    $i++;
                }
            }
        }
        return $feedback;
    }
}
