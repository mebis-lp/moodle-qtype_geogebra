/* eslint-disable */
/* eslint-disable no-debugger */
/*jslint devel: true */
/*eslint linebreak-style:0 -- ['error', 'windows','unix']*/

/**
 * Javascript Controller to embed GGBApplet
 *
 * StuDENT VIEW
 *
 * This class provides all the functionality for the new assign module.
 *
 * @author         Christoph Stadlbauer <christoph.stadlbauer@geogebra.org>
 * @copyright  (c) International GeoGebra Institute 2018
 * @license        http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


// alert("hello ggbq");
 //debugger; // eslint-disable-line
        //debugcode();
        function stringfy(responsevars,ggbApplet){
        //debugcode();
          var responsestring = '';
          responsevars.forEach(function (responsevar){
           if (ggbApplet.isDefined(responsevar)){ 
            var value = ggbApplet.getValue(responsevar);
            if (ggbApplet.getObjectType(responsevar)=="boolean"){value = (value ==  0 ?"false":"true");}
            responsestring += responsevar+":"+value+'%'; //Twingsister to deal with multidigit
           }
          });
          return responsestring.replace(/\%$/,""); // possibly cut the last % works better with explode
         }
//        function loadinit(appletParametersID) {
//        debugcode();
//            var ggbDataset = document.getElementById(appletParametersID).dataset;
    // Twingsister
//        function loadinit(appletParametersID) {
//            var ggbDataset = document.getElementById(appletParametersID).dataset;
    // Twingsister
//var GGBAppletstr;
//            if (ggbDataset.isurlggb) {
//            	GGBAppletstr = ggbDataset.urlggb;
//            } else { GGBAppletstr = 'https://www.geogebra.org/apps/deployggb.js';}

   // }
//define(['jquery','https://www.geogebra.org/apps/deployggb.js'], function ($, GGBApplet) {
define(['jquery'], function ($) {
     // Created by Christoph on 25.08.19.

    const scalingContainers = {};
    let resizeTimeout;
     // Resizes the ggb scaling containers to make the ggb applet scale properly to fit into its container.
    const resizeScalingContainer = () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(
            () => Object.values(scalingContainers).forEach((containerClass) => {
                    // We need to use getElementsByClassName because colons are not allowed for jquery and Vanilla JS querySelector.
                    const scalingContainer = document.getElementsByClassName(containerClass)[0];
                    // We retrieve the formulation div container, because this gives us the correct width to adapt
                    // the scaling container to.
                    const formulationDivStyle = window.getComputedStyle(
                        scalingContainer.querySelector('.qtext').parentElement.parentElement);
                    scalingContainer.style.width = parseInt(formulationDivStyle.width)
                        - parseInt(formulationDivStyle.paddingLeft) - parseInt(formulationDivStyle.paddingRight) + 'px';
                }), 250);
    };
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
        //parameters: {}, //before not global
        ggbDataset: [],
        //applet1,

        init: function (appletParametersID) {
            window.GGBQ = this;
            //debugcode();
            var ggbDataset = document.getElementById(appletParametersID).dataset;
            var slot = ggbDataset.slot;
            // Add current scaling container to the object store for being able to access it later on.
            scalingContainers[slot] = ggbDataset.scalingcontainerclass;
            //alert("no load");

            window.ggbAppletOnLoad = function (ggbAppletId) {
                if (ggbAppletId != -1) {
                    document.querySelector('article').onkeydown = this.checkEnter;
                    var id = ggbAppletId.substring(9);
                    var ggbApplet = window[ggbAppletId];
                    var curvals = JSON.parse(window.GGBQ.currentvals[id]);
                    for (var label in curvals) {
                        ggbApplet.setValue(label, curvals[label]);
                    }

                    // Set the initial size of the scaling containers so GeoGebra applet scale a first time correctly after loading.
                    resizeScalingContainer();
                    // Unregister old event listeners in case we have multiple GeoGebra questions on one page.
                    // We only need one for the whole page.
                    window.removeEventListener('resize', resizeScalingContainer);
                    window.addEventListener('resize', resizeScalingContainer);

                    window.GGBQ.b64input[id].val(ggbApplet.getBase64());
                    window.GGBQ.xmlinput[id].val(ggbApplet.getXML());
 
                    //window.GGBQ.qdiv[id].style.visibility = 'visible';
                    window.GGBQ.qdiv[id]= {style: {visibility : 'visible'}};
                    if (window.GGBQ.answerinput[id].val() == '') {
                        // Twingsister
                        window.GGBQ.answerinput[id].val(stringfy(window.GGBQ.responsevars[id],ggbApplet));
                        // Twingsister
                    	//alert("response one");
                //alert("gogod");
             	//ggbApplet.setWidth(100);
             	//ggbApplet.setPerspective("GD");
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
            //parameters = JSON.parse(ggbDataset.parameters);
            if (this.ggbBase64[slot] != '') {
                parameters.ggbBase64 = this.ggbBase64[slot];
            }

            // Check if seed have been manually set. The default would be "no"
            //alert("entering the seed");
            	//debugcode();
            if (!ggbDataset.seeditornot || ggbDataset.seeditornot === '0') {
            	var dice=Math.floor((Math.random() * 1000) + 1);
            	//alert("random copy with "+dice.toString());
            	//debugcode();
                parameters.randomSeed = dice ;
            } else {
                parameters.randomSeed = ggbDataset.seed;
            } 
            //alert("Calling with random "+parameters.randomSeed.toString());
            if (!ggbDataset.forcedimensions || ggbDataset.forcedimensions === '0') {
                parameters.scaleContainerClass = scalingContainers[slot];
                parameters.autoHeight = true;
            } else {
                // Width and height are specified in this case, so we use the given fixed width and height settings
                // of the plugin instance. Form validation of the settings asserts that both width and height are being set.
                parameters.width = ggbDataset.width;
                parameters.height = ggbDataset.height;
                // We need to use getElementsByClassName because colons are not allowed for jquery and Vanilla JS querySelector.
                const scalingContainer = document.getElementsByClassName(scalingContainers[slot])[0];
                // We should always find this container, just check to be extra safe.
                if (scalingContainer) {
                    // Width of the scaling container is being set after the applet has been loaded. So no need to specify it here.
                    scalingContainer.style.overflowX = 'auto';
                    scalingContainer.style.overflowY = 'hidden';
                }
            }
            // parameters.currentvals = JSON.parse(ggbDataset.vars);
            this.ggbDatasetVars = JSON.parse(ggbDataset.vars);
            parameters.language = ggbDataset.lang;
            parameters.moodle = "takingQuiz";
            delete parameters.material_id;

            parameters.id = 'ggbApplet' + slot;

            var views = JSON.parse(ggbDataset.views);
            // Check if GGBApplet have been manually set.
        debugcode(); //
            	var GGBAppletname ;
            	var codebase ;

            if (!ggbDataset.isurlggb||ggbDataset.isurlggb === "0") {
             GGBAppletname = 'https://www.geogebra.org/apps/deployggb.js';
             codebase="";
            } else {
                var parts=ggbDataset.urlggb.split(",");
            	var root=parts[0];
            	var appl=parts[1];
            	var base=parts[2];
            	GGBAppletname = root+appl ;
            	codebase = root+base;
            }
              //require.config({paths: {gb: GGBAppletname.slice(0,-3)}});
              //require(["gb"], function(gb) {
              //import GGBApplet from GGBAppletname;

            require([GGBAppletname],function (App){//);
            	var applet1 ;
                //applet1 = new App(parameters, views, ggbDataset.html5NoWebSimple);
                if(!parameters.showToolBar){
                 parameters.showToolBar=true; 
                 parameters.customToolBar="40,0,1,41,42,50,38,6";
                }
                // parameters.enableUndoRedo=false; //user controlled
                //parameters.showResetIcon=false;// user defined
                parameters.preventFocus=true;// get focus upon start
                parameters.allowStyleBar=false;// style bar controls too much 
                parameters.transparentGraphics=false;// graphics and graphics 2 are transparent
                parameters.playButton=false; //true not working?
                parameters.autoHeight=false; // allow height computed automatically
                parameters.allowUpscale=true; // let GGB upscale Applet
                parameters.showFullscreenButton=true; // let GGB upscale Applet
                applet1 = new App(parameters,ggbDataset.html5nowebsimple);
                if (!(codebase==="")){applet1.setHTML5Codebase(codebase)};
            	applet1.inject(ggbDataset.div, "preferHTML5");
              });
            //	GGBApplet=
            //       define([GGBAppletname], function (GGBobj) {return GGBobj;});
            //alert("applet creation");debugger;
            //var applet1 = new GGBApplet(parameters, views, ggbDataset.html5NoWebSimple);
            //NO applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");

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
    // Twingsister
    // takes an an array of strings that are GGB variable names either numeric text or boolean and
    // returns a percent % separated string of the values. If no value is present the variable is skipped


        getBase64andCheck: function() {
        debugcode();
            for (var i = 0; i < window.GGBQ.answerinput.length; i++) {
                var ggbApplet = window['ggbApplet' + i];
                if (typeof ggbApplet !== "undefined") {
                    window.GGBQ.b64input[i].val(ggbApplet.getBase64());
                    window.GGBQ.xmlinput[i].val(ggbApplet.getXML());

                    // Workaround, to set all randomized variables.
                    for (const [key, value] of Object.entries(window.GGBQ.ggbDatasetVars)) {
                        ggbApplet.evalCommand(`${key}=${value}`);
                    }

                    //var responsestring = '';
                    //for (var j = 0; j < window.GGBQ.responsevars[i].length; j++) {
                        //if (ggbApplet.isDefined(window.GGBQ.responsevars[i][j])) {
                        // Twingsister
                        window.GGBQ.answerinput[i].val(stringfy(window.GGBQ.responsevars[i],ggbApplet));
                        // Twingsister
                        //    responsestring += ggbApplet.getValue(window.GGBQ.responsevars[i][j])+'%'; // Twingsister:to add multi digit
                        //} else {
                        //    responsestring += 0;
                        //}
                    //}
                    //window.GGBQ.answerinput[i].val(responsestring);
                    //alert("response");
                }
            }
        },

    };
});
//init(appletParametersID);
//}
