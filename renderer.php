<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * GeoGebra question renderer class.
 *
 * @package        qtype_geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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
     * @param question_attempt $qa the question attempt to display.
     * @param question_display_options $options controls what should and should not be displayed.
     * @return string HTML fragment.
     */
    public function formulation_and_controls(question_attempt $qa, question_display_options $options) {

        $scalingcontainerclass = $qa->get_qt_field_name('scalingcontainer');
        $result = html_writer::start_div($scalingcontainerclass);

        /* @var $question qtype_geogebra_question the question object */
        $question = $qa->get_question();

        $b64current = $qa->get_last_qt_var('ggbbase64');
        $b64inputname = $qa->get_qt_field_name('ggbbase64');

        $b64inputattributes = array(
            'type' => 'hidden',
            'name' => $b64inputname,
            'value' => $b64current,
            'id' => $b64inputname,
            'size' => 80,
        );

        $result .= html_writer::empty_tag('input', $b64inputattributes);

        $answercurrent = $qa->get_last_qt_var('answer');
        $answerinputname = $qa->get_qt_field_name('answer');

        $answerinputattributes = array(
            'type' => 'hidden',
            'name' => $answerinputname,
            'value' => $answercurrent,
            'id' => $answerinputname,
            'size' => 80,
        );

        $result .= html_writer::empty_tag('input', $answerinputattributes);


        $questiontext = $question->format_questiontext($qa);

        $result .= html_writer::tag('div', $questiontext, ['class' => 'qtext']);

        $ggbdivname = $qa->get_qt_field_name('ggbdiv');
        $result .= html_writer::div('', '', array('id' => $ggbdivname));

        $responsevars = array();
        if (!empty($question->answers)) {
            foreach ($question->answers as $answer) {
                $responsevars[] = $answer->answer;
            }
        }

        /*$options = array('parameters' => $question->ggbparameters,
            'views' => $question->ggbviews,
            'codebase' => $question->ggbcodebaseversion,
            'html5NoWebSimple' => true,
            'div' => $ggbdivname,
            'vars' => $question->currentvals,
            'b64input' => $b64inputname,
            'answerinput' => $answerinputname,
            'responsevars' => $responsevars,
            'slot' => $qa->get_slot(),
            'lang' => current_language()
        );*/
        $lang = current_language();
        $currentvals = json_encode($question->currentvals);
        $responsevarsjson = json_encode($responsevars);
        $slot = $qa->get_slot();
        $appletparametersid = $qa->get_qt_field_name('applet_parameters');
        $forcedimensions = $question->forcedimensions ?: 0;
        $width = $question->width ?: 0;
        $height = $question->height ?: 0;
        $applet = <<<EOD
<article id=$appletparametersid
  data-parameters=$question->ggbparameters
  data-views=$question->ggbviews
  data-codebase=$question->ggbcodebaseversion
  data-html5NoWebSimple=true
  data-div=$ggbdivname
  data-vars=$currentvals
  data-b64input=$b64inputname
  data-answerinput=$answerinputname
  data-responsevars=$responsevarsjson
  data-slot=$slot
  data-lang=$lang
  data-forcedimensions=$forcedimensions
  data-width=$width
  data-height=$height
  data-scalingcontainerclass=$scalingcontainerclass
</article>
EOD;
        $result .= $applet;
        $this->page->requires->js_call_amd('qtype_geogebra/ggbq', 'init', array($appletparametersid));

        if ($qa->get_state() == question_state::$invalid) {
            $result .= html_writer::nonempty_tag('div',
                $question->get_validation_error(['answer' => $answercurrent, 'ggbbase64' => $b64current]),
                    ['class' => 'validationerror']);
        }

        $result .= html_writer::end_div();
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
        /* @var $question qtype_geogebra_question the question object */
        $question = $qa->get_question();
        $feedback = '';
        if (!$qa->get_state()->is_gave_up()) {
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
        return $feedback;
    }
}
