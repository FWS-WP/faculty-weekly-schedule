<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class FacultyWeeklySchedule_AdminPageFramework_CustomSubmitFields extends FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility {
    public $aPost = array();
    public $sInputID;
    public function __construct(array $aPostElement)
    {
        $this->aPost = $aPostElement;
        $this->sInputID = $this->getInputID($aPostElement['submit']);
    }
    protected function getSubmitValueByType($aElement, $sInputID, $sElementKey='format')
    {
        return $this->getElement($aElement, array( $sInputID, $sElementKey ), null);
    }
    public function getSiblingValue($sKey)
    {
        return $this->getSubmitValueByType($this->aPost, $this->sInputID, $sKey);
    }
    public function getInputID($aSubmitElement)
    {
        foreach ($aSubmitElement as $sInputID => $v) {
            $this->sInputID = $sInputID;
            return $this->sInputID;
        }
    }
}
