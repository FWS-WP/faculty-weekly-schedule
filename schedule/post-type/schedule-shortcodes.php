<?php
/**
 * Creates shortcodes
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
 * Determines if a post exists
 *
 * @param mixed $id The ID of the post.
 *
 * @return boolean If the post is found.
 */
function fws_post_exists( $id ) {
	$post_status = get_post_status( $id );
	if ( is_string( $post_status ) ) {
		if ( 'publish' !== $post_status && 'draft' !== $post_status ) {
			$post_status = false;
		}
	}
	return is_string( $post_status );
}
/**
 * The [fws] shortcode.
 *
 * Accepts a title and will display a box.
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function fws_shortcode( $atts = array(), $content = null, $tag = '' ) {
	// normalize attribute keys, lowercase.
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	// override default attributes with user attributes.
	$fws_atts = shortcode_atts(
		array(
			'id'      => '',
			'include' => '',
		),
		$atts,
		$tag
	);

	// 1. To retrieve the meta box data - get_post_meta( $post->ID ) will return an array of all the meta field values.
	// or if you know the field id of the value you want, you can do $value = get_post_meta( $post->ID, $field_id, true );.

	if ( '' === $fws_atts['id'] && '' === $fws_atts['include'] ) {
		return '<p>' . __( 'No schedule shortcode attributes supplied. Either', 'faculty-weekly-schedule' ) . ' <strong>id</strong> ' . __( 'or', 'faculty-weekly-schedule' ) . ' <strong>include</strong> ' . __( 'or both must be entered to indicate which schedule to display.', 'faculty-weekly-schedule' ) . '</p>';
	}

	$schedules_found = array();
	$schedule_date   = '';
	$post_type       = FacultyWeeklySchedule_AdminPageFramework_Registry::$aPostTypes['fws'];

	if ( '' === $fws_atts['id'] && '' !== $fws_atts['include'] ) {
		if ( 'all' === $fws_atts['include'] ) {
			return '<p>' . __( 'No', 'faculty-weekly-schedule' ) . ' <strong>id</strong> ' . __( 'attribute provided when', 'faculty-weekly-schedule' ) . ' <strong>include</strong> ' . __( 'attribute is equal to', 'faculty-weekly-schedule' ) . ' <em>all</em>.</p>';
		}
		$timezone    = new DateTimeZone( 'GMT' );
		$date_format = 'Y-m-d';
		if ( 'now' === $fws_atts['include'] ) {
			$schedule_date = wp_date( $date_format, strtotime( 'now' ), $timezone );
		} else {
			$schedule_date = wp_date( $date_format, strtotime( $fws_atts['include'] ), $timezone );
		}

		$schedules = get_posts(
			array(
				'post_type'        => $post_type,
				'post_status'      => 'publish',
				'suppress_filters' => false,
				'posts_per_page'   => -1,
				'order'            => 'ASC',
				'orderby'          => 'title',
			)
		);

		foreach ( $schedules as $schedule_id ) {
			$fws_schedule_dates = get_post_meta( $schedule_id->ID, 'fws_schedule_dates', true );
			$start_date         = $fws_schedule_dates['fws_schedule_start_date'];
			$end_date           = $fws_schedule_dates['fws_schedule_end_date'];
			if ( $schedule_date >= $start_date && $schedule_date <= $end_date ) {
				array_push( $schedules_found, $schedule_id->ID );
			}
		}
	} else {
		if ( '' !== $fws_atts['id'] ) {
			if ( fws_post_exists( $fws_atts['id'] ) ) {
				array_push( $schedules_found, $fws_atts['id'] );
			}
		}
	}

	if ( count( $schedules_found ) === 0 ) {
		return '<p>' . __( 'No schedules found to display.', 'faculty-weekly-schedule' ) . '</p>';
	}

	$output = '';

	foreach ( $schedules_found as $schedule ) {
		$i_post_id   = $schedule;
		$a_post_data = array();
		foreach ( (array) get_post_custom_keys( $i_post_id ) as $s_key ) {    // This way, array will be unserialized; easier to view.
			$a_post_data[ $s_key ] = get_post_meta( $i_post_id, $s_key, true );
		}

		// 2. To retrieve the saved options in the setting pages created by the framework - use the get_option() function.
		// The key name is the class name by default. The key can be changed by passing an arbitrary string.
		// to the first parameter of the constructor of the AdminPageFramework class.
		$a_saved_options = get_option( 'FWS_Settings' );
		$output         .= get_schedule_output( $a_post_data, $a_saved_options, '' === $fws_atts['include'] ? 'all' : $fws_atts['include'], $schedule_date );

		// enclosing tags.
		if ( ! is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content.
			$output .= apply_filters( 'the_content', $content );

			// run shortcode parser recursively.
			$output .= do_shortcode( $content );
		}
	}

	if ( '' === $output ) {
		$output = '<p>' . __( 'Something went wrong. Please check the', 'faculty-weekly-schedule' ) . ' [fws-schedule] ' . __( 'shortcode attributes for valid data.', 'faculty-weekly-schedule' ) . '</p>';
	}

	return $output;
}

/**
 * Central location to create all shortcodes.
 */
function fws_shortcodes_init() {
	add_shortcode( 'fws-schedule', 'fws_shortcode' );
}

add_action( 'init', 'fws_shortcodes_init' );
