<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility extends FacultyWeeklySchedule_AdminPageFramework_WPUtility {
    public static function showDeprecationNotice($sDeprecated, $sAlternative='', $sProgramName='')
    {
        $sProgramName = $sProgramName ? $sProgramName : self::getFrameworkName();
        parent::showDeprecationNotice($sDeprecated, $sAlternative, $sProgramName);
    }
    public static function sortAdminSubMenu()
    {
        if (self::hasBeenCalled(__METHOD__)) {
            return;
        }
        foreach (( array ) $GLOBALS[ '_apf_sub_menus_to_sort' ] as $_sIndex => $_sMenuSlug) {
            if (! isset($GLOBALS[ 'submenu' ][ $_sMenuSlug ])) {
                continue;
            }
            ksort($GLOBALS[ 'submenu' ][ $_sMenuSlug ]);
            unset($GLOBALS[ '_apf_sub_menus_to_sort' ][ $_sIndex ]);
        }
    }
    public static function getFrameworkVersion($bTrimDevVer=false)
    {
        $_sVersion = FacultyWeeklySchedule_AdminPageFramework_Registry::getVersion();
        return $bTrimDevVer ? self::getSuffixRemoved($_sVersion, '.dev') : $_sVersion;
    }
    public static function getFrameworkName()
    {
        return FacultyWeeklySchedule_AdminPageFramework_Registry::NAME;
    }
    public static function getFrameworkNameVersion()
    {
        return self::getFrameworkName() . ' ' . self::getFrameworkVersion();
    }
}
