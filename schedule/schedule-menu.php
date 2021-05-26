<?php
/**
 * Silence is golden
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

if ( ! class_exists( 'FacultyWeeklySchedule_AdminPageFramework' ) ) {

	return;

}

/**
 * Enqueue the styles and scripts for schedules
 *
 * @return void
 */
function fws_enqueue_scripts() {
	wp_enqueue_style( 'fws-schedule', plugins_url( '/schedule/css/fws-schedule.css', __DIR__ ), array(), FWS_VERSION );
	wp_enqueue_script( 'fws-schedule', plugins_url( '/schedule/scripts/fws-schedule.js', __DIR__ ), array(), FWS_VERSION, false );
}
add_action( 'wp_enqueue_scripts', 'fws_enqueue_scripts' );

require_once FWS_PATH . '/schedule/post-type/class-fws-schedule.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings.php';
require_once FWS_PATH . '/schedule/help/class-fws-help.php';
