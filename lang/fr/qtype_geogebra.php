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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Add constraints (conditions) to variables.';
$string['addmorevarblanks'] = 'Blanks for {no} more variable(s)';
$string['answerinvalid'] = 'The answer-string in the response is invalid. This should not happen.';
$string['answermissing'] = 'The answer in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['answervar'] = 'Variables for automatic grading';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = 'Constraints (conditions)';
$string['constraints_help'] = 'Y a t\'il une contrainte sur les variables, par ex. a < b, ne pouvant être précisée dans les options du curseur ? Virgule comme séparateur. Relations supportées : <, <=, >, >=. Pour une égalité vous devez utiliser la même variable qu\'à la création de la feuille de travail. Intervalles dynamiques, via variables pour min/max de curseurs ne sont pas autorisés.';
$string['constraintswrongortoohard'] = '{$a->inequalities} are wrong or too hard to meet, we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use a better method in the future...';
$string['feedback'] = 'Appréciation si la variable est "true"';
$string['feedback_help'] = 'L\'appréciation est automatiquement activée par la légende de la variable du fichier GeoGebra.';
$string['geogebraapplet'] = 'Appliquette GeoGebra';
$string['getvars'] = 'Get variables which can be randomized from the applet';
$string['ggbfilemissing'] = 'The base64 string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['ggbturl'] = 'URL ou ID de la feuille de travail sur GeoGebraTube';
$string['ggbturl_help'] = 'Vous pouvez soit utiliser le bouton Partager sur GeoGebraTube et copier et coller le lien ou utiliser le répertoire GeoGebraTube. L\'appliquette et les paramètres sont stockés dans la base de données, l\'appliquette ne sera pas rechargée à partir de GeoGebraTube sauf demande. Juste fournir l\'ID ou partager la clé de l\'appliquette est également supporté.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = '{$a} est invalide';
$string['israndomized'] = 'Are there any variables which should be randomized?';
$string['loadapplet'] = '(Re)load and show applet';
$string['loadapplet_help'] = '(Re)load the applet from GeoGebraTube and store the new version from GeoGebraTube in the database.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = 'Min plus increment is greater than Max for variable {$a}, you probably have to correct this in your GeoGebra file.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or (re)loading the applet';
$string['nofractionsumeq1'] = 'At least one combination of grades must sum to 100%';
$string['pluginname_help'] = 'Questions where the student can solve the question using GeoGebra';
$string['pluginnameadding'] = 'Ajouter une question GeoGebra';
$string['pluginnameediting'] = 'Éditer une question GeoGebra';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer when the quiz is taken.';
$string['randomizedbutnovars'] = 'You have selected that the question should be randomized, but you didn\'t specify any valid variables to be randomized.';
$string['randomizedvar'] = 'Variables to be randomized';
$string['randomizedvar_help'] = 'Variables which should be randomized (comma separated). Use the slider options in GeoGebra to declare Min, Max and Increment. These variables can also be used in the question text by enclosing them with curly braces, for example: {a}';
$string['stepzero'] = 'Increment is 0 for variable {$a}; either you haven\'t specified the slider’s increment or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['valuecheckedfor'] = 'Boolean Object in GeoGebra which is used to check correctness.';
$string['variablenamewrong'] = 'A variable with that name could not be found in the GeoGebra file.';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['willbereadfromfile'] = 'Doit être lu depuis GeoGebra... (voir le bouton d\'aide)';