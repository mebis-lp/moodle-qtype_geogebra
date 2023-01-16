# GeoGebra question type for Moodle 3.5-3.11

## Introduction
The GeoGebra question type plugin allows teachers to set up questions which can be solved and automatically checked using GeoGebra.

## Requirements
- Moodle 3.5 or above
- JavaScript enabled in your browser
- Modern browser

## Installation
- Place the "geogebra" directory within `your_moodle_install/question/type/`
- Visit the admin notifications page and complete the installation
- Done!

## Usage as teacher
- Create a worksheet where there is at least one boolean variable which indicates whether the students solution is correct
- Upload the question to GeoGebraTube
- As a teacher, create a GeoGebra question in Moodle
- Supply the URL of the GeoGebraTube worksheet or choose the material using the file picker (only works with GeoGebraTube
repository installed)
- Load the Applet. Variables which could be randomized or can be used for checking correctness, will be extracted automatically
- Choose the fraction which goes with the boolean variable
- Save the question and use it for your quiz
- You can add a seed so that all random values are the same for all the class.
- You can reference a ggb with a plain https URL (see for instance details to reference ggb(s) in [this repository](https://github.com/TWINGSISTER/moodle-qtype_geogebra) reading this [README](https://twingsister.github.io/Moodle-Tests-Repository/)) 
- You can use an alternate source for the  deployggb.js file and  a self hosted Geogebra codebase  as in [this repository](https://twingsister.github.io/GeogebraMultilanguageTranslator/Geogebra/geogebra-math-apps-bundle-5-0-latest/GeoGebra/deployggb.js).
In this case you should supply a comma separated string like "https://twingsister.github.io/GeogebraMultilanguageTranslator/Geogebra/geogebra-math-apps-bundle-5-0-latest/GeoGebra/,HTML5/5.0/web3d/,deployggb.js".
If a comma sepatated string like "A,B,C" is given then A+B must give the URL of displayggb.js and A+C is the codebase.