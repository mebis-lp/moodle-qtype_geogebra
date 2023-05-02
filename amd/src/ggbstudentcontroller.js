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
 * @module     qtype_geogebra/ggbstudentcontroller
 * @copyright  2023 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

const appletsInfoMap = new Map();

export const init = (injectedAppletId) => {
    const paramDataSet = document.getElementById(injectedAppletId).dataset;
    const responseVariablesMap = new Map();
    console.log(paramDataSet.responsevariables)
    JSON.parse(paramDataSet.responsevariables).forEach(responseVariable => responseVariablesMap.set(responseVariable, 0));
    const appletInfo = {
        'appletId': injectedAppletId,
        'targetDivId': 'ggbapplettarget-' + injectedAppletId,
        'ggbParams': paramDataSet.parameters,
        'responseVariablesMap': responseVariablesMap
    };
    appletsInfoMap.set(appletInfo.appletId, appletInfo);

    console.log('studentcontroller laeuft');
    console.log('appletid ist: ' + injectedAppletId);


    ggbRendererUtils.renderGgbAppletToTarget('#' + appletInfo.targetDivId,
        appletInfo.appletId, appletInfo.ggbParams);
    // In case this module is not being loaded for the first time, remove old listeners before adding to avoid
    // registering it multiple times.
    window.removeEventListener('ggbAppletLoaded', ggbAppletLoadedHandler);
    window.addEventListener('ggbAppletLoaded', ggbAppletLoadedHandler);
    // Care: The whole page only has one form element for all questions.
    const form = document.getElementById(appletInfo.targetDivId).closest('form');
    form.removeEventListener('submit', writeResponseToDom);
    form.addEventListener('submit', writeResponseToDom);
};

const ggbAppletLoadedHandler = (event) => {
    const appletId = event.detail.appletId;
    const appletInfo = appletsInfoMap.get(appletId);
    // Care: The whole page only has one form element for all questions.
    const form = document.getElementById(appletInfo.targetDivId).closest('form');

    const responsevariables = [...appletInfo.responseVariablesMap.keys()];
    console.log(responsevariables);
    responsevariables.forEach(responseVariable => addResponseChangedHandler(appletId, responseVariable));
};

const handleResponseVariableChange = (appletId, changedObjectName) => {
    console.log(appletId);
    console.log(changedObjectName);
    const appletInfo = appletsInfoMap.get(appletId);
    const ggbAppletApi = ggbRendererUtils.getAppletApi(appletId);
    console.log('neuer wert:')
    console.log(ggbAppletApi.getValue(changedObjectName))
    appletInfo.responseVariablesMap.set(changedObjectName, ggbAppletApi.getValue(changedObjectName));

};

const addResponseChangedHandler = (appletId, responseVariable) => {
    console.log(ggbRendererUtils.getAppletApi(appletId))
    ggbRendererUtils.getAppletApi(appletId).registerObjectUpdateListener(responseVariable,
        (changedObjectName) => handleResponseVariableChange(appletId, changedObjectName));
};

const writeResponseToDom = (event) => {

    //event.preventDefault();
    console.log(event)
    console.log('form abgeschickt')

    appletsInfoMap.forEach(appletInfo => {
        const appletApi = ggbRendererUtils.getAppletApi(appletInfo.appletId);
        // We convert the boolean results of the response variables (0 or 1) to a string, for example 00110100, which
        // then will be passed to the backend to be evaluated.
        const booleanStringToStore = appletInfo.responseVariablesMap.reduce((acc, response) => acc + response.toString());
        getResponseInputElement(appletInfo.appletId, 'answer').value =
            booleanStringToStore ? booleanStringToStore : '';
        getResponseInputElement(appletInfo.appletId, 'base64').value =
            appletApi.getBase64();
        getResponseInputElement(appletInfo.appletId, 'xml').value =
            appletApi.getXML();
    });
    return true;
};

const getResponseInputElement = (appletId, type) => {
    const allowedTypes = ['base64', 'xml', 'answer'];
    if (!allowedTypes.includes(type)) {
        Log.error('This input type ' + type + ' is not allowed');
        return null;
    }
    const appletInfo = appletsInfoMap.get(appletId);
    return document.getElementById(appletInfo.targetDivId).parentNode.querySelector('#' + type + '-' + appletId);
};
