<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Loading extends FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        $_sSpinnerPath = $this->getWPAdminDirPath() . '/images/wpspin_light-2x.gif';
        if (! file_exists($_sSpinnerPath)) {
            return '';
        }
        $_sSpinnerURL = esc_url(admin_url('/images/wpspin_light-2x.gif'));
        return <<<CSSRULES
.faculty-weekly-schedule-form-loading{position:absolute;background-image:url({$_sSpinnerURL});background-repeat:no-repeat;background-size:32px 32px;background-position:center;display:block!important;width:92%;height:70%;opacity:.5}
CSSRULES;
    }
}
