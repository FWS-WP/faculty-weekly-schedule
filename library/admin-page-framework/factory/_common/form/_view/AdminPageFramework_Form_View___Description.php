<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Description extends FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility {
    public $aDescriptions = array();
    public $sClassAttribute = 'faculty-weekly-schedule-form-element-description';
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->aDescriptions, $this->sClassAttribute, );
        $this->aDescriptions = $this->getAsArray($_aParameters[ 0 ]);
        $this->sClassAttribute = $_aParameters[ 1 ];
    }
    public function get()
    {
        if (empty($this->aDescriptions)) {
            return '';
        }
        $_aOutput = array();
        foreach ($this->aDescriptions as $_sDescription) {
            $_aOutput[] = "<p class='" . esc_attr($this->sClassAttribute) . "'>" . "<span class='description'>" . $_sDescription . "</span>" . "</p>";
        }
        return implode(PHP_EOL, $_aOutput);
    }
}
