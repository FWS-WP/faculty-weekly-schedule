<?php
/**
 * Creates settings save metabox
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
 * [Description FWS_Settings_SidePage]
 */
class FWS_Settings_SidePage extends FacultyWeeklySchedule_AdminPageFramework_PageMetaBox {

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
				'field_id'          => 'submit_in_page_meta_box',
				'type'              => 'submit',
				'show_title_column' => false,
				'label_min_width'   => '',
				'attributes'        => array(
					'field' => array(
						'style' => 'float:left; width:auto;',
					),
				),
				'value'             => 'Save Settings',
			)
		);

		// content_{page slug}_{tab slug}.
		add_filter( 'content_fws_settings_page_fws_developer_tab', array( $this, 'replyToInsertContents' ) );

	}

	/**
	 * Called when content is inserted
	 *
	 * @param mixed $s_content - Passed by WordPress.
	 *
	 * @callback    filter      content_{page slug}_{tab slug}
	 * @return      string
	 */
	public function replyToInsertContents( $s_content ) {

		$a_options = get_option( 'FWS_Settings', array() );
		return $s_content
			. '<h3>' . __( 'Saved Options', 'faculty-weekly-schedule' ) . '</h3>'
			. FacultyWeeklySchedule_AdminPageFramework_Debug::getArray( $a_options );

	}

	/**
	 * The content filter callback method.
	 *
	 * Alternatively use the `content_{instantiated class name}` method instead.
	 *
	 * @param mixed $s_content - Passed by WordPress.
	 *
	 * @return      string
	 */
	public function content( $s_content ) {

		/* translators: %1$s is replaced with the function the text is in */
		$_s_insert = '<p>' . sprintf( __( 'This text is inserted with the <code>%1$s</code> method.', 'faculty-weekly-schedule' ), __FUNCTION__ ) . '</p>';
		return $s_content;

	}

}

new FWS_Settings_SidePage(
	null,                                           // meta box id - passing null will make it auto generate.
	' ', // title.
	'fws_settings_page',
	'side',                                         // context.
	'default'                                       // priority.
);
