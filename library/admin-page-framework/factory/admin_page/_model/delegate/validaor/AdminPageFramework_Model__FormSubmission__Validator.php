<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator extends FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator_Base {
    public $oFactory;
    public $aInputs = array();
    public $aRawInputs = array();
    public $aOptions = array();
    public function __construct($oFactory)
    {
        $this->oFactory = $oFactory;
        add_filter("validation_pre_" . $this->oFactory->oProp->sClassName, array( $this, '_replyToValidateUserFormInputs' ), 10, 4);
    }
    public function _replyToValidateUserFormInputs($aInputs, $aRawInputs, $aOptions, $oFactory)
    {
        $_sTabSlug = sanitize_text_field($this->getElement($_POST, 'tab_slug', ''));
        $_sPageSlug = sanitize_text_field($this->getElement($_POST, 'page_slug', ''));
        $_aSubmits = $this->getHTTPRequestSanitized($this->getElementAsArray($_POST, '__submit', array()));
        $_sPressedInputName = $this->_getPressedSubmitButtonData($_aSubmits, 'name');
        $_sSubmitSectionID = $this->_getPressedSubmitButtonData($_aSubmits, 'section_id');
        $_aSubmitsInformation = array( 'page_slug' => $_sPageSlug, 'tab_slug' => $_sTabSlug, 'input_id' => $this->_getPressedSubmitButtonData($_aSubmits, 'input_id'), 'section_id' => $_sSubmitSectionID, 'field_id' => $this->_getPressedSubmitButtonData($_aSubmits, 'field_id'), 'input_name' => $_sPressedInputName, );
        $_aClassNames = array( 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Link', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Redirect', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Import', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Export', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Reset', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__ResetConfirm', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__ContactForm', 'FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__ContactFormConfirm', );
        foreach ($_aClassNames as $_sClassName) {
            new $_sClassName($this->oFactory);
        }
        try {
            $this->addAndDoActions($this->oFactory, 'try_validation_before_' . $this->oFactory->oProp->sClassName, $aInputs, $aRawInputs, $_aSubmits, $_aSubmitsInformation, $this->oFactory);
            $_oFormSubmissionFilter = new FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Filter($this->oFactory, $aInputs, $aRawInputs, $aOptions, $_aSubmitsInformation);
            $aInputs = $_oFormSubmissionFilter->get();
            $this->addAndDoActions($this->oFactory, 'try_validation_after_' . $this->oFactory->oProp->sClassName, $aInputs, $aRawInputs, $_aSubmits, $_aSubmitsInformation, $this->oFactory);
        } catch (Exception $_oException) {
            $_sPropertyName = $_oException->getMessage();
            if (isset($_oException->$_sPropertyName)) {
                $this->_setSettingNoticeAfterValidation(empty($_oException->{$_sPropertyName}));
                return $_oException->{$_sPropertyName};
            }
            return array();
        }
        $this->_setSettingNoticeAfterValidation(empty($aInputs));
        return $aInputs;
    }
}
