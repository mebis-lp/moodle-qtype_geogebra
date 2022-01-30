/**
 * Javascript Controller to embed GGBApplet
 *
 * STUDENT VIEW
 *
 * This class provides all the functionality for the new assign module.
 *
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2018
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['jquery', 'qtype_geogebra/deployggb'], function ($, GGBApplet) {
    /**
     * Created by Christoph on 25.08.19.
     * Modified for use of local Geogebra by Martin Putzlocher on 30.01.22.
     */

    return {
        b64input: [],
        ggbBase64: [],
        xmlinput: [],
        ggbxml: [],
        currentvals: [],
        answerinput: [],
        responsevars: [],
        exerciseresultinput: [],
        qdiv: [],
        //parameters: {},
        ggbDataset: [],
        //applet1,

        init: function (appletParametersID) {
            window.GGBQ = this;
            var ggbDataset = document.getElementById(appletParametersID).dataset;
            var slot = ggbDataset.slot;

            window.ggbAppletOnLoad = function (ggbAppletId) {
                if (ggbAppletId != -1) {
                    document.querySelector('article').onkeydown = this.checkEnter;
                    var id = ggbAppletId.substring(9);
                    var ggbApplet = window[ggbAppletId];
                    var curvals = JSON.parse(window.GGBQ.currentvals[id]);
                    for (var label in curvals) {
                        ggbApplet.setValue(label, curvals[label]);
                    }
                    window.GGBQ.b64input[id].val(ggbApplet.getBase64());
                    window.GGBQ.xmlinput[id].val(ggbApplet.getXML());
                    var numvars = ggbApplet.startExercise();
                    for (var key in numvars) {
                        window.GGBQ.qdiv[id].innerHTML =
                            window.GGBQ.qdiv[id].innerHTML.replace("{" + key + "}", numvars[key]);
                    }
                    window.GGBQ.qdiv[id].style.visibility = 'visible';

                    if (window.GGBQ.answerinput[id].val() == '') {
                        var responsestring = '';
                        window.GGBQ.responsevars[id].forEach(function (responsevar) {
                            if (ggbApplet.isDefined(responsevar)) {
                                responsestring += ggbApplet.getValue(responsevar);
                            } else {
                                responsestring += 0;
                            }
                        });
                        window.GGBQ.answerinput[id].val(responsestring);
                    }
                }
            };

            // jquery doesn't handle the colon : but later we expect a jquery optject, so ...
            this.b64input[slot] = $(document.getElementById(ggbDataset.b64input));
            this.ggbBase64[slot] = this.b64input[slot].val();

            this.xmlinput[slot] = $(document.getElementById(ggbDataset.xmlinput));
            this.ggbxml[slot] = this.xmlinput[slot].val();
            this.qdiv[slot] = $("#q" + (slot) + " .qtext")[0];

            var parameters = JSON.parse(ggbDataset.parameters);
            if (this.ggbBase64[slot] != '') {
                parameters.ggbBase64 = this.ggbBase64[slot];
            }

            // To adjust the width of the ggbApplet to the available area.
            var aspectratio = parameters.height / parameters.width;
            if (aspectratio > 0) {
                parameters.width = $(".qtext").parent().width();
                parameters.height = parameters.width * aspectratio;
            } else {
                parameters.width = $(".qtext").parent().width();
                parameters.height = $(".qtext").parent().width() / 1.333333;
            }

            // parameters.currentvals = JSON.parse(ggbDataset.vars);
            this.ggbDatasetVars = JSON.parse(ggbDataset.vars);
            parameters.language = ggbDataset.lang;
            parameters.moodle = "takingQuiz";
            delete parameters.material_id;

            parameters.id = 'ggbApplet' + slot;

            var views = JSON.parse(ggbDataset.views);

            var applet1 = new GGBApplet(parameters, views, ggbDataset.html5NoWebSimple);
            // applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");
            applet1.inject(ggbDataset.div, "preferHTML5");

            $('#responseform').on('submit', this.getBase64andCheck);

            $(document.getElementById(ggbDataset.div)).on('mouseleave', this.getBase64andCheck);

            this.currentvals[slot] = ggbDataset.vars;
            this.answerinput[slot] = $(document.getElementById(ggbDataset.answerinput));
            this.exerciseresultinput[slot] = $(document.getElementById(ggbDataset.exerciseresultinput));
            this.responsevars[slot] = JSON.parse(ggbDataset.responsevars);
        },
        checkEnter: function(e) {
            e = e || event;
            var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
            return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
        },


        getBase64andCheck: function() {
            for (var i = 0; i < window.GGBQ.answerinput.length; i++) {
                var ggbApplet = window['ggbApplet' + i];
                if (typeof ggbApplet !== "undefined") {
                    window.GGBQ.b64input[i].val(ggbApplet.getBase64());
                    window.GGBQ.xmlinput[i].val(ggbApplet.getXML());

                    // Workaround, to set all randomized variables.
                    for (const [key, value] of Object.entries(window.GGBQ.ggbDatasetVars)) {
                        ggbApplet.evalCommand(`${key}=${value}`);
                    }

                    var responsestring = '';
                    for (var j = 0; j < window.GGBQ.responsevars[i].length; j++) {
                        if (ggbApplet.isDefined(window.GGBQ.responsevars[i][j])) {
                            responsestring += ggbApplet.getValue(window.GGBQ.responsevars[i][j]);
                        } else {
                            responsestring += 0;
                        }
                    }

                    window.GGBQ.answerinput[i].val(responsestring);
                    window.GGBQ.exerciseresultinput[i].val(JSON.stringify(ggbApplet.getExerciseResult()));
                }
            }
        },

    };
});
