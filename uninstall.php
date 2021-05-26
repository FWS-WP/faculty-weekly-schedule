<?php
/**
 * The uninstall.php file
 *
 * - fires when plugin is uninstalled via the Plugins screen
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

// exit if uninstall constant is not defined.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


// delete the plugin options and custom post types.
if ( ! current_user_can( 'manage_options' ) ) {
	return;
} else {
	include dirname( __FILE__ ) . '/library/admin-page-framework/admin-page-framework.php';
	$force_delete = true;
	if ( is_multisite() ) {
		$sites = get_sites();

		foreach ( $sites as $site ) {
			switch_to_blog( $site->blog_id );
			delete_option( 'FWS_Settings' );
			$schedule_args  = array(
				'post_type'   => FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'],
				'nopaging'    => true,
				'numberposts' => -1,
				'post_status' => 'any',
			);
			$schedule_posts = get_posts( $schedule_args );
			if ( ! empty( $schedule_posts ) ) {
				foreach ( $schedule_posts as $schedule ) {
					wp_delete_post( $schedule->ID, $force_delete );
				}
			}
			restore_current_blog();
		}
	} else {
		delete_option( 'FWS_Settings' );
		$schedule_args  = array(
			'post_type'   => FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'],
			'nopaging'    => true,
			'numberposts' => -1,
			'post_status' => 'any',
		);
		$schedule_posts = get_posts( $schedule_args );
		if ( ! empty( $schedule_posts ) ) {
			foreach ( $schedule_posts as $schedule ) {
				wp_delete_post( $schedule->ID, $force_delete );
			}
		}
	}
}


