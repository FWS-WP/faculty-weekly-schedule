<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_widget extends FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getWidgetRules();
    }
    private function _getWidgetRules()
    {
        return <<<CSSRULES
.widget .faculty-weekly-schedule-section .form-table>tbody>tr>td,.widget .faculty-weekly-schedule-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.widget .faculty-weekly-schedule-field,.widget .faculty-weekly-schedule-input-label-container{width:100%}.widget .sortable .faculty-weekly-schedule-field{padding:4% 4.4% 3.2% 4.4%;width:91.2%}.widget .faculty-weekly-schedule-field input{margin-bottom:.1em;margin-top:.1em}.widget .faculty-weekly-schedule-field input[type=text],.widget .faculty-weekly-schedule-field textarea{width:100%}@media screen and (max-width:782px){.widget .faculty-weekly-schedule-fields{width:99.2%}.widget .faculty-weekly-schedule-field input[type='checkbox'],.widget .faculty-weekly-schedule-field input[type='radio']{margin-top:0}}
CSSRULES;
    }
    protected function _getVersionSpecific()
    {
        $_sCSSRules = '';
        if (version_compare($GLOBALS[ 'wp_version' ], '3.8', '<')) {
            $_sCSSRules .= <<<CSSRULES
.widget .faculty-weekly-schedule-section table.mceLayout{table-layout:fixed}
CSSRULES;
        }
        if (version_compare($GLOBALS[ 'wp_version' ], '3.8', '>=')) {
            $_sCSSRules .= <<<CSSRULES
.widget .faculty-weekly-schedule-section .form-table th{font-size:13px;font-weight:400;margin-bottom:.2em}.widget .faculty-weekly-schedule-section .form-table{margin-top:1em}
CSSRULES;
        }
        return $_sCSSRules;
    }
}
