<?php
/**
 * Creates options metabox for a schedule
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
 * [Description FWS_Schedule_Options_Metabox]
 */
class FWS_Schedule_Options_Metabox extends FacultyWeeklySchedule_AdminPageFramework_MetaBox {

	/**
	 * Use the setUp() method to define settings of this meta box.
	 *
	 * @return void
	 */
	public function setUp() {
		/**
		 * Adds setting fields in the meta box.
		 */
		$now       = strtotime( 'now' );
		$a_options = get_option( 'FWS_Settings', array() );
		if ( isset( $a_options['fws_schedule_options']['showname'] ) ) {
			$showname = '1' === $a_options['fws_schedule_options']['showname'];
		} else {
			$showname = false;
		}
		if ( isset( $a_options['fws_schedule_options']['title'] ) ) {
			$title = '1' === $a_options['fws_schedule_options']['title'];
		} else {
			$title = false;
		}
		if ( isset( $a_options['fws_schedule_options']['colors'] ) ) {
			$colors = '1' === $a_options['fws_schedule_options']['colors'];
		} else {
			$colors = false;
		}
		if ( isset( $a_options['fws_schedule_options']['padding'] ) ) {
			$padding = '1' === $a_options['fws_schedule_options']['padding'];
		} else {
			$padding = false;
		}
		if ( isset( $a_options['fws_schedule_options']['colgap'] ) ) {
			$colgap = '1' === $a_options['fws_schedule_options']['colgap'];
		} else {
			$colgap = false;
		}
		if ( isset( $a_options['fws_schedule_options']['break'] ) ) {
			$break = '1' === $a_options['fws_schedule_options']['break'];
		} else {
			$break = false;
		}
		if ( isset( $a_options['fws_schedule_options']['schedule'] ) ) {
			$schedule = '1' === $a_options['fws_schedule_options']['schedule'];
		} else {
			$schedule = false;
		}
		$fws_padding_size = ( isset( $a_options['fws_padding']['fws_padding_size'] ) ) ? $a_options['fws_padding']['fws_padding_size'] : '0.5';
		$fws_padding_unit = ( isset( $a_options['fws_padding']['fws_padding_unit'] ) ) ? $a_options['fws_padding']['fws_padding_unit'] : 'em';

		$fws_block_padding_size = ( isset( $a_options['fws_block_padding']['fws_padding_size'] ) ) ? $a_options['fws_block_padding']['fws_padding_size'] : '0.25';
		$fws_block_padding_unit = ( isset( $a_options['fws_block_padding']['fws_padding_unit'] ) ) ? $a_options['fws_block_padding']['fws_padding_unit'] : 'em';

		$fws_colgap_size = ( isset( $a_options['fws_colgap']['fws_colgap_size'] ) ) ? $a_options['fws_colgap']['fws_colgap_size'] : '0.5';
		$fws_colgap_unit = ( isset( $a_options['fws_colgap']['fws_colgap_unit'] ) ) ? $a_options['fws_colgap']['fws_colgap_unit'] : 'em';

		$fws_photo_display   = ( isset( $a_options['fws_photo_display'][0] ) ) ? $a_options['fws_photo_display'][0] : 'thumbnail';
		$fws_show_photo      = ( isset( $a_options['fws_photo_display'][1] ) ) ? ( '1' === $a_options['fws_photo_display'][1] ) : 'thumbnail';
		$fws_photo_placement = ( isset( $a_options['fws_photo_display'][2] ) ) ? $a_options['fws_photo_display'][2] : 'thumbnail';

		$fws_schedule_title_color_background = ( isset( $a_options['fws_title_colors']['fws_schedule_title_color_background'] ) ) ? $a_options['fws_title_colors']['fws_schedule_title_color_background'] : '';
		$fws_schedule_title_color_text       = ( isset( $a_options['fws_title_colors']['fws_schedule_title_color_text'] ) ) ? $a_options['fws_title_colors']['fws_schedule_title_color_text'] : '';

		$fws_schedule_background_color_background = ( isset( $a_options['fws_schedule_background_colors']['fws_schedule_background_color_background'] ) ) ? $a_options['fws_schedule_background_colors']['fws_schedule_background_color_background'] : '';
		$fws_schedule_background_color_text       = ( isset( $a_options['fws_schedule_background_colors']['fws_schedule_background_color_text'] ) ) ? $a_options['fws_schedule_background_colors']['fws_schedule_background_color_text'] : '';

		$fws_alignment = ( isset( $a_options['fws_alignment'] ) ) ? $a_options['fws_alignment'] : '';

		$fws_alignment = ( isset( $a_options['fws_schedule_date_time']['fws_schedule_date'] ) ) ? $a_options['fws_schedule_date_time']['fws_schedule_date'] : 'site';

		$fws_schedule_date = ( isset( $a_options['fws_schedule_date_time']['fws_schedule_date'] ) ) ? $a_options['fws_schedule_date_time']['fws_schedule_date'] : 'site';
		$fws_schedule_time = ( isset( $a_options['fws_schedule_date_time']['fws_schedule_time'] ) ) ? $a_options['fws_schedule_date_time']['fws_schedule_time'] : 'site';

		$fws_block_date = ( isset( $a_options['fws_block_date_time']['fws_block_date'] ) ) ? $a_options['fws_block_date_time']['fws_block_date'] : 'site';
		$fws_block_time = ( isset( $a_options['fws_block_date_time']['fws_block_time'] ) ) ? $a_options['fws_block_date_time']['fws_block_time'] : 'site';

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
					'showname' => $showname,
					'title'    => $title,
					'colors'   => $colors,
					'padding'  => $padding,
					'colgap'   => $colgap,
					'break'    => $break,
					'schedule' => $schedule,
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
						'default'  => $fws_padding_size,
					),
					array(
						'field_id' => 'fws_padding_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => $fws_padding_unit,
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
						'default'  => $fws_block_padding_size,
					),
					array(
						'field_id' => 'fws_padding_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => $fws_block_padding_unit,
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
						'default'  => $fws_colgap_size,
					),
					array(
						'field_id' => 'fws_colgap_unit',
						'type'     => 'select',
						'label'    => array(
							'px'  => 'px',
							'em'  => 'em',
							'rem' => 'rem',
						),
						'default'  => $fws_colgap_unit,
					),
				),
			), // Column gap.
			array(
				'field_id' => 'fws_photo_display',
				'type'     => 'select',
				'tip'      => __( 'Select the desired size and position to display the photograph.', 'faculty-weekly-schedule' ),
				'title'    => __( 'Photograph Display', 'faculty-weekly-schedule' ),
				'default'  => $fws_photo_display,
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
					'default'  => $fws_show_photo,
				),
				array(
					'field_id' => 'fws_photo_placement',
					'type'     => 'select',
					'label'    => array(
						'above' => __( 'Above Schedule', 'faculty-weekly-schedule' ),
						'below' => __( 'Below Schedule', 'faculty-weekly-schedule' ),
						'after' => __( 'Below After Message', 'faculty-weekly-schedule' ),
					),
					'default'  => $fws_photo_placement,
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
						'default'  => $fws_schedule_title_color_background,
					),
					array(
						'field_id' => 'fws_schedule_title_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_schedule_title_color_text,
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
						'default'  => $fws_schedule_background_color_background,
					),
					array(
						'field_id' => 'fws_schedule_background_color_text',
						'title'    => __( 'Text Color', 'faculty-weekly-schedule' ),
						'type'     => 'color',
						'default'  => $fws_schedule_background_color_text,
					),
				),
			), // Schedule Background Colors.
			array(
				'field_id' => 'fws_alignment',
				'type'     => 'radio',
				'title'    => __( 'Alignment', 'faculty-weekly-schedule' ),
				'tip'      => __( 'Choose whether the content of the schedule should be full width or wide width, left/center/right aligned or have no alignment', 'faculty-weekly-schedule' ),
				'default'  => $fws_alignment,
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
						'default'  => $fws_schedule_date,
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
						'default'  => $fws_schedule_time,
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
						'default'  => $fws_block_date,
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
						'default'  => $fws_block_time,
					),
				),
			), // Block Date/Time format.
		);
	}
}
new FWS_Schedule_Options_Metabox(
	null,   // meta box ID - can be null.
	__( 'Schedule Options', 'faculty-weekly-schedule' ), // title.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'], // post type slugs: post, page, etc.
	'normal',                                      // context.
	'low'                                          // priority.
);
