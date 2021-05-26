<?php
/**
 * Help content for examples
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
 * [Description FWS_Schedule_Info]
 */
class FWS_Schedule_Info extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$a_options              = get_option( 'FWS_Settings', array() );
		$fws_start_time_hours   = ( isset( $a_options['fws_schedule_times']['fws_start_time']['hours'] ) ) ? $a_options['fws_schedule_times']['fws_start_time']['hours'] : '12';
		$fws_start_time_minutes = ( isset( $a_options['fws_schedule_times']['fws_start_time']['minutes'] ) ) ? $a_options['fws_schedule_times']['fws_start_time']['minutes'] : '00';
		$fws_start_time_ampm    = ( isset( $a_options['fws_schedule_times']['fws_start_time']['ampm'] ) ) ? $a_options['fws_schedule_times']['fws_start_time']['ampm'] : 'AM';
		$fws_end_time_hours     = ( isset( $a_options['fws_schedule_times']['fws_end_time']['hours'] ) ) ? $a_options['fws_schedule_times']['fws_end_time']['hours'] : '12';
		$fws_end_time_minutes   = ( isset( $a_options['fws_schedule_times']['fws_end_time']['minutes'] ) ) ? $a_options['fws_schedule_times']['fws_end_time']['minutes'] : '00';
		$fws_end_time_ampm      = ( isset( $a_options['fws_schedule_times']['fws_end_time']['ampm'] ) ) ? $a_options['fws_schedule_times']['fws_end_time']['ampm'] : 'AM';
		$fws_faculty_name       = ( isset( $a_options['fws_faculty_information']['fws_faculty_name'] ) ) ? $a_options['fws_faculty_information']['fws_faculty_name'] : '';
		$fws_faculty_title      = ( isset( $a_options['fws_faculty_information']['fws_faculty_title'] ) ) ? $a_options['fws_faculty_information']['fws_faculty_title'] : '';
		$fws_faculty_photo      = ( isset( $a_options['fws_faculty_information']['fws_faculty_photo'] ) ) ? $a_options['fws_faculty_information']['fws_faculty_photo'] : '';
		$this->addSettingFields(
			array(
				'field_id' => 'fws_schedule_dates',
				'type'     => 'inline_mixed',
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_start_date',
						'type'     => 'date',
						'title'    => __( 'Start Date', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Enter the start date of the schedule.', 'faculty-weekly-schedule' ),
					),
					array(
						'field_id' => 'fws_schedule_end_date',
						'type'     => 'date',
						'title'    => __( 'End Date', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Enter the end date of the schedule.', 'faculty-weekly-schedule' ),
					),
				),
			), // Schedule Dates.
			array(
				'field_id' => 'fws_schedule_times',
				'type'     => 'inline_mixed',
				'content'  => array(
					array(
						'field_id' => 'fws_start_time',
						'type'     => 'inline_mixed',
						'title'    => __( 'Start Time', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Select the minutes, hours and AM/PM start time of this schedule.', 'faculty-weekly-schedule' ),
						'content'  => array(
							array(
								'field_id' => 'hours',
								'type'     => 'select',
								'label'    => array(
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
								'default'  => $fws_start_time_hours,
							), // Hours.
							array(
								'field_id' => 'minutes',
								'type'     => 'select',
								'label'    => array(
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
								'default'  => $fws_start_time_minutes,
							), // Minutes.
							array(
								'field_id' => 'ampm',
								'type'     => 'select',
								'label'    => array(
									'AM' => 'AM',
									'PM' => 'PM',
								),
								'default'  => $fws_start_time_ampm,
							), // AM/PM.
						),
					), // Start Time.
					array(
						'field_id' => 'fws_end_time',
						'type'     => 'inline_mixed',
						'title'    => __( 'End Time', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Select the minutes, hours and AM/PM end time of this schedule.', 'faculty-weekly-schedule' ),
						'content'  => array(
							array(
								'field_id' => 'hours',
								'type'     => 'select',
								'label'    => array(
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
								'default'  => $fws_end_time_hours,
							), // Hours.
							array(
								'field_id' => 'minutes',
								'type'     => 'select',
								'label'    => array(
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
								'default'  => $fws_end_time_minutes,
							), // Minutes.
							array(
								'field_id' => 'ampm',
								'type'     => 'select',
								'label'    => array(
									'AM' => 'AM',
									'PM' => 'PM',
								),
								'default'  => $fws_end_time_ampm,
							), // AM/PM.
						),
					), // End Time.
				),
			), // Schedule Times.
			array(
				'field_id' => 'fws_faculty_information',
				'type'     => 'inline_mixed',
				'content'  => array(
					array(
						'field_id'   => 'fws_faculty_name',
						'type'       => 'text',
						'title'      => __( 'Name', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the name of the faculty.', 'faculty-weekly-schedule' ),
						'default'    => $fws_faculty_name,
						'attributes' => array(
							'size' => 30,
						),
					), // Faculty name.
					array(
						'field_id'   => 'fws_faculty_title',
						'type'       => 'text',
						'title'      => __( 'Title', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the title of the faculty.', 'faculty-weekly-schedule' ),
						'default'    => $fws_faculty_title,
						'attributes' => array(
							'size' => 30,
						),
					), // Faculty title.
				),
			), // Faculty Information.
			array(
				'field_id'   => 'fws_faculty_photo',
				'type'       => 'image',
				'title'      => __( 'Photograph', 'faculty-weekly-schedule' ),
				'default'    => $fws_faculty_photo,
				'attributes' => array(
					'input' => array(
						'size' => 10,
					),
				),
			), // Faculty photo.
		);
	}
}
new FWS_Schedule_Info(
	null,   // meta box ID - can be null.
	__( 'Schedule Information', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
