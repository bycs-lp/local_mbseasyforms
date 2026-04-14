<?php
// This file is part of The Course Module Navigation Block
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
 * Privacy Subsystem implementation for local_mbseasyforms.
 *
 * @package    local_mbseasyforms
 * @category   privacy
 * @copyright  2023 ISB Bayern
 * @author     Christian Kupfer
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_mbseasyforms\privacy;

use core_privacy\local\metadata\collection;
use core_privacy\local\request\contextlist;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\userlist;
use core_privacy\local\request\approved_userlist;


/**
 * Privacy Subsystem implementation for local_mbseasyforms.
 *
 * @package    local_mbseasyforms
 * @copyright  2023 ISB Bayern
 * @author     Christian Kupfer
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class provider implements
    \core_privacy\local\metadata\provider,
    \core_privacy\local\request\core_userlist_provider,
    \core_privacy\local\request\plugin\provider {
    /**
     * Returns meta data about this system.
     *
     * @param collection $collection
     * @return collection
     */
    public static function get_metadata(collection $collection): collection {
        return $collection->add_plugintype_link('profilefield', [], 'privacy:metadata:explanationeasyformsenabled');
    }

    /**
     * Get the list of contexts that contain user information for the specified user.
     *
     * @param   int $userid The user to search.
     * @return  contextlist $contextlist The contextlist containing the list of contexts used in this plugin.
     */
    public static function get_contexts_for_userid(int $userid): contextlist {
        return new contextlist();
    }

    /**
     * Get the list of users who have data within a context.
     *
     * @param userlist $userlist The userlist containing the list of users who have data in this context/plugin combination.
     */
    public static function get_users_in_context(userlist $userlist) {
        // Don't add any user.
    }

    /**
     * Export all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts to export information for.
     */
    public static function export_user_data(approved_contextlist $contextlist) {
        // Nothing else to do, export in user component.
    }

    /**
     * Delete all data for all users in the specified context.
     *
     * @param \context $context The specific context to delete data for.
     */
    public static function delete_data_for_all_users_in_context(\context $context) {
        // Nothing else to do, deletion in user component.
    }

    /**
     * Delete all user data for the specified user, in the specified contexts.
     *
     * @param approved_contextlist $contextlist The approved contexts and user information to delete information for.
     */
    public static function delete_data_for_user(approved_contextlist $contextlist) {
        // Nothing else to do, deletion in user component.
    }

    /**
     * Delete multiple users within a single context.
     *
     * @param approved_userlist $userlist The approved context and user information to delete information for.
     */
    public static function delete_data_for_users(approved_userlist $userlist) {
        // Nothing else to do, deletion in user component.
    }
}
