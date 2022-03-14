<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_FieldType_hidden extends FacultyWeeklySchedule_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array( 'hidden' );
    protected $aDefaultKeys = array( 'hidden' => true, );
    protected function getField($aField)
    {
        return $aField[ 'before_label' ] . "<div class='faculty-weekly-schedule-input-label-container'>" . "<label for='{$aField[ 'input_id' ]}'>" . $aField[ 'before_input' ] . ($aField[ 'label' ] ? "<span " . $this->getLabelContainerAttributes($aField, 'faculty-weekly-schedule-input-label-string') . ">" . $aField[ 'label' ] . "</span>" : "") . "<input " . $this->getAttributes($aField[ 'attributes' ]) . " />" . $aField[ 'after_input' ] . "</label>" . "</div>" . $aField[ 'after_label' ];
    }
}
