<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator__Link extends FacultyWeeklySchedule_AdminPageFramework_Model__FormSubmission__Validator_Base {
    public $sActionHookPrefix = 'try_validation_before_';
    public $iHookPriority = 30;
    public $iCallbackParameters = 5;
    public function _replyToCallback($aInputs, $aRawInputs, array $aSubmits, $aSubmitInformation, $oFactory)
    {
        $_sLinkURL = $this->_getPressedSubmitButtonData($aSubmits, 'href');
        if (! $_sLinkURL) {
            return;
        }
        $this->goToURL($_sLinkURL);
    }
}
