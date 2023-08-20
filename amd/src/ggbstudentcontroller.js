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
import studentappletcontroller from 'qtype_geogebra/studentappletcontroller';
import Log from 'core/log';

/**
 * GGB controller for student view.
 *
 * @module     qtype_geogebra/ggbstudentcontroller
 * @copyright  2023 ISB Bayern
 * @author     Philipp Memmel
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

export const init = (injectedAppletId) => {
    new studentappletcontroller(injectedAppletId);

};

