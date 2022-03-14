<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_FieldType_select extends FacultyWeeklySchedule_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array( 'select', );
    protected $aDefaultKeys = array( 'label' => array(), 'is_multiple' => false, 'attributes' => array( 'select' => array( 'size' => 1, 'autofocusNew' => null, 'multiple' => null, 'required' => null, ), 'optgroup' => array(), 'option' => array(), ), );
    protected function getField($aField)
    {
        $_oSelectInput = new FacultyWeeklySchedule_AdminPageFramework_Input_select($aField[ 'attributes' ]);
        if ($aField[ 'is_multiple' ]) {
            $_oSelectInput->setAttribute(array( 'select', 'multiple' ), 'multiple');
        }
        return $aField[ 'before_label' ] . "<div " . $this->getLabelContainerAttributes($aField, 'faculty-weekly-schedule-input-label-container faculty-weekly-schedule-select-label') . ">" . "<label for='{$aField[ 'input_id' ]}'>" . $aField[ 'before_input' ] . $_oSelectInput->get($aField[ 'label' ]) . $aField[ 'after_input' ] . "<div class='repeatable-field-buttons'></div>" . "</label>" . "</div>" . $aField[ 'after_label' ];
    }
}
