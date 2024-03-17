

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

        function cyclerepl(str,dic){
         var alts=dic.length;
         var result;
         for(var i = 0;i<alts;i++){      
           result=str.replace(dic[i],dic[ Date.now() % (alts-1)]);
           if(str!=result){ return result;}
		 }
		 return str; //should not happen
		}
        function unpackStringified(s){
		 var couples=s.split("%");
		 var results={};
		 couples.forEach(function (couple, index) {
		  var twos=couple.split(":");results[twos[0]]=twos[1];
  		  });
  		  return results;
  		}
        function packStringified(a){
        //key:value%key:value FORMAT IS THIS!!! NO TRAILING %
        // DECODED IN Liveviewgrid  locallib.php ggbTotal
		 var results="";
		 for(var key in a) {
  			var value = a[key];
            results += key+":"+value+'%'; //Twingsister to deal with multidigit
		 }
          return results.replace(/\%$/,""); // possibly cut the last % works better with explode
  		}
  		function isInGGB(v,ggbApplet){return ggbApplet.isDefined(v);}
  		function fromGGB(v,ggbApplet){
  			var res=ggbApplet.getValue(v);
            if (ggbApplet.getObjectType(v)=="boolean"){res = (res ==  0 ?false:true);}
   		 	return res; 
  		 }
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
                }), 5000); //Twingsister mod was 250
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
        //confirmedpage: false, //Twingsister the user says sees a correct page
        scratchit: false, //Twingsister turns init into a reload from file delete all what you have done 
        scratchrandomizeit: false, //Twingsistere reload and randomize 
        scratchMark: false, 
        filename:"",
       //applet1,
        checkLoading: function (appletParametersID){return;
                	 if(!this.confirmedpage){
                		if(confirm("if something loaded (could be an empty cartesian plane) say ok")){
                			window.GGBQ.scratch(appletParametersID);
                			location.reload();return true;
                			if(confirm("if it looks as a correct question say ok")){this.confirmedpage=true;}
                			 else {if(confirm("if it is an empty cartesian plane, please say ok to reload")){location.reload();return;}} 
                	 	}
                	 }
                	},
        // Twingsister load from filename
        scratchrandomize: function (appletParametersID) {
            window.GGBQ = this;
        	window.GGBQ.scratchrandomizeit=true;
        	window.GGBQ.init(appletParametersID); 
        },
        scratchinit: function (appletParametersID) {
            window.GGBQ = this;
        	window.GGBQ.scratchit=true;
        	window.GGBQ.init(appletParametersID); 
        },
        scratch: function (reloadggb) {
        let url = window.location.href;    
        url=url.replaceAll(/&scratch=./g,"");
        url=url.replaceAll(/\?scratch=./g,"");
        //var ggbDataset = document.getElementById(appletParametersID).dataset;
        //var reloadggb=ggbDataset.reloadggb;//what to do with reload requests
        // array('none'=>'none', 'ncon'=>'reload if not confirmed', 'rand'=>'reload and randomize','redo'=>'redo same exercise
		switch (reloadggb.trim()) {
  			case 'none':
    		break;
  			case 'ncon':
    		break;
  			case 'rand':
        		if(confirm("This will reload this exercise with different numbers. All previous work on this exercise will be lost."))
    				{
						if (url.indexOf('?') > -1){
   							url += '&scratch=2'
						} else {
						   url += '?scratch=2'
						}
						window.location.replace(url);
        			}
        	break;
  			case 'redo':
        		if(confirm("This will reload this exercise with same numbers. All previous work on this exercise will be lost.")){
					if (url.indexOf('?') > -1){
   						url += '&scratch=1'
					} else { 
					   url += '?scratch=1'
					}
					//window.location.href = url;
					//window.location.reload();
					window.location.replace(url);
					// window.location.hash = 'varA=some_value;varB=some_value';
        			//window.GGBQ.init(appletParametersID); 
        			}
    		break;
    		}
        },
        init: function (appletParametersID) {
        	////this.scratchit=true;
        	//this.confirmedpage=false;//Twingsister
            window.GGBQ = this;
            debugcode();
            var ggbDataset = document.getElementById(appletParametersID).dataset;
            var reloadggb=ggbDataset.reloadggb;//what to do with reload requests
            var urlprefixlist=ggbDataset.urlprefixlist;//list of prefixes of sites to daownload ggb from 
            urlprefixlist=urlprefixlist.split(",");
			window.GGBQ.filename=cyclerepl(ggbDataset.ggbturl,urlprefixlist);// the filename fron a randomized repo
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
                    //window.GGBQ.checkLoading(appletParametersID);
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
				if(window.GGBQ.scratchMark){
					ggbApplet.evalCommand('mark=Text("QUIZ RELOADED",(0,-2))');
					ggbApplet.setFixed('mark',true,false);// mark RELOADED  cannot be deleted
					window.GGBQ.scratchMark=false;
                 }
                } else {alert("Applet not found, please reload this page");location.reload();}
                //alert("loaded:".window.GGBQ.filename)
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
			if(window.GGBQ.scratchit){
				var httpurl = window.GGBQ.filename;
                if(httpurl.startsWith('http')){
					delete parameters.ggbBase64;
					parameters.filename=httpurl
					window.GGBQ.scratchMark=true;
                 }else{alert("Reloading from Geogebra Tube not implemented")}
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
			if(window.GGBQ.scratchrandomizeit){
					window.GGBQ.scratchMark=true;
					window.GGBQ.scratchrandomizeit=false;
                	parameters.randomSeed=Math.floor((Math.random() * 1000) + 1);
					var httpurl = window.GGBQ.filename;
                	if(httpurl.startsWith('http')){
						delete parameters.ggbBase64;
						parameters.filename=httpurl
					}
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
            	// the comma separated list of prefixes in URL for the GGB file
            	var urlprefixlist=ggbDataset.urlprefixlist;
            	//alert(urlprefixlist);

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
              //require(["gb"], function(gb) 
              //import GGBApplet from GGBAppletname;

            require([GGBAppletname],function (App){//);
            	var applet1 ;
                //applet1 = new App(parameters, views, ggbDataset.html5NoWebSimple);
                if(!parameters.showToolBar){
                 parameters.showToolBar=true; 
                 parameters.customToolBar="40,0,1,41,42,50,38";//,6";
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
            	debugcode();
				//window.onload = function() 
				//window.addEventListener("load", function() 
                if (!(codebase==="")){applet1.setHTML5Codebase(codebase)};
                //alert("foo");
            	applet1.inject(ggbDataset.div, "preferHTML5");
			});
            // Check if seed have been manually set. The default would be "no"
			    //})
			    //
            //	GGBApplet=
            //       define([GGBAppletname], function (GGBobj) {return GGBobj;});
            //alert("applet creation");debugger;
            //var applet1 = new GGBApplet(parameters, views, ggbDataset.html5NoWebSimple);
            //NO applet1.setHTML5Codebase("https://cdn.geogebra.org/apps/5.0.541.0/web3d");

            $('#responseform').on('submit', this.preGetBase64andCheck);

            // Do wep really need this $(document.getElementById(ggbDataset.div)).on('mouseleave', this.getBase64andCheck);
            //$(document.getElementById(ggbDataset.div)).on('mouseleave', this.getBase64andCheck);
            // ADD LINE ABOVE TO HAVE SAVING ON EVERY MOUSE MOVE OUT OF EXERCISE (HEAVY)

            this.currentvals[slot] = ggbDataset.vars;
            this.answerinput[slot] = $(document.getElementById(ggbDataset.answerinput));
            this.exerciseresultinput[slot] = $(document.getElementById(ggbDataset.exerciseresultinput));
            this.responsevars[slot] = JSON.parse(ggbDataset.responsevars);
			//window.GGBQ.checkLoading(appletParametersID);
        },
        checkEnter: function(e) {
            e = e || event;
            var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
            return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
        },
    // Twingsister
    // takes an an array o strings that are GGB variable names either numeric text or boolean and
    // returns a percent % separated string of the values. If no value is present the variable is skipped



        //confirmedpage=false,``
        // called upon submit
        preGetBase64andCheck: function() {
            //for (var i = 0; i < window.GGBQ.answerinput.length; i++) {
           //     var ggbApplet = window['ggbApplet' + i];
           //     if (typeof ggbApplet !== "undefined" && ggbApplet.hasOwnProperty("getBase64")) {
                // in ggbAApplet do some bookeping because the user pressed next page
           //     }
            //}
        	this.getBase64andCheck();
        },
        
        getBase64andCheck: function() {
        debugcode();
        if(!confirm("Do you want to save your work?")){return;}
            for (var i = 0; i < window.GGBQ.answerinput.length; i++) {
                var ggbApplet = window['ggbApplet' + i];
                if (typeof ggbApplet !== "undefined" && ggbApplet.hasOwnProperty("getBase64")) {
                	//window.GGBQ.checkLoading(ggbApplet);
                	//if(!this.confirmedpage&&!confirm("Is the applet loaded correctly?")){location.reload();return;}else{this.confirmedpage=true;}
                    window.GGBQ.b64input[i].val(ggbApplet.getBase64());
                    window.GGBQ.xmlinput[i].val(ggbApplet.getXML());

                    // Workaround, to set all randomized variables.
                    for (const [key, value] of Object.entries(window.GGBQ.ggbDatasetVars)) {
                        ggbApplet.evalCommand(`${key}=${value}`);
                    }

                    //var responsestring = '';
                    //for (var j = 0; j < window.GGBQ.responsevars[i].length; j++) [
                        //if (ggbApplet.isDefined(window.GGBQ.responsevars[i][j])) [
                        // Twingsister
                        var resp=stringfy(window.GGBQ.responsevars[i],ggbApplet);
		 				//special conditions treatement
		 				// there are both  juste and grade juste is true grade is less than one then take it to one
		 				var outputs = unpackStringified(resp);
		 				var justeison=((("juste" in outputs) && outputs["juste"]==="true")||(isInGGB('juste',ggbApplet)&&fromGGB('juste',ggbApplet)));
		 				if(justeison){
        					if( ("grade" in outputs)&&(Number(outputs["grade"])<1)){
        					 outputs["grade"]="1.0";
        					 alert("maximum mark assigned");
        					}
        				}
        				// check loading failed to work code below commented out
        				// Some alert added to help the user to ask for a reload
        				// if the global variable RT_R_DBLCHK is declared check if the ggb finish loading if not give full mark
        				//if(window.hasOwnProperty('RT_R_DBLCHK')&&
        				//	(!window.hasOwnProperty('RT_R_Loaded')||!RT_R_Loaded)){
        				//	outputs["grade"]="1.0";
        				//	alert("maximum mark assigned");
        				//}
        				resp=packStringified(outputs);
                        window.GGBQ.answerinput[i].val(resp);
                        // Twingsister
                        //    responsestring += ggbApplet.getValue(window.GGBQ.responsevars[i][j])+'%'; // Twingsister:to add multi digit
                        //] else [
                        //    responsestring += 0;
                        //]
                    //]
                    //window.GGBQ.answerinput[i].val(responsestring);
                    //alert("response");
                }else{if(typeof ggbApplet !== "undefined"){alert("quiz not loaded");location.reload()}}
            }
        },

    };
});
//init(appletParametersID);
//}
