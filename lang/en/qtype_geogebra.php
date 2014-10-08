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
 * Strings for component 'qtype_geogebra', language 'en'
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
$string['pluginname'] = 'GeoGebra';
$string['pluginname_help'] = 'Questions where the student can solve the question using GeoGebra';
$string['pluginname_link'] = 'question/type/geogebra';
$string['pluginnameadding'] = 'Adding a GeoGebra question';
$string['pluginnameediting'] = 'Editing a GeoGebra question';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer
when the quiz is taken.';
$string['loadapplet'] = "(Re)Load and show applet";
$string['loadapplet_help'] = "(Re)Load the applet from GeoGebratube and store the new version from GeoGebraTube in the database.";
$string['valuecheckedfor'] = "Boolean Object in GeoGebra which is used to check correctness.";
$string['randomizedvar'] = "Variables to be randomized";
$string['randomizedvar_help'] = "Variables which should be randomized. Comma separated. Use the slider options in GeoGebra to
declare Min, Max and Increment. This variables can also be used in the question text by enclosing them with curly braces,
for example: {a}.";
$string['ggbturl'] = 'URL or ID of GeoGebraTube Worksheet';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the
GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube
unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['geogebraapplet'] = 'GeoGebra Applet';
$string['israndomized'] = 'Are there any variables which should be randomized?';
$string['yes'] = 'Yes';
$string['no'] = 'No';
$string['getvars'] = 'Get variables which can be randomized from the applet';
$string['addconstraints'] = 'Add constraints (relationships) to variables.';
$string['variables'] = 'Variables';
$string['variableno'] = 'Variable {$a}';
$string['addmorevarblanks'] = 'Blanks for {no} more variables';
$string['constraints'] = 'Constraints (Relations)';
$string['constraints_help'] = 'Are there any constraints for Variables, such as a&lt;b, which could not be declared using the
slider options? Comma separated. Supported relations are: &lt;, &lt;=, &gt;, &gt;=. If you need an equality you have to use
the same variable when creating the GeoGebra worksheet. Dynamic ranges, i.e. using variables for slider min/max is not supported.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or
(re)loading the applet';
$string['invalidinequality'] = '{$a} is invalid';
$string['randomizedbutnovars'] = 'You have selected, that the question should be randomized,
but you didn\'t specify any or non existing variables, to be randomized.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a},
either you haven\'t specified the sliders min and max or the element isn\'t a slider at all. You probably have to correct this in
 your GeoGebra file.';
$string['minplusstepgtmax'] = 'Min plus increment is greater than Max for for variable {$a}, you probably have to correct this in
 your GeoGebra file.';
$string['stepzero'] = 'Increment is 0, for variable {$a}, either you haven\'t specified the sliders increment or the element isn\'t
 a slider at all. You probably have to correct this in your GeoGebra file.';
$string['constraintswrongortohard'] = '{$a->inequalities} are wrong or to hard to meet,
we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use better math in the future';
$string['nofractionsumeq1'] = 'At least one combination of grades must sum up to 100%';
$string['answervar'] = 'Variables for automatic grading';
$string['answervar_help'] = '<strong>For automatic grading</strong>: A name of a boolean object in GeoGebra which is true if the student solved
the
question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%,
but there should be at least one combination which sums up to exactly 100%.<br>
<strong>Leave blank for manual grading.</strong>';
$string['feedback'] = 'Feedback for variable being true';
$string['feedback_help'] = 'The feedback is automatically taken from caption of the variable in the GeoGebra file. ';
$string['willbereadfromfile'] = 'Will be read from GeoGebra ... (see help button)';
$string['ggbfilemissing'] = 'The base64-string in the response is missing. Probably JavaScript isn\'t turned on in the Browser
or an unknown error occurred';
$string['ggbxmlmissing'] = 'The XML-String in the response is missing. Probably JavaScript isn\'t turned on in the Browser
or an unknown error occurred';
$string['answermissing'] = 'The answer in the response is missing. Probably JavaScript isn\'t turned on in the Browser
or an unknown error occurred';
$string['answerinvalid'] = 'The answer-string in the response is invalid. This should not happen.';
$string['variablenamewrong'] = 'A variable with that name could not be found in the GeoGebra file.';

