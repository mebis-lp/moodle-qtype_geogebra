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
$string['addmorevarblanks'] = '{no} 更多变量空白';
$string['answerinvalid'] = '响应中的回答字符串无效，这不应该发生.';
$string['answermissing'] = '响应中的答案丢失，可能 JavaScript 在浏览器中没有打开或者出现了未知错误';
$string['answervar'] = '自动评分变量';
$string['answervar_help'] = '对自动评分: 如果学生解决了问题（部分地），那么 GeoGebra 中的布尔运算对象名称为真. 合计所有布尔变量的所有分数. 如果任何组合都超过了 100%，那么问题就是正确的, 但是至少应该有一个组合的总分恰恰达到 100%. 对手动评分留下空白.';
$string['constraints'] = '限制(条件)';
$string['constraints_help'] = '如同不能在参数选项中作标识的 a < b 的变量，对它们有限制吗？ 以逗号分隔. 支持的关系有: <, <=, >, >=. 如需要等式，您就不得不在创建 GeoGebra 课件时使用同一变量. 运用变量作为参数的最小值/最大值的动态区间是得不到支持的.';
$string['constraintswrongortoohard'] = '{$a->inequalities} 是错误的或难以满足的, 在 {$a->time} 秒内我们(强力)尝试了 {$a->tries} 次. 也许我们将来会用更好的方法...';
$string['feedback'] = '变量为真时的反馈';
$string['feedback_help'] = '反馈自动地从 GeoGebra 文件中的变量标题中采纳.';
$string['geogebraapplet'] = 'GeoGebra Java程序';
$string['getvars'] = '从Java程序中取得能被随机化的变量';
$string['ggbfilemissing'] = '响应中的 Base64 编码字符串丢失，可能是浏览器中的 JavaScript 没有打开或者出现了未知的错误';
$string['ggbturl'] = 'GeoGebraTube 课件网址或者ID';
$string['ggbturl_help'] = '您或者可以使用 GeoGebraTube 中的分享按钮复制粘贴链接，或者使用 GeoGebraTube 库. Java程序 和参数保存在数据库中, 除非有要求，Java程序将会从 GeoGebraTube 中重新载入. 只需提供 ID 或分享Java程序的键不能能得到支持.';
$string['ggbxmlmissing'] = '响应中的 XML 字符串丢失，可能是浏览器中的 JavaScript 没有打开或者出现了未知错误';
$string['invalidinequality'] = '{$a} 无效';
$string['israndomized'] = '存在应当随机化的变量吗?';
$string['loadapplet'] = '(重新)载入并显示Java程序';
$string['loadapplet_help'] = '从 GeoGebraTube (重新)载入Java程序并将 GeoGebraTube 中的新版本保存进数据库.';
$string['mineqmax'] = '对于随机化的最小值和最大值为变量 {$a} 指定得不正确, 您或者还没有指定参数的最小值和最大值或者该元素根本就不是参数. 您可能不得不在 GeoGebra 文件中纠正它.';
$string['minplusstepgtmax'] = '变量 {$a} 的最小值加上增量大于最大值, 您可能不得不在 GeoGebra 文件中纠正它.';
$string['noappletloaded'] = '无Java程序载入! 检查一下网址是否正确，并确定选择一个链接或者（重新）载入Java程序后是否能看见它';
$string['nofractionsumeq1'] = '至少成绩的一个组合总和必须为 100%';
$string['pluginname_help'] = '学生能用 GeoGebra 解决的问题';
$string['pluginnameadding'] = '添加 GeoGebra 问题';
$string['pluginnameediting'] = '编辑 GeoGebra 问题';
$string['pluginnamesummary'] = '测验时运用 GeoGebra 显示问题并验证答案的计算问题版本.';
$string['randomizedbutnovars'] = '您已经选择了应该随机化的问题, 但您没有指定任何可随机化的有效变量.';
$string['randomizedvar'] = '随机变量';
$string['randomizedvar_help'] = '随机变量 (逗号隔开). 使用 GeoGebra 中的参数选项，标识最小值、最大值和增量. 这些变量也可以应用于问题文本中，并以大括号将它们括起来, 例如: {a}';
$string['stepzero'] = '变量 {$a} 的增量为0; 您或者还没有指定参数的增量，或者该元素根本就不是一个参数. 您可能不得不在 GeoGebra 文件中纠正它.';
$string['valuecheckedfor'] = 'GeoGebra 中用于检查正确性的布尔对象';
$string['variablenamewrong'] = '在 GeoGebra 文件中无法找到以此命名的变量.';
$string['variableno'] = '变量 {$a}';
$string['variables'] = '变量';
$string['willbereadfromfile'] = '将从 GeoGebra 读取... (见帮助按钮)';