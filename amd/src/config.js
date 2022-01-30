define([], function () {
    window.requirejs.config({
        paths: {
           //Enter the paths to your required java-script files
            "deployggb": M.cfg.wwwroot + '/question/type/geogebra/js/geogebra-math-apps-bundle-5-0-683/GeoGebra/deployggb'
        },
        shim: {
           //Enter the "names" that will be used to refer to your libraries
            'deployggb': {exports: 'deployggb'}
        }
    });
});
