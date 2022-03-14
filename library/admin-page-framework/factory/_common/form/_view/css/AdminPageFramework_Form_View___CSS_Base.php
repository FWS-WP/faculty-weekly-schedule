<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Base extends FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility {
    public $aAdded = array();
    public function add($sCSSRules)
    {
        $this->aAdded[] = $sCSSRules;
    }
    public function get()
    {
        $_sCSSRules = $this->_get() . PHP_EOL;
        $_sCSSRules .= $this->_getVersionSpecific();
        $_sCSSRules .= implode(PHP_EOL, $this->aAdded);
        return $_sCSSRules;
    }
    protected function _get()
    {
        return '';
    }
    protected function _getVersionSpecific()
    {
        return '';
    }
}
