<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Resource_post_meta_box extends FacultyWeeklySchedule_AdminPageFramework_Resource_Base {
    protected function _enqueueSRCByCondition($aEnqueueItem)
    {
        $_sCurrentPostType = isset($_GET[ 'post_type' ]) ? $this->getHTTPQueryGET('post_type') : (isset($GLOBALS[ 'typenow' ]) ? $GLOBALS[ 'typenow' ] : null);
        if (empty($aEnqueueItem[ 'aPostTypes' ])) {
            $this->_enqueueSRC($aEnqueueItem);
            return;
        }
        if (in_array($_sCurrentPostType, $aEnqueueItem[ 'aPostTypes' ], true)) {
            $this->_enqueueSRC($aEnqueueItem);
        }
    }
}
