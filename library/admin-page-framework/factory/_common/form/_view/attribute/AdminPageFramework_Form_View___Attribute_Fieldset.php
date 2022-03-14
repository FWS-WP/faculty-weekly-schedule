<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_Fieldset extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_FieldContainer_Base {
    public $sContext = 'fieldset';
    protected function _getAttributes()
    {
        return array( 'id' => $this->sContext . '-' . $this->aArguments[ 'tag_id' ], 'class' => implode(' ', array( 'faculty-weekly-schedule-' . $this->sContext, $this->_getSelectorForChildFieldset() )), 'data-field_id' => $this->aArguments[ 'tag_id' ], 'style' => $this->_getInlineCSS(), );
    }
    private function _getInlineCSS()
    {
        return (1 <= $this->aArguments[ '_nested_depth' ]) && $this->aArguments[ 'hidden' ] ? 'display:none' : null;
    }
    private function _getSelectorForChildFieldset()
    {
        if ($this->aArguments[ '_nested_depth' ] == 0) {
            return '';
        }
        if ($this->aArguments[ '_nested_depth' ] == 1) {
            return 'child-fieldset nested-depth-' . $this->aArguments[ '_nested_depth' ];
        }
        return 'child-fieldset multiple-nesting nested-depth-' . $this->aArguments[ '_nested_depth' ];
    }
}
