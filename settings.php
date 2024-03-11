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
 * GeoGebra grade form
 *
 * @package    qtype_geogebra
 * @subpackage geogebra
 * @copyright  2024 Twingsister
 * @author     Twingsister
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(
        new admin_setting_configtext(
            'qtype_geogebra/ggbURLPrefixAlt',
            get_string('ggbURLPrefixAlt', 'qtype_geogebra'),
            get_string('ggbURLPrefixAlt_desc', 'qtype_geogebra'),
            'https://twingsister.github.io/Moodle-Tests-Repository/'.
            ','.'https://bitbucket.org/twingsister/moodle-tests-repository/raw/master/'.','.
            'https://gitlab.com/moodle6785909/moodle-test-repository/-/raw/master/'
        )
    );
}
