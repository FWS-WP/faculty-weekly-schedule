<?php
/**
 * Creates office hours metabox in a schedule
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
 * [Description FWS_Schedule_Office_Hours]
 */
class FWS_Schedule_Office_Hours extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$a_options                         = get_option( 'FWS_Settings', array() );
		$fws_start_time_hours              = ( isset( $a_options['fws_office_hours_times']['fws_start_time'][0] ) ) ? $a_options['fws_office_hours_times']['fws_start_time'][0] : '12';
		$fws_start_time_minutes            = ( isset( $a_options['fws_office_hours_times']['fws_start_time'][1] ) ) ? $a_options['fws_office_hours_times']['fws_start_time'][1] : '30';
		$fws_start_time_ampm               = ( isset( $a_options['fws_office_hours_times']['fws_start_time'][2] ) ) ? $a_options['fws_office_hours_times']['fws_start_time'][2] : 'PM';
		$fws_end_time_hours                = ( isset( $a_options['fws_office_hours_times']['fws_end_time'][0] ) ) ? $a_options['fws_office_hours_times']['fws_end_time'][0] : '02';
		$fws_end_time_minutes              = ( isset( $a_options['fws_office_hours_times']['fws_end_time'][1] ) ) ? $a_options['fws_office_hours_times']['fws_end_time'][1] : '30';
		$fws_end_time_ampm                 = ( isset( $a_options['fws_office_hours_times']['fws_end_time'][2] ) ) ? $a_options['fws_office_hours_times']['fws_end_time'][2] : 'PM';
		$fws_office_hours_title            = ( isset( $a_options['fws_office_hours_title'] ) ) ? $a_options['fws_office_hours_title'] : '';
		$fws_office_hours_campus           = ( isset( $a_options['fws_office_hours_campus'] ) ) ? $a_options['fws_office_hours_campus'] : '';
		$fws_office_hours_location         = ( isset( $a_options['fws_office_hours_location'] ) ) ? $a_options['fws_office_hours_location'] : '';
		$fws_office_hours_background_color = ( isset( $a_options['fws_office_hours_background_color'] ) ) ? $a_options['fws_office_hours_background_color'] : '';
		$fws_office_hours_text_color       = ( isset( $a_options['fws_office_hours_text_color'] ) ) ? $a_options['fws_office_hours_text_color'] : '';

		$this->addSettingFields(
			array(
				'field_id'   => 'fws_office_hours_block',
				'title'      => __( 'Office Hours Block', 'faculty-weekly-schedule' ),
				'tip'        => __( 'Select the \'+\' button to add multiple Office Hours blocks.', 'faculty-weekly-schedule' ),
				'type'       => 'inline_mixed',
				'repeatable' => true,
				'sortable'   => true,
				'content'    => array(
					array(
						'field_id'   => 'fws_start_time',
						'title'      => __( 'Start Time', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the minutes, hours and AM/PM start time of this Office Hours block.', 'faculty-weekly-schedule' ),
						'type'       => 'select',
						'label'      => array(
							'12' => '12',
							'01' => '1',
							'02' => '2',
							'03' => '3',
							'04' => '4',
							'05' => '5',
							'06' => '6',
							'07' => '7',
							'08' => '8',
							'09' => '9',
							'10' => '10',
							'11' => '11',
						),
						'attributes' => array(
							'field' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
						'default'    => $fws_start_time_hours,
						array(
							'label'   => array(
								'00' => '00',
								'05' => '05',
								'10' => '10',
								'15' => '15',
								'20' => '20',
								'25' => '25',
								'30' => '30',
								'35' => '35',
								'40' => '40',
								'45' => '45',
								'50' => '50',
								'55' => '55',
							),
							'default' => $fws_start_time_minutes,
						), // Minutes.
						array(
							'label'   => array(
								'AM' => 'AM',
								'PM' => 'PM',
							),
							'default' => $fws_start_time_ampm,
						), // AM/PM.
					), // Start Time.
					array(
						'field_id'   => 'fws_end_time',
						'title'      => __( 'End Time', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the minutes, hours and AM/PM end time of this Office Hours block.', 'faculty-weekly-schedule' ),
						'type'       => 'select',
						'label'      => array(
							'12' => '12',
							'01' => '1',
							'02' => '2',
							'03' => '3',
							'04' => '4',
							'05' => '5',
							'06' => '6',
							'07' => '7',
							'08' => '8',
							'09' => '9',
							'10' => '10',
							'11' => '11',
						),
						'default'    => $fws_end_time_hours,
						'attributes' => array(
							'field' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
						array(
							'label'   => array(
								'00' => '00',
								'05' => '05',
								'10' => '10',
								'15' => '15',
								'20' => '20',
								'25' => '25',
								'30' => '30',
								'35' => '35',
								'40' => '40',
								'45' => '45',
								'50' => '50',
								'55' => '55',
							),
							'default' => $fws_end_time_minutes,
						), // Minutes.
						array(
							'label'   => array(
								'AM' => 'AM',
								'PM' => 'PM',
							),
							'default' => $fws_end_time_ampm,
						), // AM/PM.
					), // End Time.
					array(
						'field_id'   => 'fws_start_date',
						'type'       => 'date',
						'title'      => __( 'Start Date', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the start date of this Office Hours block.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
					), // Start Date.
					array(
						'field_id'   => 'fws_end_date',
						'type'       => 'date',
						'title'      => __( 'End Date', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the end date of this Office Hours block.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
					), // End Date.
					array(
						'field_id'   => 'fws_office_hours_title',
						'type'       => 'text',
						'title'      => __( 'Block Title', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the title of the block.', 'faculty-weekly-schedule' ),
						'default'    => $fws_office_hours_title,
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
					), // Office Hours Title.
					array(
						'field_id'   => 'fws_office_hours_campus',
						'type'       => 'text',
						'title'      => __( 'Campus', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the campus where this Office Hours block will take place.', 'faculty-weekly-schedule' ),
						'default'    => $fws_office_hours_campus,
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
							'size'     => 20,
						),
					), // Campus.
					array(
						'field_id' => 'fws_office_hours_location',
						'type'     => 'text',
						'title'    => __( 'Location', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Enter the location where this Office Hours block will take place.', 'faculty-weekly-schedule' ),
						'default'  => $fws_office_hours_location,
					), // Location.
					array(
						'field_id' => 'fws_office_hours_background_color',
						'type'     => 'color',
						'tip'      => __( 'Select the background color of the Office Hours block.', 'faculty-weekly-schedule' ),
						'title'    => __( 'Office Hours Background Color', 'faculty-weekly-schedule' ),
						'default'  => $fws_office_hours_background_color,
					), // Class Background Color.
					array(
						'field_id' => 'fws_office_hours_text_color',
						'type'     => 'color',
						'title'    => __( 'Office Hours Text Color', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Select the text color of the Office Hours block.', 'faculty-weekly-schedule' ),
						'default'  => $fws_office_hours_text_color,
					), // Class Text Color.
					array(
						'field_id'   => 'fws_day_of_week',
						'type'       => 'select',
						'title'      => __( 'Day of Week', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the day of the week for this Office Hours block.', 'faculty-weekly-schedule' ),
						'label'      => array(
							0 => __( 'Monday', 'faculty-weekly-schedule' ),
							1 => __( 'Tuesday', 'faculty-weekly-schedule' ),
							2 => __( 'Wednesday', 'faculty-weekly-schedule' ),
							3 => __( 'Thursday', 'faculty-weekly-schedule' ),
							4 => __( 'Friday', 'faculty-weekly-schedule' ),
							5 => __( 'Saturday', 'faculty-weekly-schedule' ),
							6 => __( 'Sunday', 'faculty-weekly-schedule' ),
						),
						'attributes' => array(
							'select' => array(
								'size'     => 5,
								'multiple' => 'multiple',
							),
						),
					), // Day of week.
				),
			)
		);
	}
}
new FWS_Schedule_Office_Hours(
	null,   // meta box ID - can be null.
	__( 'Office Hours Information', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
