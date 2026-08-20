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

namespace local_mbseasyforms;

/**
 * Tests for the custom profile field handling of local_mbseasyforms.
 *
 * @package   local_mbseasyforms
 * @copyright 2026 ISB Bayern
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers    \local_mbseasyforms\mbseasyforms
 */
final class mbseasyforms_test extends \advanced_testcase {
    /**
     * Fresh install creates both the category and the field.
     */
    public function test_create_custom_profile_field_creates_category_and_field(): void {
        global $DB;
        $this->resetAfterTest();

        $DB->delete_records('user_info_field', ['shortname' => 'mbseasyforms']);
        $DB->delete_records('user_info_category', ['name' => get_string('pluginname', 'local_mbseasyforms')]);

        mbseasyforms::create_custom_profile_field();

        $field = $DB->get_record('user_info_field', ['shortname' => 'mbseasyforms']);
        $this->assertNotEmpty($field);
        $category = $DB->get_record('user_info_category', ['id' => $field->categoryid]);
        $this->assertEquals(get_string('pluginname', 'local_mbseasyforms'), $category->name);
    }

    /**
     * Repeated calls do not create duplicate categories or fields.
     */
    public function test_create_custom_profile_field_is_idempotent(): void {
        global $DB;
        $this->resetAfterTest();

        mbseasyforms::create_custom_profile_field();
        mbseasyforms::create_custom_profile_field();

        $this->assertEquals(1, $DB->count_records('user_info_field', ['shortname' => 'mbseasyforms']));
        $this->assertEquals(
            1,
            $DB->count_records('user_info_category', ['name' => get_string('pluginname', 'local_mbseasyforms')])
        );
    }

    /**
     * An already existing category is reused instead of creating a duplicate.
     */
    public function test_create_custom_profile_field_reuses_existing_category(): void {
        global $DB;
        $this->resetAfterTest();

        $DB->delete_records('user_info_field', ['shortname' => 'mbseasyforms']);
        $DB->delete_records('user_info_category', ['name' => get_string('pluginname', 'local_mbseasyforms')]);

        $categoryid = $DB->insert_record('user_info_category', (object) [
            'name' => get_string('pluginname', 'local_mbseasyforms'),
            'sortorder' => $DB->count_records('user_info_category') + 1,
        ]);

        mbseasyforms::create_custom_profile_field();

        $this->assertEquals(
            1,
            $DB->count_records('user_info_category', ['name' => get_string('pluginname', 'local_mbseasyforms')])
        );
        $field = $DB->get_record('user_info_field', ['shortname' => 'mbseasyforms']);
        $this->assertEquals($categoryid, $field->categoryid);
    }

    /**
     * Uninstall removes the field and the category if it is empty.
     */
    public function test_uninstall_removes_field_and_empty_category(): void {
        global $CFG, $DB;
        $this->resetAfterTest();
        require_once($CFG->dirroot . '/local/mbseasyforms/db/uninstall.php');

        // Core refuses to delete the last remaining category, so ensure another one exists.
        $DB->insert_record('user_info_category', (object) [
            'name' => 'Other category',
            'sortorder' => $DB->count_records('user_info_category') + 1,
        ]);

        mbseasyforms::create_custom_profile_field();
        $field = $DB->get_record('user_info_field', ['shortname' => 'mbseasyforms']);

        xmldb_local_mbseasyforms_uninstall();

        $this->assertFalse($DB->record_exists('user_info_field', ['shortname' => 'mbseasyforms']));
        $this->assertFalse($DB->record_exists('user_info_category', ['id' => $field->categoryid]));
    }

    /**
     * Uninstall keeps the category if it still contains other fields.
     */
    public function test_uninstall_keeps_category_with_other_fields(): void {
        global $CFG, $DB;
        $this->resetAfterTest();
        require_once($CFG->dirroot . '/local/mbseasyforms/db/uninstall.php');

        mbseasyforms::create_custom_profile_field();
        $field = $DB->get_record('user_info_field', ['shortname' => 'mbseasyforms']);

        // An admin added another field to the plugin's category.
        $DB->insert_record('user_info_field', (object) [
            'shortname' => 'otherfield',
            'name' => 'Other field',
            'datatype' => 'text',
            'categoryid' => $field->categoryid,
        ]);

        xmldb_local_mbseasyforms_uninstall();

        $this->assertFalse($DB->record_exists('user_info_field', ['shortname' => 'mbseasyforms']));
        $this->assertTrue($DB->record_exists('user_info_category', ['id' => $field->categoryid]));
        $this->assertTrue($DB->record_exists('user_info_field', ['shortname' => 'otherfield']));
    }
}
