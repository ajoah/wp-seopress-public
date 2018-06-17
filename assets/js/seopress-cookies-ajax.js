//GA user consent
jQuery(document).ready(function(){
	jQuery('#seopress-user-consent-accept').on('click', function() {
		jQuery.ajax({
			method : 'GET',
			url : seopressAjaxGAUserConsent.seopress_cookies_user_consent,
			data : {
				action: 'seopress_cookies_user_consent',
				_ajax_nonce: seopressAjaxGAUserConsent.seopress_nonce,
			},
			success : function( data ) {
				jQuery('.seopress-user-consent').remove();
				jQuery('head').append(data.data.gtag_js);
				Cookies.set('seopress-user-consent-accept', '1', { expires: 30 });
			},
		});
	});
	jQuery('#seopress-user-consent-close').on('click', function() {
		jQuery('.seopress-user-consent').remove();
		Cookies.set('seopress-user-consent-close', '1', { expires: 30 });
	});
});