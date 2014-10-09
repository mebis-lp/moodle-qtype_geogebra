<?php

/**
 * Unit tests for (some of) question/type/geogebra/questiontype.php.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/question/type/geogebra/questiontype.php');
require_once($CFG->dirroot . '/question/engine/tests/helpers.php');
require_once($CFG->dirroot . '/question/type/edit_question_form.php');
require_once($CFG->dirroot . '/question/type/geogebra/edit_geogebra_form.php');

/**
 * Unit tests for (some of) question/type/geogebra/questiontype.php.
 *
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
class qtype_geogebra_test extends advanced_testcase {
    public static $includecoverage = array(
            'question/type/questiontypebase.php',
            'question/type/geogebra/questiontype.php'
    );

    /** @var qtype_geogebra The questiontype object */
    protected $qtype;

    protected function setUp() {
        $this->qtype = new qtype_geogebra();
    }

    protected function tearDown() {
        $this->qtype = null;
    }

    /**
     * @return stdClass Some questiondata for test_get_possible_responses
     */
    protected function get_test_question_data() {
        $q = new stdClass;
        $q->id = 1;
        $q->options = new stdClass();
        $q->options->answers[13] = (object)array(
                'id'             => 13,
                'answer'         => 'e',
                'fraction'       => 1,
                'feedback'       => 'yes',
                'feedbackformat' => FORMAT_MOODLE,
        );
        $q->options->answers[14] = (object)array(
                'id'             => 14,
                'answer'         => 'e1',
                'fraction'       => 0.5,
                'feedback'       => 'yes',
                'feedbackformat' => FORMAT_MOODLE,
        );

        return $q;
    }

    public function test_name() {
        $this->assertEquals($this->qtype->name(), 'geogebra');
    }

    public function test_is_manual_graded() {
        $this->assertTrue($this->qtype->is_manual_graded());
    }

    public function test_can_analyse_responses() {
        $this->assertTrue($this->qtype->can_analyse_responses());
    }

    public function test_get_random_guess_score() {
        $q = $this->get_test_question_data();
        $this->assertNull($this->qtype->get_random_guess_score($q));
    }

    public function test_get_possible_responses() {
        $q = $this->get_test_question_data();

        $this->assertEquals(array(
                $q->id => array(
                        3    => new question_possible_response('e=true, e1=true', 1),
                        2    => new question_possible_response('e=true, e1=false', 1),
                        1    => new question_possible_response('e=false, e1=true', 0.5),
                        0    => new question_possible_response('e=false, e1=false', 0),
                        null => question_possible_response::no_response()
                ),
        ), $this->qtype->get_possible_responses($q));
    }

    public function test_question_saving_point() {
        $this->resetAfterTest(true);
        $this->setAdminUser();

        $questiondata = test_question_maker::get_question_data('geogebra');
        $formdata = test_question_maker::get_question_form_data('geogebra');

        /* @var $generator core_question_generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('core_question');
        $cat = $generator->create_question_category(array());

        $formdata->category = "{$cat->id},{$cat->contextid}";
        qtype_geogebra_edit_form::mock_submit((array)$formdata);

        $form = qtype_geogebra_test_helper::get_question_editing_form($cat, $questiondata);

        $this->assertTrue($form->is_validated());

        $fromform = $form->get_data();

        $returnedfromsave = $this->qtype->save_question($questiondata, $fromform);
        $actualquestionsdata = question_load_questions(array($returnedfromsave->id));
        $actualquestiondata = end($actualquestionsdata);

        foreach ($questiondata as $property => $value) {
            if (!in_array($property, array('options'))) {
                $this->assertAttributeEquals($value, $property, $actualquestiondata);
            }
        }

        foreach ($questiondata->options as $optionname => $value) {
            if (!in_array($optionname, array('answers'))) {
                $this->assertAttributeEquals($value, $optionname, $actualquestiondata->options);
            }
        }

        foreach ($questiondata->options->answers as $answer) {
            $actualanswer = array_shift($actualquestiondata->options->answers);
            foreach ($answer as $ansproperty => $ansvalue) {
                // This question does not use 'answerformat', will ignore it.
                if (!in_array($ansproperty, array('id', 'question', 'answerformat'))) {
                    $this->assertAttributeEquals($ansvalue, $ansproperty, $actualanswer);
                }
            }
        }
    }
}
