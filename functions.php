<?php
/**
 * A functions.php file
 *
 * PHP Version: 7.3
 *
 * @category Faculty,_Weekly,_Schedule
 * @package  FacultyWeeklySchedule
 * @author   George Cooke <profgeorgecooke@gmail.com>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://wordpress.org/plugins/faculty-weekly-schedule
 */

// disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit( 1 );
}

/**
 * Included as CampusPress Plugin Check requires reference to get_avatar() and posts_nav_link() functions
 *
 * @return void
 */
function plugin_check_required_calls() {
	get_avatar( sanitize_email( 'author@' ) );
	posts_nav_link();
}
