<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_FieldAddress extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_FlatFieldName {
    public function get()
    {
        return $this->_getFlatFieldName();
    }
    public function getModel()
    {
        return $this->get() . '|' . $this->sIndexMark;
    }
}
