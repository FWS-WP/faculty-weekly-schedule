<?php
/**
 * Creates headings metabox in settings
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
 * [Description FWS_Settings_Headings]
 */
class FWS_Settings_Headings extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {

		/**
		 * Adds setting fields in the meta box.
		 */
		$this->addSettingFields(
			array(
				'field_id' => 'fws_headings_options',
				'type'     => 'checkbox',
				'title'    => __( 'Heading Options', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Check the desired elements to display.', 'faculty-weekly-schedule' ),
				'label'    => array(
					'shead' => __( 'Show Schedule Heading', 'faculty-weekly-schedule' ),
					'chead' => __( 'Show Classes Heading', 'faculty-weekly-schedule' ),
					'ohead' => __( 'Show Online Classes Heading', 'faculty-weekly-schedule' ),
					'times' => __( 'Include Schedule Times', 'faculty-weekly-schedule' ),
				),
				'default'  => array(
					'shead' => true,
					'chead' => true,
					'ohead' => true,
					'times' => false,
				),
			), // Heading options.
			array(
				'field_id' => 'fws_headings_text',
				'type'     => 'inline_mixed',
				'title'    => __( 'Headings Text', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the text for display headings of the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_header',
						'title'    => __( 'Schedule Heading', 'faculty-weekly-schedule' ),
						'type'     => 'text',
						'default'  => __( 'Schedule Dates', 'faculty-weekly-schedule' ),
					),
					array(
						'field_id' => 'fws_classes_header',
						'title'    => __( 'Classes and Office Hours Heading', 'faculty-weekly-schedule' ),
						'type'     => 'text',
						'default'  => __( 'Classes and Office Hours', 'faculty-weekly-schedule' ),
					),
					array(
						'field_id' => 'fws_online_header',
						'title'    => __( 'Online Classes Heading', 'faculty-weekly-schedule' ),
						'type'     => 'text',
						'default'  => __( 'Online Classes', 'faculty-weekly-schedule' ),
					),
				),
			), // Headings Text.
			array(
				'field_id' => 'fws_schedule_heading_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Schedule Heading Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the background and text colors for the display of the schedule heading.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_header_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_schedule_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Schedule Heading Colors.
			array(
				'field_id' => 'fws_classes_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Classes and Office Hours Heading Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the background and text colors for the display of the classes and office hours heading.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_classes_header_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_classes_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Classes and Office Hours Heading Colors.
			array(
				'field_id' => 'fws_online_classes_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Online Classes Heading Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the text colors for display headings of the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_online_header_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_online_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Online Classes Heading Colors.
			array(
				'field_id' => 'fws_dow_classes_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Day of Week Heading Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the text colors for day of the week display headings of the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_dow_header_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_dow_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Days of Week Heading Colors.
		);

	}

}

new FWS_Settings_Headings(
	null,                                           // meta box id - passing null will make it auto generate.
	__( 'Schedule Headings Defaults', 'faculty-weekly-schedule' ), // title.
	array( 'fws_settings_page' => array( 'fws_headings_tab' ) ),
	'normal',                                         // context.
	'default'                                       // priority.
);
