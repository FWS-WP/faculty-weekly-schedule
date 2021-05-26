<?php
/**
 * Creates messages metabox in a schedule
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
 * [Description FWS_Schedule_Messages]
 */
class FWS_Schedule_Messages extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$a_options                  = get_option( 'FWS_Settings', array() );
		$fws_before_message_display = ( isset( $a_options['fws_before_message_display'] ) ) ? intval( $a_options['fws_before_message_display'] ) : 0;
		$fws_before_alignment       = ( isset( $a_options['fws_before_alignment'] ) ) ? $a_options['fws_before_alignment'] : 'none';
		$fws_before_message         = ( isset( $a_options['fws_before_message'] ) ) ? $a_options['fws_before_message'] : '';
		$fws_after_message_display  = ( isset( $a_options['fws_after_message_display'] ) ) ? intval( $a_options['fws_after_message_display'] ) : 0;
		$fws_after_alignment        = ( isset( $a_options['fws_after_alignment'] ) ) ? $a_options['fws_after_alignment'] : 'none';
		$fws_after_message          = ( isset( $a_options['fws_after_message'] ) ) ? $a_options['fws_after_message'] : '';

		$this->addSettingFields(
			array(
				'field_id'        => 'fws_before_message_display',
				'type'            => 'radio',
				'title'           => __( 'Show Before Message', 'faculty-weekly-schedule' ),
				'tip'             => __( 'Choose whether the before message should be displayed in the schedule', 'faculty-weekly-schedule' ),
				'label'           => array(
					1 => __( 'Yes', 'faculty-weekly-schedule' ),
					0 => __( 'No', 'faculty-weekly-schedule' ),
				),
				'label_min_width' => '40px',
				'default'         => $fws_before_message_display,
			), // Show before message.
			array(
				'field_id' => 'fws_before_alignment',
				'type'     => 'radio',
				'title'    => __( 'Before Message Alignment', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Choose whether the before message should be aligned left, right, center, justified or have no alignment', 'faculty-weekly-schedule' ),
				'label'    => array(
					'left'    => __( 'Left', 'faculty-weekly-schedule' ),
					'center'  => __( 'Center', 'faculty-weekly-schedule' ),
					'right'   => __( 'Right', 'faculty-weekly-schedule' ),
					'justify' => __( 'Justified', 'faculty-weekly-schedule' ),
					'none'    => __( 'None', 'faculty-weekly-schedule' ),
				),
				'default'  => $fws_before_alignment,
			), // Before message alignment.
			array(
				'field_id' => 'fws_before_message',
				'type'     => 'textarea',
				'rich'     => true,
				'tip'      => __( 'Enter the content to be displayed before the schedule.', 'faculty-weekly-schedule' ),
				'title'    => __( 'Before Message', 'faculty-weekly-schedule' ),
				'default'  => $fws_before_message,
			), // Before message.
			array(
				'field_id'        => 'fws_after_message_display',
				'type'            => 'radio',
				'title'           => __( 'Show After Message', 'faculty-weekly-schedule' ),
				'tip'             => __( 'Choose whether the after message should be displayed in the schedule', 'faculty-weekly-schedule' ),
				'label'           => array(
					1 => __( 'Yes', 'faculty-weekly-schedule' ),
					0 => __( 'No', 'faculty-weekly-schedule' ),
				),
				'label_min_width' => '40px',
				'default'         => $fws_after_message_display,
			), // Show after message.
			array(
				'field_id' => 'fws_after_alignment',
				'type'     => 'radio',
				'title'    => __( 'After Message Alignment', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Choose whether the after message should be aligned left, right, center, justified or have no alignment', 'faculty-weekly-schedule' ),
				'label'    => array(
					'left'    => __( 'Left', 'faculty-weekly-schedule' ),
					'center'  => __( 'Center', 'faculty-weekly-schedule' ),
					'right'   => __( 'Right', 'faculty-weekly-schedule' ),
					'justify' => __( 'Justified', 'faculty-weekly-schedule' ),
					'none'    => __( 'None', 'faculty-weekly-schedule' ),
				),
				'default'  => $fws_after_alignment,
			), // After message alignment.
			array(
				'field_id' => 'fws_after_message',
				'type'     => 'textarea',
				'rich'     => true,
				'tip'      => __( 'Enter the content to be displayed after the schedule.', 'faculty-weekly-schedule' ),
				'title'    => __( 'After Message', 'faculty-weekly-schedule' ),
				'default'  => $fws_after_message,
			), // After message.
		);
	}
}
new FWS_Schedule_Messages(
	null,   // meta box ID - can be null.
	__( 'Schedule Messages', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
