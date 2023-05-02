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
import Log from 'core/log';

/**
 * GGB controller for student view.
 *
 * @module     qtype_geogebra/studentappletcontroller
 * @copyright  2023 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export class studentappletcontroller {
    #appletId;
    #targetDivId;
    #ggbParams;
    #responseVariablesMap;

    static formListenerRegistered = false;
    constructor(appletId) {
        this.#appletId = appletId;
        this.#targetDivId = 'ggbapplettarget-' + appletId;
        const paramDataSet = document.getElementById(appletId).dataset;
        this.#ggbParams = paramDataSet.parameters;
        this.#responseVariablesMap = new Map();
        console.log(paramDataSet.responsevariables)
        JSON.parse(paramDataSet.responsevariables).forEach(responseVariable => this.#responseVariablesMap.set(responseVariable, 0));
        this.registerListeners();
    }

    registerListeners = () => {
        ggbRendererUtils.renderGgbAppletToTarget('#' + this.#targetDivId,
            this.#appletId, this.#ggbParams);
        // In case this module is not being loaded for the first time, remove old listeners before adding to avoid
        // registering it multiple times.
        window.removeEventListener('ggbAppletLoaded', this.ggbAppletLoadedHandler);
        window.addEventListener('ggbAppletLoaded', this.ggbAppletLoadedHandler);
        // Care: The whole page only has one form element for all questions.
        // If we have multiple instances of this class (so multiple qtype_geogebra questions) we have to make sure
        // we only have one listener.
        // TODO Eventually solve this by using a static variable in this class tracking if we already registered a listener
        const form = document.getElementById(this.#targetDivId).closest('form');
        form.removeEventListener('submit', this.writeResponseToDom);
        form.addEventListener('submit', this.writeResponseToDom);
    };

    ggbAppletLoadedHandler = (event) => {
        const appletId = event.detail.appletId;

        if (appletId !== this.#appletId) {
            return;
        }

        const responsevariables = [...this.#responseVariablesMap.keys()];
        console.log(responsevariables);
        responsevariables.forEach(responseVariable => this.addResponseChangedHandler(responseVariable));
    };

    addResponseChangedHandler = (responseVariable) => {
        console.log(ggbRendererUtils.getAppletApi(this.#appletId))
        ggbRendererUtils.getAppletApi(this.#appletId).registerObjectUpdateListener(responseVariable,
            (changedObjectName) => this.handleResponseVariableChange(changedObjectName));
    };

    handleResponseVariableChange = (changedObjectName) => {
        console.log('Variable geaendert: ' + changedObjectName);
        const ggbAppletApi = ggbRendererUtils.getAppletApi(this.#appletId);
        console.log('neuer wert:')
        console.log(ggbAppletApi.getValue(changedObjectName))
        this.#responseVariablesMap.set(changedObjectName, ggbAppletApi.getValue(changedObjectName));

    };

    writeResponseToDom = (event) => {
        //event.preventDefault();
        console.log(event)
        console.log('form abgeschickt')


        const appletApi = ggbRendererUtils.getAppletApi(this.#appletId);
        // We convert the boolean results of the response variables (0 or 1) to a string, for example 00110100, which
        // then will be passed to the backend to be evaluated.
        const booleanStringToStore = this.#responseVariablesMap.reduce((acc, response) => acc + response.toString());
        this.getResponseInputElement('answer').value =
            booleanStringToStore ? booleanStringToStore : '';
        this.getResponseInputElement('base64').value =
            appletApi.getBase64();
        this.getResponseInputElement('xml').value =
            appletApi.getXML();

        return true;
    };

    getResponseInputElement = (type) => {
        const allowedTypes = ['base64', 'xml', 'answer'];
        if (!allowedTypes.includes(type)) {
            Log.error('This input type ' + type + ' is not allowed');
            return null;
        }
        return document.getElementById(this.#targetDivId).parentNode.querySelector('#' + type + '-' + this.#appletId);
    };
}
