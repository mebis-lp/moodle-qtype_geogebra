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
$string['answervar_help'] = 'За автоматично оценяване: име на булев обект в GeoGebra, които е верен (истинен), ако ученикът е отговорил на въпроса (частично). Събират се всички оценки от всички булеви променливи. Въпросът е верен, ако някоя комбинация надвишава 100%, но трябва да има поне една комбинация, които има сбор точно 100%. Оставете празно за ръчно оценяване.';
$string['applet_advanced_settings'] = 'Advanced Settings...';
$string['constraints'] = 'Ограничения (условия)';
$string['constraints_help'] = 'Има ли някакви ограничения за променливите, като например a < b, които не могат да бъдат декларирани чрез опциите на слайдера? Разделени със запетаи, поддържаните връзки са: <, <=, >, >=. Ако е необходимо, равенство може да използва същата променлива, когато се създава GeoGebra работен лист. Динамични диапазони, като например използване на променлива за минимум/максимум, не са поддържани.';
$string['constraintswrongortoohard'] = '{$a->inequalities} са грешни или твърде трудни за изпълнение. Опитахме (груба сила) {$a->tries} пъти за {$a->time} секунди. Може би ще използваме по-добър метод в бъдеще...';
$string['dragndrop'] = 'Drag and drop a GeoGebra file anywhere on the GeoGebra Applet section';
$string['enable_label_drags'] = 'Enable Dragging of Labels';
$string['enable_right_click'] = 'Enable Right Click, Zooming and Keyboard Editing';
$string['enable_shift_drag_zoom'] = 'Enable Shift-Drag & Zoom';
$string['feedback'] = 'Обратна връзка, когато променливата е истина';
$string['feedback_help'] = 'Обратна връзка се получава автоматично от надписа на променливата в GeoGebra файла.';
$string['geogebraapplet'] = 'GeoGebra аплет';
$string['getvars'] = 'Получаване на променливи, които могат да бъдат направени произволни от аплета';
$string['ggbfilemissing'] = 'Низът base64 в отговора липсва. Вероятно string JavaScript не е включен в браузъра или е възникнала неизвестна грешка';
$string['ggbturl'] = 'URL или ID на GeoGebraTube работен лист';
$string['ggbturl_help'] = 'Можете или да използвате бутона за споделяне на GeoGebraTube и да копирате и да поставите линка или да използвате GeoGebraTube хранилище. Аплетът и параметрите са запазени в базата данни, аплетът няма да бъде презареден от GeoGebraTube освен ако не е поискано. Само представяне на ID или код за споделяне от аплета е също поддържан.';
$string['ggbxmlmissing'] = 'XML-стрингът в отговора липсва. Може би JavaScript не е включен в браузъра или е възникнала неизвестна грешка';
$string['invalidinequality'] = '{$a} е невалиден';
$string['isexercise'] = 'Use GeoGebra-Exercise for checking the question';
$string['isexercise_help'] = 'The applet contains user-defined tools which can be used for automatic checking of the exercise.\nBeware: All answers below are not applicable in this case!';
$string['israndomized'] = 'Има ли променливи, които да бъдат произволно избрани?';
$string['loadapplet'] = '(Пре)зареждане и показване на аплет';
$string['loadapplet_help'] = '(Пре)зареждане на аплет от GeoGebraTube и запазване на новата версия от GeoGebraTube в базата с данни.';
$string['mineqmax'] = 'Минимумът и максимумът за рандомизацията не са зададени правилно за променлицата {$a}. Или не сте задали минимум или максимум на слайдера, или елементът изобщо не е слайдер. Може би трябва да поправите това във Вашия GeoGebra файл.';
$string['minplusstepgtmax'] = 'Минимумът плюс инкремента е по-голям от максимума за променливата {$a}. Може би трябва да коригирате това във Вашия GeoGebra файл.';
$string['noappletloaded'] = 'Няма зареден аплет! Проверете дали URL адресът е верен и дали виждате аплет след избиране на линк или (пре)зареждане на аплета.';
$string['nofractionsumeq1'] = 'Поне една комбинация от оценки трябва да има сума 100%';
$string['pluginname_help'] = 'Въпросу, на които ученикът да отговори, използвайки GeoGebra';
$string['pluginnameadding'] = 'Добавяне на GeoGebra въпрос';
$string['pluginnameediting'] = 'Редактиране на GeoGebra въпрос';
$string['pluginnamesummary'] = 'Версия на изчислените въпроси, която използва GeoGebra, за да покаже въпроса и да потвърди отговора, когато се провежда викторина.';
$string['randomizedbutnovars'] = 'Избрали сте, че въпросът може да бъде направен произволен, но не сте посочили валидни променливи, които да бъдат произволни.';
$string['randomizedvar'] = 'Променливи, които да бъдат произволни';
$string['randomizedvar_help'] = 'Променливи, които могат да бъдат направени произволни (разделени със запетаи). Използвайте опциите на плъзгача в GeoGebra, за да декларирате Минимум, Максимум и Увеличение. Тези променливи могат също така да бъдат използвани в текста на въпроса, оградени от големи скоби, например: {a}';
$string['show_algebra_input'] = 'Show Input Bar';
$string['show_menu_bar'] = 'Show Menu';
$string['show_reset_icon'] = 'Show Icon to Reset Construction';
$string['show_tool_bar'] = 'Show Toolbar';
$string['stepzero'] = 'Увеличението е 0 за променливата {$a}; или не сте посочили увеличението на плъзгача, или елементът изобщо не е плъзгач. Вероятно трябва да поправите това във Вашия GeoGebra файл.';
$string['useafile'] = '... or use a ggb-file';
$string['valuecheckedfor'] = 'Булев обект в GeoGebra, който е използван за проверка на коректност.';
$string['variablenamewrong'] = 'Променлива с това име не може да бъде открита в GeoGebra файла.';
$string['variableno'] = 'Променлива {$a}';
$string['variables'] = 'Променливи';
$string['willbereadfromfile'] = 'Ще бъде прочетено от GeoGebra... (виж бутона Помощ)';