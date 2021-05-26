/**
 * Silence is golden
 *
 * PHP Version: 7.3
 *
 * @category Faculty,_Weekly,_Schedule
 * @package  FacultyWeeklySchedule
 * @author   George Cooke <profgeorgecooke@gmail.com>
 * @license  GPL-2.0-or-later https://www.gnu.org/licenses/gpl-2.0.html
 * @link     https://wordpress.org/plugins/faculty-weekly-schedule
 */
function clipboardCopy(copyElement) {
	textElement = document.querySelector( copyElement );
	navigator.clipboard.writeText( textElement.innerText );
	alert( 'Shortcode copied to clipboard!' );
}
