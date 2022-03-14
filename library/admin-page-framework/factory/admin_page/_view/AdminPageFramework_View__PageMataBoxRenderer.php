<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_View__PageMataBoxRenderer extends FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility {
    public function render($sContext)
    {
        if (! $this->doesMetaBoxExist()) {
            return;
        }
        $this->_doRender($sContext, ++self::$_iContainerID);
    }
    private static $_iContainerID = 0;
    private function _doRender($sContext, $iContainerID)
    {
        echo "<div id='postbox-container-{$iContainerID}' class='postbox-container'>";
        do_meta_boxes('', $sContext, null);
        echo "</div>";
    }
}
