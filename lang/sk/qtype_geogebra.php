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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Pridať obmedzenia (podmienky) pre premenné.';
$string['addmorevarblanks'] = 'Miesto pre {no} premenných';
$string['answerinvalid'] = 'Zadaný reťazec používaný v odpovedi je neplatný. To by sa nemalo stávať.';
$string['answermissing'] = 'Nebola zadaná odpoveď. Pravdepodobne JavaScript nie je zapnutý v prehliadači, alebo došlo k neznámej chybe';
$string['answervar'] = 'Premenné pre automatické hodnotenie';
$string['answervar_help'] = 'Pre automatické hodnotenie: meno(hodnote) logickej premennej v GeoGebre, ktorý je pravdivý, ak študent vyriešil otázku (čiastočne). Sčíta všetky všetky hodnotenia všetkých hodnôt logických  premenných. Otázka je správna, ak akákoľvek kombinácia prekročí hodnotu 100%, ale aspoň jedna kombinácia musí existovať, pomocou ktorej je možné dosiahnúť presne 100%. V prípade pre ručného hodnotenia nechajte políčko prázdne.';
$string['constraints'] = 'Obmedzenia (podmienky)';
$string['constraints_help'] = 'Existujú nejaké obmedzenia pre premenné, napr. a<b, ktoré nemožno vyjadiť pomocou posuvníka? Oddeľte pomocou čiarok. Podporované relácie sú: <, <=,>,>=. Ak potrebujete rovnosť, tak musíte použiť rovnaké premenné pri vytváraní pracového zošitu GeoGebry. Dynamické rozsahy pre posuvníka  vyjadrené pomocou premenných min/max nie sú podporované.';
$string['constraintswrongortoohard'] = '{$a->inequalities} sú zlé, alebo príliš ťažké splniť, snažili sme (hrubou silou) {$a->tries} krát za {$a->time} sekúnd. Možno, že budeme používať lepšiu metódu v budúcnosti...';
$string['feedback'] = 'Spätná väzba, pokiaľ premenná je pravda';
$string['feedback_help'] = 'Spätná väzba je automaticky prevzatá z titulku premennej GeoGebra súboru.';
$string['geogebraapplet'] = 'GeoGebra applet';
$string['getvars'] = 'Získať premenné z appletu, ktoré môžu byť náhodne zvolené';
$string['ggbfilemissing'] = 'Reťazec base64 v odpovedi chýba. Pravdepodobne JavaScript nie je zapnutý v prehliadači, alebo došlo k neznámej chybe';
$string['ggbturl'] = 'URL alebo ID pracovného listu GeoGebraTube';
$string['ggbturl_help'] = 'Môžete použiť buď tlačidlo Zdieľať na stránke GeoGebraTube, kopírovať a vložiť odkaz, alebo použite úložisko GeoGebraTube. Applet a parametre appletu sú uložené priamo v databáze, applet nebude znova načítaný z GeoGebraTube, ak to nežiadate. Tiež je podporované aj to, že stačí poskytnúť ID alebo klúč zdieľania appletu.';
$string['ggbxmlmissing'] = 'Reťazec XML v odpovedi chýba. Pravdepodobne JavaScript nie je zapnutý v prehliadači, alebo došlo k neznámej chybe';
$string['invalidinequality'] = '{$a} je neplatná';
$string['israndomized'] = 'Existujú nejaké premenné, ktoré by mali byť náhodne zvolené?';
$string['loadapplet'] = '(Znouvu) načitanie a zobrazenie appletu';
$string['loadapplet_help'] = '(Znouvu) načitanie appletu z GeoGebraTube a uloženie novej verzie z GeoGebraTube do databázy.';
$string['mineqmax'] = 'Min a max pre náhoné zvolenie nie sú správne špecifikované pre premennú {$a}, alebo ste nezadali min a max pre posuvník, alebo zvolený prvok nie je určený s posuvníkom. Pravdepodobne budete môcť to napraviť v GeoGebra súbore.';
$string['minplusstepgtmax'] = 'Min a veľkosť kroku je väčšia ako max pre premennú {$a}, pravdepodobne budete musieť to opraviť v GeoGebra súbore.';
$string['noappletloaded'] = 'Nie je applet načítaný! Skontrolujte, či je URL adresa správna, a ak vidíte applet po zvolení odkazu, alebo (znovu) načítaní appletu';
$string['nofractionsumeq1'] = 'Aspoň jedna kombinácia hodnotení musí mať súčet 100%';
$string['pluginname_help'] = 'Otázky, ktoré študent riešiť pomocou GeoGebry';
$string['pluginnameadding'] = 'Pridať GeoGebra úlohu';
$string['pluginnameediting'] = 'Upraviť GeoGebra úlohu';
$string['pluginnamesummary'] = 'Verzia výpočtovej otázky, ktorá používa GeoGebru, ktorá ukáže otázku (zadanie) a vyhodnocuje otázku keď prebieha testovanie.';
$string['randomizedbutnovars'] = 'Vybrali ste otázku, ktorá by mohla byť náhodne zvolená (randomizovaná), ale nezadali ste žiadne platné premenné na náhodné zvolenie.';
$string['randomizedvar'] = 'Nastavovanie premenných za náhodné';
$string['randomizedvar_help'] = 'Premenné, ktoré by mali byť náhodne zvolené (oddelené čiarkami). Použite možnosti posuvníka v GeoGebre a zadajte jeho min, max a veľkosť kroku. Tieto premenné môžu byť tiež použité aj v texte zadania ako dynamické texty, len musíte ich uviesť v množinových zátvorkách v tvare napr.: {a}';
$string['stepzero'] = 'Veľkosť kroku má hodnotu 0 pre premennú {$a}; Buď nezadali ste pre tento posuvník platnú hodnotu pre veľkosť kroku alebo pre vybratý prvok neexistuje posuvník. Pravdepodobne budete musieť to napraviť v GeoGebra súbore.';
$string['valuecheckedfor'] = 'Logická hodnota GeoGebra súboru, ktorá je použitá na overovanie správnosti.';
$string['variablenamewrong'] = 'Premenná s takým názvom nebola nádená v GeoGebra súbore.';
$string['variableno'] = 'Premenná {$a}';
$string['variables'] = 'Premenné';
$string['willbereadfromfile'] = 'Bude načítané z GeoGebry... (see help button)';