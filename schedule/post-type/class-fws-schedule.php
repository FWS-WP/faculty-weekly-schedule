<?php
/**
 * Admin Page Framework - Demo
 *
 * Demonstrates the usage of Admin Page Framework.
 *
 * http://admin-page-framework.michaeluno.jp/
 * Copyright (c) 2013-2021, Michael Uno; Licensed GPLv2
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

define(
	'WEEKDAYS',
	array(
		__( 'Monday', 'faculty-weekly-schedule' ),
		__( 'Tuesday', 'faculty-weekly-schedule' ),
		__( 'Wednesday', 'faculty-weekly-schedule' ),
		__( 'Thursday', 'faculty-weekly-schedule' ),
		__( 'Friday', 'faculty-weekly-schedule' ),
		__( 'Saturday', 'faculty-weekly-schedule' ),
		__( 'Sunday', 'faculty-weekly-schedule' ),
	)
);

/**
 * Converts an array of hours, minutes, am/pm into hh:mm am/pm format.
 *
 * @param mixed $time_array - Array with elements hours, minutes, ampm or numbered elements.
 *
 * @return string - Time in hh:mm am/pm format.
 */
function convert_time( $time_array ) {
	$hours_array   = array(
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
		'12' => '12',
	);
	$minutes_array = array(
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
	);
	if ( isset( $time_array['hours'] ) ) {
		$time_hour = $hours_array[ $time_array['hours'] ];
	} else {
		$time_hour = $hours_array[ $time_array[0] ];
	}
	if ( isset( $time_array['minutes'] ) ) {
		$time_minute = $minutes_array[ $time_array['minutes'] ];
	} else {
		$time_minute = $minutes_array[ $time_array[1] ];
	}
	if ( isset( $time_array['ampm'] ) ) {
		$time_12_hour = 'AM' === $time_array['ampm'] ? 'AM' : 'PM';
	} else {
		$time_12_hour = 'AM' === $time_array[2] ? 'AM' : 'PM';
	}

	$output_time = $time_hour . ':' . $time_minute . ' ' . $time_12_hour;
	return $output_time;
}

/**
 * Get all the registered image sizes along with their dimensions
 *
 * @global array $_wp_additional_image_sizes
 *
 * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
 *
 * @return array $image_sizes The image sizes
 */
function _get_all_image_sizes() {
	global $_wp_additional_image_sizes;

	$default_image_sizes = get_intermediate_image_sizes();

	foreach ( $default_image_sizes as $size ) {
		$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
		$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
		$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
	}

	if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
		$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
	}

	return $image_sizes;
}

/**
 * Determines if office hours have been entered.
 *
 * @param mixed $office_hours_array - An array of the office hours entered.
 *
 * @return boolean - True if one or more office hours has been entered.
 */
function is_empty_office_hours( $office_hours_array ) {
	$office_hours_empty = true;
	if ( count( $office_hours_array ) >= 1 && isset( $office_hours_array[0]['fws_day_of_week'] ) ) {
		if ( count( $office_hours_array[0]['fws_day_of_week'] ) > 0 ||
				'' !== $office_hours_array[0]['fws_office_hours_title'] ||
				'' !== $office_hours_array[0]['fws_office_hours_campus'] ||
				'' !== $office_hours_array[0]['fws_office_hours_location'] ||
				'' !== $office_hours_array[0]['fws_start_date'] ||
				'' !== $office_hours_array[0]['fws_end_date'] ) {
			$office_hours_empty = false;
		}
	}
	return $office_hours_empty;
}

/**
 * Determines if office hours have been entered.
 *
 * @param mixed $class_array - An array of the classes entered.
 *
 * @return boolean - True if one or more classes has been entered.
 */
function is_empty_classes( $class_array ) {
	$classes_empty = true;
	if ( count( $class_array ) >= 1 ) {
		if ( '' !== $class_array[0]['fws_course_number'] ||
				'' !== $class_array[0]['fws_course_title'] ||
				'' !== $class_array[0]['fws_reference_number'] ||
				'' !== $class_array[0]['fws_classes_campus'] ||
				'' !== $class_array[0]['fws_classes_location'] ||
				'' !== $class_array[0]['fws_start_date'] ||
				'' !== $class_array[0]['fws_end_date'] ) {
			$classes_empty = false;
		}
	}
	return $classes_empty;
}

/**
 * Sets up the content to be displayed for a schedule.
 *
 * @param mixed  $a_post_data - Array of data in the schedule.
 * @param mixed  $_a_saved_options - Array of schedule settings.
 * @param string $which_blocks - Determines which blocks to include. Values of 'all', 'now', 'YYYY-MM-DD' with default of 'all'.
 * @param string $schedule_date - When provided, the date which an office hours or class block must be within. Defaults to empty string.
 * @param bool   $show_developer - When true will show extra developer information such as the $a_post_data and $_a_saved_options array contents.
 *
 * @return string - The content of the schedule to be displayed.
 */
function get_schedule_output( $a_post_data, $_a_saved_options, $which_blocks = 'all', $schedule_date = '', $show_developer = false ) {
	$timezone                = new DateTimeZone( 'GMT' );
	$office_hours_details    = array();
	$online_classes_details  = array();
	$regular_classes_details = array();

	$which_date = '';
	if ( 'now' === $which_blocks ) {
		$which_date = wp_date( 'Y-m-d', strtotime( 'now' ), $timezone );
	} else {
		if ( 'all' !== $which_blocks ) {
			$which_date = wp_date( 'Y-m-d', strtotime( $which_blocks ), $timezone );
		}
	}

	if ( ! isset( $a_post_data['fws_office_hours_block'] ) ) {
		return '';
	}
	$office_hours_input = $a_post_data['fws_office_hours_block'];
	if ( ! is_empty_office_hours( $office_hours_input ) ) {
		foreach ( $office_hours_input as $office_hours_info ) {
			if ( isset( $office_hours_info['fws_day_of_week'] ) ) {
				if ( 'all' !== $which_blocks && '' !== $office_hours_info['fws_start_date'] && '' !== $office_hours_info['fws_end_date'] ) {
					$date_format      = 'Y-m-d';
					$block_start_date = wp_date( $date_format, strtotime( $office_hours_info['fws_start_date'] ), $timezone );
					$block_end_date   = wp_date( $date_format, strtotime( $office_hours_info['fws_end_date'] ), $timezone );
					if ( ! ( $which_date >= $block_start_date && $which_date <= $block_end_date ) ) {
						continue;
					}
				}
				foreach ( $office_hours_info['fws_day_of_week'] as $office_hours_day ) {
					$office_hours_details[] = array(
						'fws_day_of_week'      => $office_hours_day,
						'fws_location'         => $office_hours_info['fws_office_hours_location'],
						'fws_start_date'       => $office_hours_info['fws_start_date'],
						'fws_end_date'         => $office_hours_info['fws_end_date'],
						'fws_start_time'       => $office_hours_info['fws_start_time'],
						'fws_end_time'         => $office_hours_info['fws_end_time'],
						'fws_background_color' => $office_hours_info['fws_office_hours_background_color'],
						'fws_text_color'       => $office_hours_info['fws_office_hours_text_color'],
						'fws_course_title'     => $office_hours_info['fws_office_hours_title'],
						'fws_classes_campus'   => $office_hours_info['fws_office_hours_campus'],
					);
				}
			}
		}
	}

	if ( ! isset( $a_post_data['fws_classes_block'] ) ) {
		return '';
	}
	$classes_input = $a_post_data['fws_classes_block'];
	if ( ! is_empty_classes( $classes_input ) ) {
		foreach ( $classes_input as $class ) {
			if ( 'all' !== $which_blocks && '' !== $class['fws_start_date'] && '' !== $class['fws_end_date'] ) {
				$date_format      = 'Y-m-d';
				$block_start_date = wp_date( $date_format, strtotime( $class['fws_start_date'] ), $timezone );
				$block_end_date   = wp_date( $date_format, strtotime( $class['fws_end_date'] ), $timezone );
				if ( ! ( $which_date >= $block_start_date && $which_date <= $block_end_date ) ) {
					continue;
				}
			}
			if ( '0' === $class['fws_online_class'] ) {
				if ( isset( $class['fws_class_days'] ) ) {
					foreach ( $class['fws_class_days'] as $class_day ) {
						$regular_classes_details[] = array(
							'fws_day_of_week'      => $class_day,
							'fws_location'         => $class['fws_classes_location'],
							'fws_start_date'       => $class['fws_start_date'],
							'fws_end_date'         => $class['fws_end_date'],
							'fws_start_time'       => $class['fws_start_time'],
							'fws_end_time'         => $class['fws_end_time'],
							'fws_background_color' => $class['fws_class_background_color'],
							'fws_text_color'       => $class['fws_class_text_color'],
							'fws_course_title'     => $class['fws_course_title'],
							'fws_course_number'    => $class['fws_course_number'],
							'fws_reference_number' => $class['fws_reference_number'],
							'fws_classes_campus'   => $class['fws_classes_campus'],
						);
					}
				}
			} else {
				$online_classes_details[] = array(
					'fws_start_date'       => $class['fws_start_date'],
					'fws_end_date'         => $class['fws_end_date'],
					'fws_background_color' => $class['fws_class_background_color'],
					'fws_text_color'       => $class['fws_class_text_color'],
					'fws_course_title'     => $class['fws_course_title'],
					'fws_course_number'    => $class['fws_course_number'],
					'fws_reference_number' => $class['fws_reference_number'],
				);
			}
		}
	}

	$location_classes = array_merge( $office_hours_details, $regular_classes_details );
	usort(
		$location_classes,
		function( $a, $b ) {
			$timezone   = new DateTimeZone( 'GMT' );
			$time_array = array(
				'hours'   => $a['fws_start_time'][0],
				'minutes' => $a['fws_start_time'][1],
				'ampm'    => $a['fws_start_time'][2],
			);
			$sort_time  = convert_time( $time_array );
			$sort_time  = wp_date( 'H:i', strtotime( $sort_time ), $timezone );
			$first      = $sort_time . $a['fws_start_date'];
			$time_array = array(
				'hours'   => $b['fws_start_time'][0],
				'minutes' => $b['fws_start_time'][1],
				'ampm'    => $b['fws_start_time'][2],
			);
			$sort_time  = convert_time( $time_array );
			$sort_time  = wp_date( 'H:i', strtotime( $sort_time ), $timezone );
			$second     = $sort_time . $b['fws_start_date'];
			return ( $first <= $second ) ? -1 : 1;
		}
	);
	$final_classes = array(
		'0' => array(),
		'1' => array(),
		'2' => array(),
		'3' => array(),
		'4' => array(),
		'5' => array(),
		'6' => array(),
	);
	foreach ( $location_classes as $class_details ) {
		$final_classes[ $class_details['fws_day_of_week'] ][] = $class_details;
	}

	$final_count = count( $final_classes ) - 1;
	while ( $final_count >= 0 ) {
		if ( 'array' === gettype( $final_classes ) ) {
			if ( 0 === count( $final_classes[ $final_count ] ) ) {
				unset( $final_classes[ $final_count ] );
			}
		}
		--$final_count;
	}

	$online_location_classes = array_merge( $online_classes_details );
	usort(
		$online_location_classes,
		function( $a, $b ) {
			$first  = $a['fws_start_date'] . $a['fws_course_number'];
			$second = $b['fws_start_date'] . $b['fws_course_number'];
			return ( $first <= $second ) ? -1 : 1;
		}
	);

	$use_schedule_colors = isset( $a_post_data['fws_schedule_options']['schedule'] ) ? $a_post_data['fws_schedule_options']['schedule'] : '0';
	$schedule_css        = '';
	if ( '1' === $use_schedule_colors ) {
		if ( $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_background'] !== $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_text'] ) {
			if ( ! empty( $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_background'] ) ) {
				$schedule_css = 'background-color: ' . $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_background'] . ';';
			}
			if ( ! empty( $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_text'] ) ) {
				$schedule_css .= 'color: ' . $a_post_data['fws_schedule_background_colors']['fws_schedule_background_color_text'] . ';';
			}
		}
	}
	$use_title_colors = isset( $a_post_data['fws_schedule_options']['colors'] ) ? $a_post_data['fws_schedule_options']['colors'] : '0';
	if ( '1' === $use_title_colors ) {
		if ( ! empty( $a_post_data['fws_title_colors']['fws_schedule_title_color_background'] ) || ! empty( $a_post_data['fws_title_colors']['fws_schedule_title_color_text'] ) ) {
			$title_css = 'background-color: ' . $a_post_data['fws_title_colors']['fws_schedule_title_color_background'] . '; color: ' . $a_post_data['fws_title_colors']['fws_schedule_title_color_text'] . ';';
		}
	} else {
		$title_css = '';
	}

	$use_padding = isset( $a_post_data['fws_schedule_options']['padding'] ) ? $a_post_data['fws_schedule_options']['padding'] : '0';
	if ( '1' === $use_padding ) {
		$padding_css      = 'padding: ' . $a_post_data['fws_padding']['fws_padding_size'] . $a_post_data['fws_padding']['fws_padding_unit'] . ';';
		$padding_left_css = 'padding-left: ' . $a_post_data['fws_padding']['fws_padding_size'] . $a_post_data['fws_padding']['fws_padding_unit'] . ';';
	} else {
		$padding_css      = '';
		$padding_left_css = '';
	}

	$use_column_gap = isset( $a_post_data['fws_schedule_options']['colgap'] ) ? $a_post_data['fws_schedule_options']['colgap'] : '0';
	if ( '1' === $use_column_gap ) {
		$column_gap_css = 'column-gap: ' . $a_post_data['fws_colgap']['fws_colgap_size'] . $a_post_data['fws_colgap']['fws_colgap_unit'] . ';';
	} else {
		$column_gap_css = '';
	}

	$break_long_lines      = isset( $a_post_data['fws_schedule_options']['break'] ) ? $a_post_data['fws_schedule_options']['break'] : '0';
	$show_schedule_heading = isset( $a_post_data['fws_headings_options']['shead'] ) ? $a_post_data['fws_headings_options']['shead'] : '0';
	$show_classes_heading  = isset( $a_post_data['fws_headings_options']['chead'] ) ? $a_post_data['fws_headings_options']['chead'] : '0';
	$show_online_heading   = isset( $a_post_data['fws_headings_options']['ohead'] ) ? $a_post_data['fws_headings_options']['ohead'] : '0';

	$image_sizes         = _get_all_image_sizes();
	$alignment           = ( isset( $a_post_data['fws_alignment'] ) ) ? $a_post_data['fws_alignment'] : 'wide';
	$output_schedule_css = '';
	if ( ! empty( $schedule_css ) || ! empty( $padding_css ) ) {
		$output_schedule_css = ' style="' . $schedule_css . $padding_css . '"';
	}
	$output_column_gap_css = '';
	if ( ! empty( $column_gap_css ) ) {
		$output_column_gap_css = ' style="' . $column_gap_css . '"';
	}
	$content_output = '<div class="fws-schedule align' . $alignment . ' fws-div-padding"' . $output_schedule_css . '>'; // Containing div start.
	if ( $show_developer ) {
		$content_output .= '<h1>' . __( 'Content Information', 'faculty-weekly-schedule' ) . '</h1>';
	}

	$show_name    = isset( $a_post_data['fws_schedule_options']['showname'] ) ? $a_post_data['fws_schedule_options']['showname'] : '0';
	$faculty_name = $a_post_data['fws_faculty_information']['fws_faculty_name'];
	if ( '1' === $show_name ) {
		if ( '' !== $a_post_data['fws_faculty_information']['fws_faculty_name'] ) {
			$content_output .= '<h2 style="' . $title_css;
			if ( '' !== $padding_left_css ) {
				$content_output .= $padding_left_css;
			}
			$content_output .= '">' . $faculty_name . '</h2>';
		}
	}

	$show_title = isset( $a_post_data['fws_schedule_options']['title'] ) ? $a_post_data['fws_schedule_options']['title'] : '0';
	if ( '1' === $show_title ) {
		if ( '' !== $a_post_data['fws_faculty_information']['fws_faculty_title'] ) {
			$content_output .= '<h3 style="' . $title_css;
			if ( '' !== $padding_left_css ) {
				$content_output .= $padding_left_css;
			}
			$content_output .= '">' . $a_post_data['fws_faculty_information']['fws_faculty_title'] . '</h3>';
		}
	}

	$show_photo      = isset( $a_post_data['fws_photo_display'][1] ) ? $a_post_data['fws_photo_display'][1] : '0';
	$photo_placement = isset( $a_post_data['fws_photo_display'][2] ) ? $a_post_data['fws_photo_display'][2] : '0';
	if ( '1' === $show_photo && 'above' === $photo_placement ) {
		$photo_size = $image_sizes[ $a_post_data['fws_photo_display'][0] ];
		if ( ! empty( $a_post_data['fws_faculty_photo'] ) ) {
			$content_output .= '<p><img src="' . $a_post_data['fws_faculty_photo'] . '" alt="' . $faculty_name . '" style="width: ' . $photo_size['width'] . 'px;" /></p>';
		}
	}

	if ( is_multisite() ) {
		$date_format = get_blog_option( get_current_blog_id(), 'date_format', false );
		$time_format = get_blog_option( get_current_blog_id(), 'time_format', false );
	} else {
		$date_format = get_site_option( 'date_format' );
		$time_format = get_site_option( 'time_format' );
	}

	if ( isset( $a_post_data['fws_schedule_date_time']['fws_schedule_date'] ) && 'site' !== $a_post_data['fws_schedule_date_time']['fws_schedule_date'] ) {
		$schedule_date_format = isset( $a_post_data['fws_schedule_date_time']['fws_schedule_date'] ) ? $a_post_data['fws_schedule_date_time']['fws_schedule_date'] : $date_format;
	} else {
		$schedule_date_format = $date_format;
	}
	if ( isset( $a_post_data['fws_schedule_date_time']['fws_schedule_time'] ) && 'site' !== $a_post_data['fws_schedule_date_time']['fws_schedule_time'] ) {
		$schedule_time_format = isset( $a_post_data['fws_schedule_date_time']['fws_schedule_time'] ) ? $a_post_data['fws_schedule_date_time']['fws_schedule_time'] : $time_format;
	} else {
		$schedule_time_format = $time_format;
	}
	if ( isset( $a_post_data['fws_block_date_time']['fws_block_date'] ) && 'site' !== $a_post_data['fws_block_date_time']['fws_block_date'] ) {
		$block_date_format = isset( $a_post_data['fws_block_date_time']['fws_block_date'] ) ? $a_post_data['fws_block_date_time']['fws_block_date'] : $date_format;
	} else {
		$block_date_format = $date_format;
	}
	if ( isset( $a_post_data['fws_block_date_time']['fws_block_time'] ) && 'site' !== $a_post_data['fws_block_date_time']['fws_block_time'] ) {
		$block_time_format = isset( $a_post_data['fws_block_date_time']['fws_block_time'] ) ? $a_post_data['fws_block_date_time']['fws_block_time'] : $time_format;
	} else {
		$block_time_format = $time_format;
	}

	$fws_schedule_start_date = isset( $a_post_data['fws_schedule_dates']['fws_schedule_start_date'] ) ? $a_post_data['fws_schedule_dates']['fws_schedule_start_date'] : 'now';
	$fws_schedule_end_date   = isset( $a_post_data['fws_schedule_dates']['fws_schedule_end_date'] ) ? $a_post_data['fws_schedule_dates']['fws_schedule_end_date'] : 'now';
	$schedule_start_date     = wp_date( $schedule_date_format, strtotime( $fws_schedule_start_date ), $timezone );
	$schedule_end_date       = wp_date( $schedule_date_format, strtotime( $a_post_data['fws_schedule_dates']['fws_schedule_end_date'] ), $timezone );
	$include_schedule_times  = ( isset( $a_post_data['fws_headings_options']['times'] ) ) ? $a_post_data['fws_headings_options']['times'] : '0';

	if ( '1' === $show_schedule_heading ) {
		if ( ! empty( $schedule_start_date ) ) {
			$schedule_header = __( 'Schedule Dates', 'faculty-weekly-schedule' );
			if ( ! empty( $a_post_data['fws_headings_text']['fws_schedule_header'] ) ) {
				$schedule_header = $a_post_data['fws_headings_text']['fws_schedule_header'];
			}
			$schedule_header_background_color = '';
			if ( ! empty( $a_post_data['fws_schedule_heading_colors']['fws_schedule_header_color_background'] ) ) {
				$schedule_header_background_color = 'background-color: ' . $a_post_data['fws_schedule_heading_colors']['fws_schedule_header_color_background'];
			}
			$schedule_header_text_color = '';
			if ( ! empty( $a_post_data['fws_schedule_heading_colors']['fws_schedule_header_color_text'] ) ) {
				$schedule_header_text_color = 'color: ' . $a_post_data['fws_schedule_heading_colors']['fws_schedule_header_color_text'];
			}
			$schedule_header_styles = '';
			if ( ! empty( $schedule_header_background_color ) || ! empty( $schedule_header_text_color ) || ! empty( $padding_left_css ) ) {
				$schedule_header_styles = ' style="' . $schedule_header_background_color . '; ' . $schedule_header_text_color . '; ';
				if ( '' !== $padding_left_css ) {
					$schedule_header_styles .= $padding_left_css;
				}
				$schedule_header_styles .= '"';
			}
			$content_output .= '<h3' . $schedule_header_styles . '>' . $schedule_header . ': ' . $schedule_start_date;
			if ( '1' === $include_schedule_times ) {
				$schedule_start_time = convert_time( $a_post_data['fws_schedule_times']['fws_start_time'] );
				$schedule_start_time = wp_date( $schedule_time_format, strtotime( $schedule_start_time ), $timezone );
				$content_output     .= ' ' . $schedule_start_time;
			}
			if ( ! empty( $schedule_end_date ) ) {
				$content_output .= ' - ' . $schedule_end_date;
				if ( '1' === $include_schedule_times ) {
					$schedule_end_time = convert_time( $a_post_data['fws_schedule_times']['fws_end_time'] );
					$schedule_end_time = wp_date( $schedule_time_format, strtotime( $schedule_end_time ), $timezone );
					$content_output   .= ' ' . $schedule_end_time;
				}
			}
			$content_output .= '</h3>';
		}
	}

	$before_message = $a_post_data['fws_before_message_display'];
	if ( $before_message ) {
		$before_message_alignment = '';
		if ( isset( $a_post_data['fws_before_alignment'] ) ) {
			if ( 'none' !== $a_post_data['fws_before_alignment'] ) {
				$before_message_alignment = ' style="text-align: ' . $a_post_data['fws_before_alignment'] . '"';
			}
		}
		$content_output .= '<p' . $before_message_alignment . '>' . $a_post_data['fws_before_message'] . '</p>';
	}

	if ( count( $final_classes ) > 0 || count( $online_classes_details ) > 0 ) {
		if ( '1' === $show_classes_heading ) {
			$classes_header = __( 'Classes and Office Hours', 'faculty-weekly-schedule' );
			if ( ! empty( $a_post_data['fws_headings_text']['fws_classes_header'] ) ) {
				$classes_header = $a_post_data['fws_headings_text']['fws_classes_header'];
			}
			$classes_header_background_color = '';
			if ( ! empty( $a_post_data['fws_classes_colors']['fws_classes_header_color_background'] ) ) {
				$classes_header_background_color = 'background-color: ' . $a_post_data['fws_classes_colors']['fws_classes_header_color_background'];
			}
			$classes_header_text_color = '';
			if ( ! empty( $a_post_data['fws_classes_colors']['fws_classes_header_color_text'] ) ) {
				$classes_header_text_color = 'color: ' . $a_post_data['fws_classes_colors']['fws_classes_header_color_text'];
			}
			$classes_header_styles = '';
			if ( ! empty( $classes_header_background_color ) || ! empty( $classes_header_text_color ) || ! empty( $padding_left_css ) ) {
				$classes_header_styles = ' style="' . $classes_header_background_color . '; ' . $classes_header_text_color . '; ';
				if ( '' !== $padding_left_css ) {
					$classes_header_styles .= $padding_left_css;
				}
				$classes_header_styles .= '"';
			}
			$content_output .= '<h4' . $classes_header_styles . '>' . $classes_header . '</h4>';
		}
		$content_output .= '<div class="fws_schedule_info fws-table-grid-' . count( $final_classes ) . '-1" style="' . $column_gap_css . '">';
		foreach ( $final_classes as $days ) {
			$dow_header_styles = '';
			if ( $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_background'] !== $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] ) {
				$dow_header_background_color = '';
				if ( ! empty( $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_background'] ) ) {
					$dow_header_background_color = 'background-color: ' . $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_background'];
				}
				$dow_header_text_color = '';
				if ( ! empty( $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] ) ) {
					if ( $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] === $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] ) {
						if ( '#000000' === $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] ) {
							$a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] = 'black';
						} else {
							$a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'] = 'white';
						}
					}
					$dow_header_text_color = 'color: ' . $a_post_data['fws_dow_classes_colors']['fws_dow_header_color_text'];
				}
				if ( ! empty( $dow_header_background_color ) || ! empty( $dow_header_text_color ) ) {
					$dow_header_styles = ' style="' . $padding_css . $dow_header_background_color . '; ' . $dow_header_text_color . '"';
				}
			}
			$content_output .= '<div class="fws-schedule-block">';
			$content_output .= '<div class="fws-div-padding"' . $dow_header_styles . '>';
			$content_output .= '<strong>' . WEEKDAYS[ intval( $days[0]['fws_day_of_week'] ) ] . '</strong>';
			$content_output .= '</div>';
			foreach ( $days as $class_detail ) {
				$block_padding_css = '';
				if ( '1' === $use_padding ) {
					$block_padding_css = 'padding: ' . $a_post_data['fws_block_padding']['fws_padding_size'] . $a_post_data['fws_block_padding']['fws_padding_unit'] . ';';
				}
				if ( $class_detail['fws_background_color'] === $class_detail['fws_text_color'] ) {
					if ( '#000000' === $class_detail['fws_text_color'] ) {
						$class_detail['fws_text_color'] = 'white';
					} else {
						$class_detail['fws_text_color'] = 'black';
					}
				}
				$block_colors_css = 'background-color: ' . $class_detail['fws_background_color'] . '; color: ' . $class_detail['fws_text_color'] . ';';
				$output_block_css = '';
				if ( ! empty( $block_colors_css ) || ! empty( $block_padding_css ) ) {
					$output_block_css = ' style="' . $block_colors_css . $block_padding_css . '"';
				}
				$content_output         .= '<div class="fws-schedule-block fws-div-padding"' . $output_block_css . '>';
				$class_start_time        = convert_time( $class_detail['fws_start_time'] );
				$class_start_time_output = wp_date( $block_time_format, strtotime( $class_start_time ), $timezone );
				$content_output         .= $class_start_time_output . ' - ';
				if ( '1' === $break_long_lines ) {
					$content_output .= '<br>';
				}
				$class_end_time        = convert_time( $class_detail['fws_end_time'] );
				$class_end_time_output = wp_date( $block_time_format, strtotime( $class_end_time ), $timezone );
				$content_output       .= $class_end_time_output . '<br>';
				if ( ! empty( $class_detail['fws_start_date'] ) ) {
					$content_output .= wp_date( $block_date_format, strtotime( $class_detail['fws_start_date'] ), $timezone );
				}
				if ( ( ! empty( $class_detail['fws_start_date'] ) && ! empty( $class_detail['fws_end_date'] ) ) ) {
					$content_output .= ' - ';
					if ( '1' === $break_long_lines ) {
						$content_output .= '<br>';
					}
				}
				if ( ! empty( $class_detail['fws_end_date'] ) ) {
					$content_output .= wp_date( $block_date_format, strtotime( $class_detail['fws_end_date'] ), $timezone );
				}
				if ( ( ! empty( $class_detail['fws_start_date'] ) || ! empty( $class_detail['fws_end_date'] ) ) ) {
					$content_output .= '<br>';
				}
				if ( isset( $class_detail['fws_course_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) ) {
						$content_output .= $class_detail['fws_course_number'];
					}
				}
				if ( isset( $class_detail['fws_course_number'] ) && isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) && ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= ' - ';
					}
					if ( '1' === $break_long_lines ) {
						$content_output .= '<br>';
					}
				}
				if ( isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= $class_detail['fws_reference_number'];
					}
				}
				if ( isset( $class_detail['fws_course_number'] ) || isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) || ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= '<br>';
					}
				}
				if ( ! empty( $class_detail['fws_course_title'] ) ) {
					$content_output .= $class_detail['fws_course_title'] . '<br>';
				}
				if ( isset( $class_detail['fws_classes_campus'] ) ) {
					if ( ! empty( $class_detail['fws_classes_campus'] ) ) {
						$content_output .= $class_detail['fws_classes_campus'] . ' ';
						if ( '1' === $break_long_lines ) {
							$content_output .= '<br>';
						}
					}
				}
				if ( ! empty( $class_detail['fws_location'] ) ) {
					$content_output .= $class_detail['fws_location'] . '<br>';
				}
				$content_output .= '</div>';
			}
			$content_output .= '</div>';
		}
		$content_output .= '</div>';
		if ( count( $online_classes_details ) > 0 ) {
			if ( '1' === $show_online_heading ) {
				$online_header = __( 'Online Classes', 'faculty-weekly-schedule' );
				if ( ! empty( $a_post_data['fws_headings_text']['fws_online_header'] ) ) {
					$online_header = $a_post_data['fws_headings_text']['fws_online_header'];
				}
				$online_classes_header_background_color = '';
				if ( ! empty( $a_post_data['fws_online_classes_colors']['fws_online_header_color_background'] ) ) {
					$online_classes_header_background_color = 'background-color: ' . $a_post_data['fws_online_classes_colors']['fws_online_header_color_background'];
				}
				$online_classes_header_text_color = '';
				if ( ! empty( $a_post_data['fws_online_classes_colors']['fws_online_header_color_text'] ) ) {
					$online_classes_header_text_color = 'color: ' . $a_post_data['fws_online_classes_colors']['fws_online_header_color_text'];
				}
				$online_classes_header_styles = '';
				if ( ! empty( $online_classes_header_background_color ) || ! empty( $online_classes_header_text_color ) || ! empty( $padding_left_css ) ) {
					$online_classes_header_styles = ' style="' . $online_classes_header_background_color . '; ' . $online_classes_header_text_color . '; ';
					if ( '' !== $padding_left_css ) {
						$online_classes_header_styles .= $padding_left_css;
					}
					$online_classes_header_styles .= '"';
				}
				$content_output .= '<h4' . $online_classes_header_styles . '>' . $online_header . '</h4>';
			}
			$online_class_count = ( count( $online_location_classes ) >= count( $final_classes ) ) ? count( $online_location_classes ) : count( $final_classes );
			$content_output    .= '<div class="fws_schedule_info fws-table-grid-' . $online_class_count . '-1"' . $output_column_gap_css . '>';
			foreach ( $online_location_classes as $class_detail ) {
				$block_padding_css = '';
				if ( '1' === $use_padding ) {
					$block_padding_css = 'padding: ' . $a_post_data['fws_block_padding']['fws_padding_size'] . $a_post_data['fws_block_padding']['fws_padding_unit'] . ';';
				}
				if ( $class_detail['fws_background_color'] === $class_detail['fws_text_color'] ) {
					if ( '#000000' === $class_detail['fws_text_color'] ) {
						$class_detail['fws_text_color'] = 'white';
					} else {
						$class_detail['fws_text_color'] = 'black';
					}
				}
				$block_colors_css = 'background-color: ' . $class_detail['fws_background_color'] . '; color: ' . $class_detail['fws_text_color'] . ';';
				$output_block_css = '';
				if ( ! empty( $block_colors_css ) || ! empty( $block_padding_css ) ) {
					$output_block_css = ' style="' . $block_colors_css . $block_padding_css . '"';
				}
				$content_output .= '<div class="fws-schedule-block fws-div-padding"' . $output_block_css . '>';
				if ( ! empty( $class_detail['fws_start_date'] ) ) {
					$content_output .= wp_date( $block_date_format, strtotime( $class_detail['fws_start_date'] ), $timezone );
				}
				if ( ( ! empty( $class_detail['fws_start_date'] ) && ! empty( $class_detail['fws_end_date'] ) ) ) {
					$content_output .= ' - ';
					if ( '1' === $break_long_lines ) {
						$content_output .= '<br>';
					}
				}
				if ( ! empty( $class_detail['fws_end_date'] ) ) {
					$content_output .= wp_date( $block_date_format, strtotime( $class_detail['fws_end_date'] ), $timezone );
				}
				if ( ( ! empty( $class_detail['fws_start_date'] ) || ! empty( $class_detail['fws_end_date'] ) ) ) {
					$content_output .= '<br>';
				}
				if ( isset( $class_detail['fws_course_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) ) {
						$content_output .= $class_detail['fws_course_number'];
					}
				}
				if ( isset( $class_detail['fws_course_number'] ) && isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) && ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= ' - ';
					}
					if ( '1' === $break_long_lines ) {
						$content_output .= '<br>';
					}
				}
				if ( isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= $class_detail['fws_reference_number'];
					}
				}
				if ( isset( $class_detail['fws_course_number'] ) || isset( $class_detail['fws_reference_number'] ) ) {
					if ( ! empty( $class_detail['fws_course_number'] ) || ! empty( $class_detail['fws_reference_number'] ) ) {
						$content_output .= '<br>';
					}
				}
				if ( ! empty( $class_detail['fws_course_title'] ) ) {
					$content_output .= $class_detail['fws_course_title'] . '<br>';
				}
				if ( isset( $class_detail['fws_classes_campus'] ) ) {
					if ( ! empty( $class_detail['fws_classes_campus'] ) ) {
						$content_output .= $class_detail['fws_classes_campus'] . ' ';
						if ( '1' === $break_long_lines ) {
							$content_output .= '<br>';
						}
					}
				}
				if ( ! empty( $class_detail['fws_location'] ) ) {
					$content_output .= $class_detail['fws_location'] . '<br>';
				}
				$content_output .= '</div>';
			}
			$content_output .= '</div>';
		}
	} else {
		$error_message = __( 'No Office Hours or Classes entered', 'faculty-weekly-schedule' );
		if ( 'all' !== $which_blocks && '' !== $which_date ) {
			$error_message .= ' ' . __( 'for', 'faculty-weekly-schedule' ) . ' ' . wp_date( $schedule_date_format, strtotime( $which_date ), $timezone );
		}
		$error_message  .= '.';
		$content_output .= '<p>';
		$content_output .= $error_message;
		$content_output .= '</p>';
	}

	if ( '1' === $show_photo && 'below' === $photo_placement ) {
		$photo_size      = $image_sizes[ $a_post_data['fws_photo_display'][0] ];
		$content_output .= '<p><img src="' . $a_post_data['fws_faculty_information']['fws_faculty_photo'] . '" alt="' . $faculty_name . '" style="width: ' . $photo_size['width'] . 'px;" /></p>';
	}

	$after_message = $a_post_data['fws_after_message_display'];
	if ( $after_message ) {
		$after_message_alignment = '';
		if ( isset( $a_post_data['fws_after_alignment'] ) ) {
			if ( 'none' !== $a_post_data['fws_after_alignment'] ) {
				$after_message_alignment = ' style="text-align: ' . $a_post_data['fws_after_alignment'] . '"';
			}
		}
		$content_output .= '<p' . $after_message_alignment . '>' . $a_post_data['fws_after_message'] . '</p>';
	}

	if ( '1' === $show_photo && 'after' === $photo_placement ) {
		$photo_size      = $image_sizes[ $a_post_data['fws_photo_display'][0] ];
		$content_output .= '<p><img src="' . $a_post_data['fws_faculty_information']['fws_faculty_photo'] . '" alt="' . $faculty_name . '" style="width: ' . $photo_size['width'] . 'px;" /></p>';
	}

	$content_output .= '</div>'; // Containing div end.

	return $content_output;
}

/**
 * [Description FWS_Schedule]
 */
class FWS_Schedule extends FacultyWeeklySchedule_AdminPageFramework_PostType {

	/**
	 * This method is called at the end of the constructor.
	 *
	 * ALternatevely, you may use the start_{instantiated class name} method, which also is called at the end of the constructor.
	 */
	public function start() {}

	/**
	 * Use this method to set up the post type.
	 *
	 * ALternatevely, you may use the set_up_{instantiated class name} method, which also is called at the end of the constructor.
	 */
	public function setUp() {

		$this->setArguments(
			// argument - for the array structure, see http://codex.wordpress.org/Function_Reference/register_post_type#Arguments.
			array(
				'labels'               => $this->_getLabels(),
				'public'               => true,
				'menu_position'        => 210,
				'supports'             => array( 'title', 'thumbnail' ),
				'taxonomies'           => array( '' ),
				'has_archive'          => true,
				'show_admin_column'    => true, // [3.5+ core] this is for custom taxonomies to automatically add the column in the listing table.
				'menu_icon'            => $this->oProp->bIsAdmin
					? (
						version_compare( $GLOBALS['wp_version'], '3.8', '>=' )
							? 'dashicons-schedule'
							: plugins_url( 'asset/image/wp-logo_16x16.png', FacultyWeeklySchedule_AdminPageFramework_Registry::$sFilePath )
					)
					: null, // do not call the function in the front-end.

				// (framework specific) this sets the screen icon for the post type for WordPress v3.7.1 or below.
				// a file path can be passed instead of a url, plugins_url( 'asset/image/wp-logo_32x32.png', APFDEMO_FILE ).
				'screen_icon'          => FacultyWeeklySchedule_AdminPageFramework_Registry::$sDirPath . '/asset/image/wp-logo_32x32.png',

				// (framework specific) [3.5.10+] default value: true.
				'show_submenu_add_new' => true,

				// (framework specific) [3.7.4+]
				'submenu_order_manage' => 5,   // default 5.
				'submenu_order_addnew' => 9,   // default 10.

			)
		);

	}

	/**
	 * Setup the labels for the schedule custom post type.
	 *
	 * @return array
	 */
	private function _getLabels() {

		return $this->oProp->bIsAdmin
			? array(
				'name'                     => __( 'Schedules', 'faculty-weekly-schedule' ),
				'singular_name'            => __( 'Schedule', 'faculty-weekly-schedule' ),
				'menu_name'                => __( 'Weekly Schedules', 'faculty-weekly-schedule' ),
				'all_items'                => __( 'Weekly Schedules', 'faculty-weekly-schedule' ),
				'add_new'                  => __( 'Add new Schedule', 'faculty-weekly-schedule' ),
				'add_new_item'             => __( 'Add new Schedule', 'faculty-weekly-schedule' ),
				'edit_item'                => __( 'Edit Schedule', 'faculty-weekly-schedule' ),
				'new_item'                 => __( 'New Schedule', 'faculty-weekly-schedule' ),
				'view_item'                => __( 'View Schedule', 'faculty-weekly-schedule' ),
				'view_items'               => __( 'View Schedules', 'faculty-weekly-schedule' ),
				'search_items'             => __( 'Search Schedules', 'faculty-weekly-schedule' ),
				'not_found'                => __( 'No Schedules found', 'faculty-weekly-schedule' ),
				'not_found_in_trash'       => __( 'No Schedules found in trash', 'faculty-weekly-schedule' ),
				'parent'                   => __( 'Parent Schedule:', 'faculty-weekly-schedule' ),
				'featured_image'           => __( 'Schedule Photograph', 'faculty-weekly-schedule' ),
				'set_featured_image'       => __( 'Set Schedule Photograph', 'faculty-weekly-schedule' ),
				'remove_featured_image'    => __( 'Remove Schedule Photograph', 'faculty-weekly-schedule' ),
				'use_featured_image'       => __( 'Use Schedule Photograph', 'faculty-weekly-schedule' ),
				'archives'                 => __( 'Schedule Directory', 'faculty-weekly-schedule' ),
				'insert_into_item'         => __( 'Insert into Schedule', 'faculty-weekly-schedule' ),
				'uploaded_to_this_item'    => __( 'Upload to this Schedule', 'faculty-weekly-schedule' ),
				'filter_items_list'        => __( 'Filter Schedules list', 'faculty-weekly-schedule' ),
				'items_list_navigation'    => __( 'Schedules list navigation', 'faculty-weekly-schedule' ),
				'items_list'               => __( 'Schedules list', 'faculty-weekly-schedule' ),
				'attributes'               => __( 'Schedules attributes', 'faculty-weekly-schedule' ),
				'name_admin_bar'           => __( 'Schedule', 'faculty-weekly-schedule' ),
				'item_published'           => __( 'Schedule published', 'faculty-weekly-schedule' ),
				'item_published_privately' => __( 'Schedule published privately.', 'faculty-weekly-schedule' ),
				'item_reverted_to_draft'   => __( 'Schedule reverted to draft.', 'faculty-weekly-schedule' ),
				'item_scheduled'           => __( 'Schedule scheduled', 'faculty-weekly-schedule' ),
				'item_updated'             => __( 'Schedule updated.', 'faculty-weekly-schedule' ),
				'parent_item_colon'        => __( 'Parent Schedule:', 'faculty-weekly-schedule' ),

				// (framework specific).
				'plugin_action_link'       => __( 'Schedules', 'faculty-weekly-schedule' ), // framework specific key. [3.7.3+].
			)
		: array();

	}

	/**
	 * Called when the edit.php page starts loading.
	 *
	 * Alternatively you can use the `load_{post type slug}` method and action hook.
	 */
	public function load() {

		$this->setAutoSave( false );
		$this->setAuthorTableFilter( false );
		add_filter( 'request', array( $this, 'replyToSortCustomColumn' ) );

	}

	/**
	 * Inserts a custom string into the left footer.
	 *
	 * @param mixed $s_html - The HTML content passed by WordPress.
	 *
	 * @callback        filter      footer_left_{class name}
	 * @return string - The content.
	 */
	public function footer_left_FWS_Schedule( $s_html ) {
		$settings_link = site_url() . '/wp-admin/admin.php?page=fws_settings_page';
		return '<a href="' . $settings_link . '">' . __( 'Change Default Schedule Settings', 'faculty-weekly-schedule' ) . '</a><br />'
		. $s_html;
	}

	/**
	 * Inserts a custom string into the left footer.
	 *
	 * @param mixed $s_html - The HTML content passed by WordPress.
	 *
	 * @callback        filter      footer_left_{class name}
	 * @return string - The content.
	 */
	public function footer_right_FWS_Schedule( $s_html ) {
		$help_link = site_url() . '/wp-admin/admin.php?page=fws_schedule_help';
		return '<a href="' . $help_link . '">' . __( 'See Faculty Weekly Schedule Help', 'faculty-weekly-schedule' ) . '</a><br />'
			. $s_html;
	}

	/**
	 * Built-in callback methods
	 *
	 * @param mixed $a_action_links - Provided by WordPress.
	 * @param mixed $o_post - Provided by WordPress.
	 *
	 * @callback    filter      action_links_{post type slug}
	 * @return      array
	 */
	public function action_links_schedule( $a_action_links, $o_post ) {
		return $a_action_links;
	}

	/**
	 * Built-in callback methods
	 *
	 * @param mixed $a_header_columns - Passed by WordPress.
	 *
	 * @callback        filter      columns_{post type slug}
	 * @return [type]
	 */
	public function columns_schedule( $a_header_columns ) {

		return array_merge(
			// $a_header_columns.
			array(
				'cb'                      => '<input type="checkbox" />', // Checkbox for bulk actions.
				'title'                   => __( 'Schedule Title', 'faculty-weekly-schedule' ), // Post title. Includes "edit", "quick edit", "trash" and "view" links. If $mode (set from $_REQUEST['mode']) is 'excerpt', a post excerpt is included between the title and links.
				'fws_schedule_start_date' => __( 'Start Date', 'faculty-weekly-schedule' ),
				'fws_schedule_start_time' => __( 'Start Time', 'faculty-weekly-schedule' ),
				'fws_schedule_end_date'   => __( 'End Date', 'faculty-weekly-schedule' ),
				'fws_schedule_end_time'   => __( 'End Time', 'faculty-weekly-schedule' ),
				'fws_office_count'        => __( 'Office Hours', 'faculty-weekly-schedule' ),
				'fws_classes_count'       => __( 'Classes', 'faculty-weekly-schedule' ),
				'fws_shortcode'           => __( 'Shortcode', 'faculty-weekly-schedule' ),
				'date'                    => __( 'Date', 'faculty-weekly-schedule' ),     // The date and publish status of the post.
			)
		);

	}

	/**
	 * Built-in callback methods.
	 *
	 * @param mixed $a_sortable_header_columns - Passed by WordPress.
	 *
	 * @callback        filter      sortable_columns_{post type slug}
	 * @return array - Array of sortable columns.
	 */
	public function sortable_columns_schedule( $a_sortable_header_columns ) {
		return /* $a_sortable_header_columns + */ array(
			'title'                   => 'title',
			'fws_schedule_start_date' => 'fws_schedule_start_date',
			'fws_schedule_end_date'   => 'fws_schedule_end_date',
		);
	}

	/**
	 * Determines the start date of a schedule.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @callback        filter      cell_{post type}_{column key}
	 * @return string - The start date of a schedule.
	 */
	public function cell_schedule_fws_schedule_start_date( $s_cell, $i_post_id ) {
		$timezone = new DateTimeZone( 'GMT' );

		if ( is_multisite() ) {
			$date_format = get_blog_option( get_current_blog_id(), 'date_format', false );
		} else {
			$date_format = get_site_option( 'date_format' );
		}
		$schedule_start_date = get_post_meta( $i_post_id, 'fws_schedule_dates', true )['fws_schedule_start_date'];
		if ( empty( $schedule_start_date ) ) {
			$fws_start_date = 'No start date set';
		} else {
			$fws_start_date = wp_date( $date_format, strtotime( $schedule_start_date ), $timezone );
		}

		return $fws_start_date;
	}

	/**
	 * Determines the end date of a schedule.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return string - The end date of a schedule.
	 */
	public function cell_schedule_fws_schedule_end_date( $s_cell, $i_post_id ) {
		$timezone = new DateTimeZone( 'GMT' );

		if ( is_multisite() ) {
			$date_format = get_blog_option( get_current_blog_id(), 'date_format', false );
		} else {
			$date_format = get_site_option( 'date_format' );
		}
		$schedule_end_date = get_post_meta( $i_post_id, 'fws_schedule_dates', true )['fws_schedule_end_date'];
		if ( empty( $schedule_end_date ) ) {
			$fws_end_date = 'No end date set';
		} else {
			$fws_end_date = wp_date( $date_format, strtotime( $schedule_end_date ), $timezone );
		}

		return $fws_end_date;
	}

	/**
	 * Determines the start time of the schedule.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return string - The start time of the schedule.
	 */
	public function cell_schedule_fws_schedule_start_time( $s_cell, $i_post_id ) {
		$timezone = new DateTimeZone( 'GMT' );

		if ( is_multisite() ) {
			$time_format = get_blog_option( get_current_blog_id(), 'time_format', false );
		} else {
			$time_format = get_site_option( 'time_format' );
		}
		$start_time_info     = get_post_meta( $i_post_id, 'fws_schedule_times', true );
		$start_time          = convert_time( $start_time_info['fws_start_time'] );
		$schedule_start_time = wp_date( $time_format, strtotime( $start_time ), $timezone );

		return $schedule_start_time;

	}

	/**
	 * Determines the end time of the schedule.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return string - The end time of the schedule.
	 */
	public function cell_schedule_fws_schedule_end_time( $s_cell, $i_post_id ) {
		$timezone = new DateTimeZone( 'GMT' );

		if ( is_multisite() ) {
			$time_format = get_blog_option( get_current_blog_id(), 'time_format', false );
		} else {
			$time_format = get_site_option( 'time_format' );
		}
		$end_time_info = get_post_meta( $i_post_id, 'fws_schedule_times', true );
		$end_time      = convert_time( $end_time_info['fws_end_time'] );
		if ( empty( $end_time ) ) {
			$fws_end_time = 'No end time set';
		} else {
			$fws_end_time = wp_date( $time_format, strtotime( $end_time ), $timezone );
		}

		return $fws_end_time;

	}

	/**
	 * Counts the number of office hours blocks.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return integer - The count of office hours blocks.
	 */
	public function cell_schedule_fws_office_count( $s_cell, $i_post_id ) {
		$office_hours_array = get_post_meta( $i_post_id, 'fws_office_hours_block', true );
		if ( ! is_empty_office_hours( $office_hours_array ) ) {
			$office_hours_count = count( $office_hours_array );
		} else {
			$office_hours_count = 0;
		}
		return $office_hours_count;
	}

	/**
	 * Counts the number of classes blocks.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return integer - The count of office hours blocks.
	 */
	public function cell_schedule_fws_classes_count( $s_cell, $i_post_id ) {
		$class_array = get_post_meta( $i_post_id, 'fws_classes_block', true );
		if ( ! is_empty_classes( $class_array ) ) {
			$class_count = count( $class_array );
		} else {
			$class_count = 0;
		}
		return $class_count;
	}

	/**
	 * Sets up the shortcode for a schedule.
	 *
	 * @param mixed $s_cell - Passed by WordPress.
	 * @param mixed $i_post_id - Passed by WordPress.
	 *
	 * @return string - The shortcode to be used that will display the schedule.
	 */
	public function cell_schedule_fws_shortcode( $s_cell, $i_post_id ) {

		return sprintf( '<span id="copy-schedule-%1$s">[fws-schedule id="%1$s"]</span> <!--<span title="' . __( 'Copy Shortcode to Clipboard', 'faculty-weekly-schedule' ) . '" class="dashicons dashicons-admin-page" onclick="javascript:navigator.clipboard.writeText(document.querySelector(\'#copy-schedule-%1$s\').innerText);alert(\'Shortcode copied to clipboard!\');"></span>--><br><a href="/wp-admin/admin.php?page=fws_schedule_help&tab=shortcodes">' . __( 'See Shortcode Help', 'faculty-weekly-schedule' ) . '</a>', $i_post_id );

	}

	/**
	 * Custom callback methods
	 */

	/**
	 * Modifies the way how the sample column is sorted. This makes it sorted by post ID.
	 *
	 * @param mixed $a_vars - Passed by WordPress.
	 *
	 * @see http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters.
	 * @callback        filter      request.
	 * @return array - Which columns are sortable in the schedule list.
	 */
	public function replyToSortCustomColumn( $a_vars ) {

		if ( isset( $a_vars['orderby'] ) && 'fws_schedule_start_date_' === $a_vars['orderby'] ) {
			$a_vars = array_merge(
				$a_vars,
				array(
					'meta_key' => 'fws_schedule_start_date',
					'orderby'  => 'fws_schedule_start_date',
				)
			);
		}
		if ( isset( $a_vars['orderby'] ) && 'fws_schedule_end_date_' === $a_vars['orderby'] ) {
			$a_vars = array_merge(
				$a_vars,
				array(
					'meta_key' => 'fws_schedule_end_date',
					'orderby'  => 'fws_schedule_end_date',
				)
			);
		}
		return $a_vars;
	}

	/**
	 * Modifies the output of the post content.
	 *
	 * This method is called in the single page of this class post type.
	 *
	 * Alternatively, you may use the 'content_{instantiated class name}' method,
	 *
	 * @param mixed $s_content - Passed by WordPress.
	 * @return string - The content of the schedule.
	 */
	public function content( $s_content ) {

		// 1. To retrieve the meta box data - get_post_meta( $post->ID ) will return an array of all the meta field values.
		// or if you know the field id of the value you want, you can do $value = get_post_meta( $post->ID, $field_id, true );
		$_i_post_id  = $GLOBALS['post']->ID;
		$a_post_data = array();

		foreach ( (array) get_post_custom_keys( $_i_post_id ) as $_s_key ) {    // This way, array will be unserialized; easier to view.
			$a_post_data[ $_s_key ] = get_post_meta( $_i_post_id, $_s_key, true );
		}

		// Or you may do this but the nested elements will be a serialized array.
		// $a_post_data = get_post_custom( $_i_post_id ).

		// 2. To retrieve the saved options in the setting pages created by the framework - use the get_option() function.
		// The key name is the class name by default. The key can be changed by passing an arbitrary string
		// to the first parameter of the constructor of the AdminPageFramework class.
		$_a_saved_options = get_option( 'FWS_Settings' );

		require FWS_PATH . '/schedule/show-developer.php';
		$debug_output = '';
		$alignment    = ( isset( $a_post_data['fws_alignment'] ) ) ? $a_post_data['fws_alignment'] : 'wide';
		if ( $show_developer ) {
			$debug_output .= '<div class="align' . $alignment . '">';
			$debug_output .= '<h2>' . __( 'Debug Information', 'faculty-weekly-schedule' ) . '</h2>'
			. '<h3>' . __( 'Saved Meta Field Values of the Post', 'faculty-weekly-schedule' ) . '</h3>'
			. $this->oDebug->get( $a_post_data )
			. '<h3>' . __( 'Saved Setting Options of The Loader Plugin', 'faculty-weekly-schedule' ) . '</h3>'
			. $this->oDebug->get( $_a_saved_options );
			$debug_output .= '</div>';
		}

		$output = get_schedule_output( $a_post_data, $_a_saved_options, 'all', '', $show_developer );

		return $output . $debug_output;
	}

}

new FWS_Schedule(
	FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'],  // the post type slug.
	array(),                                                       // the argument array. Here an empty array is passed because it is defined inside the class.
	FacultyWeeklySchedule_AdminPageFramework_Registry::$sFilePath,                 // the caller script path.
	'faculty-weekly-schedule'                                                     // the text domain.
);

// Setup the Schedule Metaboxes.
require_once FWS_PATH . '/schedule/post-type/schedule-metaboxes.php';
require_once FWS_PATH . '/schedule/post-type/schedule-shortcodes.php';
