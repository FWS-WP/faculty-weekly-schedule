<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_SectionName extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Generate_Section_Base {
    public function get()
    {
        return $this->_getFiltered($this->_getSectionName());
    }
    public function getModel()
    {
        return $this->get() . '[' . $this->sIndexMark . ']';
    }
    protected function _getSectionName($isIndex=null)
    {
        $this->aArguments = $this->aArguments + array( 'section_id' => null, '_index' => null, );
        if (isset($isIndex)) {
            $this->aArguments[ '_index' ] = $isIndex;
        }
        $_aNameParts = $this->aArguments[ '_section_path_array' ];
        if (isset($this->aArguments[ 'section_id' ], $this->aArguments[ '_index' ])) {
            $_aNameParts[] = $this->aArguments[ '_index' ];
        }
        $_sResult = $this->_getInputNameConstructed($_aNameParts);
        return $_sResult;
    }
}
