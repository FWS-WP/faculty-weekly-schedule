<?php
/**
 * Plugin Name: Faculty Weekly Schedule
 * Plugin URI: https://github.com/FWS-WP/faculty-weekly-schedule/
 * Description: Define and display the weekly schedule of a faculty member.
 * Version: 1.1.0
 * Requires at least: 5.0
 * Tested up to: 5.8
 * Requires PHP: 7.3
 * PHP Version: 7.3
 * Author: George Cooke
 * Author URI: http://sites.broward.edu/gcooke/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: faculty-weekly-schedule
 * Domain Path: /languages
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

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define plugins constants.
define( 'FWS_VERSION', '1.0.0' );
define( 'FWS_DOMAIN', 'faculty-weekly-schedule' );
define( 'FWS_PATH', plugin_dir_path( __FILE__ ) );

require dirname( __FILE__ ) . '/library/admin-page-framework/admin-page-framework.php';

if ( ! class_exists( 'FacultyWeeklySchedule_AdminPageFramework' ) ) {

	return;

}

// Load text domain.
load_plugin_textdomain( FWS_DOMAIN, false, FWS_PATH . '/languages' );

require_once FWS_PATH . '/schedule/schedule-menu.php';

/**
 * Add Settings link on plugins page
 *
 * @param mixed $links The links to add.
 * @param mixed $file  The file to include.
 *
 * @return [type]
 */
function fws_plugin_action_links( $links, $file ) {
	static $this_plugin;

	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( $file === $this_plugin ) {
		$settings_link = '<a href="' . site_url() .
			'/wp-admin/admin.php?page=fws_schedule_help">Help</a>';
		array_unshift( $links, $settings_link );
		$settings_link = '<a href="' . site_url() .
			'/wp-admin/admin.php?page=fws_settings_page">Settings</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}

add_filter( 'plugin_action_links', 'fws_plugin_action_links', 10, 2 );
