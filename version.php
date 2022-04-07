<?php

/**
 * Version information for GeoGebra question type.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'qtype_geogebra';
$plugin->version = 2022040701;
$plugin->release = '1.12.1';

$plugin->requires = 2018051702;
$plugin->dependencies = array(
        'qtype_numerical'  => 2014051200,
        'qtype_calculated' => 2014051200,
        'qtype_shortanswer' => 2018051400
);

$plugin->maturity = MATURITY_STABLE;
