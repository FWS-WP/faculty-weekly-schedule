<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_Field_Base extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_Section_Base {
    public $aArguments = array();
    protected function _isSectionSet()
    {
        return isset($this->aArguments[ 'section_id' ]) && $this->aArguments[ 'section_id' ] && '_default' !== $this->aArguments[ 'section_id' ];
    }
}
