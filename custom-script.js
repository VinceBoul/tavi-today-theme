$(function (){

	var $searchInput = $('#quadmenu.quadmenu-custom_theme_1 .quadmenu-navbar-nav > li.quadmenu-item-type-search input');

	$searchInput.on('focus', function () {
		$(this).closest('.quadmenu-item-content').find('.quadmenu-icon').hide();
	}).on('focusout', function () {
		$(this).val('');
		$(this).closest('.quadmenu-item-content').find('.quadmenu-icon').show();
	});

	// Popup IE not supported
	if (navigator.sayswho.includes('IE')){
		$('body').append(getIEPopup());
		$('#close-ie-popup').on('click', function (){
			$('#elementor-popup-modal-ie').hide();
		});
	}

	var $searchIcon = $('.quadmenu-icon.dashicons-search');

	$searchIcon.on('click', function (event) {
		$(this).closest('.quadmenu-item-content').find('input').addClass('open-search-input');
		$searchIcon.hide();
		event.stopPropagation();
	})

	$(document).on('click', function(event) {
		if (!$(event.target).hasClass('open-search-input') && $searchInput.hasClass('open-search-input')){
			$searchInput.removeClass('open-search-input');
			$searchIcon.show();

		}
	});
});


/**
 * Fonction prototype pour identifier quel est le navigateur
 * @type {string}
 */
navigator.sayswho= (function(){
	var ua= navigator.userAgent, tem,
		M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	if(/trident/i.test(M[1])){
		tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
		return 'IE '+(tem[1] || '');
	}
	if(M[1]=== 'Chrome'){
		tem= ua.match(/\b(OPR|Edge)\/(\d+)/);
		if(tem!= null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
	}
	M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
	if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);
	return M.join(' ');
})();

function getIEPopup(){
	return '<div class="dialog-widget dialog-lightbox-widget dialog-type-buttons dialog-type-lightbox elementor-popup-modal" id="elementor-popup-modal-ie" style="display: flex;justify-content: center;align-items: center;pointer-events: all;  background-color: rgba(0,0,0,.8);    z-index: 9999999;"><div class="dialog-widget-content dialog-lightbox-widget-content animated" style="border-radius: 5px 5px 5px 5px;    box-shadow: 2px 8px 23px 3px rgba(0,0,0,0.2);"><div class="dialog-header dialog-lightbox-header"></div><div class="dialog-message dialog-lightbox-message" style="font-family: \'Merriweather Sans\', Sans-serif;font-size: 16px;font-weight: 400; padding: 10px 10px 10px 10px;"><div class="elementor elementor-location-popup" style="display: block;"><div class="elementor-section-wrap">\t\t\t\t\t<section class="elementor-section elementor-top-section elementor-element elementor-section-boxed elementor-section-height-default elementor-section-height-default"><div class="elementor-container elementor-column-gap-default">\t\t\t\t\t\t\t<div class="elementor-row"><div class="elementor-column elementor-col-100 elementor-top-column elementor-element"><div class="elementor-column-wrap elementor-element-populated" style="padding: 10px;"><div class="elementor-widget-wrap"><div class="elementor-element pb-0 mb-0 elementor-widget elementor-widget-text-editor"><div class="elementor-widget-container">    \t\t\t\t\t                               <div class="elementor-text-editor elementor-clearfix"><p>You are currently using IE, a web browser that is no longer supported. For an optimal experience of this site, please switch to Edge, Chrome, Safari or any other modern browser.  </p>                                                        </div></div></div><div class="elementor-element elementor-align-right elementor-widget elementor-widget-button"><div class="elementor-widget-container"><div class="elementor-button-wrapper"><a id="close-ie-popup"  class="elementor-button-link elementor-button elementor-size-sm" role="button" style="cursor:pointer;background-color: var( --e-global-color-primary );padding: 10px 50px 10px 50px;color: #fff;"><span class="elementor-button-content-wrapper"><span class="elementor-button-text">OK</span></span></a></div></div></div></div></div></div></div></div></section></div></div></div> <div class="dialog-buttons-wrapper dialog-lightbox-buttons-wrapper"></div><div class="dialog-close-button dialog-lightbox-close-button"><i class="eicon-close"></i></div></div></div>';
}