<?php

/**
 * Strings for component 'qtype_geogebra'
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
$string['pluginname'] = 'GeoGebra';
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Engadir restriccións (condicións) ás variables.';
$string['addmorevarblanks'] = 'Espazos para {no} máis variable(s)';
$string['answerinvalid'] = 'A cadea de carácteres da resposta non é válida. Isto non debería acontecer.';
$string['answermissing'] = 'Non hai resultados. Probablemente JavaScript non se encontra activado no seu navegador ou aconteceu outro erro descoñecido.';
$string['answervar'] = 'Variables para a cualificación automática';
$string['answervar_help'] = 'Para a cualificación automática, escribe un nome para unha variable lóxica de GeoGebra que tomará o valor "true" se o estudante resolve a pregunta (en parte). Sumaranse todas as notas de todas as variables lóxicas. A pregunta considerarase resolta con calquera combinación que supere o 100%, pero debe haber polo menos unha combinación que sume exactamente 100%. Para a cualificación manual, deixar en branco.';
$string['constraints'] = 'Restricións (condicións)';
$string['constraints_help'] = 'Hai condicións para as variables, tales como a < b, que non poden declararse usando as opcións do deslizador? Deben separase por comas. Acéptanse relacións como: <, <=, >, >=. Se necesitas unha igualdade debes usar a mesma variable ao crear a construción de GeoGebra. Non se admiten rangos dinámicos como, por exemplo, parámetros para o máximo ou mínimo dun deslizador.';
$string['constraintswrongortoohard'] = '{$a->inequalities} are wrong or too hard to meet, we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use a better method in the future...';
$string['feedback'] = 'Feedback when the variable is true';
$string['feedback_help'] = 'The feedback is automatically taken from caption of the variable in the GeoGebra file.';
$string['geogebraapplet'] = 'GeoGebra Applet';
$string['getvars'] = 'Get variables which can be randomized from the applet';
$string['ggbfilemissing'] = 'The base64 string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['ggbturl'] = 'URL or ID of GeoGebraTube Worksheet';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = '{$a} is invalid';
$string['israndomized'] = 'Are there any variables which should be randomized?';
$string['loadapplet'] = '(Re)load and show applet';
$string['loadapplet_help'] = '(Re)load the applet from GeoGebraTube and store the new version from GeoGebraTube in the database.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = 'Min plus increment is greater than Max for variable {$a}, you probably have to correct this in your GeoGebra file.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or (re)loading the applet';
$string['nofractionsumeq1'] = 'At least one combination of grades must sum to 100%';
$string['pluginname_help'] = 'Questions where the student can solve the question using GeoGebra';
$string['pluginnameadding'] = 'Adding a GeoGebra question';
$string['pluginnameediting'] = 'Editing a GeoGebra question';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer when the quiz is taken.';
$string['randomizedbutnovars'] = 'You have selected that the question should be randomized, but you didn\'t specify any valid variables to be randomized.';
$string['randomizedvar'] = 'Variables to be randomized';
$string['randomizedvar_help'] = 'Variables which should be randomized (comma separated). Use the slider options in GeoGebra to declare Min, Max and Increment. These variables can also be used in the question text by enclosing them with curly braces, for example: {a}';
$string['stepzero'] = 'Increment is 0 for variable {$a}; either you haven\'t specified the slider’s increment or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['valuecheckedfor'] = 'Boolean Object in GeoGebra which is used to check correctness.';
$string['variablenamewrong'] = 'A variable with that name could not be found in the GeoGebra file.';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['willbereadfromfile'] = 'Will be read from GeoGebra... (see help button)';