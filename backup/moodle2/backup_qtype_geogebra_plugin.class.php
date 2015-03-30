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
 * Provides the information to backup geogebra questions
 * copy and edit of shortanswer backup
 *
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
class backup_qtype_geogebra_plugin extends backup_qtype_plugin {

    /**
     * Returns the qtype information to attach to question element
     */
    protected function define_question_plugin_structure() {

        // Define the virtual plugin element with the condition to fulfill.
        $plugin = $this->get_plugin_element(null, '../../qtype', 'geogebra');

        // Create one standard named plugin element (the visible container).
        $pluginwrapper = new backup_nested_element($this->get_recommended_name());

        // Connect the visible container ASAP.
        $plugin->add_child($pluginwrapper);

        // This qtype uses standard question_answers, add them here
        // to the tree before any other information that will use them.
        $this->add_question_question_answers($pluginwrapper);

        // Now create the qtype own structures.
        $geogebra = new backup_nested_element('geogebra', array('id'),
                array('ggbturl', 'ggbparameters', 'ggbviews', 'ggbcodebaseversion', 'ggbxml', 'israndomized', 'randomizedvar',
                        'constraints', 'isexercise'));

        // Now the own qtype tree.
        $pluginwrapper->add_child($geogebra);

        // Set source to populate the data.
        $geogebra->set_source_table('qtype_geogebra_options',
                array('questionid' => backup::VAR_PARENTID));

        // Don't need to annotate ids nor files.

        return $plugin;
    }
}
