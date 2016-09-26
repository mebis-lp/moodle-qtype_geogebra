<?php

/**
 * Defines the editing form for the geogebra question type.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
defined('MOODLE_INTERNAL') || die ();

global $CFG;
require_once($CFG->dirroot . '/question/type/shortanswer/edit_shortanswer_form.php');
require_once($CFG->dirroot . '/question/type/geogebra/question.php');

/**
 * editing form for the geogebra question type
 *
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
class qtype_geogebra_edit_form extends question_edit_form {

    public $qtypeobj;

    public $reload = false;

    public $ggbturl;

    public $deployscript = '<script type="text/javascript" src="https://www.geogebra.org/scripts/deployggb.js"></script>';

    public $ggbparameters;

    public $ggbviews;

    public $ggbcodebaseversion;

    /**
     * @param      $submiturl
     * @param      $question
     * @param      $category
     * @param      $contexts
     * @param bool $formeditable
     */
    public function __construct($submiturl, $question, $category, $contexts, $formeditable = true) {

        $this->question = $question;

        $this->qtypeobj = question_bank::get_qtype($this->question->qtype);

        $this->reload = optional_param('reload', false, PARAM_BOOL);

        if (!$this->reload) { // Use database data as this is first pass.
            if (!empty ($question->id)) {
                $this->ggbturl = $question->options->ggbturl;
                $this->ggbparameters = $question->options->ggbparameters;
                $this->ggbviews = $question->options->ggbviews;
                $this->ggbcodebaseversion = $question->options->ggbcodebaseversion;
            }
        } else {
            $this->ggbturl = optional_param('ggbturl', '', PARAM_URL);
            $this->ggbparameters = optional_param('ggbparameters', '', PARAM_RAW);
            $this->ggbviews = optional_param('ggbviews', '', PARAM_RAW);
            $this->ggbcodebaseversion = optional_param('ggbcodebaseversion', '', PARAM_RAW);
        }
        parent::__construct($submiturl, $question, $category, $contexts, $formeditable);
    }

    /**
     * Get the list of form elements to repeat, one for each answer.
     *
     * @param moodlequickform $mform           the form being built.
     * @param                 $label           the label to use for each option.
     * @param                 $gradeoptions    the possible grades for each answer.
     * @param                 $repeatedoptions reference to array of repeated options to fill
     * @param                 $answersoption   reference to return the name of $question->options
     *                                         field holding an array of answers
     * @return array of form fields.
     */
    protected function get_per_answer_fields($mform, $label, $gradeoptions,
            &$repeatedoptions, &$answersoption) {

        $repeated = array();
        $answeroptions = array();
        $answeroptions[] = $mform->createElement('text', 'answer',
                $label, array('size' => 40));
        $answeroptions[] = $mform->createElement('select', 'fraction',
                get_string('grade'), $gradeoptions);
        $repeated[0] = $mform->createElement('group', 'answeroptions',
                $label, $answeroptions, null, false);
        $repeated[1] = $mform->createElement('hidden', 'feedback');
        $repeated[2] = $mform->createElement('text', 'feedbackfromfile',
                get_string('feedback', 'question'), array('size' => '60', 'disabled' => 'disabled'));;
        $repeated[3] = $mform->createElement('hidden', 'format');

        $repeatedoptions['answer']['type'] = PARAM_RAW;
        $repeatedoptions['fraction']['default'] = 0;
        $repeatedoptions['feedback']['type'] = PARAM_RAW;
        $repeatedoptions['feedback']['default'] = '';
        $repeatedoptions['format']['type'] = PARAM_INT;
        $repeatedoptions['format']['default'] = 1;
        $repeatedoptions['feedbackfromfile']['type'] = PARAM_RAW;
        $repeatedoptions['feedbackfromfile']['default'] = get_string('willbereadfromfile', 'qtype_geogebra');

        $answersoption = 'answers';

        return $repeated;
    }

    /**
     * @param moodlequickform $mform
     */
    protected function definition_inner($mform) {
        global $COURSE;

        $this->add_hidden_inputs($mform);

        $mform->addElement('header', 'ggbtheader', get_string('geogebraapplet', 'qtype_geogebra'));

        $this->add_geogebra_file($mform);

        $this->add_applet_elements($mform);

        $this->add_applet_options($mform);

        $this->add_randomizedvar_fields($mform);

        $mform->addElement('selectyesno', 'isexercise', get_string('isexercise', 'qtype_geogebra'));
        $mform->addHelpButton('isexercise', 'isexercise', 'qtype_geogebra');

        $this->add_per_answer_fields($mform, get_string('variableno', 'qtype_geogebra', '{no}'),
                question_bank::fraction_options(), 4, 1);

        if (array_key_exists('answeroptions[0]', $mform->_elementIndex)) {
            $mform->addHelpButton('answeroptions[0]', 'answervar', 'qtype_geogebra');
            $mform->addHelpButton('feedbackfromfile[0]', 'feedback', 'qtype_geogebra');
        }

        // FEATURE: responsetemplate where setting the variables results in the answer. Essay qtype might be helpful.

        $this->add_interactive_settings();

        $mform->setExpanded('ggbtheader');
    }

    /**
     * @inheritdoc
     */
    protected function get_more_choices_string() {
        return get_string('addmorevarblanks', 'qtype_geogebra');
    }

    /**
     * @inheritdoc
     */
    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_answers($question);
        $question = $this->data_preprocessing_hints($question);

        return $question;
    }

    /**
     * Checks if ggbParameters, views, codebase, xml is present in the hidden form fields
     * Checks validity of variables and constraints for randomization.
     *
     * @param array $data  array of ("fieldname"=>value) of submitted data
     * @param array $files array of uploaded files "element_name"=>tmp_file_path
     * @return array of "element_name"=>"error_description" if there are errors,
     *                     or an empty array if everything is OK (true allowed for backwards compatibility too).
     */
    public function validation($data, $files) {
        $errors = parent::validation($data, $files);

        $this->check_is_applet_present($data, $errors);

        if (!$data['isexercise']) {

            $this->check_randomized_vars($data, $errors);

            $this->check_constraints($data, $errors);

            $this->check_answer($data, $errors);

            $this->check_fraction($data, $errors);
        } else {
            $this->check_is_exercise_present($data, $errors);
        }

        return $errors;
    }

    /**
     * @see \question_edit_form::qtype
     *
     * @return string 'geogebra'
     */
    public function qtype() {
        return 'geogebra';
    }

    /**
     * Filepicker init and HTML, limits the accepted types to external files and type .html
     *
     * @param string $clientid    The unique ID for this filepicker
     * @param string $elementname The elementname of the target
     * @return string
     */
    public function initggtfilpicker($clientid, $elementname) {
        global $PAGE, $OUTPUT, $CFG;

        $args = new stdClass();
        // GGBT Repository gives back mimetype html.
        $args->accepted_types = '.html';
        $args->return_types = FILE_EXTERNAL;
        $args->context = $PAGE->context;
        $args->client_id = $clientid;
        $args->elementname = $elementname;
        $args->env = 'ggbt';
        $args->lang = current_language();
        // Is $args->type = 'geogebratube'; //not working?
        $fp = new file_picker($args);
        $options = $fp->options;

        // Print out file picker.
        $str = $OUTPUT->render($fp);

        $module = array('name'     => 'form_ggbt',
                        'fullpath' => new moodle_url($CFG->wwwroot . '/question/type/geogebra/ggbt.js'),
                        'requires' => array('core_filepicker'));
        $PAGE->requires->js_init_call('M.form_ggbt.init', array($options), true, $module);

        return $str;
    }

    /**
     * @param $data
     * @param $errors
     */
    private function check_is_applet_present($data, &$errors) {
        if (empty($data['ggbparameters'])
                || empty($data['ggbviews'])
                || empty($data['ggbcodebaseversion'])
                || empty($data['ggbxml'])
        ) {
            $errors['loadappletgroup'] = get_string('noappletloaded', 'qtype_geogebra');
        }
    }

    /**
     * @param $data
     * @param $errors
     */
    private function check_randomized_vars($data, &$errors) {
        if ($data['israndomized']) {
            $vars = qtype_geogebra_question_helper::get_variables_with_minmaxstep($data['randomizedvar'], $data['ggbxml']);
            if (empty($vars)) {
                $errors['randomizedvarsgroup'] = get_string('randomizedbutnovars', 'qtype_geogebra');
            } else {
                foreach ($vars as $label => $var) {
                    if ($var['min'] == $var['max']) {
                        $errors['randomizedvarsgroup'] = get_string('mineqmax', 'qtype_geogebra', $label);
                    } else {
                        if ($var['min'] + $var['increment'] > $var['max']) {
                            $errors['randomizedvarsgroup'] = get_string('minplusstepgtmax', 'qtype_geogebra', $label);
                        } else {
                            if ($var['increment'] == 0) {
                                $errors['randomizedvarsgroup'] = get_string('stepzero', 'qtype_geogebra', $label);
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $data
     * @param $errors
     */
    private function check_constraints($data, &$errors) {
        // To be able to give useful help to the user we do one check at a time.
        if (!empty($data['constraints'])) {
            $inequalitystrings = explode(',', $data['constraints']);
            // Check if the form of the relation is valid (i.e.: a<b,a<=b,a>b,a>=b).
            foreach ($inequalitystrings as $inequalitystring) {
                if (!qtype_geogebra_question_helper::is_valid_inequality($inequalitystring)) {
                    if (!isset($errors['constraints'])) {
                        $errors['constraints'] = '';
                    } else {
                        $errors['constraints'] .= ', ';
                    }
                    $errors['constraints'] .= get_string('invalidinequality', 'qtype_geogebra', htmlentities($inequalitystring));
                }
            }
            // Check if all vars in constraints are part of randomized vars.
            if (count($errors) === 0) {
                foreach ($inequalitystrings as $inequalitystring) {
                    if (!qtype_geogebra_question_helper::is_valid_inequality_for_randomizedvars($inequalitystring,
                            $data['randomizedvar'], $data['ggbxml'])
                    ) {
                        if (!isset($errors['constraints'])) {
                            $errors['constraints'] = '';
                        } else {
                            $errors['constraints'] .= ', ';
                        }
                        $errors['constraints'] .= get_string('invalidinequality', 'qtype_geogebra',
                                htmlentities($inequalitystring));
                    }
                }
            }
            // Check if constraints are within the sliders min and max.
            if (count($errors) === 0) {
                foreach ($inequalitystrings as $inequalitystring) {
                    if (!qtype_geogebra_question_helper::is_valid_inequality_for_slider_minmax($inequalitystring,
                            $data['randomizedvar'], $data['ggbxml'])
                    ) {
                        if (!isset($errors['constraints'])) {
                            $errors['constraints'] = '';
                        } else {
                            $errors['constraints'] .= ', ';
                        }
                        $errors['constraints'] .= get_string('invalidinequality', 'qtype_geogebra',
                                htmlentities($inequalitystring));
                    }
                }
            }
            // Check if constraints can be met i.e. are not contradictory or to hard to meet with random numbers.
            if (count($errors) === 0) {
                $vars = qtype_geogebra_question_helper::get_variables_with_minmaxstep($data['randomizedvar'], $data['ggbxml']);
                $inequalities = array();
                foreach ($inequalitystrings as $inequalitystring) {
                    preg_match('/^([a-z,_,0-9]+)(<=|<|>=|>)([a-z,_,0-9]+)$/i', $inequalitystring, $inequalities[]);
                }
                $a = qtype_geogebra_question_helper::randomize_vars($vars, $inequalities, 1);
                if (!empty($a)) {
                    $a->inequalities = htmlentities($data['constraints']);
                    $errors['constraints'] = get_string('constraintswrongortoohard', 'qtype_geogebra', $a);
                }
            }
        }
    }

    /**
     * @param $data
     * @param $errors
     */
    private function check_answer($data, &$errors) {

        if (isset($data['answer'])) {
            $i = 0;
            $xml = simplexml_load_string($data['ggbxml']);
            foreach ($data['answer'] as $label) {
                if (!empty($label)) {
                    if ($data['isexercise']) {
                        $errors['isexercise'] = get_string('noanswersorrandomizationallowed', 'qtype_geogebra');
                    } else {
                        $varok = false;

                        foreach ($xml->construction->element as $elem) {
                            if ($label == $elem['label']) {
                                $varok = true;
                            }
                        }
                        if (!$varok) {
                            $errors['answeroptions[' . $i . ']'] = get_string('variablenamewrong', 'qtype_geogebra');
                        }
                    }
                }
                $i++;
            }
        }
    }

    /**
     * @param $data
     * @param $errors
     */
    private function check_fraction($data, &$errors) {
        /* It's OK if the sum of fractions is greater than 1 because there could be one variable for partly and one for
                completely correct answer.
                But if sum of fractions is lower than 1 the question cannot be solved properly.
                At least one combination of fractions should sum up to one. */
        if (isset($data['fraction'])) {
            $manuallygraded = true;
            $fractionok = true;
            if ($data['noanswers'] > 1) {
                for ($i = 0; $i < count($data['answer']); $i++) {
                    if (!empty($data['answer'][$i]) && $data['fraction'][$i] > 0.000001) {
                        $manuallygraded = false;
                        $fractionok = false;
                    }
                }
                if (!$manuallygraded) {
                    $fractionok = false;
                    $fractions = $data['fraction'];
                    $count = pow(2, count($fractions)) - 1;
                    for ($i = $count; $i > 0 && !$fractionok; $i--) {
                        $sum = 0;
                        $rem = $i;
                        for ($k = count($fractions) - 1; $k >= 0; $k--) {
                            $sum += ((int)($rem / pow(2, $k))) * $fractions[$k];
                            $rem = $i % pow(2, $k);
                        }
                        if ($sum <= 1.000001 && $sum >= 0.999999) { // We have found a combination!
                            $fractionok = true;
                        }
                    }
                }
            } else {
                $fractionok = $data['fraction'][0] > 0.999999 || $data['fraction'][0] < 0.000001 && $data['answer'][0] == "";
            }
            if (!$fractionok) {
                $errors['answeroptions[0]'] = get_string('nofractionsumeq1', 'qtype_geogebra');
            }
        }
    }

    /**
     * @param moodlequickform $mform
     */
    private function add_hidden_inputs($mform) {
        $mform->addElement('hidden', 'reload', 1);
        $mform->setType('reload', PARAM_INT);

        $mform->addElement('hidden', 'ggbparameters');
        $mform->setType('ggbparameters', PARAM_RAW);

        $mform->addElement('hidden', 'ggbviews');
        $mform->setType('ggbviews', PARAM_RAW);

        $mform->addElement('hidden', 'ggbcodebaseversion');
        $mform->setType('ggbcodebaseversion', PARAM_RAW);

        $mform->addElement('hidden', 'ggbxml');
        $mform->setType('ggbxml', PARAM_RAW);

        $mform->addElement('hidden', 'ggbexercise');
        $mform->setType('ggbexercise', PARAM_RAW);
    }

    /**
     * @param moodlequickform $mform
     * @throws coding_exception
     */
    private function add_randomizedvar_fields($mform) {
        $mform->addElement('selectyesno', 'israndomized', get_string('israndomized', 'qtype_geogebra'));
        /* Variables to randomize */
        $randomizedvars = array();
        $randomizedvars[] =& $mform->createElement('button', 'getvars', get_string('getvars', 'qtype_geogebra'));
        $randomizedvars[] =& $mform->createElement('text', 'randomizedvar', null, array('size' => '20'));
        $mform->setType('randomizedvar', PARAM_RAW);
        $mform->addGroup($randomizedvars, 'randomizedvarsgroup', get_string("randomizedvar", "qtype_geogebra"), array(' '),
                false);
        $mform->addHelpButton('randomizedvarsgroup', 'randomizedvar', 'qtype_geogebra');
        $mform->disabledIf('randomizedvarsgroup', 'israndomized', 'neq', 1);

        /* Constraints */
        $mform->addElement('text', 'constraints', get_string('constraints', 'qtype_geogebra'));
        $mform->setType('constraints', PARAM_RAW);
        $mform->disabledIf('constraints', 'israndomized', 'neq', 1);
        $mform->addHelpButton('constraints', 'constraints', 'qtype_geogebra');
    }

    /**
     * @param moodlequickform $mform
     * @throws coding_exception
     */
    private function add_applet_elements($mform) {
        /* Button to (Re)load Applet from GeoGebraTube */
        $loadappletgroup = array();
        $loadappletgroup[] =& $mform->createElement('button', 'loadapplet', get_string('loadapplet', 'qtype_geogebra'));
        // Hack: the button doesn't support a HelpButton.
        $loadappletgroup[] =& $mform->createElement('html', '<span>&nbsp;</span>');
        $mform->addGroup($loadappletgroup, 'loadappletgroup', get_string('loadapplet', 'qtype_geogebra'), array(' '), false);
        $mform->addHelpButton('loadappletgroup', 'loadapplet', 'qtype_geogebra');
        $mform->disabledIf('loadappletgroup', 'usefile', 'checked');

        $mform->addElement('html', $this->deployscript);

        $mform->addElement('html', '<div class="fitem"><div id="applet_container1" class="felement"></div></div>');

        if (!empty($this->ggbparameters) && !empty($this->ggbviews) && !empty($this->ggbcodebaseversion)) {
            $lang = current_language();
            $applet = <<<EOD
<script type="text/javascript">
    var parameters = $this->ggbparameters;
    parameters.language = "$lang";
    parameters.useBrowserForJS = false;
    delete parameters.material_id;
    parameters.moodle = "editingQuestion";
    var views = $this->ggbviews;
    var applet1 = new GGBApplet(parameters, views, true);
</script>
EOD;
            $mform->addElement('html', $applet);
        }
    }

    private function add_applet_options($mform) {

        $applet_advanced_settings = get_string('applet_advanced_settings', 'qtype_geogebra');
        $enable_label_drags = get_string('enable_label_drags', 'qtype_geogebra');
        $enable_right_click = get_string('enable_right_click', 'qtype_geogebra');
        $enable_shift_drag_zoom = get_string('enable_shift_drag_zoom', 'qtype_geogebra');
        $show_algebra_input = get_string('show_algebra_input', 'qtype_geogebra');
        $show_menu_bar = get_string('show_menu_bar', 'qtype_geogebra');
        $show_reset_icon = get_string('show_reset_icon', 'qtype_geogebra');
        $show_tool_bar = get_string('show_tool_bar', 'qtype_geogebra');

        $options = <<<HTML
<div id='applet_options' class="fitem" >
    <div class="fitemtitle"><label for="applet_options">$applet_advanced_settings</label></div>
    <fieldset class="felement fgroup">
        <input type="checkbox" id="enableRightClick" name="enableRightClick" value="1">
        <label for="enableRightClick">$enable_right_click</label><br>
        <input type="checkbox" id="enableLabelDrags" name="enableLabelDrags" value="1">
        <label for="enableLabelDrags">$enable_label_drags</label><br>
        <input type="checkbox" id="showResetIcon" name="showResetIcon" value="1" checked="checked">
        <label for="showResetIcon">$show_reset_icon</label><br>
        <input type="checkbox" id="enableShiftDragZoom" name="enableShiftDragZoom" value="1" checked="checked">
        <label for="enableShiftDragZoom">$enable_shift_drag_zoom</label><br>
        <input type="checkbox" id="showMenuBar" name="showMenuBar" value="1">
        <label for="showMenuBar">$show_menu_bar</label><br>
        <input type="checkbox" id="showToolBar" name="showToolBar" value="1">
        <label for="showToolBar">$show_tool_bar</label><br>
        <input type="checkbox" id="showAlgebraInput" name="showAlgebraInput" value="1">
        <label for="showAlgebraInput">$show_algebra_input</label><br>
    </fieldset>
</div>
HTML;

        $mform->addElement('html', $options, "advanced");
    }

    /**
     * @param moodlequickform $mform
     * @throws coding_exception
     */
    private function add_geogebra_file($mform) {
        /*
                 * URL of the GeoGebraTube Student Worksheet.
                 * Overcomes the Limitations of Moodle form element 'url',
                 * limits the repository to geogebratube
                 * and displays the applet on return.
                 */
        $ggbturlinput = array();
        $clientid = uniqid();
        $fp = $this->initggtfilpicker($clientid, 'ggbturl');
        $ggbtrepo = repository::get_type_by_typename('geogebratube');
        if ($ggbtrepo) {

            $ggbturlinput[] =& $mform->createElement('html', $fp);
            $ggbturlinput[] =& $mform->createElement('button', 'filepicker-button-' . $clientid, get_string('choosealink',
                    'repository'));
        }
        $ggbturlinput[] =& $mform->createElement('text', 'ggbturl', '', array('size' => '20'));
        $mform->setType('ggbturl', PARAM_RAW_TRIMMED);
        $mform->addGroup($ggbturlinput, 'ggbturlinput', get_string('ggbturl', 'qtype_geogebra'), array(' '), false);

        $mform->addHelpButton('ggbturlinput', 'ggbturl', 'qtype_geogebra');
        if ($ggbtrepo) {

            $mform->disabledIf('filepicker-button-' . $clientid, 'usefile', 'checked');
        }
        $mform->addElement('checkbox', 'usefile', get_string('useafile', 'qtype_geogebra'), get_string('dragndrop', 'qtype_geogebra'));
        if (!empty($this->ggbparameters) && empty($this->ggbturl)) {
            $mform->setDefault('usefile', true);
        }
    }

    private function check_is_exercise_present($data, $errors) {
        if($data['isexercise']) {
            $data;
        }
    }
}
