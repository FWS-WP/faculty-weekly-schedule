<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class FacultyWeeklySchedule_AdminPageFramework_NetworkAdmin extends FacultyWeeklySchedule_AdminPageFramework {
    protected $_sStructureType = 'network_admin_page';
    protected $_aBuiltInRootMenuSlugs = array( 'dashboard' => 'index.php', 'sites' => 'sites.php', 'themes' => 'themes.php', 'plugins' => 'plugins.php', 'users' => 'users.php', 'settings' => 'settings.php', 'updates' => 'update-core.php', );
    public function __construct($sOptionKey=null, $sCallerPath=null, $sCapability='manage_network', $sTextDomain='faculty-weekly-schedule')
    {
        if (! $this->_isInstantiatable()) {
            return;
        }
        $sCallerPath = $sCallerPath ? $sCallerPath : FacultyWeeklySchedule_AdminPageFramework_Utility::getCallerScriptPath(__FILE__);
        parent::__construct($sOptionKey, $sCallerPath, $sCapability, $sTextDomain);
        new FacultyWeeklySchedule_AdminPageFramework_Model_Menu__RegisterMenu($this, 'network_admin_menu');
    }
    protected function _getLinkObject()
    {
        $_sClassName = $this->aSubClassNames[ 'oLink' ];
        return new $_sClassName($this->oProp, $this->oMsg);
    }
    protected function _getPageLoadObject()
    {
        $_sClassName = $this->aSubClassNames[ 'oPageLoadInfo' ];
        return new $_sClassName($this->oProp, $this->oMsg);
    }
    protected function _isInstantiatable()
    {
        if ($this->_isWordPressCoreAjaxRequest()) {
            return false;
        }
        if (is_network_admin()) {
            return true;
        }
        return false;
    }
    public static function getOption($sOptionKey, $asKey=null, $vDefault=null)
    {
        return FacultyWeeklySchedule_AdminPageFramework_WPUtility::getSiteOption($sOptionKey, $asKey, $vDefault);
    }
}
