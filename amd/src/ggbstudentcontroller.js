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

import * as ggbRendererUtils from 'local_ggbrenderer/ggbrendererutils';

/**
 * GGB controller for student view.
 *
 * @module     qtype_geogebra/ggbstudentcontroller
 * @copyright  2023 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

let appletId;
let targetDivId;

export const init = (injectedAppletId) => {
    appletId = injectedAppletId;
    targetDivId = 'ggbapplettarget-' + injectedAppletId;
    console.log('studentcontroller laeuft');
    console.log('appletid ist: ' + appletId);


    const ggbParams = document.getElementById(appletId).dataset.parameters;
    ggbRendererUtils.renderGgbAppletToTarget('#' + targetDivId, appletId, ggbParams);
    window.addEventListener('ggbAppletLoaded', event => {
        if (event.detail.appletId === appletId) {
            // If we handle multiple ggb applets on one page, we have to filter the ones we want to access.
            ggbAppletLoaded(event.detail.ggbApplet);
        }
        console.log(event.detail.appletId);
        console.log(event.detail.ggbApplet);
    }, {once: true});
};

const ggbAppletLoaded = (ggbAppletObject) => {
    console.log('ggbApplet geladen mit ID ' + appletId);
    const form = document.getElementById(targetDivId).closest('form');
    form.addEventListener('submit', event => {
        event.preventDefault();
        console.log('hab dich' + appletId)
        extractStudentResponse();
        form.submit();
    });
};

const extractStudentResponse = () => {
    const ggbApplet = ggbRendererUtils.getApplet(appletId);
    // TODO somehow get variable names from question type to iterate over
}
