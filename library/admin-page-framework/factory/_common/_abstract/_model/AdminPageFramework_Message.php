<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Message {
    public $aMessages = array();
    public $aDefaults = array( 'option_updated' => 'The options have been updated.', 'option_cleared' => 'The options have been cleared.', 'export' => 'Export', 'export_options' => 'Export Options', 'import' => 'Import', 'import_options' => 'Import Options', 'submit' => 'Submit', 'import_error' => 'An error occurred while uploading the import file.', 'uploaded_file_type_not_supported' => 'The uploaded file type is not supported: %1$s', 'could_not_load_importing_data' => 'Could not load the importing data.', 'imported_data' => 'The uploaded file has been imported.', 'not_imported_data' => 'No data could be imported.', 'upload_image' => 'Upload Image', 'use_this_image' => 'Use This Image', 'insert_from_url' => 'Insert from URL', 'reset_options' => 'Are you sure you want to reset the options?', 'confirm_perform_task' => 'Please confirm your action.', 'specified_option_been_deleted' => 'The specified options have been deleted.', 'nonce_verification_failed' => 'A problem occurred while processing the form data. Please try again.', 'check_max_input_vars' => 'Not all form fields could not be sent. ' . 'Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. ' . '<code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'send_email' => 'Is it okay to send the email?', 'email_sent' => 'The email has been sent.', 'email_scheduled' => 'The email has been scheduled.', 'email_could_not_send' => 'There was a problem sending the email', 'title' => 'Title', 'author' => 'Author', 'categories' => 'Categories', 'tags' => 'Tags', 'comments' => 'Comments', 'date' => 'Date', 'show_all' => 'Show All', 'show_all_authors' => 'Show all Authors', 'powered_by' => 'Thank you for creating with', 'and' => 'and', 'settings' => 'Settings', 'manage' => 'Manage', 'select_image' => 'Select Image', 'upload_file' => 'Upload File', 'use_this_file' => 'Use This File', 'select_file' => 'Select File', 'remove_value' => 'Remove Value', 'select_all' => 'Select All', 'select_none' => 'Select None', 'no_term_found' => 'No term found.', 'select' => 'Select', 'insert' => 'Insert', 'use_this' => 'Use This', 'return_to_library' => 'Return to Library', 'queries_in_seconds' => '%1$s queries in %2$s seconds.', 'out_of_x_memory_used' => '%1$s out of %2$s (%3$s) memory used.', 'peak_memory_usage' => 'Peak memory usage %1$s.', 'initial_memory_usage' => 'Initial memory usage  %1$s.', 'repeatable_section_is_disabled' => 'The ability to repeat sections is disabled.', 'repeatable_field_is_disabled' => 'The ability to repeat fields is disabled.', 'warning_caption' => 'Warning', 'allowed_maximum_number_of_fields' => 'The allowed maximum number of fields is {0}.', 'allowed_minimum_number_of_fields' => 'The allowed minimum number of fields is {0}.', 'add' => 'Add', 'remove' => 'Remove', 'allowed_maximum_number_of_sections' => 'The allowed maximum number of sections is {0}', 'allowed_minimum_number_of_sections' => 'The allowed minimum number of sections is {0}', 'add_section' => 'Add Section', 'remove_section' => 'Remove Section', 'toggle_all' => 'Toggle All', 'toggle_all_collapsible_sections' => 'Toggle all collapsible sections', 'reset' => 'Reset', 'yes' => 'Yes', 'no' => 'No', 'on' => 'On', 'off' => 'Off', 'enabled' => 'Enabled', 'disabled' => 'Disabled', 'supported' => 'Supported', 'not_supported' => 'Not Supported', 'functional' => 'Functional', 'not_functional' => 'Not Functional', 'too_long' => 'Too Long', 'acceptable' => 'Acceptable', 'no_log_found' => 'No log found.', 'method_called_too_early' => 'The method is called too early.', 'debug_info' => 'Debug Info', 'debug' => 'Debug', 'debug_info_will_be_disabled' => 'This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'click_to_expand' => 'Click here to expand to view the contents.', 'click_to_collapse' => 'Click here to collapse the contents.', 'loading' => 'Loading...', 'please_enable_javascript' => 'Please enable JavaScript for better user experience.', 'submit_confirmation_label' => 'Submit the form.', 'submit_confirmation_error' => 'Please check this box if you want to proceed.', 'import_no_file' => 'No file is selected.', 'please_fill_out_this_field' => 'Please fill out this field.', );
    protected $_sTextDomain = 'faculty-weekly-schedule';
    private static $_aInstancesByTextDomain = array();
    public static function getInstance($sTextDomain='faculty-weekly-schedule')
    {
        $_oInstance = isset(self::$_aInstancesByTextDomain[ $sTextDomain ]) && (self::$_aInstancesByTextDomain[ $sTextDomain ] instanceof FacultyWeeklySchedule_AdminPageFramework_Message) ? self::$_aInstancesByTextDomain[ $sTextDomain ] : new FacultyWeeklySchedule_AdminPageFramework_Message($sTextDomain);
        self::$_aInstancesByTextDomain[ $sTextDomain ] = $_oInstance;
        return self::$_aInstancesByTextDomain[ $sTextDomain ];
    }
    public static function instantiate($sTextDomain='faculty-weekly-schedule')
    {
        return self::getInstance($sTextDomain);
    }
    public function __construct($sTextDomain='faculty-weekly-schedule')
    {
        $this->_sTextDomain = $sTextDomain;
        $this->aMessages = array_fill_keys(array_keys($this->aDefaults), null);
    }
    public function getTextDomain()
    {
        return $this->_sTextDomain;
    }
    public function set($sKey, $sValue)
    {
        $this->aMessages[ $sKey ] = $sValue;
    }
    public function get($sKey='')
    {
        if (! $sKey) {
            return $this->_getAllMessages();
        }
        return isset($this->aMessages[ $sKey ]) ? __($this->aMessages[ $sKey ], $this->_sTextDomain) : __($this->{$sKey}, $this->_sTextDomain);
    }
    private function _getAllMessages()
    {
        $_aMessages = array();
        foreach ($this->aMessages as $_sLabel => $_sTranslation) {
            $_aMessages[ $_sLabel ] = $this->get($_sLabel);
        }
        return $_aMessages;
    }
    public function output($sKey)
    {
        echo $this->get($sKey);
    }
    public function __($sKey)
    {
        return $this->get($sKey);
    }
    public function _e($sKey)
    {
        $this->output($sKey);
    }
    public function __get($sPropertyName)
    {
        return isset($this->aDefaults[ $sPropertyName ]) ? $this->aDefaults[ $sPropertyName ] : $sPropertyName;
    }
    private function ___doDummy()
    {
        __('The options have been updated.', 'faculty-weekly-schedule');
        __('The options have been cleared.', 'faculty-weekly-schedule');
        __('Export', 'faculty-weekly-schedule');
        __('Export Options', 'faculty-weekly-schedule');
        __('Import', 'faculty-weekly-schedule');
        __('Import Options', 'faculty-weekly-schedule');
        __('Submit', 'faculty-weekly-schedule');
        __('An error occurred while uploading the import file.', 'faculty-weekly-schedule');
        __('The uploaded file type is not supported: %1$s', 'faculty-weekly-schedule');
        __('Could not load the importing data.', 'faculty-weekly-schedule');
        __('The uploaded file has been imported.', 'faculty-weekly-schedule');
        __('No data could be imported.', 'faculty-weekly-schedule');
        __('Upload Image', 'faculty-weekly-schedule');
        __('Use This Image', 'faculty-weekly-schedule');
        __('Insert from URL', 'faculty-weekly-schedule');
        __('Are you sure you want to reset the options?', 'faculty-weekly-schedule');
        __('Please confirm your action.', 'faculty-weekly-schedule');
        __('The specified options have been deleted.', 'faculty-weekly-schedule');
        __('A problem occurred while processing the form data. Please try again.', 'faculty-weekly-schedule');
        __('Not all form fields could not be sent. Please check your server settings of PHP <code>max_input_vars</code> and consult the server administrator to increase the value. <code>max input vars</code>: %1$s. <code>$_POST</code> count: %2$s', 'faculty-weekly-schedule');
        __('Is it okay to send the email?', 'faculty-weekly-schedule');
        __('The email has been sent.', 'faculty-weekly-schedule');
        __('The email has been scheduled.', 'faculty-weekly-schedule');
        __('There was a problem sending the email', 'faculty-weekly-schedule');
        __('Title', 'faculty-weekly-schedule');
        __('Author', 'faculty-weekly-schedule');
        __('Categories', 'faculty-weekly-schedule');
        __('Tags', 'faculty-weekly-schedule');
        __('Comments', 'faculty-weekly-schedule');
        __('Date', 'faculty-weekly-schedule');
        __('Show All', 'faculty-weekly-schedule');
        __('Show All Authors', 'faculty-weekly-schedule');
        __('Thank you for creating with', 'faculty-weekly-schedule');
        __('and', 'faculty-weekly-schedule');
        __('Settings', 'faculty-weekly-schedule');
        __('Manage', 'faculty-weekly-schedule');
        __('Select Image', 'faculty-weekly-schedule');
        __('Upload File', 'faculty-weekly-schedule');
        __('Use This File', 'faculty-weekly-schedule');
        __('Select File', 'faculty-weekly-schedule');
        __('Remove Value', 'faculty-weekly-schedule');
        __('Select All', 'faculty-weekly-schedule');
        __('Select None', 'faculty-weekly-schedule');
        __('No term found.', 'faculty-weekly-schedule');
        __('Select', 'faculty-weekly-schedule');
        __('Insert', 'faculty-weekly-schedule');
        __('Use This', 'faculty-weekly-schedule');
        __('Return to Library', 'faculty-weekly-schedule');
        __('%1$s queries in %2$s seconds.', 'faculty-weekly-schedule');
        __('%1$s out of %2$s MB (%3$s) memory used.', 'faculty-weekly-schedule');
        __('Peak memory usage %1$s MB.', 'faculty-weekly-schedule');
        __('Initial memory usage  %1$s MB.', 'faculty-weekly-schedule');
        __('The allowed maximum number of fields is {0}.', 'faculty-weekly-schedule');
        __('The allowed minimum number of fields is {0}.', 'faculty-weekly-schedule');
        __('Add', 'faculty-weekly-schedule');
        __('Remove', 'faculty-weekly-schedule');
        __('The allowed maximum number of sections is {0}', 'faculty-weekly-schedule');
        __('The allowed minimum number of sections is {0}', 'faculty-weekly-schedule');
        __('Add Section', 'faculty-weekly-schedule');
        __('Remove Section', 'faculty-weekly-schedule');
        __('Toggle All', 'faculty-weekly-schedule');
        __('Toggle all collapsible sections', 'faculty-weekly-schedule');
        __('Reset', 'faculty-weekly-schedule');
        __('Yes', 'faculty-weekly-schedule');
        __('No', 'faculty-weekly-schedule');
        __('On', 'faculty-weekly-schedule');
        __('Off', 'faculty-weekly-schedule');
        __('Enabled', 'faculty-weekly-schedule');
        __('Disabled', 'faculty-weekly-schedule');
        __('Supported', 'faculty-weekly-schedule');
        __('Not Supported', 'faculty-weekly-schedule');
        __('Functional', 'faculty-weekly-schedule');
        __('Not Functional', 'faculty-weekly-schedule');
        __('Too Long', 'faculty-weekly-schedule');
        __('Acceptable', 'faculty-weekly-schedule');
        __('No log found.', 'faculty-weekly-schedule');
        __('The method is called too early: %1$s', 'faculty-weekly-schedule');
        __('Debug Info', 'faculty-weekly-schedule');
        __('Click here to expand to view the contents.', 'faculty-weekly-schedule');
        __('Click here to collapse the contents.', 'faculty-weekly-schedule');
        __('Loading...', 'faculty-weekly-schedule');
        __('Please enable JavaScript for better user experience.', 'faculty-weekly-schedule');
        __('Debug', 'faculty-weekly-schedule');
        __('This information will be disabled when <code>WP_DEBUG</code> is set to <code>false</code> in <code>wp-config.php</code>.', 'faculty-weekly-schedule');
        __('The ability to repeat sections is disabled.', 'faculty-weekly-schedule');
        __('The ability to repeat fields is disabled.', 'faculty-weekly-schedule');
        __('Warning.', 'faculty-weekly-schedule');
        __('Submit the form.', 'faculty-weekly-schedule');
        __('Please check this box if you want to proceed.', 'faculty-weekly-schedule');
        __('No file is selected.', 'faculty-weekly-schedule');
        __('Please fill out this field.', 'faculty-weekly-schedule');
    }
}
