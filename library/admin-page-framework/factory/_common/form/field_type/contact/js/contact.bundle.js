/*! Admin Page Framework - Contact Field Type 0.0.3 */
(function($){

  var apfMain    = FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain;
  var apfContact = FacultyWeeklySchedule_AdminPageFrameworkContactFieldType;

  $( document ).ready( function(){
    if ( 'undefined' === apfContact ) {
      return;
    }
    debugLog( apfContact );
    $( 'input[type="submit"][data-email="1"]' ).on( 'click', sendEmail ); // on click
  });

  function sendEmail( event ) {
    event.preventDefault();

    // Check required
    var _requiredInputs = $( this ).closest( '.faculty-weekly-schedule-sections' )
      .find( 'input[required], textarea[required], select[required]' );
    debugLog( 'Required Fields:', _requiredInputs.length );
    var _isFilled = true;
    var _unfilled;
    _requiredInputs.each( function() {
      if( ! $( this ).is( ':visible' ) ){
        return true;
      }
      if ( isRequiredFieldFilled( this ) ) {
        return true;
      }
      $( this )[ 'faculty-weekly-schedule-form-tooltip' ]( {
        content: "<span class='dashicons dashicons-warning field-error'></span>"
          + '<span>' + apfContact.messages.requiredField + '</span>',
        shown: true,
        width: 200,
        oneOff: true,
        autoClose: false,
        position: {
          edge: 'top',
        },
      } );
      _isFilled = false;
      _unfilled = _unfilled ? _unfilled : $( this );
    } );
    if ( ! _isFilled ) {
      $( [ document.documentElement, document.body ] ).animate({
          scrollTop: _unfilled.offset().top - 60  // 60 for the admin bar
      }, 100 );
      return;
    }

    var _data = $.extend(
      {
        action: apfContact.action,
        nonce: apfContact.nonce,
        form: $(this).closest('form').serializeArray(),
      },
      $(this).data()
    );
    debugLog('Sending data via Ajax', _data);
    var _oSpinner = $('<img src="' + apfMain.spinnerURL + '" alt="' + apfMain.messages.loading + '" />' )
      .addClass( 'faculty-weekly-schedule-ajax-spinner' );
    $( this ).closest( '.faculty-weekly-schedule-field' ).find( '.result-placeholder' ).prepend( _oSpinner );
    var _resultIcon = $( this ).closest( '.faculty-weekly-schedule-field' ).find( '.result-placeholder .dashicons' );
    _resultIcon.removeClass( 'dashicons-yes-alt success dashicons-warning error' );
    var _self = this;
    $.ajax( {
        type: 'post',
        dataType: 'json',
        url: apfMain.ajaxURL,
        data: _data,
        success: function ( response ) {
          debugLog( 'Request result:', response.result, response.message );
          if ( response.result ) {
            _resultIcon.addClass( 'dashicons-yes-alt success faculty-weekly-schedule-form-tooltip' );
            _resultIcon.prepend( "<span class='faculty-weekly-schedule-form-tooltip-content'>" + response.message + "</span>" );
          } else {
            _resultIcon.addClass( 'dashicons-warning error faculty-weekly-schedule-form-tooltip' );
            _resultIcon.prepend( "<span class='faculty-weekly-schedule-form-tooltip-content'>" + response.message + "</span>" );
          }
        },
        error: function( response ) {
          debugLog( 'Request error:', response.status + ' ' + response.statusText );
          _resultIcon.addClass( 'dashicons-warning error faculty-weekly-schedule-form-tooltip' );
          _resultIcon.prepend( "<span class='faculty-weekly-schedule-form-tooltip-content'>" + response.status + ' ' + response.statusText + "</span>" );
        },
        complete: function() {
          _oSpinner.remove();
          debugLog( 'Request done.' );
          _resultIcon[ 'faculty-weekly-schedule-form-tooltip' ]({
              autoClose: false,
              shown: true,
              oneOff: true,
              noArrow: true,
              position: {
                edge: 'bottom',
                within: $( _self ),
              }
          });
        }
    } ); // ajax
    debugLog('Ajax requested' );
  }

  function isRequiredFieldFilled( target ) {
    var _this = $( target );
    var _type = _this.attr( 'type' ).toLowerCase();
    var _tag  = _this.prop( 'tagName' ).toLowerCase();
    if ( 'textarea' === _tag ) {
      return '' !== $.trim( _this.val() );
    }
    if ( 'select' === _tag ) {
      return hasSelectOptionSelected( _this )
    }
    if ( 'checkbox' === _type || 'radio' === _type ) {
      return _this.is( ':checked' );
    }
    if ( 'text' === _type ) {
      return '' !== $.trim( _this.val() );
    }

    return true;
  }
  function hasSelectOptionSelected( target ) {
    var _hasSelected = false;
    $( target ).find( 'option').each( function() {
      if ( $( this ).is( ':selected' ) )  {
        _hasSelected = true;  // break
        return false;
      }
    });
    return false;
  }

  function debugLog( ...msg ) {
    if ( ! parseInt( apfMain.debugMode ) ) {
      return;
    }
    console.log( 'APF (Contact)', ...msg );
  }

}(jQuery));