<?php

/**
 * GeoGebra question type upgrade code.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade code for the geogebra question type.
 *
 * @param int $oldversion the version we are upgrading from.
 * @return bool upgrade successful
 */
function xmldb_qtype_geogebra_upgrade($oldversion) {
    global $DB;
    $dbman = $DB->get_manager();

    /// Add a new column newcol to the mdl_geogebra_options
    if ($oldversion < 2014081908) {
        // Define field isexercise to be added to qtype_geogebra_options.
        $table = new xmldb_table('qtype_geogebra_options');
        $field = new xmldb_field('isexercise', XMLDB_TYPE_INTEGER, '1', null, null, null, '0', 'constraints');

        // Conditionally launch add field isexercise.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Geogebra savepoint reached.
        upgrade_plugin_savepoint(true, 2014081908, 'qtype', 'geogebra');
    }
    if ($oldversion < 2022040400) {

        // Define field width to be added to qtype_geogebra_options.
        $table = new xmldb_table('qtype_geogebra_options');
        $field = new xmldb_field('width', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'isexercise');

        // Conditionally launch add field width.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('height', XMLDB_TYPE_INTEGER, '10', null, null, null, null, 'width');
        // Conditionally launch add field height.
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        // Geogebra savepoint reached.
        upgrade_plugin_savepoint(true, 2022040400, 'qtype', 'geogebra');
    }
    return true;
}
