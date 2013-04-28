/*jshint browser: true */
/*global mediaWiki, jQuery */
( function ( mw, $ ) {
	'use strict';

	var div = document.createElement( 'div' ),
		key = mw.config.get( 'wgCookiePrefix' ) + 'showPostEdit';

	div.className = 'postedit-container';
	div.innerHTML =
		'<div class="postedit">' +
			'<div class="postedit-icon postedit-icon-checkmark">' +
				mw.message( 'postedit-confirmation', mw.user ).escaped() +
			'</div>' +
			// TODO: Perhaps add a title attribute for accessibility
			'<a href="#" class="postedit-close">&times;</a>' +
		'</div>';

	/**
	 * @param {jQuery.Event|undefined} e
	 */
	function removeConfirmation( e ) {
		// Triggers CSS3 transition (250ms duration)
		div.firstChild.className = 'postedit postedit-faded';

		setTimeout( function () {
			$( div ).remove();
		}, 500 );

		if ( e ) {
			e.preventDefault();
		}
	}

	// If the cookie exists it means we were redirected here from a successful save
	// action. Immediately remove the cookie to avoid showing this message on other
	// windows the user might have opened.
	if ( $.cookie( key ) === '1' ) {
		$.cookie( key, null, {
			path: mw.config.get( 'wgCookiePath' )
		} );

		// Since the cookie will be gone now, we use mw.config to allow other
		// scripts to activate certain behaviour for the post-edit page.
		mw.config.set( 'wgPostEdit', true );

		$( document ).ready( function () {
			$( div ).find( '.postedit-close' ).click( removeConfirmation );
			$( 'body' ).prepend( div );
			setTimeout( removeConfirmation, 2000 );
		} );
	}

}( mediaWiki, jQuery ) );
