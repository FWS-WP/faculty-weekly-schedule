<?php
/**
 * Class to set up schedule headings metabox.
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
 * [Description FWS_Schedule_Headings]
 */
class FWS_Schedule_Headings extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {
	/**
	 * Use the setUp() method to define settings of this meta box.
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$now       = strtotime( 'now' );
		$a_options = get_option( 'FWS_Settings', array() );
		if ( isset( $a_options['fws_headings_options']['shead'] ) ) {
			$shead = '1' === $a_options['fws_headings_options']['shead'];
		} else {
			$shead = false;
		}
		if ( isset( $a_options['fws_headings_options']['chead'] ) ) {
			$chead = '1' === $a_options['fws_headings_options']['chead'];
		} else {
			$chead = false;
		}
		if ( isset( $a_options['fws_headings_options']['ohead'] ) ) {
			$ohead = '1' === $a_options['fws_headings_options']['ohead'];
		} else {
			$ohead = false;
		}
		if ( isset( $a_options['fws_headings_options']['times'] ) ) {
			$times = '1' === $a_options['fws_headings_options']['times'];
		} else {
			$times = false;
		}

		$fws_schedule_header = ( isset( $a_options['fws_schedule_header']['fws_schedule_header'] ) ) ? $a_options['fws_schedule_header']['fws_schedule_header'] : 'Schedule Dates';
		$fws_classes_header  = ( isset( $a_options['fws_schedule_header']['fws_classes_header'] ) ) ? $a_options['fws_schedule_header']['fws_classes_header'] : 'Classes and Office Hours';
		$fws_online_header   = ( isset( $a_options['fws_schedule_header']['fws_online_header'] ) ) ? $a_options['fws_schedule_header']['fws_online_header'] : 'Online Classes';

		$fws_schedule_header_color_background = ( isset( $a_options['fws_schedule_heading_colors']['fws_schedule_header_color_background'] ) ) ? $a_options['fws_schedule_heading_colors']['fws_schedule_header_color_background'] : '';
		$fws_schedule_header_color_text       = ( isset( $a_options['fws_schedule_heading_colors']['fws_schedule_header_color_text'] ) ) ? $a_options['fws_schedule_heading_colors']['fws_schedule_header_color_text'] : '';

		$fws_classes_header_color_background = ( isset( $a_options['fws_classes_colors']['fws_classes_header_color_background'] ) ) ? $a_options['fws_classes_colors']['fws_classes_header_color_background'] : '';
		$fws_classes_header_color_text       = ( isset( $a_options['fws_classes_colors']['fws_classes_header_color_text'] ) ) ? $a_options['fws_classes_colors']['fws_classes_header_color_text'] : '';

		$fws_online_header_color_background = ( isset( $a_options['fws_online_classes_colors']['fws_online_header_color_background'] ) ) ? $a_options['fws_online_classes_colors']['fws_online_header_color_background'] : '';
		$fws_online_header_color_text       = ( isset( $a_options['fws_online_classes_colors']['fws_online_header_color_text'] ) ) ? $a_options['fws_online_classes_colors']['fws_online_header_color_text'] : '';

		$fws_dow_header_color_background = ( isset( $a_options['fws_dow_classes_colors']['fws_dow_header_color_background'] ) ) ? $a_options['fws_dow_classes_colors']['fws_dow_header_color_background'] : '';
		$fws_dow_header_color_text       = ( isset( $a_options['fws_dow_classes_colors']['fws_dow_header_color_text'] ) ) ? $a_options['fws_dow_classes_colors']['fws_dow_header_color_text'] : '';

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
					'shead' => $shead,
					'chead' => $chead,
					'ohead' => $ohead,
					'times' => $times,
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
						'default'  => $fws_schedule_header,
					),
					array(
						'field_id' => 'fws_classes_header',
						'title'    => __( 'Classes and Office Hours Heading', 'faculty-weekly-schedule' ),
						'type'     => 'text',
						'default'  => $fws_classes_header,
					),
					array(
						'field_id' => 'fws_online_header',
						'title'    => __( 'Online Classes Heading', 'faculty-weekly-schedule' ),
						'type'     => 'text',
						'default'  => $fws_online_header,
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
						'default'  => $fws_schedule_header_color_background,
					),
					array(
						'field_id' => 'fws_schedule_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_schedule_header_color_text,
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
						'default'  => $fws_classes_header_color_background,
					),
					array(
						'field_id' => 'fws_classes_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_classes_header_color_text,
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
						'default'  => $fws_online_header_color_background,
					),
					array(
						'field_id' => 'fws_online_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_online_header_color_text,
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
						'default'  => $fws_dow_header_color_background,
					),
					array(
						'field_id' => 'fws_dow_header_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_dow_header_color_text,
					),
				),
			), // Days of Week Heading Colors.
		);
	}
}
new FWS_Schedule_Headings(
	null,   // meta box ID - can be null.
	__( 'Heading Options', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
