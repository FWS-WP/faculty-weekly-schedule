<?php
/**
 * Help content for tips and faqs
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

$help_tips_faq  = '';
$help_tips_faq .= '<h3>' . __( 'Overview', 'faculty-weekly-schedule' ) . '</h3>';
$help_tips_faq .= '<p>' . __( 'If you have questions or need assistance, check the FAQs, Tips or Errors sections below.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '<h3>' . __( 'FAQs', 'faculty-weekly-schedule' ) . '</h3>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'My office hours and classes change during a semester. What is the best way to setup a weekly schedule?', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'For each start and end date period, add a new schedule with the appropriate office hours and classes for that date period. Then use the', 'faculty-weekly-schedule' ) . ' <strong>include="now"</strong> ' . __( 'shortcode attribute to have the appropriate schedule shown for the current date. See "Setup a schedule display page once" in the Tips section.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'I am a faculty advisor with set advising hours. How do I include the advising times in my schedule?', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Either add a separate office hours block with a different block title and background color for each advising time block or add a new schedule with the same start and end dates as the regular office hours and classes schedule with the advising time blocks.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Is multisite supported?', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Yes. Each site in a multisite will have separate settings and schedules.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Is any data deleted when the plugin is deactivated?', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'No. All schedule settings and all schedules added will be kept. On a multisite all schedule settings and all schedules added will be kept on all sites within the multisite network.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Is any data deleted when the plugin is deleted?', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Yes. All schedule settings and all schedules added will be deleted. On a multisite all schedule settings and all schedules added will be deleted from all sites within the multisite network.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<h3>' . __( 'Tips', 'faculty-weekly-schedule' ) . '</h3>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Choose settings first.', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Take the time to choose default', 'faculty-weekly-schedule' ) . ' <a href="' . site_url() . '/wp-admin/admin.php?page=fws_settings_page">' . __( 'Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'before creating schedules as the amount time of typing and choosing options can be significantly reduced.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Setup a schedule display page once.', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Create a Page with a generic title such as Current Schedule and add the shortcode', 'faculty-weekly-schedule' ) . ' <strong>[fws-schedule include="now"]</strong> ' . __( 'to the page. Then each term/semester/session, add a Schedule with the appropriate start and end dates. The shortcode will determine which schedule is current based on the current date falling within the start and end date of the schedule.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<h3>' . __( 'Errors', 'faculty-weekly-schedule' ) . '</h3>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'Something went wrong. Please check the', 'faculty-weekly-schedule' ) . ' [fws-schedule] ' . __( 'shortcode attributes for valid data.', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Likely issue is that the id attribute value refers to a schedule that does not exist.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
$help_tips_faq .= '<details>';
$help_tips_faq .= '<summary>';
$help_tips_faq .= __( 'No schedules found to display.', 'faculty-weekly-schedule' );
$help_tips_faq .= '</summary>';
$help_tips_faq .= '<p>' . __( 'Likely issue is that there are no schedules for the current date or specified date. If a schedule does exist for the current or specified date, check that it has been published.', 'faculty-weekly-schedule' ) . '</p>';
$help_tips_faq .= '</details>';
// . $help-tips-faq.php;
