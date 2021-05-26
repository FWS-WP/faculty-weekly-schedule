<?php 
/**
	Admin Page Framework v3.8.26 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/faculty-weekly-schedule>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class FacultyWeeklySchedule_AdminPageFramework_FieldType__nested extends FacultyWeeklySchedule_AdminPageFramework_FieldType {
    public $aFieldTypeSlugs = array('_nested');
    protected $aDefaultKeys = array();
    protected function getStyles() {
        return ".faculty-weekly-schedule-fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field.with-nested-fields > .faculty-weekly-schedule-fieldset.multiple-nesting {margin-left: 2em;}.faculty-weekly-schedule-fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field.with-nested-fields > .faculty-weekly-schedule-fieldset {margin-bottom: 1em;}.with-nested-fields > .faculty-weekly-schedule-fieldset.child-fieldset > .faculty-weekly-schedule-child-field-title {display: inline-block;padding: 0 0 0.4em 0;}.faculty-weekly-schedule-fieldset.child-fieldset > label.faculty-weekly-schedule-child-field-title {display: table-row; white-space: nowrap;}";
    }
    protected function getField($aField) {
        $_oCallerForm = $aField['_caller_object'];
        $_aInlineMixedOutput = array();
        foreach ($this->getAsArray($aField['content']) as $_aChildFieldset) {
            if (is_scalar($_aChildFieldset)) {
                continue;
            }
            if (!$this->isNormalPlacement($_aChildFieldset)) {
                continue;
            }
            $_aChildFieldset = $this->getFieldsetReformattedBySubFieldIndex($_aChildFieldset, ( integer )$aField['_index'], $aField['_is_multiple_fields'], $aField);
            $_oFieldset = new FacultyWeeklySchedule_AdminPageFramework_Form_View___Fieldset($_aChildFieldset, $_oCallerForm->aSavedData, $_oCallerForm->getFieldErrors(), $_oCallerForm->aFieldTypeDefinitions, $_oCallerForm->oMsg, $_oCallerForm->aCallbacks);
            $_aInlineMixedOutput[] = $_oFieldset->get();
        }
        return implode('', $_aInlineMixedOutput);
    }
    }
    class FacultyWeeklySchedule_AdminPageFramework_FieldType_inline_mixed extends FacultyWeeklySchedule_AdminPageFramework_FieldType__nested {
        public $aFieldTypeSlugs = array('inline_mixed');
        protected $aDefaultKeys = array('label_min_width' => '', 'show_debug_info' => false,);
        protected function getStyles() {
            return ".faculty-weekly-schedule-field-inline_mixed {width: 98%;}.faculty-weekly-schedule-field-inline_mixed > fieldset {display: inline-block;overflow-x: visible;padding-right: 0.4em;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields{display: inline;width: auto;table-layout: auto;margin: 0;padding: 0;vertical-align: middle;white-space: nowrap;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field {float: none;clear: none;width: 100%;display: inline-block;margin-right: auto;vertical-align: middle; }.with-mixed-fields > fieldset > label {width: auto;padding: 0;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field .faculty-weekly-schedule-input-label-string {padding: 0;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > .faculty-weekly-schedule-input-label-container,.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > * > .faculty-weekly-schedule-input-label-container{padding: 0;display: inline-block;width: 100%;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > .faculty-weekly-schedule-input-label-container > label,.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > * > .faculty-weekly-schedule-input-label-container > label{display: inline-block;}.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > .faculty-weekly-schedule-input-label-container > label > input,.faculty-weekly-schedule-field-inline_mixed > fieldset > .faculty-weekly-schedule-fields > .faculty-weekly-schedule-field > * > .faculty-weekly-schedule-input-label-container > label > input{display: inline-block;min-width: 100%;margin-right: auto;margin-left: auto;}.faculty-weekly-schedule-field-inline_mixed .faculty-weekly-schedule-input-label-container,.faculty-weekly-schedule-field-inline_mixed .faculty-weekly-schedule-input-label-string{min-width: 0;}";
        }
    }
    