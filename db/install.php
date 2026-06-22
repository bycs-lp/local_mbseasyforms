<?php
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

/**
 * Code for installation of local_mbseasyforms.
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Tobias Garske, ISB
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Create a custom user profile field to switch use of easyforms.
 */
function xmldb_local_mbseasyforms_install() {
    global $CFG;

    // Set custom profile field for easyforms.
    \local_mbseasyforms\mbseasyforms::create_custom_profile_field();

    // Set default easyforms config.
    require_once($CFG->dirroot . '/local/mbseasyforms/defaultsettings.php');
    set_config('easyformsconfig', DEFAULT_SETTING, 'local_mbseasyforms');
}
