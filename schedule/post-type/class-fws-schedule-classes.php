<?php
/**
 * Creates Classes metabox in a schedule
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
 * [Description FWS_Schedule_Classes]
 */
class FWS_Schedule_Classes extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {
	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$a_options                    = get_option( 'FWS_Settings', array() );
		$fws_start_time_hours         = ( isset( $a_options['fws_classes_times']['fws_start_time'][0] ) ) ? $a_options['fws_classes_times']['fws_start_time'][0] : '11';
		$fws_start_time_minutes       = ( isset( $a_options['fws_classes_times']['fws_start_time'][1] ) ) ? $a_options['fws_classes_times']['fws_start_time'][1] : '00';
		$fws_start_time_ampm          = ( isset( $a_options['fws_classes_times']['fws_start_time'][2] ) ) ? $a_options['fws_classes_times']['fws_start_time'][2] : 'AM';
		$fws_end_time_hours           = ( isset( $a_options['fws_classes_times']['fws_end_time'][0] ) ) ? $a_options['fws_classes_times']['fws_end_time'][0] : '12';
		$fws_end_time_minutes         = ( isset( $a_options['fws_classes_times']['fws_end_time'][1] ) ) ? $a_options['fws_classes_times']['fws_end_time'][1] : '15';
		$fws_end_time_ampm            = ( isset( $a_options['fws_classes_times']['fws_end_time'][2] ) ) ? $a_options['fws_classes_times']['fws_end_time'][2] : 'PM';
		$fws_classes_campus           = ( isset( $a_options['fws_classes_campus'] ) ) ? $a_options['fws_classes_campus'] : '';
		$fws_classes_location         = ( isset( $a_options['fws_classes_location'] ) ) ? $a_options['fws_classes_location'] : '';
		$fws_classes_background_color = ( isset( $a_options['fws_classes_background_color'] ) ) ? $a_options['fws_classes_background_color'] : '';
		$fws_classes_text_color       = ( isset( $a_options['fws_classes_text_color'] ) ) ? $a_options['fws_classes_text_color'] : '';

		$this->addSettingFields(
			array(
				'field_id'   => 'fws_classes_block',
				'title'      => __( 'Classes Block', 'faculty-weekly-schedule' ),
				'tip'        => __( 'Select the \'+\' button to add multiple Classes blocks.', 'faculty-weekly-schedule' ),
				'type'       => 'inline_mixed',
				'repeatable' => true,
				'sortable'   => true,
				'content'    => array(
					array(
						'field_id'   => 'fws_start_time',
						'title'      => __( 'Start Time', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the minutes, hours and AM/PM start time of this class.', 'faculty-weekly-schedule' ),
						'type'       => 'select',
						'default'    => $fws_start_time_hours,
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
						'tip'        => __( 'Select the minutes, hours and AM/PM end time of this Class block.', 'faculty-weekly-schedule' ),
						'default'    => $fws_end_time_hours,
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
							'label'   => array( 'AM', 'PM' ),
							'default' => $fws_end_time_ampm,
						), // AM/PM.
					), // End Time.
					array(
						'field_id'   => 'fws_start_date',
						'type'       => 'date',
						'title'      => __( 'Start Date', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Select the start date of this class.', 'faculty-weekly-schedule' ),
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
						'tip'        => __( 'Select the end date of this class.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
					), // End Date.
					array(
						'field_id'   => 'fws_course_number',
						'type'       => 'text',
						'title'      => __( 'Course Number/Name', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the course number or course name of the class.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 10%; margin-right: 1%;',
							),
							'size'     => 10,
						),
					), // Course Number/Name.
					array(
						'field_id'   => 'fws_course_title',
						'type'       => 'text',
						'title'      => __( 'Course Title', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the course title of the class.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
						),
					), // Course Title.
					array(
						'field_id'   => 'fws_reference_number',
						'type'       => 'text',
						'title'      => __( 'Reference/Section Number', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the reference or section number of the class.', 'faculty-weekly-schedule' ),
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 10%; margin-right: 1%;',
							),
							'size'     => 10,
						),
					), // Reference/Section Number.
					array(
						'field_id'   => 'fws_classes_campus',
						'type'       => 'text',
						'title'      => __( 'Campus', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the campus where this class will take place.', 'faculty-weekly-schedule' ),
						'default'    => $fws_classes_campus,
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 15%; margin-right: 1%;',
							),
							'size'     => 20,
						),
					), // Campus.
					array(
						'field_id'   => 'fws_classes_location',
						'type'       => 'text',
						'title'      => __( 'Location', 'faculty-weekly-schedule' ),
						'tip'        => __( 'Enter the location where this class will take place.', 'faculty-weekly-schedule' ),
						'default'    => $fws_classes_location,
						'attributes' => array(
							'fieldset' => array(
								'style' => 'width: 10%; margin-right: 1%;',
							),
							'size'     => 10,
						),
					), // Location.
					array(
						'field_id' => 'fws_online_class',
						'title'    => __( 'Online Class', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Check to indicate that the class is an online class. If checked the location and class days are ignored.', 'faculty-weekly-schedule' ),
						'type'     => 'checkbox',
						'label'    => __( 'Yes', 'faculty-weekly-schedule' ),
					), // Online Class.
					array(
						'field_id' => 'fws_class_background_color',
						'type'     => 'color',
						'tip'      => __( 'Select the background color of the class.', 'faculty-weekly-schedule' ),
						'title'    => __( 'Class Background Color', 'faculty-weekly-schedule' ),
						'default'  => $fws_classes_background_color,
					), // Class Background Color.
					array(
						'field_id' => 'fws_class_text_color',
						'type'     => 'color',
						'title'    => __( 'Class Text Color', 'faculty-weekly-schedule' ),
						'tip'      => __( 'Select the text color of the class.', 'faculty-weekly-schedule' ),
						'default'  => $fws_classes_text_color,
					), // Class Text Color.
					array(
						'field_id'    => 'fws_class_days',
						'type'        => 'select',
						'title'       => __( 'Class Days', 'faculty-weekly-schedule' ),
						'tip'         => __( 'Select the days the class meets.', 'faculty-weekly-schedule' ),
						'description' => __( 'Hold down the <code>Ctrl/Cmd</code> key to select multiple days.', 'faculty-weekly-schedule' ),
						'attributes'  => array(
							'fieldset' => array(
								'style' => 'width: 5%; margin-right: 1%;',
							),
						),
						'label'       => array(
							__( 'Monday', 'faculty-weekly-schedule' ),
							__( 'Tuesday', 'faculty-weekly-schedule' ),
							__( 'Wednesday', 'faculty-weekly-schedule' ),
							__( 'Thursday', 'faculty-weekly-schedule' ),
							__( 'Friday', 'faculty-weekly-schedule' ),
							__( 'Saturday', 'faculty-weekly-schedule' ),
							__( 'Sunday', 'faculty-weekly-schedule' ),
						),
						'attributes'  => array(
							'select' => array(
								'size'     => 5,
								'multiple' => 'multiple',
							),
						),
					), // Class Days.
				),
			)
		);
	}
}
new FWS_Schedule_Classes(
	null,   // meta box ID - can be null.
	__( 'Classes Information', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
