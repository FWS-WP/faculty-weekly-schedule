<?php
/**
 * Creates faculty information metabox in settings
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
 * [Description FWS_Settings_Faculty]
 */
class FWS_Settings_Faculty extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

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
								'default'  => '12',
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
								'default'  => '00',
							), // Minutes.
							array(
								'field_id' => 'ampm',
								'type'     => 'select',
								'label'    => array(
									'AM' => 'AM',
									'PM' => 'PM',
								),
								'default'  => 'AM',
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
								'default'  => '11',
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
								'default'  => '55',
							), // Minutes.
							array(
								'field_id' => 'ampm',
								'type'     => 'select',
								'label'    => array(
									'AM' => 'AM',
									'PM' => 'PM',
								),
								'default'  => 'PM',
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
						'attributes' => array(
							'size' => 30,
						),
					), // Faculty name.
					array(
						'field_id'   => 'fws_faculty_title',
						'type'       => 'text',
						'title'      => __( 'Title', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the title of the faculty.', 'faculty-weekly-schedule' ),
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
				'attributes' => array(
					'input' => array(
						'size' => 10,
					),
				),
			), // Faculty photo.
		);

	}

}

new FWS_Settings_Faculty(
	null,                                           // meta box id - passing null will make it auto generate.
	__( 'Faculty Default Options', 'faculty-weekly-schedule' ), // title.
	array( 'fws_settings_page' => array( 'fws_faculty_tab' ) ),
	'normal',                                         // context.
	'default'                                       // priority.
);
