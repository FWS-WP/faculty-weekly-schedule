<?php
/**
 * Sets up all the metaboxes when adding a schedule.
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

require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-info.php';
require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-office-hours.php';
require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-classes.php';
require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-options-metabox.php';
require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-headings.php';
require_once FWS_PATH . '/schedule/post-type/class-fws-schedule-messages.php';
