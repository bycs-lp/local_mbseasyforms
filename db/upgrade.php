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
 * Upgrade library for easyforms plugin.
 *
 * @package     local_mbseasyforms
 * @copyright   2018 Tobias Garske, ISB
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Set easyforms config on Upgrade.
 *
 * @param string $oldversion oldversion
 * @copyright 2018 Tobias Garske, ISB
 */
function xmldb_local_mbseasyforms_upgrade($oldversion) {
    global $DB;

    $newversion = 2023011600;
    if ($oldversion < $newversion) {
        // Set custom profile field for easyforms.
        \local_mbseasyforms\mbseasyforms::create_custom_profile_field();

        // Mbseasyforms savepoint reached.
        upgrade_plugin_savepoint(true, $newversion, 'local', 'mbseasyforms');
    }

    if ($oldversion < 2024082801) {
        \local_mbseasyforms\mbseasyforms::update_custom_profile_field();

        upgrade_plugin_savepoint(true, 2024082801, 'local', 'mbseasyforms');
    }

    if ($oldversion < 2026051800) {
        // Update easyforms config with current default settings.
        \local_mbseasyforms\mbseasyforms::update_default_config();

        upgrade_plugin_savepoint(true, 2026051800, 'local', 'mbseasyforms');
    }

    if ($oldversion < 2026061700) {
        // Reset easyformsconfig to current DEFAULT_SETTING (includes new moodleoverflow config).
        \local_mbseasyforms\mbseasyforms::update_default_config();

        upgrade_plugin_savepoint(true, 2026061700, 'local', 'mbseasyforms');
    }

    if ($oldversion < 2026062200) {
        // Reset default config.
        \local_mbseasyforms\mbseasyforms::update_default_config();

        upgrade_plugin_savepoint(true, 2026062200, 'local', 'mbseasyforms');
    }

    if ($oldversion < 2026082400) {
        // Reset default config to include format_mimo course edit settings.
        \local_mbseasyforms\mbseasyforms::update_default_config();

        upgrade_plugin_savepoint(true, 2026082400, 'local', 'mbseasyforms');
    }

    return true;
}
