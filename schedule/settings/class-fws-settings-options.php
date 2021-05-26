<?php
/**
 * Creates options metabox in settings
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
 * [Description FWS_Settings_Options]
 */
class FWS_Settings_Options extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {

		/**
		 * Adds setting fields in the meta box.
		 */
		$now = strtotime( 'now' );
		$this->addSettingFields(
			array(
				'field_id' => 'fws_schedule_options',
				'type'     => 'checkbox',
				'title'    => __( 'Display Options', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Check the desired elements to display.', 'faculty-weekly-schedule' ),
				'label'    => array(
					'showname' => __( 'Show Name', 'faculty-weekly-schedule' ),
					'title'    => __( 'Show Title', 'faculty-weekly-schedule' ),
					'colors'   => __( 'Use Title Colors', 'faculty-weekly-schedule' ),
					'padding'  => __( 'Use Padding', 'faculty-weekly-schedule' ),
					'colgap'   => __( 'Use Column Gap', 'faculty-weekly-schedule' ),
					'break'    => __( 'Break Long Lines', 'faculty-weekly-schedule' ),
					'schedule' => __( 'Use Schedule Background Colors', 'faculty-weekly-schedule' ),
				),
				'default'  => array(
					'showname' => true,
					'title'    => true,
					'colors'   => false,
					'padding'  => false,
					'colgap'   => false,
					'break'    => false,
					'schedule' => false,
				),
			), // Schedule options.
			array(
				'field_id' => 'fws_padding',
				'type'     => 'inline_mixed',
				'title'    => __( 'Schedule Padding', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the amount of padding for content in the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_padding_size',
						'type'     => 'text',
						'default'  => '0.5', // 0 means the first item.
					),
					array(
						'field_id' => 'fws_padding_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => 'em', // 0 means the first item.
					),
				),
			), // Schedule padding.
			array(
				'field_id' => 'fws_block_padding',
				'type'     => 'inline_mixed',
				'title'    => __( 'Block Padding', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the amount of padding for a block in the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_padding_size',
						'type'     => 'text',
						'default'  => '0.25', // 0 means the first item.
					),
					array(
						'field_id' => 'fws_padding_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => 'em', // 0 means the first item.
					),
				),
			), // Block padding.
			array(
				'field_id' => 'fws_colgap',
				'type'     => 'inline_mixed',
				'title'    => __( 'Column Gap', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the gap amount between columns in the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_colgap_size',
						'type'     => 'text',
						'default'  => '0.5', // 0 means the first item.
					),
					array(
						'field_id' => 'fws_colgap_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => 'em', // 0 means the first item.
					),
				),
			), // Column gap.
			array(
				'field_id' => 'fws_photo_display',
				'type'     => 'select',
				'tip'      => __( 'Select the desired size and position to display the photograph.', 'faculty-weekly-schedule' ),
				'title'    => __( 'Photograph Display', 'faculty-weekly-schedule' ),
				'default'  => 'thumbnail', // 0 means the first item.
				'label'    => array(
					'thumbnail'    => __( 'Thumbnail', 'faculty-weekly-schedule' ),
					'medium'       => __( 'Medium', 'faculty-weekly-schedule' ),
					'medium_large' => __( 'Medium Large', 'faculty-weekly-schedule' ),
					'large'        => __( 'Large', 'faculty-weekly-schedule' ),
				),
				array(
					'field_id' => 'fws_show_photo',
					'type'     => 'checkbox',
					'label'    => __( 'Show Photograph', 'faculty-weekly-schedule' ),
					'default'  => false,
				),
				array(
					'field_id' => 'fws_photo_placement',
					'type'     => 'select',
					'label'    => array(
						'above' => __( 'Above Schedule', 'faculty-weekly-schedule' ),
						'below' => __( 'Below Schedule', 'faculty-weekly-schedule' ),
						'after' => __( 'Below After Message', 'faculty-weekly-schedule' ),
					),
				),
			), // Photo display.
			array(
				'field_id' => 'fws_title_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Title Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the background and text colors for the title of the schedule.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_title_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_schedule_title_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Title Colors.
			array(
				'field_id' => 'fws_schedule_background_colors',
				'type'     => 'inline_mixed',
				'title'    => __( 'Schedule Background Colors', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the background and text colors for the background of the schedule heading.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_background_color_background',
						'title'    => __( 'Background Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
					array(
						'field_id' => 'fws_schedule_background_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => '',
					),
				),
			), // Schedule Background Colors.
			array(
				'field_id' => 'fws_alignment',
				'type'     => 'radio',
				'title'    => __( 'Alignment', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Choose whether the content of the schedule should be full width or wide width, left/center/right aligned or have no alignment', 'faculty-weekly-schedule' ),
				'default'  => 'wide',
				'label'    => array(
					'wide'   => __( 'Wide', 'faculty-weekly-schedule' ),
					'full'   => __( 'Full', 'faculty-weekly-schedule' ),
					'center' => __( 'Center', 'faculty-weekly-schedule' ),
					'left'   => __( 'Left', 'faculty-weekly-schedule' ),
					'right'  => __( 'Right', 'faculty-weekly-schedule' ),
					'none'   => __( 'None', 'faculty-weekly-schedule' ),
				),
			), // Alignment.
			array(
				'field_id' => 'fws_schedule_date_time',
				'type'     => 'inline_mixed',
				'title'    => __( 'Schedule Date and Time Format', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the date and time format for the schedule start and end date and time.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_schedule_date',
						'type'     => 'select',
						'label'    => array(
							'F j, Y' => __( 'F j, Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'F j, Y', $now ),
							'Y-m-d'  => __( 'Y-m-d', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'Y-m-d', $now ),
							'm/d/Y'  => __( 'm/d/Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'm/d/Y', $now ),
							'd/m/Y'  => __( 'd/m/Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'd/m/Y', $now ),
							'site'   => 'Site Settings',
						),
						'default'  => 'site', // 0 means the first item.
					),
					array(
						'field_id' => 'fws_schedule_time',
						'type'     => 'select',
						'label'    => array(
							'g:i a' => __( 'g:i a', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'g:i a', $now ),
							'g:i A' => __( 'g:i A', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'g:i A', $now ),
							'H:i'   => __( 'H:i', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'H:i', $now ),
							'site'  => 'Site Settings',
						),
						'default'  => 'site', // 0 means the first item.
					),
				),
			), // Schedule Date/Time format.
			array(
				'field_id' => 'fws_block_date_time',
				'type'     => 'inline_mixed',
				'title'    => __( 'Block Date and Time Format', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Enter the date and time format for the schedule block start and end date and time.', 'faculty-weekly-schedule' ),
				'content'  => array(
					array(
						'field_id' => 'fws_block_date',
						'type'     => 'select',
						'label'    => array(
							'F j, Y' => __( 'F j, Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'F j, Y', $now ),
							'Y-m-d'  => __( 'Y-m-d', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'Y-m-d', $now ),
							'm/d/Y'  => __( 'm/d/Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'm/d/Y', $now ),
							'd/m/Y'  => __( 'd/m/Y', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'd/m/Y', $now ),
							'site'   => 'Site Settings',
						),
						'default'  => 'site', // 0 means the first item.
					),
					array(
						'field_id' => 'fws_block_time',
						'type'     => 'select',
						'label'    => array(
							'g:i a' => __( 'g:i a', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'g:i a', $now ),
							'g:i A' => __( 'g:i A', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'g:i A', $now ),
							'H:i'   => __( 'H:i', 'faculty-weekly-schedule' ) . __( ' - e.g. ', 'faculty-weekly-schedule' ) . wp_date( 'H:i', $now ),
							'site'  => 'Site Settings',
						),
						'default'  => 'site', // 0 means the first item.
					),
				),
			), // Block Date/Time format.
		);

	}

}

new FWS_Settings_Options(
	null,                                           // meta box id - passing null will make it auto generate.
	__( 'Schedule Options Defaults', 'faculty-weekly-schedule' ), // title.
	array( 'fws_settings_page' => array( 'fws_options_tab' ) ),
	'normal',                                         // context.
	'default'                                       // priority.
);
