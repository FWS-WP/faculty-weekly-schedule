<?php
/**
 * Help content for settings
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

$help_settings  = '';
$help_settings .= '<h3>' . __( 'Overview', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The Settings page is where defaults for information that is entered in a Schedule can be set. These defaults are the initial values for the corresponding information on a Schedule. The initial values can be overridden on the Settings page. <strong>Note:</strong> Once a settings tab has been saved, there is no way of restoring the original value.', 'faculty-weekly-schedule' ) . '</p>';
$help_settings .= '<p>';
$help_settings .= '<em>' . __( 'Note:', 'faculty-weekly-schedule' ) . '</em> ';
$help_settings .= __( 'The ', 'faculty-weekly-schedule' );
$help_settings .= '<strong>' . __( 'Save Changes', 'faculty-weekly-schedule' ) . '</strong>';
$help_settings .= __( ' option must be selected on each settings tab to store the changes made on that tab. Selecting another tab when settings changes have been made without saving will result in the changes being lost.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<nav class="fws-nav-help">';
$help_settings .= '<ul>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '<a href="#faculty">' . __( 'Faculty Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '&nbsp;|&nbsp;<a href="#office-hours">' . __( 'Office Hours Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '&nbsp;|&nbsp;<a href="#classes">' . __( 'Classes Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '&nbsp;|&nbsp;<a href="#options">' . __( 'Options Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '&nbsp;|&nbsp;<a href="#headings">' . __( 'Headings Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '<li style="display: inline-block;">';
$help_settings .= '&nbsp;|&nbsp;<a href="#messages">' . __( 'Messages Settings', 'faculty-weekly-schedule' ) . '</a>';
$help_settings .= '</li>';
$help_settings .= '</ul>';
$help_settings .= '</nav>';

// Faculty Settings Tab.
$help_settings .= '<h3 id="faculty">' . __( 'Faculty Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/admin.php?page=fws_settings_page&tab=fws_faculty_tab">' . __( 'Faculty Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to faculty whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/faculty.jpeg', __FILE__ ) ) . '" alt="' . __( 'Faculty Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Start Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default start time for a schedule. The default start time is used to set the start time whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'End Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default end time for a schedule. The default end time is used to set the end time whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Name', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default name for a schedule. The default name is used to set the name whenever a new schedule is added. The default name is optional and can be overridden when adding a schedule.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Title', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default title for a schedule. The default title is used to set the title whenever a new schedule is added. The default title is optional and can be overridden when adding a schedule.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Photo', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default photo for a schedule. The default photo is used to set the photo whenever a new schedule is added. The default photo is optional and can be overridden when adding a schedule.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';

// Office Hours Settings Tab.
$help_settings .= '<h3 id="office-hours">' . __( 'Office Hours Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/admin.php?page=fws_settings_page&tab=fws_office_hours_tab">' . __( 'Office Hours Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/office-hours.jpeg', __FILE__ ) ) . '" alt="' . __( 'Office Hours Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Start Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default start time for the first office hours block. The default start time is used to set the start time in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'End Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default end time for the first office hours block. The default end time is used to set the end time in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Block Title', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default block title for the first office hours block. The default block title is used to set the block title in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Campus', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default campus for the first office hours block. The default campus is used to set the campus in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Location', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default location for the first office hours block. The default location is used to set the location in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Office Hours Background Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background color for the first office hours block. The default background color is used to set the background color in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Office Hours Text Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default text color for the first office hours block. The default text color is used to set the text color in the first office hours block whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';

// Classes Settings Tab.
$help_settings .= '<h3 id="classes">' . __( 'Classes Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/admin.php?page=fws_settings_page&tab=fws_classes_tab">' . __( 'Classes Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to the first class whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/classes.jpeg', __FILE__ ) ) . '" alt="' . __( 'Classes Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Start Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default start time for the first class. The default start time is used to set the start time in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'End Time', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default end time for the first class. The default end time is used to set the end time in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Campus', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default campus for the first class. The default campus is used to set the campus in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Location', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default location for the first class. The default location is used to set the location in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Class Background Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background color for the first class. The default background color is used to set the background color in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Class Text Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default text color for the first class. The default text color is used to set the text color in the first class whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';

// Options Settings Tab.
$help_settings .= '<h3 id="options">' . __( 'Options Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/edit.php?post_type=fws-schedule&page=faculty_weekly_schedule_settings#fws_options">' . __( 'Options Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to options whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/options.jpeg', __FILE__ ) ) . '" alt="' . __( 'Options Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Display Options', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Check the items that should be displayed or options that should be used when a schedule is viewed. The default display options are used to set the display options whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Schedule Padding', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default amount of padding around the entire schedule. The default schedule padding is used to set the schedule padding whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Block Padding', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default amount of padding around the content in an office hours or class block. The default block padding is used to set the block padding whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Column Gap', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default size of the gaps between office hours and class blocks. The default column gap is used to set the column gap whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Photograph Display', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default display size of the photo, check whether the photo should be displayed and where the photo should displayed. The default photo options are used to set the photo options whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Title Background Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background color of the title for the schedule. The default background color is used to set the background color for the schedule title whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Title Text Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default text color of the title for the schedule. The default text color is used to set the text color for the schedule title whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Schedule Background Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background color of the entire schedule. The default background color is used to set the background color for the entire schedule whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Schedule Text Color', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default text color of the entire schedule. The default text color is used to set the text color for the entire schedule whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Alignment', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default alignment of the entire schedule. The default alignment is used to set the alignment for the entire schedule whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Schedule Date and Time Format', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default date and time format of the schedule title. The default date and time format is used to set the date and time format for the schedule title whenever a new schedule is added. If ', 'faculty-weekly-schedule' ) . ' <em>' . __( 'Site Settings', 'faculty-weekly-schedule' ) . '</em> ' . __( ' is selected, the settings per the ', 'faculty-weekly-schedule' ) . '<a href="/wp-admin/options-general.php">' . __( 'Settings', 'faculty-weekly-schedule' ) . ' &rarr; ' . __( 'General', 'faculty-weekly-schedule' ) . '</a> ' . __( 'are used.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Block Date and Time Format', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default date and time format of the office hours and classes blocks. The default date and time format is used to set the date and time format for the office hours and classes blocks whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';

// Headings Settings Tab.
$help_settings .= '<h3 id="headings">' . __( 'Headings Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/edit.php?post_type=fws-schedule&page=faculty_weekly_schedule_settings#fws_headings">' . __( 'Headings Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to headings whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/headings.jpeg', __FILE__ ) ) . '" alt="' . __( 'Headings Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Heading Options', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Check the default headings that should be displayed in the schedule. The default headings are used to set which headings should be displayed in a schedule whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Heading Text', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the default text for headings that should be displayed in the schedule. The default headings text are used to set the text for headings that should be displayed in a schedule whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Schedule Heading Colors', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background and text colors for schedule title heading in the schedule. The default background and text color is used to set the background and text color for the schedule title heading whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Classes and Office Hours Heading Colors', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background and text colors for the classes and office hours heading in the schedule. The default background and text color is used to set the background and text color for the classes and office hours heading whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Online Classes Heading Colors', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background and text colors for the online classes heading in the schedule. The default background and text color is used to set the background and text color for the online classes heading whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Day of Week Heading Colors', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select the default background and text colors for the day of week headings in the schedule. The default background and text color is used to set the background and text color for the day of week headings whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';

// Messages Settings Tab.
$help_settings .= '<h3 id="messages">' . __( 'Messages Settings Tab', 'faculty-weekly-schedule' ) . '</h3>';
$help_settings .= '<p>' . __( 'The', 'faculty-weekly-schedule' ) . ' <a href ="' . site_url() . '/wp-admin/edit.php?post_type=fws-schedule&page=faculty_weekly_schedule_settings#fws_messages">' . __( 'Messages Settings', 'faculty-weekly-schedule' ) . '</a> ' . __( 'tab allows setting the default values relating to messages whenever a new schedule is added.', 'faculty-weekly-schedule' ) . '.</p>';
$help_settings .= '<p><img src="' . esc_url( plugins_url( 'settings/messages.jpeg', __FILE__ ) ) . '" alt="' . __( 'Messages Settings', 'faculty-weekly-schedule' ) . '" /></p>';
$help_settings .= '<h4>' . __( 'Show Before Message', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select whether the before message should be displayed in the schedule. The default show before message setting is used to set whether the show before message options is on or off whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Before Message Alignment', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select how the before message should be aligned within the schedule. The default before message alignment setting is used to set how the before message is aligned whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Before Message', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the before message for a schedule. The default before message value is used to set the before message whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'Show After Message', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select whether the after message should be displayed in the schedule. The default show after message setting is used to set whether the show after message options is on or off whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'After Message Alignment', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Select how the after message should be aligned within the schedule. The default after message alignment setting is used to set how the after message is aligned whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
$help_settings .= '<h4>' . __( 'After Message', 'faculty-weekly-schedule' ) . '</h4>';
$help_settings .= '<p>';
$help_settings .= __( 'Enter the after message for a schedule. The default after message value is used to set the after message whenever a new schedule is added.', 'faculty-weekly-schedule' );
$help_settings .= '</p>';
