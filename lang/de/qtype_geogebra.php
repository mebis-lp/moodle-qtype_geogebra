<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'qtype_geogebra', language 'de'
 *
 * @package        qtype
 * @subpackage     geogebra
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2014
 * @license        http://www.geogebra.org/license
 */
$string['pluginname'] = 'GeoGebra';
$string['pluginname_help'] = 'Fragen die der Teilnehmer in GeoGebra lösen kann.';
$string['pluginname_link'] = 'question/type/geogebra';
$string['pluginnameadding'] = 'Eine GeoGebra basierte Frage hinzufügen';
$string['pluginnameediting'] = 'Eine GeoGebra basierte Frage bearbeiten';
$string['pluginnamesummary'] = 'Eine Version der berechneten Fragen, bei der GeoGebra für die Anzeige der Frage und Überprüfung
der Antwort verwendet wird.';
$string['loadapplet'] = "Applet (neu) laden und anzeigen";
$string['loadapplet_help'] = "Applet von GeoGebratube (neu) laden und die neue Version in der Datenbank speichern.";
$string['valuecheckedfor'] = "Boolesches Objekt in GeoGebra, mit dem die Aufgabe auf Korrektheit überprüft werden kann.";
$string['randomizedvar'] = "Variablen die zufällig verändert werden sollen";
$string['randomizedvar_help'] = "Variablen die zufällig verändert werden sollen. Komma getrennt. Verwenden Sie die
Slidereinstellungen in GeoGebra um Min, Max und Schrittweite festzulegen. Die Werte der Variablen können auch in der Frage
benutzt werden, indem man sie in geschwungene Klammern setzt, z.B. {a}.";
$string['ggbturl'] = 'URL oder ID des GeoGebraTube Worksheets';
$string['ggbturl_help'] = 'Sie können entweder den Teilen Button in GeoGebraTube verwenden und den Link kopieren und einfügen
oder die GeoGebra Repository verwenden. Das Applet wird vollständig in der Moodle Datenbank gespeichert. Das Applet wird nur von
GeoGebraTube neu geladen wenn Sie den Button "Applet (neu) laden und anzeigen" klicken. Wenn Sie nur die ID oder Sharing Key
verwenden sollte auch das richtige Applet geladen werden können.';
$string['geogebraapplet'] = 'GeoGebra Applet';
$string['israndomized'] = 'Gibt es Variablen, die zufällig verändert werden sollen?';
$string['yes'] = 'Ja';
$string['no'] = 'Nein';
$string['getvars'] = 'Variablen die zufällig verändert werden könnten aus dem Applet laden';
$string['addconstraints'] = 'Add constraints (relationships) to variables.';
$string['variables'] = 'Variablen';
$string['variableno'] = 'Variable {$a}';
$string['addmorevarblanks'] = 'Leerfelder für {no} zusätzliche Variablen';
$string['constraints'] = 'Bedingungen (Ungleichungen)';
$string['constraints_help'] = 'Gibt es Bedingungen (Ungleichungen), die die Variablen erfüllen müssen? Z.B.: a&lt;b,
die nicht über die Slidereinstellungen eingegeben werden konnten? Komma getrennt. Unterstützte Ungleichungen sind
&lt;, &lt;=, &gt;, &gt;=. Falls sie Gleichheit benötigen müssen sie in GeoGebra die gleiche Variable verwenden. Das Verwenden von
 Variablen für Min/Max für die Slider wird von diesem Plugin nicht unterstützt.';
$string['noappletloaded'] = 'Es wurde kein Applet geladen! Überprüfen Sie ob die URL korrekt ist und ob das applet sichtbar ist
nach dem Sie ein Applet gewählt oder (neu) geladen haben!';
$string['invalidinequality'] = '{$a} ist ungültig';
$string['randomizedbutnovars'] = 'Sie haben angegeben, dass die Frage randomisiert werden soll haben aber keine oder nicht
existierende Variablen angegeben.';
$string['mineqmax'] = 'Min und Max für die Randomisierung sind für die Variable {$a} nicht korrekt definiert. Entweder Slider min
 und max sind nicht korrekt angegeben oder das Objekt ist kein Slider. Sie müssen das möglicherweise in Ihrer GeoGebra-Datei
 korrigieren.';
$string['minplusstepgtmax'] = 'Min plus Inkrement ist größer als Max für Variable {$a}, Sie müssen das möglicherweise in Ihrer GeoGebra-Datei
 korrigieren.';
$string['stepzero'] = 'Inkrement ist 0, für Variable {$a}. Entweder das Inkrement beim  Slider ist nicht korrekt angegeben oder
das Objekt ist kein Slider. Sie müssen das möglicherweise in Ihrer GeoGebra-Datei korrigieren.';
$string['constraintswrongortohard'] = '{$a->inequalities} sind ungültig oder erfordern zu viel Rechenleistung,
we tried (brute force) {$a->tries} times in {$a->time} seconds. Maybe we\'ll use better math in the future...';
$string['nofractionsumeq1'] = 'Mindestens eine Kombination von Bewertungen muss in Summe 100% ergeben!';
$string['nofractionsumeq1'] = 'At least one combination of grades must sum up to 100%';
$string['answervar'] = 'Variablen für die automatische Bewertung';
$string['answervar_help'] = '<strong>Für die automatische Bewertung</strong>:
Der Name der booleschen Variable in GeoGebra, die wahr ist, wenn der Schüler die Aufgabe (teilweise) korrekt gelöst hat. Es
werden alle Bewertungen aufsummiert. Die Frage gilt als correct beantwortet wenn der irgendeine Kombination 100% übersteigt, aber
es sollte mindestens eine Kombination geben die genau 100% ergibt.<br>
<strong>Leer lassen für manuelle Bewertung!</strong>';
$string['feedback'] = 'Feedback für diese Variable wenn diese wahr ist.';
$string['feedback_help'] = 'Als Feedback wird automatisch die Beschriftung dieser Variable/Object in der GeoGebradatei verwendet.';
$string['ggbfilemissing'] = 'Der Base64-String fehlt in der Abgabe. Möglicherweise ist JavaScript im Browser nicht aktiviert
oder ein sonstiger unbekannter Fehler ist aufgetreten';
$string['ggbxmlmissing'] = 'Der XML-String fehlt in der Abgabe. Möglicherweise ist JavaScript im Browser nicht aktiviert
oder ein sonstiger unbekannter Fehler ist aufgetreten';
$string['answermissing'] = 'Der Antwortstring fehlt in der Abgabe. Möglicherweise ist JavaScript im Browser nicht aktiviert
oder ein sonstiger unbekannter Fehler ist aufgetreten';
$string['answerinvalid'] = 'Der Antwortstring in der Abgabe ist falsch. Das sollte nicht passieren.';
