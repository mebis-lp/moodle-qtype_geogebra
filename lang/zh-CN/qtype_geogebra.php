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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = '为变量添加限制(条件).';
$string['addmorevarblanks'] = 'Blanks for {no} more variable(s)';
$string['answerinvalid'] = '响应中的回答字符串无效，这是不应该发生的.';
$string['answermissing'] = '响应中的答案丢失，可能 JavaScript 在浏览器中没有打开或者出现了未知错误';
$string['answervar'] = '自动分级变量';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = '限制(条件)';
$string['constraints_help'] = 'Are there any constraints for variables, such as a < b, which could not be declared using the slider options? Comma separated. Supported relations are: <, <=, >, >=. If you need an equality you have to use the same variable when creating the GeoGebra worksheet. Dynamic ranges, ie using variables for slider min/max are not supported.';
$string['constraintswrongortoohard'] = '{$a->inequalities} 是错误的或难以满足的, 在 {$a->time} 秒内我们(强力)尝试了 {$a->tries} 次. 也许我们将来会用更好的方法...';
$string['feedback'] = '变量为真时的反馈';
$string['feedback_help'] = '反馈自动地从 GeoGebra 文件中的变量标题中采纳.';
$string['geogebraapplet'] = 'GeoGebra Applet';
$string['getvars'] = '从 applet 中取得能被随机化的变量';
$string['ggbfilemissing'] = '响应中的 Base64 编码字符串丢失，可能是浏览器中的 JavaScript 没有打开或者出现了未知的错误';
$string['ggbturl'] = 'GeoGebraTube 作业单网址或者ID';
$string['ggbturl_help'] = 'You could either use the share button on GeoGebraTube and copy and paste the link or use the GeoGebraTube repository. The applet and parameters are stored in the database, the applet will not be reloaded from GeoGebraTube unless requested. Just providing the ID or sharing key of the Applet is also supported.';
$string['ggbxmlmissing'] = '响应中的 XML 字符串丢失，可能是浏览器中的 JavaScript 没有打开或者出现了未知错误';
$string['invalidinequality'] = '{$a} 无效';
$string['israndomized'] = '存在应当随机化的变量吗?';
$string['loadapplet'] = '(重新)载入并显示 applet';
$string['loadapplet_help'] = '(Re)load the applet from GeoGebraTube and store the new version from GeoGebraTube in the database.';
$string['mineqmax'] = 'Min and Max for the randomization aren\'t specified properly for variable {$a}, either you haven\'t specified the slider’s min and max or the element isn\'t a slider at all. You probably have to correct this in your GeoGebra file.';
$string['minplusstepgtmax'] = '变量 {$a} 的最小值加上增量大于最大值, 您可能不得不在 GeoGebra 文件中纠正它.';
$string['noappletloaded'] = 'No Applet loaded! Check if URL is correct and if you see an applet after choosing a link or (re)loading the applet';
$string['nofractionsumeq1'] = '至少成绩的一个组合总和必须为 100%';
$string['pluginname_help'] = 'Questions where the student can solve the question using GeoGebra';
$string['pluginnameadding'] = '添加 GeoGebra 问题';
$string['pluginnameediting'] = '编辑 GeoGebra 问题';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer when the quiz is taken.';
$string['randomizedbutnovars'] = '您已经选择了应该随机化的问题, 但您没有指定任何可随机化的有效变量.';
$string['randomizedvar'] = '随机变量';
$string['randomizedvar_help'] = '随机变量 (逗号隔开). 使用 GeoGebra 中的参数选项，标识最小值、最大值和增量. 这些变量也可以应用于问题文本中，并以大括号将它们括起来, 例如: {a}';
$string['stepzero'] = '变量 {$a} 的增量为0; 您或者还没有指定参数的增量，或者该元素根本就不是一个参数. 您可能不得不在 GeoGebra 文件中纠正它.';
$string['valuecheckedfor'] = 'GeoGebra 中用于检查正确性的布尔对象';
$string['variablenamewrong'] = '在 GeoGebra 文件中无法找到以此命名的变量.';
$string['variableno'] = '变量 {$a}';
$string['variables'] = '变量';
$string['willbereadfromfile'] = '将从 GeoGebra 读取... (见帮助按钮)';