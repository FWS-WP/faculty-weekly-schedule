<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_FieldType_number extends FacultyWeeklySchedule_AdminPageFramework_FieldType_text {
    public $aFieldTypeSlugs = array( 'number', 'range' );
    protected $aDefaultKeys = array( 'attributes' => array( 'size' => 30, 'maxlength' => 400, 'class' => null, 'min' => null, 'max' => null, 'step' => null, 'readonly' => null, 'required' => null, 'placeholder' => null, 'list' => null, 'autofocus' => null, 'autocomplete' => null, ), );
}
