<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_meta_box extends FacultyWeeklySchedule_AdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getRules();
    }
    private function _getRules()
    {
        return <<<CSSRULES
.postbox .title-colon{margin-left:.2em}.postbox .faculty-weekly-schedule-section .form-table>tbody>tr>td,.postbox .faculty-weekly-schedule-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.postbox .faculty-weekly-schedule-field{width:auto}.postbox .faculty-weekly-schedule-field{max-width:100%}.postbox .sortable .faculty-weekly-schedule-field{max-width:84%;width:auto}.postbox .faculty-weekly-schedule-section .form-table>tbody>tr>th{font-size:13px;line-height:1.5;margin:1em 0;font-weight:700}#poststuff .metabox-holder .postbox-container .faculty-weekly-schedule-section-title h3{border:none;font-weight:700;font-size:1.12em;margin:1em 0;padding:0;font-family:'Open Sans',sans-serif;cursor:inherit;-webkit-user-select:inherit;-moz-user-select:inherit;user-select:inherit;text-shadow:none;-webkit-box-shadow:none;box-shadow:none;background:none}#poststuff .metabox-holder .postbox-container .faculty-weekly-schedule-collapsible-title h3{margin:0}#poststuff .metabox-holder .postbox-container h4{margin:1em 0;font-size:1.04em}#poststuff .metabox-holder .postbox-container .faculty-weekly-schedule-section-tab h4{margin:0}@media screen and (min-width:783px){#poststuff #post-body.columns-2 #side-sortables .postbox .faculty-weekly-schedule-section .form-table input[type=text]{width:98%}}
CSSRULES;
    }
}
