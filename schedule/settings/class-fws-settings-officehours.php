<?php
/**
 * Creates office hours metabox in settings
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
 * [Description FWS_Settings_OfficeHours]
 */
class FWS_Settings_OfficeHours extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

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
				'field_id' => 'fws_office_hours_times',
				'type'     => 'inline_mixed',
				'content'  => array(
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
						'default'    => '12',
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
							'default' => '30',
						), // Minutes.
						array(
							'label'   => array(
								'AM' => 'AM',
								'PM' => 'PM',
							),
							'default' => 'PM',
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
						'default'    => '02',
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
							'default' => '30',
						), // Minutes.
						array(
							'label'   => array(
								'AM' => 'AM',
								'PM' => 'PM',
							),
							'default' => 'PM',
						), // AM/PM.
					), // End Time.
				),
			), // Start and End Times.
			array(
				'field_id'   => 'fws_office_hours_title',
				'type'       => 'text',
				'title'      => __( 'Block Title', 'faculty-weekly-schedule' ),
				'tip'        => __( 'Enter the title of the block.', 'faculty-weekly-schedule' ),
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
			), // Location.
			array(
				'field_id' => 'fws_office_hours_background_color',
				'type'     => 'color',
				'tip'      => __( 'Select the background color of the Office Hours block.', 'faculty-weekly-schedule' ),
				'title'    => __( 'Office Hours Background Color', 'faculty-weekly-schedule' ),
				'default'  => '',
			), // Class Background Color.
			array(
				'field_id' => 'fws_office_hours_text_color',
				'type'     => 'color',
				'title'    => __( 'Office Hours Text Color', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Select the text color of the Office Hours block.', 'faculty-weekly-schedule' ),
				'default'  => '',
			), // Class Text Color.
		);

	}

}

new FWS_Settings_OfficeHours(
	null,                                           // meta box id - passing null will make it auto generate.
	__( 'Office Hours Default Options', 'faculty-weekly-schedule' ), // title.
	array( 'fws_settings_page' => array( 'fws_office_hours_tab' ) ),
	'normal',                                         // context.
	'default'                                       // priority.
);
