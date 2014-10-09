<?php

/**
 * @package        moodlecore
 * @subpackage     backup-moodle2
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */

defined('MOODLE_INTERNAL') || die();

/**
 * restore plugin class that provides the necessary information
 * needed to restore one geogebra qtype plugin
 * copy and edit of shortanswer restore
 *
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
class restore_qtype_geogebra_plugin extends restore_qtype_plugin {

    /**
     * Returns the paths to be handled by the plugin at question level
     */
    protected function define_question_plugin_structure() {

        $paths = array();

        // This qtype uses question_answers, add them.
        $this->add_question_question_answers($paths);

        // Add own qtype stuff.
        $elename = 'geogebra';
        // We used get_recommended_name() so this works.
        $elepath = $this->get_pathfor('/geogebra');
        $paths[] = new restore_path_element($elename, $elepath);

        return $paths; // And we return the interesting paths.
    }

    /**
     * Process the qtype/geogebra element
     */
    public function process_geogebra($data) {
        global $DB;

        $data = (object)$data;
        $oldid = $data->id;

        // Detect if the question is created or mapped.
        $oldquestionid = $this->get_old_parentid('question');
        $newquestionid = $this->get_new_parentid('question');
        $questioncreated = (bool)$this->get_mappingid('question_created', $oldquestionid);

        // If the question has been created by restore, we need to create its
        // qtype_shortanswer_options too, if they are defined (the gui should ensure this).
        if ($questioncreated) {
            $data->questionid = $newquestionid;
            $newitemid = $DB->insert_record('qtype_geogebra_options', $data);
            $this->set_mapping('qtype_geogebra_options', $oldid, $newitemid);
        }
    }
}
