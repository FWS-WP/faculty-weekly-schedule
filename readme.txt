=== Faculty Weekly Schedule ===
Contributors: profgeorgecooke
Donate link: https://giving.broward.edu/donate
Tags: faculty, weekly, schedule, office, hours, class, classes
Requires at least: 5.0
Tested up to: 5.8
Stable tag: 1.1.0
Requires PHP: 7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Define and display the weekly schedule of a faculty member.

== Description ==

Create a schedule for a semester that will display the office hours and classes of a faculty member to visitors of a site in a weekly format.

[youtube https://youtu.be/1RRUZW4U3IA]

= Key Features =

* Unlimited schedules
* Unlimited office hour blocks within a schedule
* Unlimited classes within a schedule
* Each office hours block/class can be scheduled on different days of the week
* Each office hours block/class can be displayed with a different background color
* Support for online classes which are not scheduled for a particular day of the week
* Support for default schedule values via Settings
* Shortcode support to include a specific schedule in any page or post
* Shortcode support to include the current schedule in any page or post
* Control over what in the schedule is displayed

== Installation ==

[youtube https://youtu.be/QqS7xpCBw9E]

Installing "Faculty Weekly Schedule" can be done by using one the following methods:

This section describes how to install the plugin. In general, there are 3 ways to i
= 1. Via WordPress dashboard =

* Click on 'Add New' in the plugins dashboard
* Search for 'Faculty Weekly Schedule'
* Click 'Install Now' button
* Activate the plugin from the same page or from the Plugins dashboard

= 2. Via uploading the plugin to WordPress dashboard =

* Download the plugin to your computer from (https://wordpress.org/plugins/faculty-weekly-schedule/)
* Click on 'Add New' in the plugins dashboard
* Click on 'Upload Plugin' button
* Select the zip file of the plugin that you have downloaded to your computer before
* Click 'Install Now'
* Activate the plugin from the Plugins dashboard

= 3. Via FTP =

* Download the plugin to your computer from (https://wordpress.org/plugins/faculty-weekly-schedule/)
* Unzip the zip file, which will extract the 'faculty-weekly-schedule' directory
* Upload the 'faculty-weekly-schedule' directory (included inside the extracted folder) to the /wp-content/plugins/ directory in your web space
* Activate the plugin from the Plugins dashboard

= For Multisite installation =

* Log in to your primary site and go to "My Sites" &raquo; "Network Admin" &raquo; "Plugins"
* Install the plugin following one of the above ways
* Network activate the plugin

= Where the plugin features can be accessed from? =

* The plugin features can be accessed via the "Weekly Schedules" admin menu

= Getting Started =

1. To specify default values for a new schedule:
    * Hover over 'Weekly Schedules' in the WordPress admin sidebar menu and then click 'Settings'
    * Review and change settings on each tab as desired
    * Save the changes made before selecting the next tab
    * See the Settings tab of the Help option in the Weekly Schedules admin menu for more information

2. To create a new schedule:
    * Hover over 'Weekly Schedules' in the WordPress admin sidebar menu and then click 'Add new Schedule'
    * Fill out the details about the schedule
    * Once desired information has been filled in, click the Publish button.
    * See the Schedule tab of the Help option in the Weekly Schedules admin menu for more information

3. To show a specific schedule to site visitors:
    * Hover over 'Weekly Schedules' in the WordPress admin sidebar menu and then click 'Weekly Schedules'
    * For the schedule that is to be shown, copy the shortcode shown in the schedules list
    * Hover over 'Pages' in the WordPress admin sidebar menu and then click 'Add new'
    * Type in a title for your schedule
    * If using the Block Editor, add a shortcode block and paste in the copied shortcode from the schedules list
    * If using the Classic Editor, paste in the copied shortcode from the schedules list
    * Add any other desired information to your schedule and then click the Publish button
    * Please note that it's usually best to display your schedule on a page that uses a wide (1-4 days per week) or full-width (5-7 days per week) page template (i.e. no sidebar)
    * See the Shortcodes tab of the Help option in the Weekly Schedules admin menu for more information

4. To show the current schedule to site visitors:
    * Hover over 'Pages' in the WordPress admin sidebar menu and then click 'Add new'
    * Type in a title for your current schedule
    * If using the Block Editor, add a shortcode block and enter [fws-schedule include="now"] as the shortcode
    * If using the Classic Editor, enter [fws-schedule include="now"]
    * Add any other desired information to your schedule and then click the Publish button
    * Please note that it's usually best to display your current schedule on a page that uses a wide (1-4 days per week) or full-width (5-7 days per week) page template (i.e. no sidebar)
    * See the Shortcodes tab of the Help option in the Weekly Schedules admin menu for more information


== Frequently Asked Questions ==

= My office hours and classes change during a semester. What is the best way to setup a weekly schedule? =
For each start and end date period, add a new schedule with the appropriate office hours and classes for that date period. Then use the shortcode include attribute to have the appropriate schedule shown for the current date.

= I am a faculty advisor with set advising hours. How do I include the advising times in my schedule? =
Either add a separate office hours block with a different block title and background color for each advising time block or add a new schedule with the same start and end dates as the regular office hours and classes schedule with the advising time blocks.

= Is multisite supported? =
Yes. Each site in a multisite will have separate settings and schedules.

= Is any data deleted when the plugin is deactivated? =
No. All schedule settings and all schedules added will be kept. On a multisite all schedule settings and all schedules added will be kept on all sites within the multisite network.

= Is any data deleted when the plugin is deleted? =
Yes. All schedule settings and all schedules added will be deleted. On a multisite all schedule settings and all schedules added will be deleted from all sites within the multisite network.

== Screenshots ==

1. Settings
2. Schedules listing
3. Add new schedule
4. Shortcode for a specific schedule
5. Shortcode for the current schedule
6. Example of a schedule
7. Help

== Changelog ==

= 1.1.0 (26 July 2021) =
* Updated for CampusPress programming requirements.
* Tested on WordPress version 5.8

= 1.0.0 (26 May 2021) =
* Initial Release.

== Upgrade Notice ==

= 1.1.0 =
Updated for CampusPress programming requirements.
Tested on WordPress version 5.8

= 1.0.0 =
Initial Release.
