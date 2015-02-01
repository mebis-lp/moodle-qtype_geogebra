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
$string['constraintswrongortoohard'] = '{$a->inequalities} son erróneas ou moi difíciles de cumprir, tentouse (por forza bruta) {$a->tries} veces en {$a->time} segundos. Quizais empreguemos un método mellor no futuro...';
$string['feedback'] = 'Comentario de resposta cando a variable resulte certa';
$string['feedback_help'] = 'O comentario de resposta é tomado automaticamente do subtítulo da variable no arquivo GeoGebra.';
$string['geogebraapplet'] = 'Applet de GeoGebra';
$string['getvars'] = 'Obter variables de asignación aleatoria dende o applet';
$string['ggbfilemissing'] = 'Falta a cadea de carácteres en base64 na resposta. Probablemente JavaScript non se encontra activado no teu navegador (ou aconteceu outro erro descoñecido).';
$string['ggbturl'] = 'URL ou ID da folla de traballo en GeoGebraTube';
$string['ggbturl_help'] = 'Podes usar o botón de compartir en GeoGebraTube, e copiar e pegar o enlace, ou usar o repositorio de GeoGebraTube. O applet e os parámetros están gardados na base de datos, o applet non se recargará dende GeoGebraTube salvo requirimento expreso. Tamén permite proporcionar o ID ou o acceso compartido do applet.';
$string['ggbxmlmissing'] = 'Falta a cadea de carácteres do XML na resposta. Probablemente JavaScript non se encontra activado no teu navegador (ou aconteceu outro erro descoñecido).';
$string['invalidinequality'] = '{$a} non é válido';
$string['israndomized'] = 'Hai variables de asignación aleatoria?';
$string['loadapplet'] = '(Re)cargar e amosar o applet';
$string['loadapplet_help'] = '(Re)cargar o applet de GeoGebraTube e gardar a nova versión dende GeoGebraTube na base de datos.';
$string['mineqmax'] = 'Non están indicados correctamente o mínimo e o máximo do intervalo para o valor aleatorio da variable {$a}; talvez non se especificaron no deslizador ou o obxecto non sexa un deslizador. Probablemente necesitarás corrixir isto no teu arquivo GeoGebra.';
$string['minplusstepgtmax'] = 'O mínimo máis o incremento é maior que o máximo para a variable {$a}; probablemente necesitarás corrixir isto no teu arquivo GeoGebra.';
$string['noappletloaded'] = 'Ningunha Applet cargada! Comproba se a URL é correcta e se ves un applet despois de elixir un enlace ou (re)cargar o applet';
$string['nofractionsumeq1'] = 'Polo menos unha combinación de notas debe sumar 100';
$string['pluginname_help'] = 'Preguntas que o estudante pode resolver usando GeoGebra';
$string['pluginnameadding'] = 'Engadir unha pregunta de GeoGebra';
$string['pluginnameediting'] = 'Editar unha pregunta de GeoGebra';
$string['pluginnamesummary'] = 'Unha versión das preguntas calculadas que usa GeoGebra para amosar a pregunta e comprobar a resposta cando se realiza o cuestionario.';
$string['randomizedbutnovars'] = 'Tes elixido que a pregunta sexa aleatoria, pero non indicaches ningunha variable válida para ser aleatoria.';
$string['randomizedvar'] = 'Variables de asignación aleatoria';
$string['randomizedvar_help'] = 'As variables aleatorias sepáranse por comas. Usa as opcións do deslizador de GeoGebra para fixar o seu mínimo, o seu máximo e o seu incremento. Estas variables pódense empregar tamén no texto da pregunta, encerrándoas entre chaves como en: {a}';
$string['stepzero'] = 'Incremento 0 para a variable {$a}; ou non se especificou no deslizador ou o obxecto non é un deslizador. Probablemente necesitarás corrixir isto no teu arquivo GeoGebra.';
$string['valuecheckedfor'] = 'Obxectos lóxicos de GeoGebra utilizados para comprobar a corrección.';
$string['variablenamewrong'] = 'Non se atopa unha variable con ese nome no arquivo de GeoGebra.';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['willbereadfromfile'] = 'Lerase dende GeoGebra... (ver o botón de axuda)';