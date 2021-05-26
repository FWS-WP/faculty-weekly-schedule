<?php
/**
 * Creates the Settings page
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
 * [Description FWS_Settings]
 */
class FWS_Settings extends FacultyWeeklySchedule_AdminPageFramework {

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
				'title'       => 'Settings',        // page title.
				'page_slug'   => 'fws_settings_page',    // page slug.
				'screen_icon' => 'https://lh3.googleusercontent.com/-Z5OeZOGzN3c/UilDgCX9WjI/AAAAAAAABS4/mf7L8GGJRTc/s800/demo04_01_32x32.png',     // page screen icon for WP 3.7.x or below.
			)
		);

		// Add in-page tabs.
		require FWS_PATH . '/schedule/show-developer.php';
		if ( $show_developer ) {
			$this->addInPageTabs(
				'fws_settings_page',    // set the target page slug so that the 'page_slug' key can be omitted from the next continuing in-page tab arrays.
				array(
					'tab_slug' => 'fws_faculty_tab',    // avoid hyphen(dash), dots, and white spaces.
					'title'    => __( 'Faculty', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_office_hours_tab',
					'title'    => __( 'Office Hours', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_classes_tab',
					'title'    => __( 'Classes', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_options_tab',
					'title'    => __( 'Options', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_headings_tab',
					'title'    => __( 'Headings', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_messages_tab',
					'title'    => __( 'Messages', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_developer_tab',
					'title'    => __( 'Developer', 'faculty-weekly-schedule' ),
				)
			);
		} else {
			$this->addInPageTabs(
				'fws_settings_page',    // set the target page slug so that the 'page_slug' key can be omitted from the next continuing in-page tab arrays.
				array(
					'tab_slug' => 'fws_faculty_tab',    // avoid hyphen(dash), dots, and white spaces.
					'title'    => __( 'Faculty', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_office_hours_tab',
					'title'    => __( 'Office Hours', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_classes_tab',
					'title'    => __( 'Classes', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_options_tab',
					'title'    => __( 'Options', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_headings_tab',
					'title'    => __( 'Headings', 'faculty-weekly-schedule' ),
				),
				array(
					'tab_slug' => 'fws_messages_tab',
					'title'    => __( 'Messages', 'faculty-weekly-schedule' ),
				),
			);

		}

		$this->setPageHeadingTabsVisibility( false );    // disables the page heading tabs by passing false.
		$this->setInPageTabTag( 'h2' );        // sets the tag used for in-page tabs.

	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return [type]
	 */
	public function content_fws_settings_page( $s_content ) {
		return $s_content;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return [type]
	 */
	public function content_fws_settings_page_fws_office_hours_tab( $s_content ) {
		return $s_content;
	}

	/**
	 * One of the predefined callback method.
	 *
	 * @remark      content_{page slug}_{tab slug}
	 * @param mixed $s_content The default content passed by WordPress.
	 *
	 * @return [type]
	 */
	private function content_fws_settings_page_fws_developer_tab( $s_content ) {
		return $s_content
			. '<h3>Tab Content Filter</h3>'
			. '<p>This is the developer tab!.</p>';
	}

}

// Instantiate the class object.
new FWS_Settings();

require_once FWS_PATH . '/schedule/settings/class-fws-settings-faculty.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-officehours.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-classes.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-options.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-headings.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-messages.php';
require_once FWS_PATH . '/schedule/settings/class-fws-settings-sidepage.php';
