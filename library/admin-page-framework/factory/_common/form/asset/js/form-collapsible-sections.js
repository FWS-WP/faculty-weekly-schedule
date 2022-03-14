/*! Admin Page Framework - Form Collapsible Sections 1.0.1 */
( function( $ ) {

    /** global: FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain */
    /** global: navigator */

    $( document ).ready( function() {
        $( this ).initializeFacultyWeeklySchedule_AdminPageFrameworkCollapsibleSections();
    });

    /**
     * Gets triggered when a widget of the framework is saved.
     * @since    3.7.0
     */
    $( document ).on( 'faculty-weekly-schedule_saved_widget', function( event, oWidget ){
        $( oWidget ).initializeFacultyWeeklySchedule_AdminPageFrameworkCollapsibleSections();
    });

    $.fn.initializeFacultyWeeklySchedule_AdminPageFrameworkCollapsibleSections = function() {

        // Expand collapsible sections that are set not to collapse by default
        $( this ).find( '.faculty-weekly-schedule-collapsible-sections-title[data-is_collapsed=\"0\"]' )
            .next( '.faculty-weekly-schedule-collapsible-sections-content' )
            .slideDown( 'fast' );
        $( this ).find( '.faculty-weekly-schedule-collapsible-section-title[data-is_collapsed=\"0\"]' )
            .closest( '.faculty-weekly-schedule-section-table' )
            .find( 'tbody' )
            .slideDown( 'fast' );

        // Hide collapsible sections of 'section' containers as they are somehow do not get collapsed by default.
        $( this ).find( '.faculty-weekly-schedule-collapsible-section-title[data-is_collapsed=\"1\"]' )
            .closest( '.faculty-weekly-schedule-section-table' )
            .find( 'tbody' )
            .hide();

        // Bind the click event to the title element.
        $( this ).find( '.faculty-weekly-schedule-collapsible-sections-title, .faculty-weekly-schedule-collapsible-section-title' )
            .enableFacultyWeeklySchedule_AdminPageFrameworkCollapsibleButton();

        // Insert the toggle all button.
        $( this ).find( '.faculty-weekly-schedule-collapsible-title[data-toggle_all_button!=\"0\"]' ).each( function(){$

            var _oThis        = $( this ); // to access from inside the below each() method.
            var _bForSections = $( this ).hasClass( 'faculty-weekly-schedule-collapsible-sections-title' );   // or for the 'section' container.
            var _isPositions  = $( this ).data( 'toggle_all_button' );
            _isPositions  = 1 === _isPositions
                ? 'top-right'   // default
                : _isPositions;
            var _aPositions   = 'string' === typeof _isPositions
                ? _isPositions.split( ',' )
                : [ 'top-right' ];

            var _oButton = _getButtonContainer();

            $.each( _aPositions, function( iIndex, _sPosition ) {

                // var _oButton = $( $_sToggleAllButtonHTML ); //@deprecated 3.9.0
                var _sLeftOrRight = -1 !== jQuery.inArray( _sPosition, [ 'top-right', 'bottom-right', '0' ] )   // if found
                    ? 'right'   // default
                    : 'left';
                _oButton.find( '.faculty-weekly-schedule-collapsible-toggle-all-button' ).css( 'float', _sLeftOrRight );

                var _sTopOrBottom = -1 !== jQuery.inArray( _sPosition, [ 'top-right', 'top-left', '0' ] )   // if found
                    ? 'before'   // default
                    : 'after';

                // Insert the button - there are two versions: for the sections container or the section container.
                if ( _bForSections ) {
                    var _oTargetElement = 'before' === _sTopOrBottom
                        ? _oThis
                        : _oThis.next( '.faculty-weekly-schedule-collapsible-content' );
                        _oTargetElement[ _sTopOrBottom ]( _oButton );
                } else {    // for 'section' containers
                    _oThis.closest( '.faculty-weekly-schedule-section' )[ _sTopOrBottom ]( _oButton );
                }

                // Expand or collapse this panel
                $( _oButton ).off( 'click' );       // for initially dropped (created) widgets
                _oButton.on( 'click', function(){

                    var _oButtons = _bForSections
                        ? $( this ).closest( '.faculty-weekly-schedule-sectionset' ).siblings().addBack().find( '> .faculty-weekly-schedule-collapsible-toggle-all-button-container' )
                        : $( this ).siblings( '.faculty-weekly-schedule-collapsible-toggle-all-button-container' ).addBack();
                    _oButtons.toggleClass( 'flipped' );
                    if ( _bForSections ) {
                        _oButton.parent().parent().children().children( '* > .faculty-weekly-schedule-collapsible-title' ).each( function() {
                            $( this ).trigger( 'click', [ 'by_toggle_all_button' ] );
                        } );
                    } else {
                        _oButton.closest( '.faculty-weekly-schedule-sections' ).children( '.faculty-weekly-schedule-section' ).children( '.faculty-weekly-schedule-section-table' ).children( 'caption' ).children( '.faculty-weekly-schedule-collapsible-title' ).each( function() {
                            $( this ).trigger( 'click', [ 'by_toggle_all_button' ] );
                        } );
                    }

                } );

            });

        } );

        /**
         * @since 3.9.0
         * @returns {*|define.amd.jQuery|HTMLElement}
         * @private
         */
        function _getButtonContainer() {
            var _sDashIconSort = $.fn.compareVersionNumbers( FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain.wpVersion, '3.8' ) >= 0
                ? 'dashicons dashicons-sort'
                : '';
            var _sButtonText   = _sDashIconSort ? '' : FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain.messages.toggleAll;
            var _oButtonInner = $( '<span class="faculty-weekly-schedule-collapsible-toggle-all-button button"></span>' );
            _oButtonInner.addClass( _sDashIconSort );
            _oButtonInner.attr( 'title', FacultyWeeklySchedule_AdminPageFrameworkScriptFormMain.messages.toggleAllCollapsibleSections );
            _oButtonInner.text( _sButtonText );
            var _oButton = $( '<div class="faculty-weekly-schedule-collapsible-toggle-all-button-container"></div>' );
            _oButton.append( _oButtonInner );
            return _oButton;
        }

    }
    /**
     * Binds the click event to collapsible buttons.
     */
    $.fn.enableFacultyWeeklySchedule_AdminPageFrameworkCollapsibleButton = function() {

        /**
         * Determines whether the passed node element is of a field element.
         * If there are fields in the section title area, clicking on those field elements should not collapse/expand the section.
         * @return  boolean
         */
        function _isFieldElement( nodeTarget ) {

            if ( $( nodeTarget ).hasClass( 'faculty-weekly-schedule-collapsible-button' ) ) {
                return false;
            }
            var _sClickedTag = $( nodeTarget ).prop( 'tagName' ).toLowerCase();
            if ( -1 !== jQuery.inArray( _sClickedTag, [ 'input', 'label', 'fieldset', 'span' ] ) ) {
                return true;
            }
            return false;

        }

        /**
         * Unbind the event first.
         * This is for widgets as the initial model widgets placed on the left side is dragged-and-dropped to a sidebar definition container.
         * Then the event binding will be lost so it needs to be rebound.
         */
        $( this ).off( 'click' );
        $( this ).on( 'click', function( event, sContext ){

            if ( _isFieldElement( event.target ) ) {
                return true;
            }

            // Expand or collapse this panel
            var _oThis = $( this );
            var _sContainerType = $( this ).hasClass( 'faculty-weekly-schedule-collapsible-sections-title' )
                ? 'sections'
                : 'section';
            var _oTargetContent = 'sections' === _sContainerType
                ? $( this ).next( '.faculty-weekly-schedule-collapsible-content' ).first()
                : $( this ).parent().siblings( 'tbody' );
            var _sAction = _oTargetContent.is( ':visible' ) ? 'collapse' : 'expand';

            _oThis.removeClass( 'collapsed' );
            _oTargetContent.slideToggle( 'fast', function(){

                // For Google Chrome, table-caption will animate smoothly for the 'section' containers (not 'sections' container). For FireFox, 'block' is required. For IE both works.
                var _bIsChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
                if ( 'expand' === _sAction && 'section' === _sContainerType && ! _bIsChrome ) {
                    _oTargetContent.css( 'display', 'block' );
                }

                // Update the class selector.
                if ( _oTargetContent.is( ':visible' ) ) {
                    _oThis.removeClass( 'collapsed' );
                } else {
                    _oThis.addClass( 'collapsed' );
                }

            } );

            // If it is triggered from the toggle all button, do not continue.
            if ( 'by_toggle_all_button' === sContext ) {
                return;
            }

            // If collapse_others_on_expand argument is true, collapse others
            if ( 'expand' === _sAction && _oThis.data( 'collapse_others_on_expand' ) ) {
                _oThis.parent().parent().children().children( '* > .faculty-weekly-schedule-collapsible-content' ).not( _oTargetContent ).slideUp( 'fast', function() {
                    $( this ).prev( '.faculty-weekly-schedule-collapsible-title' ).addClass( 'collapsed' );
                });
            }

        });
        
    }
}( jQuery ));