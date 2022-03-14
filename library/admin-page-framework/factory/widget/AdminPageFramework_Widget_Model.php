<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class FacultyWeeklySchedule_AdminPageFramework_Widget_Model extends FacultyWeeklySchedule_AdminPageFramework_Widget_Router {
    public function __construct($oProp)
    {
        parent::__construct($oProp);
        $this->oUtil->registerAction("set_up_{$this->oProp->sClassName}", array( $this, '_replyToRegisterWidget' ));
        if ($this->oProp->bIsAdmin) {
            add_filter('validation_' . $this->oProp->sClassName, array( $this, '_replyToSortInputs' ), 1, 3);
        }
    }
    public function _replyToSortInputs($aSubmittedFormData, $aStoredFormData, $oFactory)
    {
        return $this->oForm->getSortedInputs($aSubmittedFormData);
    }
    public function _replyToHandleSubmittedFormData($aSavedData, $aArguments, $aSectionsets, $aFieldsets)
    {
        if (empty($aSectionsets) || empty($aFieldsets)) {
            return;
        }
        $this->oResource;
    }
    public function _replyToRegisterWidget()
    {
        if (! is_object($GLOBALS[ 'wp_widget_factory' ])) {
            return;
        }
        $GLOBALS[ 'wp_widget_factory' ]->widgets[ $this->oProp->sClassName ] = new FacultyWeeklySchedule_AdminPageFramework_Widget_Factory($this, $this->oProp->sWidgetTitle, $this->oUtil->getAsArray($this->oProp->aWidgetArguments));
        $this->oProp->oWidget = $GLOBALS[ 'wp_widget_factory' ]->widgets[ $this->oProp->sClassName ];
    }
}