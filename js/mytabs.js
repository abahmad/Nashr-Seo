jQuery(document).ready(function($) {
    $("#mytabs .hidden").removeClass('hidden');
	jQuery(".nav-tab").first().css('backgroundColor','white');
    $("#mytabs").tabs();
	
});
jQuery(function(jQuery) {
	jQuery(".nav-tab").click(function(){
		jQuery(".nav-tab").css('backgroundColor','#f1f1f1');
		jQuery(this).css('backgroundColor','white');
	});

});


