<?php
/**
 * Creates the help page
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
 * [Description FWS_Help]
 */
class FWS_Help extends FacultyWeeklySchedule_AdminPageFramework {

	/**
	 * Define the setUp() method to set how many pages, page titles and icons etc.
	 *
	 * @return void
	 */
	public function setUp() {

		// Create the root menu.

		$this->setRootMenuPageBySlug( '/edit.php?post_type=schedule' );

		// Add the sub menu item.
		$this->addSubMenuItems(
			array(
				'title'       => 'Help', // page title.
				'page_slug'   => 'fws_schedule_help', // page slug.
				'order'       => 200,
				'screen_icon' => 'https://lh3.googleusercontent.com/-Z5OeZOGzN3c/UilDgCX9WjI/AAAAAAAABS4/mf7L8GGJRTc/s800/demo04_01_32x32.png',     // page screen icon for WP 3.7.x or below.
			),
		);

		// Add in-page tabs.
		$this->addInPageTabs(
			'fws_schedule_help',    // set the target page slug so that the 'page_slug' key can be omitted from the next continuing in-page tab arrays.
			array(
				'tab_slug' => 'settings',    // avoid hyphen(dash), dots, and white spaces.
				'title'    => __( 'Settings', 'faculty-weekly-schedule' ),
			),
			array(
				'tab_slug' => 'schedule',
				'title'    => __( 'Schedule', 'faculty-weekly-schedule' ),
			),
			array(
				'tab_slug' => 'shortcodes',
				'title'    => __( 'Shortcodes', 'faculty-weekly-schedule' ),
			),
			array(
				'tab_slug' => 'tips',
				'title'    => __( 'Tips &amp; FAQ', 'faculty-weekly-schedule' ),
			),
			array(
				'tab_slug' => 'examples',
				'title'    => __( 'Examples', 'faculty-weekly-schedule' ),
			),
			array(
				'tab_slug' => 'videos',
				'title'    => __( 'Videos', 'faculty-weekly-schedule' ),
			)
		);

		$this->setPageHeadingTabsVisibility( false );    // disables the page heading tabs by passing false.
		$this->setInPageTabTag( 'h2' );        // sets the tag used for in-page tabs.

	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help( $s_content ) {
		return $s_content;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_settings( $s_content ) {
		require 'help-settings.php';
		return $s_content . $help_settings;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_schedule( $s_content ) {
		require 'help-schedule.php';
		return $s_content . $help_schedule;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_shortcodes( $s_content ) {
		require 'help-shortcodes.php';
		return $s_content . $help_shortcodes;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_tips( $s_content ) {
		require 'help-tips-faq.php';
		return $s_content . $help_tips_faq;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_examples( $s_content ) {
		require 'help-examples.php';
		return $s_content . $help_examples;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return string Content to be passed back to WordPress.
	 */
	public function content_fws_schedule_help_videos( $s_content ) {
		require 'help-videos.php';
		return $s_content . $help_videos;
	}

}

// Instantiate the class object.
new FWS_Help();
