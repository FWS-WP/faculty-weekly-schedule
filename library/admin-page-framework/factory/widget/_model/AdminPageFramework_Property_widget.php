<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Property_widget extends FacultyWeeklySchedule_AdminPageFramework_Property_Base {
    public $_sPropertyType = 'widget';
    public $sStructureType = 'widget';
    public $sClassName = '';
    public $sCallerPath = '';
    public $sWidgetTitle = '';
    public $aWidgetArguments = array();
    public $bShowWidgetTitle = true;
    public $oWidget;
    public $sSettingNoticeActionHook = '';
    public $bAssumedAsWPWidget = false;
    public $aWPWidgetMethods = array();
    public $aWPWidgetProperties = array();
    public function __construct($oCaller, $sCallerPath, $sClassName, $sCapability='manage_options', $sTextDomain='faculty-weekly-schedule', $sStructureType='')
    {
        $this->_sFormRegistrationHook = 'load_' . $sClassName;
        $this->sSettingNoticeActionHook = 'load_' . $sClassName;
        parent::__construct($oCaller, $sCallerPath, $sClassName, $sCapability, $sTextDomain, $sStructureType);
    }
    public function getFormArguments()
    {
        return array( 'caller_id' => $this->sClassName, 'structure_type' => $this->_sPropertyType, 'action_hook_form_registration' => $this->_sFormRegistrationHook, ) + $this->aFormArguments;
    }
}
