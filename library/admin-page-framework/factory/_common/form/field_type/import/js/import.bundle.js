/*! Admin Page Framework - Import Field Type 0.0.1 */
/** global: FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain */
var apfMain  = FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain;
/** global: FacultyWeeklySchedule_AdminPageFrameworkImportFieldType */
var apfImport = FacultyWeeklySchedule_AdminPageFrameworkImportFieldType;
(function ( $ ) {
  
  debugLog( '0.0.1', apfImport );

  $( document ).ready( function () {
    $( '.faculty-weekly-schedule-field-import input[type=submit]' ).on( 'click', function ( event ) {
      var _iFiles = $( this ).closest( '.faculty-weekly-schedule-field-import' ).find( 'input[type=file]' ).get( 0 ).files.length;
      if ( 0 === _iFiles ) {
        alert( apfImport.label.noFile );
        return false;
      }
      return true;
    } );
  } ); // document ready  
  
  function debugLog( ...msg ) {
    if ( ! parseInt( apfMain.debugMode ) ) {
      return;
    }
    console.log( 'APF Import Field Type', ...msg );
  }

}( jQuery ));