$(function (){

	var $searchInput = $('#quadmenu.quadmenu-custom_theme_1 .quadmenu-navbar-nav > li.quadmenu-item-type-search input');
	//if (navigator.sayswho === "Edge 18"){
		$searchInput.on('focus', function(){
			$(this).closest('.quadmenu-item-content').find('.quadmenu-icon').hide();
		}).on('focusout', function(){
			$(this).closest('.quadmenu-item-content').find('.quadmenu-icon').show();
		});
	//}

	$searchInput.on('focusout', function(){
		$(this).val('');
	});

	var $searchIcon = $('.quadmenu-icon.dashicons-search');

	$searchIcon.on('click', function () {
		$(this).closest('.quadmenu-item-content').find('input').addClass('open-search-input');
		$searchIcon.hide();
		event.stopPropagation();
	})

	$(document).on('click', function() {
		if ($searchInput.hasClass('open-search-input')){
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

