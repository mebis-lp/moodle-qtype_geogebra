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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Добавяне на ограничения (условия) към променливи.';
$string['addmorevarblanks'] = 'Празни места за още {no} променливи';
$string['answerinvalid'] = 'Низът отговор не е валиден. Това не трябва да се случва.';
$string['answermissing'] = 'Липсва отговор. Вероятно JavaScript не е включена в браузъра или е възникнала неизвестна грешка.';
$string['answervar'] = 'Променливи за автоматично оценяване';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = 'Ограничения (условия)';
$string['constraints_help'] = 'Are there any constraints for variables, such as a < b, which could not be declared using the slider options? Comma separated. Supported relations are: <, <=, >, >=. If you need an equality you have to use the same variable when creating the GeoGebra worksheet. Dynamic ranges, ie using variables for slider min/max are not supported.';
$string['constraintswrongortoohard'] = '{$a->inequalities} are wrong or too hard to meet, we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use a better method in the future...';
$string['feedback'] = 'Обратна връзка, когато променливата е истина';
$string['feedback_help'] = 'Обратна връзка се получава автоматично от надписа на променливата в GeoGebra файла.';
$string['geogebraapplet'] = 'GeoGebra аплет';
$string['getvars'] = 'Получаване на променливи, които могат да бъдат направени произволни от аплета';
$string['ggbfilemissing'] = 'Низът base64 в отговора липсва. Вероятно string JavaScript не е включен в браузъра или е възникнала неизвестна грешка';
$string['ggbturl'] = 'URL или ID на GeoGebraTube работен лист';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = '{$a} е невалиден';
$string['israndomized'] = 'Има ли променливи, които да бъдат произволно избрани?';
$string['loadapplet'] = '(Пре)зареждане и показване на аплет';
$string['loadapplet_help'] = '(Пре)зареждане на аплет от GeoGebraTube и запазване на новата версия от GeoGebraTube в базата с данни.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = 'Минимумът плюс инкремента е по-голям от максимума за променливата {$a}. Може би трябва да коригирате това във Вашия GeoGebra файл.';
$string['noappletloaded'] = 'Няма зареден аплет! Проверете дали URL адресът е верен и дали виждате аплет след избиране на линк или (пре)зареждане на аплета.';
$string['nofractionsumeq1'] = 'Поне една комбинация от оценки трябва да има сума 100%';
$string['pluginname_help'] = 'Въпросу, на които ученикът да отговори, използвайки GeoGebra';
$string['pluginnameadding'] = 'Добавяне на GeoGebra въпрос';
$string['pluginnameediting'] = 'Редактиране на GeoGebra въпрос';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer when the quiz is taken.';
$string['randomizedbutnovars'] = 'Избрали сте, че въпросът може да бъде направен произволен, но не сте посочили валидни променливи, които да бъдат произволни.';
$string['randomizedvar'] = 'Променливи, които да бъдат произволни';
$string['randomizedvar_help'] = 'Променливи, които могат да бъдат направени произволни (разделени със запетаи). Използвайте опциите на плъзгача в GeoGebra, за да декларирате Минимум, Максимум и Увеличение. Тези променливи могат също така да бъдат използвани в текста на въпроса, оградени от големи скоби, например: {a}';
$string['stepzero'] = 'Увеличението е 0 за променливата {$a}; или не сте посочили увеличението на плъзгача, или елементът изобщо не е плъзгач. Вероятно трябва да поправите това във Вашия GeoGebra файл.';
$string['valuecheckedfor'] = 'Булев обект в GeoGebra, който е използван за проверка на коректност.';
$string['variablenamewrong'] = 'Променлива с това име не може да бъде открита в GeoGebra файла.';
$string['variableno'] = 'Променлива {$a}';
$string['variables'] = 'Променливи';
$string['willbereadfromfile'] = 'Ще бъде прочетено от GeoGebra... (виж бутона Помощ)';