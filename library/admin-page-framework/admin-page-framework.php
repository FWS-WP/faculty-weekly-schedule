<?php
/*
 * Admin Page Framework v3.9.0 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/admin-page-framework-compiler>
 * <https://en.michaeluno.jp/admin-page-framework>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 * Compiled on 2022-03-13
 * Included Components: Admin Pages, Network Admin Pages, Custom Post Types, Taxonomy Fields, Term Meta, Post Meta Boxes, Page Meta Boxes, Widgets, User Meta, Utilities
 * Custom Field Types: ACE, GitHub Buttons, Path, Toggle, NoUISlider (Range Slider), Select2, Post Type Taxonomy
 */

if (! class_exists('FacultyWeeklySchedule_AdminPageFramework_Registry', false)) :
abstract class FacultyWeeklySchedule_AdminPageFramework_Registry_Base {
    const VERSION = FWS_VERSION;
    const NAME = 'Faculty Weekly Schedule';
    //const SHORTNAME = 'FWS';  // used for a menu title etc.
    const DESCRIPTION = 'Define and display the weekly schedule of a faculty member.';
    const URI = 'https://github.com/Broward-College-CSIT/faculty-weekly-schedule/';
    const AUTHOR = 'George Cooke';
    const AUTHOR_URI = 'http://sites.broward.edu/gcooke/';
    const COPYRIGHT = 'Copyright (c) 2021-2022, George Cooke';
    const LICENSE = 'MIT <https://opensource.org/licenses/MIT>';
    const CONTRIBUTORS = '';

}
final class FacultyWeeklySchedule_AdminPageFramework_Registry extends FacultyWeeklySchedule_AdminPageFramework_Registry_Base {
    const TEXT_DOMAIN = FWS_DOMAIN;
    const TEXT_DOMAIN_PATH = '/language';
    public static $bIsMinifiedVersion = true;
    public static $bIsDevelopmentVersion = true;
    public static $sAutoLoaderPath;
    public static $sClassMapPath;
    public static $aClassFiles = array();
    public static $sFilePath = '';
    public static $sDirPath = '';

    /**
     * Used post types.
     */
    static public $aPostTypes = array(
        'fws' => 'schedule',
    );

    public static function setUp($sFilePath=__FILE__)
    {
        self::$sFilePath = $sFilePath;
        self::$sDirPath = dirname(self::$sFilePath);
        self::$sClassMapPath = self::$sDirPath . '/admin-page-framework-class-map.php';
        self::$aClassFiles = include(self::$sClassMapPath);
        self::$sAutoLoaderPath = isset(self::$aClassFiles[ 'FacultyWeeklySchedule_AdminPageFramework_RegisterClasses' ]) ? self::$aClassFiles[ 'FacultyWeeklySchedule_AdminPageFramework_RegisterClasses' ] : '';
        self::$bIsMinifiedVersion = class_exists('FacultyWeeklySchedule_AdminPageFramework_MinifiedVersionHeader', false);
        self::$bIsDevelopmentVersion = isset(self::$aClassFiles[ 'FacultyWeeklySchedule_AdminPageFramework_ClassMapHeader' ]);
    }
    public static function getVersion()
    {
        if (! isset(self::$sAutoLoaderPath)) {
            trigger_error(self::NAME . ': ' . ' : ' . sprintf(__('The method is called too early. Perform <code>%2$s</code> earlier.', 'admin-page-framework'), __METHOD__, 'setUp()'), E_USER_WARNING);
            return self::VERSION;
        }
        $_aMinifiedVersionSuffix = array( 0 => '', 1 => '.min', );
        $_aDevelopmentVersionSuffix = array( 0 => '', 1 => '.dev', );
        return self::VERSION . $_aMinifiedVersionSuffix[ ( integer ) self::$bIsMinifiedVersion ] . $_aDevelopmentVersionSuffix[ ( integer ) self::$bIsDevelopmentVersion ];
    }
    public static function getInfo()
    {
        $_oReflection = new ReflectionClass(__CLASS__);
        return $_oReflection->getConstants() + $_oReflection->getStaticProperties();
    }
}
endif;
if (! class_exists('FacultyWeeklySchedule_AdminPageFramework_Bootstrap', false)) :
final class FacultyWeeklySchedule_AdminPageFramework_Bootstrap {
    private static $___bLoaded = false;
    public function __construct($sLibraryPath)
    {
        if (! $this->___isLoadable()) {
            return;
        }
        FacultyWeeklySchedule_AdminPageFramework_Registry::setUp($sLibraryPath);
        if (FacultyWeeklySchedule_AdminPageFramework_Registry::$bIsMinifiedVersion) {
            return;
        }
        $this->___include();
    }
    private function ___isLoadable()
    {
        if (self::$___bLoaded) {
            return false;
        }
        self::$___bLoaded = true;
        return defined('ABSPATH');
    }
    private function ___include()
    {
        include(FacultyWeeklySchedule_AdminPageFramework_Registry::$sAutoLoaderPath);
        new FacultyWeeklySchedule_AdminPageFramework_RegisterClasses('', array( 'exclude_class_names' => array( 'FacultyWeeklySchedule_AdminPageFramework_MinifiedVersionHeader', 'FacultyWeeklySchedule_AdminPageFramework_BeautifiedVersionHeader', ), ), FacultyWeeklySchedule_AdminPageFramework_Registry::$aClassFiles);
        self::$___bXDebug = isset(self::$___bXDebug) ? self::$___bXDebug : extension_loaded('xdebug');
        if (self::$___bXDebug) {
            new FacultyWeeklySchedule_AdminPageFramework_Utility;
            new FacultyWeeklySchedule_AdminPageFramework_WPUtility;
        }
    }
    private static $___bXDebug;
} new FacultyWeeklySchedule_AdminPageFramework_Bootstrap(__FILE__);
endif;
