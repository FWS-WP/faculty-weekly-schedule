<?php
/**
 * Help content for shortcodes
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

$help_shortcodes  = '';
$help_shortcodes .= '<h3>' . __( 'Overview', 'faculty-weekly-schedule' ) . '</h3>';
$help_shortcodes .= '<p>' . __( 'Shortcodes are used to display details of schedules added. Shortcodes can be used in either Posts or Pages depending on how schedule information is to be presented on a site. For posts/pages using the classic editor, add the appropriate shortcode and it\'s attributes to the post/page. For the block editor, first add a shortcode block and then enter the appropriate shortcode and it\'s attributes to the shortcode block.', 'faculty-weekly-schedule' ) . '</p>';
$help_shortcodes .= '<h3>' . __( 'Shortcode', 'faculty-weekly-schedule' ) . '</h3>';
$help_shortcodes .= '<p>[fws-schedule id="9" include="now"]</p>';
$help_shortcodes .= '<h3>' . __( 'Shortcode Attributes', 'faculty-weekly-schedule' ) . '</h3>';
$help_shortcodes .= '<ul style="margin-left: 3em;">';
$help_shortcodes .= '<li style="list-style: disc;">';
$help_shortcodes .= '<strong>id</strong> (Optional) - ' . __( 'The id allocated by the system to a specific schedule', 'faculty-weekly-schedule' );
$help_shortcodes .= '</li>';
$help_shortcodes .= '<li style="list-style: disc;">';
$help_shortcodes .= '<strong>include</strong> (Optional) - ' . __( 'Determines which schedules and blocks to include by date. Valid values are <strong>all | now | date</strong> where <em>now</em> will be set to the current date and <em>date</em> is a date in the format YYYY-MM-DD. If not specified, defaults to <strong>all</strong>.', 'faculty-weekly-schedule' );
$help_shortcodes .= '</li>';
$help_shortcodes .= '</ul>';
$help_shortcodes .= '<p>' . __( 'While both id and include attributes are optional, at least one or both must be specified. i.e. Either id must be specified, or include specified, or both specified. If id only is specified, then the schedule with that id is displayed even if the schedule is in draft mode. If only include is specified, the value cannot be all. If only include is specified with a value of now or a valid date, then only schedules that have been published will be displayed. If more than one published schedule has the include date, or when now specified - the current date, between the start and end dates of the schedule, all matching schedules will be displayed.', 'faculty-weekly-schedule' ) . '</p>';
$help_shortcodes .= '<p>' . __( 'If both id and include are specified and include is all, then all blocks will be displayed for the schedule with the specified id. If include is now or an included date, then only blocks where the current date or included date is between the start and end date of the block will be displayed. If a block has no start or end date, it will be displayed irrespective of the date specified.', 'faculty-weekly-schedule' ) . '</p>';
$help_shortcodes .= '<p>' . __( 'If a schedule is previewed, then the id is automatically set to the id of the schedule being previewed and include will always be all.', 'faculty-weekly-schedule' ) . '</p>';
$help_shortcodes .= '<h3>' . __( 'Example', 'faculty-weekly-schedule' ) . '</h3>';
$help_shortcodes .= '<p><a href="' . esc_url( plugins_url( 'shortcodes/shortcode-preview.jpeg', __FILE__ ) ) . '" target="_blank"><img src="' . esc_url( plugins_url( 'shortcodes/shortcode-preview.jpeg', __FILE__ ) ) . '" alt="' . __( 'Shortcode Preview', 'faculty-weekly-schedule' ) . '" style="width: 40%;" /></a> <a href="' . esc_url( plugins_url( 'shortcodes/shortcode-example.jpeg', __FILE__ ) ) . '" target="_blank"><img src="' . esc_url( plugins_url( 'shortcodes/shortcode-example.jpeg', __FILE__ ) ) . '" alt="' . __( 'Shortcode Preview', 'faculty-weekly-schedule' ) . '" style="width: 40%;" /></a></p>';
$help_shortcodes .= '<p> - ' . __( 'Click image for a larger view', 'faculty-weekly-schedule' ) . '</p>';
