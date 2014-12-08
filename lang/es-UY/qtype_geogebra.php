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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Añadir restricciones (condiciones) a las variables.';
$string['addmorevarblanks'] = 'Espacios para {no} más variable(s)';
$string['answerinvalid'] = 'La cadena de caracteres de la respuesta no es válida. Esto no debiera ocurrir.';
$string['answermissing'] = 'No hay resultados. Probablemente JavaScript no se encuentra activado en el navegador (o ha ocurrido otro error desconocido).';
$string['answervar'] = 'Variables para la calificación automática';
$string['answervar_help'] = 'Para la calificación automática hay que escribir un nombre para una variable lógica de GeoGebra que tomará el valor "true" (cierto) en caso de resolución (parcial). Se sumarán todas las notas de todas las variables lógicas. La pregunta se considerará resuelta con cualquier combinación que supere 100, siempre que al menos una sume exactamente 100%. Para la calificación manual, basta con dejar en blanco.';
$string['constraints'] = 'Restricciones (condiciones)';
$string['constraints_help'] = '¿Hay condiciones para las variables, tales como a < b, que no pueden declararse usando las opciones del deslizador?  Deben separase por comas. Se aceptan relaciones como: <, <=, >, >=. De precisar una igualdad, debe usarse la misma variable al crear la construcción de GeoGebra. No se admiten rangos dinámicas como, por ejemplo, parámetros para el máximo o mínimo de un deslizador.';
$string['constraintswrongortoohard'] = '{$a->inequalities} son erróneas o muy difíciles de cumplir, se intentó (por fuerza bruta) {$a->tries} veces en {$a->time} segundos. Quizá se procure un método mejor en el futuro...';
$string['feedback'] = 'Comentario de devolución cuando la variable resulte cierta';
$string['feedback_help'] = 'El comentario de devolución de respuesta, se tomará automáticamente del subtítulo de la variable en el archivo GeoGebra.';
$string['geogebraapplet'] = 'Applet de GeoGebra';
$string['getvars'] = 'Obtener variables de asignación aleatoria desde el applet';
$string['ggbfilemissing'] = 'Falta la cadena de caracteres en base64 en la respuesta. Probablemente JavaScript no se encuentra activado en el navegador o que haya surgido un error desconocido';
$string['ggbturl'] = 'URL o ID de la hoja de trabajo en GeoGebraTube';
$string['ggbturl_help'] = 'Puede usarse el botón de compartir en GeoGebraTube y copiar y pegar el enlace o usar el repositorio GeoGebraTube. El applet y los parámetros están guardados en la base de datos, el applet no se recargará desde GeoGebraTube salvo requerimiento expreso. También se permite proporcionar el ID o el acceso compartido del Applet.';
$string['ggbxmlmissing'] = 'Falta la cadena de caracteres XML en la respuesta. Probablemente JavaScript no se encuentra activado en el navegador (o ha ocurrido otro error desconocido).';
$string['invalidinequality'] = '{$a} no es válido';
$string['israndomized'] = '¿Hay variables de asignación aleatoria?';
$string['loadapplet'] = '(Re)cargar y mostrar applet';
$string['loadapplet_help'] = '(Re)cargar el applet de GeoGebraTube y guardar la nueva versión desde GeoGebraTube en la base de datos.';
$string['mineqmax'] = 'No están indicados correctamente el mínimo y el máximo del intervalo para el valor aleatorio de la variable {$a}; tal vez no se especificaron en el deslizador o el objeto no sea un deslizador. Probablemente se deba corregir esto en tu archivo GeoGebra.';
$string['minplusstepgtmax'] = 'El mínimo más el incremento es mayor que el máximo para la variable {$a}; probablemente esto deba corregirse en el archivo GeoGebra.';
$string['noappletloaded'] = '¡Ninguna Applet cargada! Conviene comprobar si la URL es correcta o si se observa un applet después de elegir un enlace o (re)cargar el applet';
$string['nofractionsumeq1'] = 'Al menos una combinación de notas debe sumar 100';
$string['pluginname_help'] = 'Preguntas que pueden resolverse usando GeoGebra';
$string['pluginnameadding'] = 'Añadir una pregunta de GeoGebra';
$string['pluginnameediting'] = 'Editar una pregunta de GeoGebra';
$string['pluginnamesummary'] = 'Una versión de preguntas calculadas que usa GeoGebra para mostrarlas y para comprobar cada respuesta cuando se realiza el cuestionario.';
$string['randomizedbutnovars'] = 'Se ha elegido que la pregunta sea aleatoria, sin indicar ninguna variable válida para que sea aleatoria.';
$string['randomizedvar'] = 'Variables de asignación aleatoria';
$string['randomizedvar_help'] = 'Las variables aleatorias se separan por comas. Se usan las opciones del deslizador de GeoGebra para fijar su mínimo, su máximo y su incremento. Estas variables se pueden emplear también en el texto de la pregunta, encerrándolas entre llaves como en: {a}';
$string['stepzero'] = 'Incremento 0 para la variable {$a}; o no se especificó en el deslizador o el objeto no es un deslizador. Probablemente haya que corregirlo en el archivo de GeoGebra.';
$string['valuecheckedfor'] = 'Objetos lógicos  de GeoGebra utilizados  para comprobar la corrección.';
$string['variablenamewrong'] = 'No se encuentra  una variable con tal nombre en el archivo de GeoGebra.';
$string['variableno'] = 'Variable {$a}';
$string['variables'] = 'Variables';
$string['willbereadfromfile'] = 'Se leerá desde GeoGebra... (ver el botón de ayuda)';