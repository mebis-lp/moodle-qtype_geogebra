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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'Tambah kekangan-kekangan (keadaan-keadaan) kepada pembolehubah-pembolehubah.';
$string['addmorevarblanks'] = 'Kosong untuk {no} lebih pembolehubah-pembolehubah';
$string['answerinvalid'] = '"answer-string" dalam responds adalah tak sah. Ini tidak harus berlaku.';
$string['answermissing'] = 'Jawapan di respons adalah hilang. Mungkin JavaScript tidak dipasang pada Pelayar atau ralat yang tidak ketahui berlaku';
$string['answervar'] = 'Pembolehubah-pembolehubah untuk pengredan automatik.';
$string['answervar_help'] = 'For automatic grading: A name of a boolean object in GeoGebra which is true if the student solved the question (partly). Sums up all grades for all boolean variables. The question is correct if any combination exceeds 100%, but there should be at least one combination which sums up to exactly 100%. Leave blank for manual grading.';
$string['constraints'] = 'Kekangan-kekangan (keadaan-keadaan)';
$string['constraints_help'] = 'Adakah kekangan untuk pembolehubah-pembolehubah seperti a < b, yang tidak dapat diumumkan menggunakan opysyen slider? Koma mengasingkan. Perhubungan yang disokong adalah: <, <=, >, >=. Jika anda memerlukan ketaksamaan anda perlu gunakan pembolehubah yang sama apabila mencipta lembaran kerja GeoGebra. Julat dinamik, iaitu menggunakan pembolehubah-pembolehubah untuk slider minimum/mak adalah tidak disokong.';
$string['constraintswrongortoohard'] = '{$a->inequalities} adalah salah atau sukar untuk dicapai, kami sudah cuba (dengan \'brute force\') {$a->tries} kali dalam {$a->time} saat. Mungkin kami akan gunakan kaedah yang lebih baik masa depan';
$string['feedback'] = 'Maklumbalas apabila pembolehubah benar';
$string['feedback_help'] = 'Maklumbalas adalah dipetik secara automatik daripada pembolehubah kapsyen dalam fail GeoGebra.';
$string['geogebraapplet'] = 'Aplet GeoGebra';
$string['getvars'] = 'Dapatkan pembolehubah-pembolehubah yang boleh dirawakkan daripada aplet';
$string['ggbfilemissing'] = 'Rentetan  asas64 (base64)  dalam respons hilang. Mungkin JavaScript tidak dipasang pada Pelayar atau satu ralat yang tidak dikenali berlaku';
$string['ggbturl'] = 'URL atau ID Lembaran Kerja GeoGebraTube';
$string['ggbturl_help'] = 'Anda boleh guna sama ada butang kongsi pada GeoGebraTube dan salin dan tampal pautan atau gunakan repositori GeoGebraTube. Aplet dan parameter-parameter di simpan dalam pangkalan data, aplet tidak akan dimuat semula dari GeoGebraTube melainkan diminta. Hanya membekalkan ID atau kunci perkongsian Aplet juga disokong.';
$string['ggbxmlmissing'] = 'Rentetan XML dalam respons hilang. Mungkin JavaScript tidak dipasang pada Pelayar atau satu ralat yang tidak dikenali berlaku';
$string['invalidinequality'] = '{$a} tak sah';
$string['israndomized'] = 'Adakah lagi pembolehubah-pembolehubah yang harus dirawakkan?';
$string['loadapplet'] = 'Muat (semula) dan tunjuk aplet';
$string['loadapplet_help'] = 'Muat (semula) aplet daripada GeoGebraTube dan menyimpan versi baru dari GeoGebraTube ke pangkalan data.';
$string['mineqmax'] = 'Minimum dan Maksimum untuk perawakan tidak dinyatakan dengan betul untuk pembolehubah {$a}, sama ada anda tidak nyatakan nilai minimum dan maksimum slider atau elemen bukan satu slider. Anda mungkin perlu membetulkannya pada fail GeoGebra.';
$string['minplusstepgtmax'] = 'Nilai minimum tambah tokokan adalah lebih besar daripada maksimum untuk pembolehubah {$a}, anda mungkin perlu membetulkan ini dalam fail GeoGebra anda.';
$string['noappletloaded'] = 'Tiada pemuatan Aplet! Semak jika URL itu betul dan jika anda nampak satu aplet selepas memilih satu pautan atau pemuatan semula aplet';
$string['nofractionsumeq1'] = 'Sekurang-kurangnya satu kombinasi gred mesti jumlah 100%';
$string['pluginname_help'] = 'Soalan-soalan di mana pelajar boleh menyelesaikannya menggunakan GeoGebra';
$string['pluginnameadding'] = 'Menambah satu soalan GeoGebra';
$string['pluginnameediting'] = 'Mengedit satu soalan GeoGebra';
$string['pluginnamesummary'] = 'A version of calculated questions which uses GeoGebra to show the question and verify the answer when the quiz is taken.';
$string['randomizedbutnovars'] = 'Anda telah memilih soalan-soalan yang harus diperawakkan, tetapi tidak nyatakan sebarang pembolehubah-pembolehubah yang sah untuk dirawakkan.';
$string['randomizedvar'] = 'Pembolehubah-pembolehubah untuk dirawakkkan.';
$string['randomizedvar_help'] = 'Pembolehubah-pembolehubah yang harus dirawakkan (diasingkan dengan koma). Gunakan opsyen slider dalam GeoGebra untuk menyatakan Minimum, Maksimum dan Tokokan. Pembolehubah-pembolehubah ini boleh digunakan teks soalan dengan menutupkannya dengan kurungan rungkup, sebagai contoh: {a}';
$string['stepzero'] = 'Tokokan adalah 0 untuk pembolehubah {$a}; sama ada anda tidak nyatakan tokokan slider atau elemen itu bukan satu slider langsung. Anda mungkin perlu membetulkan ini dalam fail GeoGebra anda.';
$string['valuecheckedfor'] = 'Objek Boolean dalam GeoGebra yang boleh digunakan untuk menyemak kebetulan.';
$string['variablenamewrong'] = 'Satu pembolehubah dengan nama tersebut tidak dapat dijumapai dalam fail GeoGebra.';
$string['variableno'] = 'Pembolehubah {$a}';
$string['variables'] = 'Pembolehubah-pemboleubah';
$string['willbereadfromfile'] = 'Akan dibaca daripada GeoGebra... (sila lihat butang bantuan)';