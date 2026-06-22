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
 * Code for uninstallation of local_mbseasyforms.
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Tobias Garske, ISB
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Remove the custom profile field and its category created on install.
 */
function xmldb_local_mbseasyforms_uninstall() {
    global $CFG, $DB;

    require_once($CFG->dirroot . '/user/profile/definelib.php');

    // Look up the field by its stable shortname and remember its category before deleting it.
    // Keying off the shortname (instead of the translated category name) keeps this independent
    // of the current language and avoids touching unrelated categories.
    if ($field = $DB->get_record('user_info_field', ['shortname' => 'mbseasyforms'], 'id, categoryid')) {
        profile_delete_field($field->id);

        // Only remove the category if it is now empty, so we never drop a category an admin reused.
        if (!$DB->record_exists('user_info_field', ['categoryid' => $field->categoryid])) {
            profile_delete_category($field->categoryid);
        }
    }

    return true;
}
