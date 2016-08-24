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
$string['pluginname_link'] = 'question/type/geogebra';$string['addconstraints'] = 'הוסיפי אילוצים (תנאים) למשתנים.';
$string['addmorevarblanks'] = 'מקומות פנויים לעוד {no} משתנה/ים';
$string['answerinvalid'] = 'מחרוזת התשובה בתגובה אינה חוקית. זה לא צריך לקרות.';
$string['answermissing'] = 'התשובה בתגובה חסרה. כנאה JavaScript לא מופעל בדפדפן או שקרתה שגיאה לא ידועה.';
$string['answervar'] = 'משתנים לציון אוטומטי.';
$string['answervar_help'] = 'לציון אוטומטי: שם של עצם בוליאני בגאוגברה שערכו true כאשר התלמיד פתר את השאלה (חלקית). סוכם את כל הציונים לכל המשתנים הבוליאניים. השאלה נכונה אם יש צירוף העובר את ה-100%, אך צריך להיות צירוף הנסכם ל-100% בדיוק. השאירי ריק לציון ידני.';
$string['applet_advanced_settings'] = 'Advanced Settings...';
$string['constraints'] = 'אילוצים (תנאים)‏';
$string['constraints_help'] = 'האם יש אילוצים כלשהם על המשתנים כגון ‏a < b‏, אשר לא יכלו להיות מוגדרים בעזרת אפשרויות סרגל הגרירה? רשימה מופרדת בפסיקים. יחסים נתמכים: <, <=, >, >=. אם יש לך צורך בשוויון עליך להשתמש באותם משתנים בעת יצירת גליון הגאוגברה. טווחים דינמיים, כלומר שימוש במשתנים לקביעת מינימום ומקסימום של סרגל הגרירה, לא נתמכים.';
$string['constraintswrongortoohard'] = '‏‎{$a->inequalities}‎‏ שגויים או קשים מדי להשגה. ניסינו {$a->tries} פעמים ב-{$a->time} שניות. אולי נשתמש בשיטות טובות יותר בעתיד...';
$string['dragndrop'] = 'Drag and drop a GeoGebra file anywhere on the GeoGebra Applet section';
$string['enable_label_drags'] = 'Enable Dragging of Labels';
$string['enable_right_click'] = 'Enable Right Click and Keyboard Editing';
$string['enable_shift_drag_zoom'] = 'Enable Shift-Drag & Zoom';
$string['feedback'] = 'משוב כשהערך הוא true‏';
$string['feedback_help'] = 'המשוב נלקח באופן אוטומטי מההערה במשתנה בקובץ הגאוגברה.';
$string['geogebraapplet'] = 'יישומון גאוגברה';
$string['getvars'] = 'קבל מהיישומון משתנה שערכו יכול להיות מוגרל.';
$string['ggbfilemissing'] = 'מחרוזת base64‏ חסרה בתגובה. כנראה JavaScript מכובה או קרתה שגיאת דפדפן כלשהי.';
$string['ggbturl'] = 'כתובת רשת או מספר זהות לגליון GeoGebra‏';
$string['ggbturl_help'] = 'את יכולה להשתמש בכפתור השיתוף ב-GeoGebra ולהעתיק ולהדביק את הקישור, או להשתמש במאגר GeoGebra‏. היישומון והפרמטרים באוכסנים בבסיס הנתונים. היישומון לא יועלה שוב מ-GeoGebra אלא אם יתבקש. ניתן גם רק לספק את ה-ID או מפתח השיתוף של היישומון.';
$string['ggbxmlmissing'] = 'חסרה מחרוזת ה-XML בתגובה. כנראה JavaScript מכובה או שאראה שגיאה כלשהי.';
$string['invalidinequality'] = '‏{$a} אינו חוקי';
$string['isexercise'] = 'Use GeoGebra-Exercise for checking the question';
$string['isexercise_help'] = 'The applet contains user-defined tools which can be used for automatic checking of the exercise.\nBeware: All answers below are not applicable in this case!';
$string['israndomized'] = 'האם יש משתנים שיש להגריל את ערכם?';
$string['loadapplet'] = 'טען (מחדש) להציג את היישומון';
$string['loadapplet_help'] = 'טען (מחדש) את היישומון מ-GeoGebra ואחסן את הגסה החדשה מ-GeoGebra בבסיס הנתונים.';
$string['mineqmax'] = 'תכונות Min ו-Max להגרלה אינן מצוינות כהלכה למשתנה {$a}‏, או שלא ציינת את המינימום והמקסימום של סרגל הגרירה, או שהעצם כלל אינו סרגל גרירה. כנראה שעליך לתקן זאת בקובץ הגאוגברה שלך.';
$string['minplusstepgtmax'] = 'סכום המינימום והצעד גדול מהמקסימום עבור משתנה {$a}‏. כנראה שעליך לתקן את קובץ הגאוגברה שלך.';
$string['noappletloaded'] = 'אף יישומון לא נטען! בדקי אם כתובת הרשת נכונה, ואם את רואה יישומון לאחר בחירת קישור או העלאה מחדש של היישומון.';
$string['nofractionsumeq1'] = 'לפחות צרוף אחד של הציונים צריך להסכם ל-100%‎‏';
$string['pluginname_help'] = 'שאלות כאשר התלמיד יכול לפתור את השאלות בעזרת גאוגברה';
$string['pluginnameadding'] = 'הוספת שאלת גאוגברה';
$string['pluginnameediting'] = 'עריכת שאלת גאוגברה';
$string['pluginnamesummary'] = 'גירסה של שאלות מחושבות המשתמשת בגאוגברה להראות את השאלה ולאמת את התשובה כאשר התלמיד עובד על החידון.';
$string['randomizedbutnovars'] = 'בחרת כי השאלה תהיה מוגרלת, אך לא ציינת אף משתנה חוקי להגרלה.';
$string['randomizedvar'] = 'משתנים שערכם יוגרל.';
$string['randomizedvar_help'] = 'משתנים שערכם יוגרל (מופרדים בפסיקים). השתמשי באפשרויות סרגל הגרירה בגאוגברה לקביעת מינימום, מקסימום וצעד. משתנים אלו יכולים לשמש גם בטקסט השאלה בתוך סוגריים מסולסלים, לדוגמה: {a}‏';
$string['show_algebra_input'] = 'Show Input Bar';
$string['show_menu_bar'] = 'Show Menu';
$string['show_reset_icon'] = 'Show Icon to Reset Construction';
$string['show_tool_bar'] = 'Show Toolbar';
$string['stepzero'] = 'הצעד הוא 0 למשתנה {$a}‏; או שלא ציינת את הצעד בסרגל הגרירה, או שהעצם כלל אינו סרגל גרירה. כנראה שעליך לתקן זאת בקובץ הגאוגברה.';
$string['useafile'] = '... or use a ggb-file';
$string['valuecheckedfor'] = 'עצם בוליאני בגאוגברה המשמש לבדיקת נכונות.';
$string['variablenamewrong'] = 'משתנה בשם זה לא נמצא בקובץ הגאוגברה.';
$string['variableno'] = 'משתנה {$a}‏';
$string['variables'] = 'משתנים';
$string['willbereadfromfile'] = 'יקרא מתוך גאוגברה... (ראי כפתור עזרה)‏';