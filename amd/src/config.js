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

define([], function () {
    window.requirejs.config({
        paths: {
           //Enter the paths to your required java-script files
            "deployggb": M.cfg.wwwroot + '/question/type/geogebra/js/geogebra-math-apps-bundle/GeoGebra/deployggb'
        },
        shim: {
           //Enter the "names" that will be used to refer to your libraries
            'deployggb': {exports: 'deployggb'}
        }
    });
});
