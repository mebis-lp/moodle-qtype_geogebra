/*eslint linebreak-style:0 -- ['error', 'windows','unix']*/
/* eslint-disable no-undef */
/**
 * Javascript Controller to embed GGBApplet
 *
 * This class provides all the functionality for the new assign module.
 *
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2018
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// alert("hello ggbt");
var GGBAppletstr;
var codebase;
               if (document.getElementById('id_isurlggb')!== null) {
                    if (document.getElementById('id_isurlggb').checked) {
                     GGBAppletcode = document.getElementById('id_urlggb').value;
                      var parts=GGBAppletcode.split(",");
                  var rooturl=parts[0];
                  var appl=parts[1];
                  var base=parts[2];
                  GGBAppletstr = rooturl+appl ;
                  codebase = rooturl+base;
                     }else {
                     GGBAppletstr = 'https://www.geogebra.org/apps/deployggb.js';
                     codebase="";}
                }
 define(['jquery', GGBAppletstr], function ($, GGBApplet) {
// define(['jquery', 'https://www.geogebra.org/apps/deployggb.js'], function ($, GGBApplet) {
 //define(['jquery'], function ($) {
    /**
     * Created by Christoph on 25.08.19.
     */
     //var script = document.createElement('script');
     //script.src = 'https://www.geogebra.org/apps/deployggb.js';
     //document.getElementsByTagName('head')[0].appendChild(script);
    return {

        init: function() {

        //debugcode();//
            window.GGBT = this;
            window.ggbAppletOnLoad = function() {
            debugcode();
                $('input[name="ggbparameters"]').val(JSON.stringify(window.applet1.getParameters()));
                $('input[name="ggbviews"]').val(JSON.stringify(window.applet1.getViews()));
                $('input[name="ggbcodebaseversion"]').val(window.applet1.getHTML5CodebaseVersion());

                if (typeof (this.ggbcheckb) == "undefined") {
                    var applet = document.ggbApplet;
                    $('input[name="ggbxml"]').val(applet.getXML());

                    var randomizedvar = document.getElementById('id_randomizedvar');
                    if (!randomizedvar.value) {
                        window.GGBT.getrandvars();
                    }

                    var i = 0;
                    var answer = $('#id_answer_' + i);
                    while (answer[0] !== undefined) {
                        if (answer.val()) {
                            answer.on('change focus', function(e) {
                                e.preventDefault();
                                window.GGBT.update_feedback($(e.target));
                            });
                            window.GGBT.update_feedback(answer);
                        }
                        answer = $('#id_answer_' + ++i);
                    }
                    document.querySelector('article').onkeypress = window.GGBT.checkEnter;
                }
                if (window.GGBT.usefile.checked) {
                    document.getElementById('applet_container1').style.display = "block";
                    document.getElementById('applet_options').style.display = "flex";
                }
            };

            if ($('#applet_parameters')[0] !== undefined) {
                this.ggbDataset = $('#applet_parameters')[0].dataset;
                this.parameters = JSON.parse(this.ggbDataset.parameters);
                this.views = this.ggbDataset.views;
                 //alert("hello custom ggb 3");
        debugcode();
               // if (document.getElementById('id_isurlggb').checked) {
                     //GGBApplet = document.getElementById('id_urlggb').value;
               //     }
                //window.applet1 = new GGBApplet(this.parameters, this.views, true);
                window.applet1 = new GGBApplet(this.parameters, true);
                if(!(codebase==="")){
                 window.applet1.setHTML5Codebase(codebase);
                 }
                this.lang = this.ggbDataset.lang;
            }
        //debugcode();

            //$('#id_stoapplet').on('click', this.handleStoreGGB);
            $('#id_loadapplet').on('click', function(e) {
                e.preventDefault();
                var httpurl = $('#id_ggbturl').val();
                var id = httpurl.split("/").pop();
                if(!httpurl.startsWith('http')){
                 if (id.indexOf("m") == 0){
                    if (window.GGBT.isNumber(id.substr(1)) || (!window.GGBT.isNumber(id.substr(1)) && id.length > 8)) {
                        id = id.substr(1);
                    }
                  }
                  window.GGBT.injectapplet({"material_id": id});
                 }else{
                 document.getElementById('applet_options').style.display = "flex";
                 window.GGBT.injectapplet({"filename": httpurl});}
            });

            $('#id_getvars').on('click', function(e) {
                e.preventDefault();
                window.GGBT.getrandvars();
            });

            if (this.parameters) {
                window.applet1.inject("applet_container1", "preferHTML5");
            }

            this.ggbf = document.getElementById('id_ggbtheader');
            this.usefile = document.getElementById("id_usefile");

            if (this.ggbf === null) { // In this case we are editing a submission.
                this.ggbf = document.getElementById('id_submissiontypes');
                this.ggbcheckb = document.getElementById('id_assignsubmission_geogebra_enabled');
                if (this.ggbcheckb !== null) {
                    this.ggbcheckb.addEventListener('change', this.handleggbdisable, false);
                }
            }

            if (this.ggbf !== null) {
                this.ggbf.addEventListener('dragenter', this.handleDragEnter, false);
                this.ggbf.addEventListener('dragover', this.handleDragOver, false);
                this.ggbf.addEventListener('dragleave', this.handleDragEndLeave, false);
                this.ggbf.addEventListener('dragend', this.handleDragEndLeave, false);
                this.ggbf.addEventListener('drop', this.handleDrop, false);
                this.usefile.addEventListener('change', this.handleusefile, false);
            }

            if (this.usefile.checked) {
                document.getElementById('applet_options').style.display = "block";
            } else {
                document.getElementById('applet_options').style.display = "flex"; // ex none
            }
            this.initoptions();
        },

        callback: function(params) {
        //alert("other filename");
        //debugcode();
            var elementname = M.core_filepicker.instances[params['client_id']].options.elementname;
            $('#id_' + elementname).val(params.url);
            // inject applet to div layer
            if(!params.file.startsWith('http')){
            var id = (params.file).split(".")[0];
            if (id.indexOf("m") == 0) {
                if (this.isNumber(id.substr(1)) || (!this.isNumber(id.substr(1)) && id.length > 8)) {
                    id = id.substr(1);
                }
            }
            this.injectapplet({"material_id": id});
                 }else{window.GGBT.injectapplet({"filename": params.file});}
        },

        injectapplet: function(fileURL) {
            this.parameters ={ ...this.parameters,  ...fileURL};
            this.parameters.language = this.lang;
            this.parameters.moodle = "editingQuestionOrSubmission";
            // Since we only support HTML5 this should work for js-code in the applet to get executed (ggboninit).
            this.parameters.useBrowserForJS = false;
            //window.ggbAppletOnLoad = function (ggbAppletId) {}
            document.getElementById('applet_container1').style.display = "block";

                 //alert("hello custom ggb  4");
        //debugcode();
         //           if (document.getElementById('id_isurlggb').checked) {
                     //GGBApplet = document.getElementById('id_urlggb').value;
          //          }
            window.applet1 = new GGBApplet(this.parameters, true);
                if(!(codebase==="")){window.applet1.setHTML5Codebase(codebase);}
            // window.applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");

            window.applet1.inject("applet_container1", "preferHTML5");

        },
        getrandvars: function() {
            var applet = document.ggbApplet;
            if (typeof applet !== 'undefined') {
                var objNumber = applet.getObjectNumber();
                var randomizedvar = document.getElementById('id_randomizedvar');
                var stringforrandomizedvars = "";
                var i = 0;
                for (var j = 0; j < objNumber; j++) {
                   var strName = applet.getObjectName(j);
                   if (strName == "grade"){
                        var answer=$('#id_answer_' + i);
                        if (answer !== null){answer.val(strName);this.update_feedback(answer);i++;}
                    }
                    if (applet.getObjectType(strName) == "numeric" && applet.isIndependent(strName)) {
                        stringforrandomizedvars += strName + ",";
                    } else {
                        //debugcode();
                        /*
                        if (applet.getObjectType(strName) == "boolean"){
                        //alert(strName+" boolean or number");
                            var answer = $('#id_answer_' + i);
                            if (answer !== null && answer.length > 0) {
                                if (!answer.val()) {
                                    answer.val(strName);
                                }
                                this.update_feedback(answer);
                                i++;
                                //alert(strName);
                                //
                            }
                        }
                        */
                    }
                    randomizedvar.value = stringforrandomizedvars;
                }
            //if (applet.exists("grade")) {
            //    var answerscore = $('#id_answer_' + i);
            //    answerscore.val("grade");
            //    this.update_feedback(answerscore);
            // }
            }
        },

        update_feedback: function(answernode) {
            var id = answernode.attr('id').split("_").pop();
            //debugcode();
            var varname = answernode.val();
            if (!varname) {
                // Should not happen, but make sure this function does not fail.
                return;
            }
            var feedback = $('input[name="feedback[' + id + ']"]');
            var feedbackfromfile = $('#id_feedbackfromfile_' + id);
            const parser = new DOMParser();
            const xml = window.ggbApplet.getXML(varname);
            if (!xml) {
                // Should not happen, but make sure this function does not fail.
                return;
            }
            const doc = parser.parseFromString(xml, "text/xml");
            //alert(xml);
            if (doc) {
                var elem = doc.getElementsByTagName('caption');
                //alert("retrieve "+elem.toString());
                var fbstring = '';
                if (elem.length == 1) {
                    fbstring = elem[0].getAttribute('val');
                    feedback.val(fbstring);
                    //alert("retrieve "+fbstring);
                } else if (elem.length > 1) {
                    feedback.val('');
                    //alert("retrieve fail length >1");
                    fbstring = '';
                } else {
                    //alert("retrieve fail 1");
                    feedback.val('');
                    //this is rather an error condition but should be checked by the server
                    fbstring = 'Caption not set or variable name wrong.';
                }
                feedbackfromfile.val(fbstring);
            }
        },

        checkEnter: function(e) {
            e = e || event;
            var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
            return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
        },

        initoptions: function() {
            this.enable_right_click = document.getElementById('enableRightClick');
            this.enable_label_drags = document.getElementById('enableLabelDrags');
            this.enable_undo_redo = document.getElementById('enableUndoRedo');
            this.show_reset_icon = document.getElementById('showResetIcon');
            this.enable_shift_drag_zoom = document.getElementById('enableShiftDragZoom');
            this.show_algebra_input = document.getElementById('showAlgebraInput');
            this.show_menu_bar = document.getElementById('showMenuBar');
            this.show_tool_bar = document.getElementById('showToolBar');

            if (typeof this.parameters !== 'undefined') {
                this.enable_right_click.checked = this.parameters.enableRightClick;
                this.enable_label_drags.checked = this.parameters.enableLabelDrags;
                this.enable_undo_redo.checked = this.parameters.enableUndoRedo;
                this.show_reset_icon.checked = this.parameters.showResetIcon;
                this.enable_shift_drag_zoom.checked = this.parameters.enableShiftDragZoom;
                this.show_algebra_input.checked = this.parameters.showAlgebraInput;
                this.show_menu_bar.checked = this.parameters.showMenuBar;
                this.show_tool_bar.checked = this.parameters.showToolBar;
                //debugcode();
                //document.getElementById('showToolBar').checked=this.show_tool_bar.checked;

            }

            this.enable_right_click.addEventListener('change', this.handlesettingschanged, false);
            this.enable_label_drags.addEventListener('change', this.handlesettingschanged, false);
            this.enable_undo_redo.addEventListener('change', this.handlesettingschanged, false);
            this.show_reset_icon.addEventListener('change', this.handlesettingschanged, false);
            this.enable_shift_drag_zoom.addEventListener('change', this.handlesettingschanged, false);
            this.show_algebra_input.addEventListener('change', this.handlesettingschanged, false);
            this.show_menu_bar.addEventListener('change', this.handlesettingschanged, false);
            this.show_tool_bar.addEventListener('change', this.handlesettingschanged, false);
        },

        handlesettingschanged: function(evt) {
debugcode();
            window.GGBT.parameters[evt.target.id] = (evt.target.checked);
            $('input[name="ggbparameters"]').val(JSON.stringify(window.GGBT.parameters));
            if (evt.target.id == "showToolBar" ||
                evt.target.id == "showMenuBar" ||
                evt.target.id == "enableUndoRedo" ||
                evt.target.id == "showAlgebraInput") {
                // alert("hello custom ggb 5");
        //debugcode();
         //           if (document.getElementById('id_isurlggb').checked) {
                     //GGBApplet = document.getElementById('id_urlggb').value;
          //          }
                window.applet1 = new GGBApplet(window.GGBT.parameters, true);
                if(!(codebase==="")){window.applet1.setHTML5Codebase(codebase);}
                // window.applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");
                window.applet1.inject("applet_container1", "preferHTML5");
            } else {
                window.ggbApplet[evt.target.id](evt.target.checked);
            }
        },

        handleusefile: function() {
            if (!window.GGBT.usefile.checked) {
                document.getElementById('applet_container1').style.display = "none";
                document.getElementById('applet_options').style.display = "flex"; //ex none
            } else {
                document.getElementById('id_ggbturl').value = "";
                // document.getElementById('applet_container1').style.display = "block";
            }
        },

        handleggbdisable: function() {
            if (!window.GGBT.ggbcheckb.checked) {
                document.getElementById('applet_container1').style.display = "none";
                document.getElementById('applet_options').style.display = "flex"; //ex none
                if (window.GGBT.usefile.checked) {
                    window.GGBT.usefile.click();
                }
            } else {
                document.getElementById('applet_container1').style.display = "block";
            }
        },

        handleDragEnter: function() {
            if (typeof (ggbcheckb) == "undefined" || window.GGBT.ggbcheckb.checked) {
                window.GGBT.ggbf.classList.add('qtype-geogebra-hover');
                document.getElementById('applet_container1').style.visibility = "hidden";
            }
        },

        handleDragOver: function(e) {
            if (typeof (window.GGBT.ggbcheckb) == "undefined" || window.GGBT.ggbcheckb.checked) {
                if (e.preventDefault) {
                    e.preventDefault();
                }
                window.GGBT.ggbf.classList.add('qtype-geogebra-hover');
                document.getElementById('applet_container1').style.visibility = "hidden";
                return false;
            }
        },

        handleDragEndLeave: function() {
            if (typeof (window.GGBT.ggbcheckb) == "undefined" || window.GGBT.ggbcheckb.checked) {
                window.GGBT.ggbf.classList.remove('qtype-geogebra-hover');
                document.getElementById('applet_container1').style.removeProperty("visibility");
            }
        },
        //handleStoreGGB: function() {
            /*{
            if (typeof (window.GGBT.ggbcheckb) == "undefined" || window.GGBT.ggbcheckb.checked) {
                e.preventDefault();
                e.stopPropagation();
                var file = e.dataTransfer.files[0];
                window.GGBT.ggbf.classList.remove('qtype-geogebra-hover');
                document.getElementById('applet_container1').style.removeProperty("visibility");
                document.getElementById('applet_container1').style.display = "block";
                document.getElementById('applet_options').style.display = "flex";
                document.getElementById('applet_container1').style.height = "100%";
                //document.getElementById('applet_container1').style.width = "100%";

                document.getElementById('id_ggbturl').value = "";
                //this.usefile = document.getElementById("id_usefile");
                if (!window.GGBT.usefile.checked) {
                    window.GGBT.usefile.click();
                }
                var reader = new FileReader();
                reader.onload = function(event) {
                    var base64 = event.target.result.replace("data:application/vnd.geogebra.file;base64,", "");
                */
          //      debugcode();
          //          var base64 = window.ggbApplet.getBase64() ;
          //          window.GGBT.parameters = {"ggbBase64": base64};
                    /*
                    window.GGBT.parameters.enableRightClick = window.GGBT.enable_right_click.checked;
                    window.GGBT.parameters.enableLabelDrags = window.GGBT.enable_label_drags.checked;
                    window.GGBT.parameters.showResetIcon = window.GGBT.show_reset_icon.checked;
                    window.GGBT.parameters.enableShiftDragZoom = window.GGBT.enable_shift_drag_zoom.checked;
                    window.GGBT.parameters.showAlgebraInput = window.GGBT.show_algebra_input.checked;
                    window.GGBT.parameters.showMenuBar = window.GGBT.show_menu_bar.checked;
                    window.GGBT.parameters.showToolBar = window.GGBT.show_tool_bar.checked;
                    window.GGBT.parameters.moodle = "editingQuestionOrSubmission";
                    */
                   // alert("hello custom ggb 2");
        //debugcode();
         //           if (document.getElementById('id_isurlggb').checked) {
                     //GGBApplet = document.getElementById('id_urlggb').value;
          //          }
          /*
                    window.applet1 = new GGBApplet(window.GGBT.parameters, true);
                if(!(codebase==="")){window.applet1.setHTML5Codebase(codebase);}
                    // window.applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");
                    window.applet1.inject("applet_container1");
                };

                reader.readAsDataURL(file);
            }*/
        ///},
        handleDrop: function(e) {
            if (typeof (window.GGBT.ggbcheckb) == "undefined" || window.GGBT.ggbcheckb.checked) {
                e.preventDefault();
                e.stopPropagation();
                var file = e.dataTransfer.files[0];
                window.GGBT.ggbf.classList.remove('qtype-geogebra-hover');
                document.getElementById('applet_container1').style.removeProperty("visibility");
                document.getElementById('applet_container1').style.display = "block";
                document.getElementById('applet_options').style.display = "flex";
                document.getElementById('applet_container1').style.height = "100%";
                //document.getElementById('applet_container1').style.width = "100%";

                document.getElementById('id_ggbturl').value = "";
                //this.usefile = document.getElementById("id_usefile");
                if (!window.GGBT.usefile.checked) {
                    window.GGBT.usefile.click();
                }
                var reader = new FileReader();
                reader.onload = function(event) {
                    var base64 = event.target.result.replace("data:application/vnd.geogebra.file;base64,", "");
                    window.GGBT.parameters = {"ggbBase64": base64};
                    window.GGBT.parameters.enableRightClick = window.GGBT.enable_right_click.checked;
                    window.GGBT.parameters.enableLabelDrags = window.GGBT.enable_label_drags.checked;
                    window.GGBT.parameters.showResetIcon = window.GGBT.show_reset_icon.checked;
                    window.GGBT.parameters.enableUndoRedo = window.GGBT.enable_undo_redo.checked;
                    window.GGBT.parameters.enableShiftDragZoom = window.GGBT.enable_shift_drag_zoom.checked;
                    window.GGBT.parameters.showAlgebraInput = window.GGBT.show_algebra_input.checked;
                    window.GGBT.parameters.showMenuBar = window.GGBT.show_menu_bar.checked;
                    window.GGBT.parameters.showToolBar = window.GGBT.show_tool_bar.checked;
                    window.GGBT.parameters.moodle = "editingQuestionOrSubmission";
                   // alert("hello custom ggb 2");
        //debugcode();
         //           if (document.getElementById('id_isurlggb').checked) {
                     //GGBApplet = document.getElementById('id_urlggb').value;
          //          }
                    window.applet1 = new GGBApplet(window.GGBT.parameters, true);
                if(!(codebase==="")){window.applet1.setHTML5Codebase(codebase);}
                    // window.applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");
                    window.applet1.inject("applet_container1");
                };

                reader.readAsDataURL(file);
            }
        },

        isNumber: function(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
    };
});
