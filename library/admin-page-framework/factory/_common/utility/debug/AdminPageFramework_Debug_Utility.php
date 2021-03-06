<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/faculty-weekly-schedule-compiler>
 * <https://en.michaeluno.jp/faculty-weekly-schedule>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class FacultyWeeklySchedule_AdminPageFramework_Debug_Utility extends FacultyWeeklySchedule_AdminPageFramework_FrameworkUtility {
    public static function getObjectName($mItem)
    {
        if (is_object($mItem)) {
            return '(object) ' . get_class($mItem);
        }
        return $mItem;
    }
    public static function getSlicedByDepth(array $aSubject, $iDepth=0, $sMore='(array truncated) ...')
    {
        foreach ($aSubject as $_sKey => $_vValue) {
            if (is_array($_vValue)) {
                $_iDepth = $iDepth;
                if ($iDepth > 0) {
                    $aSubject[ $_sKey ] = self::getSlicedByDepth($_vValue, --$iDepth);
                    $iDepth = $_iDepth;
                    continue;
                }
                if (strlen($sMore)) {
                    $aSubject[ $_sKey ] = $sMore;
                    continue;
                }
                unset($aSubject[ $_sKey ]);
            }
        }
        return $aSubject;
    }
    public static function getArrayRepresentationSanitized($sString)
    {
        $sString = preg_replace('/\)(\r\n?|\n)(?=(\r\n?|\n)\s+[\[)])/', ')', $sString);
        return preg_replace('/Array(\r\n?|\n)\s+\((\r\n?|\n)\s+\)/', 'Array()', $sString);
    }
}
