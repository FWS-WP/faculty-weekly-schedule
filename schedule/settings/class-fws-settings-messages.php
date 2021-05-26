<?php
/**
 * Creates messages metabox for settings
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
 * [Description FWS_Settings_Messages]
 */
class FWS_Settings_Messages extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

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
				'field_id'        => 'fws_before_message_display',
				'type'            => 'radio',
				'title'           => __( 'Show Before Message', 'faculty-weekly-schedule' ),
				'label'           => array(
					1 => __( 'Yes', 'faculty-weekly-schedule' ),
					0 => __( 'No', 'faculty-weekly-schedule' ),
				),
				'label_min_width' => '40px',
				'default'         => 0,
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
				'default'  => 'none',
			), // Before message alignment.
			array(
				'field_id' => 'fws_before_message',
				'type'     => 'textarea',
				'rich'     => true,
				'tip'      => __( 'Enter the content to be displayed before the schedule.', 'faculty-weekly-schedule' ),
				'title'    => __( 'Before Message', 'faculty-weekly-schedule' ),
			), // Before message.
			array(
				'field_id'        => 'fws_after_message_display',
				'type'            => 'radio',
				'title'           => __( 'Show After Message', 'faculty-weekly-schedule' ),
				'label'           => array(
					1 => __( 'Yes', 'faculty-weekly-schedule' ),
					0 => __( 'No', 'faculty-weekly-schedule' ),
				),
				'label_min_width' => '40px',
				'default'         => 0,
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
				'default'  => 'none',
			), // After message alignment.
			array(
				'field_id' => 'fws_after_message',
				'type'     => 'textarea',
				'rich'     => true,
				'tip'      => __( 'Enter the content to be displayed after the schedule.', 'faculty-weekly-schedule' ),
				'title'    => __( 'After Message', 'faculty-weekly-schedule' ),
			), // After message.
		);

	}

}

new FWS_Settings_Messages(
	null,                                           // meta box id - passing null will make it auto generate.
	__( 'Schedule Messages Defaults', 'faculty-weekly-schedule' ), // title.
	array( 'fws_settings_page' => array( 'fws_messages_tab' ) ),
	'normal',                                         // context.
	'default'                                       // priority.
);
