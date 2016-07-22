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
$string['answerinvalid'] = 'Odpověď obsahuje neplatný řetězec. To by se nemělo stát.';
$string['answermissing'] = 'Odpověď nebyla odeslána. Pravděpodobně není v prohlížeči zapnutý JavaScript nebo došlo k neznámé chybě.';
$string['answervar'] = 'Proměné pro automatické hodnocení';
$string['answervar_help'] = 'Pro automatické hodnocení: Název pravdivostní hodnoty v GeoGebře, která má hodnotu pravda (true), pokud student vyřešil úlohu (částečně). Sčítá všechna hodnocení pro všechny pravdivostní hodnoty. Úloha je korektní pokud kterákoliv kombinace přesáhne hodnotu 100%, ale měla by existovat alespoň jedna kombinace, pro kterou bude součet přesně 100%. Ponechte prázdné pro manuální hodnocení.';
$string['applet_advanced_settings'] = 'Pokročilé nastavení...';
$string['constraints'] = 'Podmínky (omezení)';
$string['constraints_help'] = 'Are there any constraints for variables, such as a < b, which could not be declared using the slider options? Comma separated. Supported relations are: <, <=, >, >=. If you need an equality you have to use the same variable when creating the GeoGebra worksheet. Dynamic ranges, ie using variables for slider min/max are not supported.';
$string['constraintswrongortoohard'] = 'Podmínky {$a->inequalities} jsou splnitelné jen obtížně a nebo vůbec. Zkusili jsme {$a->tries} možností během {$a->time} sekund. Možná v budoucnu budeme mít lepší algoritmus.';
$string['dragndrop'] = 'Drag and drop a GeoGebra file anywhere on the GeoGebra Applet section';
$string['enable_label_drags'] = 'Povolit přemisťování popisků myší';
$string['enable_right_click'] = 'Povolit užití pravého tlačítka, zoom a editaci z klávesnice';
$string['enable_shift_drag_zoom'] = 'Povolit pohyb a přiblížení nákresny';
$string['feedback'] = 'Zpětná vazba, pokud je pravdivostní hodnota pravda';
$string['feedback_help'] = 'Hodnocení je automaticky převzato z popisku proměnné v GeoGebra souboru.';
$string['geogebraapplet'] = 'GeoGebra applet';
$string['getvars'] = 'Najít proměnné, které mohou být v tomto apletu náhodně zvoleny';
$string['ggbfilemissing'] = 'Odpověď neobsahuje řetězec v base64 kódování. Buď je v prohlížeči vypnutý JavaScript, nebo došlo k chybě.';
$string['ggbturl'] = 'URL nebo ID pracovního listu z GeoGebra';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebra and copy and paste the link or use the GeoGebra repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebra unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = 'The XML string in the response is missing. Probably JavaScript isn\'t turned on in the Browser or an unknown error occurred';
$string['invalidinequality'] = 'nerovnost {$a} je neplatná';
$string['isexercise'] = 'Použít GeoGebra Cvičení ke kontrole otázky';
$string['isexercise_help'] = 'Applet obsahuje uživatelské nástroje, které mohou být použity pro automatické ověřování úkolu.\nPozor: Všechny odpovědi uvedené níže nejsou v tomto případě použitelné.';
$string['israndomized'] = 'Mají být nějaké proměnné náhodně zvoleny?';
$string['loadapplet'] = '(Znovu) načíst a zobrazit applet';
$string['loadapplet_help'] = '(Znovu)načíst applet z GeoGebry a uložit novou verzi z GeoGebry do databáze.';
$string['mineqmax'] = 'Hodnoty Min a Max pro náhodnou volbu proměnné {$a} nejsou správně zadány; proměnná buď není typu posuvník nebo nemá nastavené hodnoty min a max. Pravděpodobně to bude třeba opravit v GeoGebra souboru.';
$string['minplusstepgtmax'] = 'Min plus přírůstek je větší než Max pro proměnnou {$a}, pravděpodobně to bude třeba opravit ve Vašem GeoGebra souboru.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or (re)loading the applet';
$string['nofractionsumeq1'] = 'Alespoň jedna kombinace hodnocených kriterií musí dát v součtu 100%';
$string['pluginname_help'] = 'Otázky, které může student vyřešit pomocí GeoGebry';
$string['pluginnameadding'] = 'Přidat úlohu s GeoGebrou';
$string['pluginnameediting'] = 'Upravit úlohu s GeoGebrou';
$string['pluginnamesummary'] = 'Výpočetní otázka která požívá GeoGebru ke zobrazení zadání a ověření odpovědi při vyplňování testu.';
$string['randomizedbutnovars'] = 'Zvolili jste, že některé proměnné mají být náhodně zvoleny, ale neuvedli jste žádné platné proměnné pro tuto volbu.';
$string['randomizedvar'] = 'Náhodně nastavit proměnné';
$string['randomizedvar_help'] = 'Proměnné, které mají být náhodně zvoleny. Použijte nastavení posuvníků k volbě minima, maxima a přírůstku. Tyto proměnné mohou být také použity v textu otázky, k tomu je třeba je uvést ve složených závorkách  {a}';
$string['show_algebra_input'] = 'Zobrazit vstupní řádek';
$string['show_menu_bar'] = 'Zobrazit menu';
$string['show_reset_icon'] = 'Zobrazit ikonu pro restart konstrukce';
$string['show_tool_bar'] = 'Zobrazit panel nástrojů';
$string['stepzero'] = 'Přírůstek proměnné {$a} je 0; proměnná buď není posuvník, nebo nemá nastavený přírůstek. Nejspíše je třeba opravit to v GeoGebra souboru.';
$string['useafile'] = '... nebo použít .ggb soubor';
$string['valuecheckedfor'] = 'Pravdivostní hodnota v GeoGebra souboru použitá k ověření správnosti';
$string['variablenamewrong'] = 'Proměnná s tímto názvem nebyla v GeoGebra souboru nalezena.';
$string['variableno'] = 'Proměnná {$a}';
$string['variables'] = 'Proměnné';
$string['willbereadfromfile'] = 'Bude načteno z GeoGebry ... (viz tlačítko Nápověda)';