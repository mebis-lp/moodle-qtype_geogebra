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

namespace qtype_geogebra\output;

use renderable;
use renderer_base;
use stdClass;
use templatable;

class ggbapplet implements renderable, templatable {

    private string $appletid;

    private string $ggbparameters;

    private bool $editmode;

    public function __construct(string $appletid, string $ggbparameters, array $questionparameters = [],
            bool $editmode = false) {
        $this->appletid = $appletid;
        $this->ggbparameters = $ggbparameters;
        $this->questionparameters = $questionparameters;
        $this->editmode = $editmode;

        // TODO Hier die ganzen Optionen aus der Datenbank extrahieren
        //  und nur gezielt die per Template injecten, die auch gebraucht werden
        // Irgendwie noch nicht klar, ob dann local_ggbrenderer vom JS aus oder aus PHP heraus aufgerufen wird
        // Muss sowieso dann per JS aufgerufen werden, falls materialid geaendert wird oder neues Applet
        // per D&D reingeladen wird
    }


    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $data->appletId = $this->appletid;
        $dataattributes = [];
        $dataentry = ['key' => 'parameters', 'value' => $this->ggbparameters];
        $dataattributes[] = $dataentry;

        foreach ($this->questionparameters as $questionparameterkey => $questionparametervalue) {
            print_r($questionparameterkey);
            print_r($questionparametervalue);

            $dataattributes[] = ['key' => $questionparameterkey, 'value' => $questionparametervalue];
        }
        $data->dataattributes = $dataattributes;
        $data->controller = $this->editmode ? 'ggbteachercontroller' : 'ggbstudentcontroller';

        return $data;

    }

}
