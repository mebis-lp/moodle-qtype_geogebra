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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Přidat omezení (podmínky) pro proměnné.';
$string['addmorevarblanks'] = 'Místo pro {no} proměnných';
$string['answerinvalid'] = 'The answer-string in the response is invalid. This should not happen.';
$string['answermissing'] = 'The answer in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['answervar'] = 'Proměné pro automatické hodnocení';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = 'Podmínky (omezení)';
$string['constraints_help'] = 'Are there any constraints for variables, such as a < b, which could not be declared using the slider options? Comma separated. Supported relations are: <, <=, >, >=. If you need an equality you have to use the same variable when creating the GeoGebra worksheet. Dynamic ranges, ie using variables for slider min/max are not supported.';
$string['constraintswrongortoohard'] = '{$a->inequalities} are wrong or too hard to meet, we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use a better method in the future...';
$string['feedback'] = 'Feedback when the variable is true';
$string['feedback_help'] = 'The feedback is automatically taken from caption of the variable in the GeoGebra file.';
$string['geogebraapplet'] = 'GeoGebra Applet';
$string['getvars'] = 'Get variables which can be randomized from the applet';
$string['ggbfilemissing'] = 'The base64 string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['ggbturl'] = 'URL nebo ID pracovního listu z GeoGebraTube';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = 'nerovnost {$a} je neplatná';
$string['israndomized'] = 'Mají být nějaké proměnné náhodně zvoleny?';
$string['loadapplet'] = '(Znovu) načíst a zobrazit applet';
$string['loadapplet_help'] = '(Re)load the applet from GeoGebraTube and store the new version from GeoGebraTube in the database.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = 'Min plus increment is greater than Max for variable {$a}, you probably have to correct this in your GeoGebra file.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or (re)loading the applet';
$string['nofractionsumeq1'] = 'Alespoň jedna kombinace hodnocených kriterií musí dát v součtu 100%';
$string['pluginname_help'] = 'Questions where the student can solve the question using GeoGebra';
$string['pluginnameadding'] = 'Přidat úlohu s GeoGebrou';
$string['pluginnameediting'] = 'Upravit úlohu s GeoGebrou';
$string['pluginnamesummary'] = 'Výpočetní otázka která požívá GeoGebru ke zobrazení zadání a ověření odpovědi při vyplňování testu.';
$string['randomizedbutnovars'] = 'Zvolili jste, že některé proměnné mají být náhodně zvoleny, ale neuvedli jste žádné platné proměnné pro tuto volbu.';
$string['randomizedvar'] = 'Náhodně nastavit proměnné';
$string['randomizedvar_help'] = 'Proměnné, které mají být náhodně zvoleny. Použijte nastavení posuvníků k volbě minima, maxima a přírůstku. Tyto proměnné mohou být také použity v textu otázky, k tomu je třeba je uvést ve složených závorkách  {a}';
$string['stepzero'] = 'Přírůstek proměnné {$a} je 0; proměnná buď není posuvník, nebo nemá nastavený přírůs tek. Nejspíše je třeba opravit to v GeoGebra souboru.';
$string['valuecheckedfor'] = 'Pravdivostní hodnota v GeoGebra souboru použitá k ověření správnosti';
$string['variablenamewrong'] = 'Proměnná s tímto názvem nebyla v GeoGebra souboru nalezena.';
$string['variableno'] = 'Proměnná {$a}';
$string['variables'] = 'Proměnné';
$string['willbereadfromfile'] = 'Bude načteno z GeoGebry ... (viz tlačítko Nápověda)';