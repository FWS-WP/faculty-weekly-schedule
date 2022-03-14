<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_SectionTableContainer extends FacultyWeeklySchedule_AdminPageFramework_Form_View___Attribute_Base {
    protected function _getAttributes()
    {
        $_aSectionAttributes = $this->uniteArrays($this->dropElementsByType($this->aArguments[ 'attributes' ]), array( 'id' => $this->aArguments[ '_tag_id' ], 'class' => $this->getClassAttribute('faculty-weekly-schedule-section', $this->getAOrB($this->aArguments[ 'section_tab_slug' ], 'faculty-weekly-schedule-tab-content', null), $this->getAOrB($this->aArguments[ '_is_collapsible' ], 'is_subsection_collapsible', null)), ));
        $_aSectionAttributes[ 'class' ] = $this->getClassAttribute($_aSectionAttributes[ 'class' ], $this->dropElementsByType($this->aArguments[ 'class' ]));
        $_aSectionAttributes[ 'style' ] = $this->getStyleAttribute($_aSectionAttributes[ 'style' ], $this->getAOrB($this->aArguments[ 'hidden' ], 'display:none', null));
        return $_aSectionAttributes;
    }
}
