$gp.openai_translate = function( $ ) { return {
	current: null,
	init: function( table ) {
		$gp.init();
		$gp.openai_translate.table = table;
		$gp.openai_translate.install_hooks();
	},
	install_hooks: function() {
		$( $gp.openai_translate.table ).on( 'click', 'a.gp_openai_translate', $gp.openai_translate.hooks.openai_translate )
	},
	openai_translate: function( link ) {
		original_text = link.parents( '.textareas' ).siblings( '.original' ).text();
		if ( !original_text ) {
			original_text = link.parents( '.textareas' ).siblings( 'p:last' ).children( '.original' ).html();
		}

		if ( !original_text ) {
			return;
		}

		$gp.notices.notice( 'Translating via OpenAI&hellip;' );

		var data = {
			'action': 'gp_openai_translate',
			'query': '',
			'locale': gp_openai_translate.locale,
			'original': original_text,
		};

		jQuery.ajax( {
			url: gp_openai_translate.ajaxurl,
			type: 'post',
			data: data,
			datatype: 'json',
		})
		.always( function( result ) {
			if( ! result.error && result.data.translatedText != '' ) {
				link.parent( 'div' ).parent( 'div' ).children( 'textarea' ).html( result.data.translatedText ).focus();
				$gp.notices.success( 'Translated!' );
			} else {
				$gp.notices.error( 'Error in translating via OpenAI: ' + result.error.message + ': ' + result.error.reason );
				link.parent( 'p' ).siblings( 'textarea' ).focus();
			}
		});
	},
	hooks: {
		openai_translate: function() {
			$gp.openai_translate.openai_translate( $( this ) );
			return false;
		}
	}
}}(jQuery);

jQuery( function( $ ) {
	$gp.openai_translate.init( $( '#translations' ) );
});
