<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_SectionTableBody extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_Base {
    public $sContext = 'section_table_content';
    protected function _getAttributes()
    {
        $_sCollapsibleType = $this->getElement($this->aArguments, array( 'collapsible', 'type' ), 'box');
        return array( 'class' => $this->getAOrB($this->aArguments[ '_is_collapsible' ], 'faculty-weekly-schedule-collapsible-section-content' . ' ' . 'faculty-weekly-schedule-collapsible-content' . ' ' . 'accordion-section-content' . ' ' . 'faculty-weekly-schedule-collapsible-content-type-' . $_sCollapsibleType, null), );
    }
}
