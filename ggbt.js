M.form_ggbt = {};
var lang;
var Yggb;
M.form_ggbt.init = function (Y, options) {
    options.formcallback = M.form_ggbt.callback;
    lang = options.lang;
    Yggb = YUI().use("datatype-xml");
    if (!M.core_filepicker.instances[options.client_id]) {
        //Allow only GeoGebraTube repository ($args->type isn't working?)
        for (var r in options.repositories) {
            if (options.repositories[r].type !== 'geogebratube') {
                delete options.repositories[r];
            }
        }
        M.core_filepicker.init(Y, options);
    }
    Y.on('click', function (e, client_id) {
        e.preventDefault();
        M.core_filepicker.instances[client_id].show();
    }, '#id_filepicker-button-' + options.client_id, null, options.client_id);

    Y.on('click', function (e) {
        e.preventDefault();
        var id = Y.one('#id_ggbturl').get('value').split("/").pop();
        if (id.indexOf("m") == 0) {
            id = id.substr(1);
        }
        M.form_ggbt.injectapplet(id);
    }, '#id_loadapplet');
    Y.on('click', function (e) {
        e.preventDefault();
        M.form_ggbt.getrandvars();
    }, 'input[name="getvars"]');
    if (parameters) {
        applet1.inject("applet_container1", "preferHTML5");
    }
};

M.form_ggbt.callback = function (params) {
    var elementname = M.core_filepicker.instances[params['client_id']].options.elementname;
    Y.one('#id_' + elementname).set('value', params.url);
    // inject applet to div layer
    var id = (params.file).split(".")[0];
    if (id.indexOf("m") == 0) {
        id = id.substr(1);
    }
    M.form_ggbt.injectapplet(id);
};

var parameters;
var applet1;

M.form_ggbt.injectapplet = function (id) {
    parameters = {"material_id": id};
    parameters.language = lang;
    applet1 = new GGBApplet(parameters, true);
    applet1.inject("applet_container1", "preferHTML5");
};

M.form_ggbt.getrandvars = function () {
    var applet = document.ggbApplet;
    if (!(typeof applet === 'undefined')) {
        var objNumber = applet.getObjectNumber();
        var randomizedvar = document.getElementById('id_randomizedvar');
        var stringforrandomizedvars = "";
        var i = 0;
        for (var j = 0; j < objNumber; j++) {
            var strName = applet.getObjectName(j);
            if (applet.getObjectType(strName) == "numeric" && applet.isIndependent(strName)) {
                stringforrandomizedvars += strName + ",";
            } else {
                var answer = Y.one('#id_answer_' + i);
                if (applet.getObjectType(strName) == "boolean") {
                    if (!(answer === null)) {
                        if (!answer.get('value')) {
                            answer.set('value', strName);
                        }
                        M.form_ggbt.update_feedback(answer);
                        i++;
                    }
                }
            }
            randomizedvar.value = stringforrandomizedvars;
        }
    }
};

M.form_ggbt.update_feedback = function (answernode) {
    var id = answernode.get('id').split("_").pop();
    var varname = answernode.get('value');
    var feedback = Y.one('input[name="feedback[' + id + ']"]');
    var feedbackfromfile = Y.one('#id_feedbackfromfile_' + id);
    var doc = Yggb.XML.parse(ggbApplet.getXML(varname));
    var elem = doc.getElementsByTagName('caption');
    if (elem.length == 1) {
        var fbstring = elem[0].getAttribute('val');
        feedback.set('value', fbstring);
    } else if (elem.length > 1) {
        feedback.set('value', '');
        fbstring = '';
    } else {
        feedback.set('value', '');
        fbstring = 'Caption not set or variable name wrong.'; //this is rather an error condition but should be checked by the server
    }
    feedbackfromfile.set('value', fbstring);
};

// Function ggbOnInit gets called as soon as the applet is loaded.
//noinspection JSUnusedGlobalSymbols
function ggbOnInit(id) {
    Y.one('input[name="ggbparameters"]').set('value', JSON.stringify(parameters));
    Y.one('input[name="ggbviews"]').set('value', JSON.stringify(applet1.getViews()));
    Y.one('input[name="ggbcodebaseversion"]').set('value', applet1.getHTML5CodebaseVersion());

    var applet = document.ggbApplet;
    Y.one('input[name="ggbxml"]').set('value', applet.getXML());

    var randomizedvar = document.getElementById('id_randomizedvar');
    if (!randomizedvar.value) {
        M.form_ggbt.getrandvars();
    }

    var i = 0;
    var answer = Y.one('#id_answer_' + i);
    while (!(answer === null)) {
        answer.on(['change', 'focus'], function (e) {
            e.preventDefault();
            M.form_ggbt.update_feedback(e.target)
        });
        M.form_ggbt.update_feedback(answer);
        answer = Y.one('#id_answer_' + ++i);
    }
    document.querySelector('article').onkeypress = checkEnter;
}


function checkEnter(e) {
    e = e || event;
    var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
    return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
}

