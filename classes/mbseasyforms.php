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
 * Functions for local plugin mbseasyforms.
 *
 * @package   local_mbseasyforms
 * @copyright 2017 Franziska Hübler, ISB München
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mbseasyforms;

defined('MOODLE_INTERNAL') || die;

// Needed to use constants from the profile library.
require_once(__DIR__ . '/../../../user/profile/lib.php');
/**
 * Functions for local plugin mbseasyforms.
 *
 * @copyright 2017 Franziska Hübler, ISB München
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mbseasyforms {
    /**
     * Create a custom profile field.
     * @return void
     * @throws \dml_exception
     */
    public static function create_custom_profile_field(): void {
        global $DB;

        // Check by shortname to avoid creating a duplicate field.
        if (!$DB->record_exists('user_info_field', ['shortname' => 'mbseasyforms'])) {
            // Reuse an existing category if present; categories have no stable identifier,
            // so the translated name is the best available lookup key.
            $category = $DB->get_record('user_info_category', ['name' => get_string('pluginname', 'local_mbseasyforms')]);
            if (!$category) {
                // Create custom profile field category as seen in tool_moodlenet:
                // No nice API to do this, so direct DB calls it is.
                $data = new \stdClass();
                $data->sortorder = $DB->count_records('user_info_category') + 1;
                $data->name = get_string('pluginname', 'local_mbseasyforms');
                $data->id = $DB->insert_record('user_info_category', $data, true);

                $category = $DB->get_record('user_info_category', ['id' => $data->id]);
                \core\event\user_info_category_created::create_from_category($category)->trigger();
            }

            // Set custom profile field for easyforms.
            // In behat environments, default to disabled so easyforms does not
            // interfere with other plugins' form-based tests.
            $defaultenabled = (defined('BEHAT_SITE_RUNNING') && BEHAT_SITE_RUNNING) ? 0 : 1;
            $profilefield = [
                'shortname' => 'mbseasyforms',
                'name' => get_string('useeasyforms', 'local_mbseasyforms'),
                'datatype' => 'checkbox',
                'description' => '<p>' . get_string('useeasyforms', 'local_mbseasyforms') . '<br></p>',
                'descriptionformat' => 1,
                'categoryid' => $category->id,
                'required' => 0,
                'locked' => 0,
                'visible' => PROFILE_VISIBLE_PRIVATE,
                'forceunique' => 0,
                'signup' => 0,
                'defaultdata' => $defaultenabled,
                'defaultdataformat' => 0,
                'param1' => '',
                'param2' => '',
                'param3' => '',
                'param4' => '',
                'param5' => '',
            ];

            $DB->insert_record('user_info_field', $profilefield);
        }
    }

    /**
     * Update custom profile field. It should be private.
     *
     * @return void
     */
    public static function update_custom_profile_field(): void {
        global $DB;

        $id = $DB->get_field('user_info_field', 'id', ['shortname' => 'mbseasyforms']);

        if ($id) {
            $DB->update_record('user_info_field', [
                'id' => $id,
                'visible' => PROFILE_VISIBLE_PRIVATE,
            ]);
        }
    }

    /**
     * Update the easyforms config with the default settings.
     *
     * @return void
     */
    public static function update_default_config(): void {
        global $CFG;
        require_once($CFG->dirroot . '/local/mbseasyforms/defaultsettings.php');
        set_config('easyformsconfig', DEFAULT_SETTING, 'local_mbseasyforms');
    }
}
