<?php

/**
 * Version information for GeoGebra question type.
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'qtype_geogebra';
$plugin->version = 2020011301;

$plugin->requires = 2014051200;
$plugin->dependencies = array(
        'qtype_numerical'  => 2014051200,
        'qtype_calculated' => 2014051200,
);

$plugin->maturity = MATURITY_STABLE;

$plugin->release = '1.0.6';
