<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_term_meta extends FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getRules();
    }
    private function _getRules()
    {
        return <<<CSSRULES
.faculty-weekly-schedule-form-table-outer-row-term_meta,.faculty-weekly-schedule-form-table-outer-row-term_meta>td{margin:0;padding:0}.faculty-weekly-schedule-form-table-term_meta>tbody>tr>td{margin-left:0;padding-left:0}.faculty-weekly-schedule-form-table-term_meta .faculty-weekly-schedule-sectionset,.faculty-weekly-schedule-form-table-term_meta .faculty-weekly-schedule-section{margin-bottom:0}.faculty-weekly-schedule-form-table-term_meta.add-new-term .title-colon{margin-left:.2em}.faculty-weekly-schedule-form-table-term_meta.add-new-term .faculty-weekly-schedule-section .form-table>tbody>tr>td,.faculty-weekly-schedule-form-table-term_meta.add-new-term .faculty-weekly-schedule-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.faculty-weekly-schedule-form-table-term_meta.add-new-term .faculty-weekly-schedule-field{width:auto}.faculty-weekly-schedule-form-table-term_meta.add-new-term .faculty-weekly-schedule-field{max-width:100%}.faculty-weekly-schedule-form-table-term_meta.add-new-term .sortable .faculty-weekly-schedule-field{width:auto}.faculty-weekly-schedule-form-table-term_meta.add-new-term .faculty-weekly-schedule-section .form-table>tbody>tr>th{font-size:13px;line-height:1.5;margin:0;font-weight:700}.faculty-weekly-schedule-form-table-term_meta .faculty-weekly-schedule-section-title h3{border:none;font-weight:700;font-size:1.12em;margin:0;padding:0;font-family:'Open Sans',sans-serif;cursor:inherit;-webkit-user-select:inherit;-moz-user-select:inherit;user-select:inherit}.faculty-weekly-schedule-form-table-term_meta .faculty-weekly-schedule-collapsible-title h3{margin:0}.faculty-weekly-schedule-form-table-term_meta h4{margin:1em 0;font-size:1.04em}.faculty-weekly-schedule-form-table-term_meta .faculty-weekly-schedule-section-tab h4{margin:0}
CSSRULES;
    }
}
