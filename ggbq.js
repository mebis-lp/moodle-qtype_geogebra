/**
 * Created by Christoph on 26.04.14.
 */

//noinspection JSLint,JSHint
M.form_ggbq = {};

var b64input = [];
var ggbBase64 = [];
var xmlinput = [];
var ggbxml = [];
var currentvals = [];
var answerinput = [];
var responsevars = [];
var exerciseresultinput = [];
var id = 0;

M.form_ggbq.init = function (Y, options) {
    b64input[id] = Y.one('input[name="' + options.b64input + '"]');
    ggbBase64[id] = b64input[id].get('value');

    xmlinput[id] = Y.one('input[name="' + options.xmlinput + '"]');
    ggbxml[id] = xmlinput[id].get('value');

    parameters = JSON.parse(options.parameters);
    if (ggbBase64[id] != '') {
        parameters.ggbBase64 = ggbBase64[id];
    }
    parameters.language = options.lang;
    parameters.moodle = "takingQuiz";
    delete parameters.material_id;

    parameters.id = 'ggbApplet' + id;

    views = JSON.parse(options.views);

    applet1 = new GGBApplet(parameters, views, options.html5NoWebSimple);
    applet1.inject(options.div, "preferHTML5");

    Y.on('submit', M.form_ggbq.getBase64andCheck, '#responseform');

    Y.on('mouseleave', M.form_ggbq.getBase64andCheck, document.getElementById(options.div)); //YUI doesn't handle the colon in the id)

    currentvals[id] = options.vars;

    answerinput[id] = Y.one('input[name="' + options.answerinput + '"]');
    exerciseresultinput[id] = Y.one('input[name="' + options.exerciseresultinput + '"]');
    responsevars[id] = options.responsevars;
    id++;
};

M.form_ggbq.getBase64andCheck = function (Y, options) {
    for (i = 0; i < answerinput.length; i++) {
        var ggbApplet = window['ggbApplet' + i];
        if (!(typeof ggbApplet === "undefined")) {
            b64input[i].set('value', ggbApplet.getBase64());
            xmlinput[i].set('value', ggbApplet.getXML());

            var responsestring = '';
            responsevars[i].forEach(function (responsevar) {
                if (ggbApplet.isDefined(responsevar)) {
                    responsestring += ggbApplet.getValue(responsevar);
                } else {
                    responsestring += 0;
                }
            });
            answerinput[i].set('value', responsestring);
            exerciseresultinput[i].set('value', JSON.stringify(ggbApplet.getExerciseResult()));
        }
    }

};

function ggbAppletOnLoad(ggbAppletId) {
    //document.querySelector('article').onkeypress = checkEnter;
    document.querySelector('article').onkeydown = checkEnter;
    //appletid = window[ggbAppletId].getAttribute("data-param-id");
    var id = ggbAppletId.substring(9);
    var ggbApplet = window[ggbAppletId];
    for (var label in currentvals[id]) {
        ggbApplet.setValue(label, currentvals[id][label]);
    }
    b64input[id].set('value', ggbApplet.getBase64());
    xmlinput[id].set('value', ggbApplet.getXML());
    if (answerinput[id].get('value') == '') {
        var responsestring = '';
        responsevars[id].forEach(function (responsevar) {
            if (ggbApplet.isDefined(responsevar)) {
                responsestring += ggbApplet.getValue(responsevar);
            } else {
                responsestring += 0;
            }
        });
        answerinput[id].set('value', responsestring);
    }
}


function checkEnter(e) {
    e = e || event;
    var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
    return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
}
