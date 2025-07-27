jQuery(function(jQuery) {
	jQuery('#mnbaa_seo_tw_description').keydown(function() {
    if(jQuery('#mnbaa_seo_tw_description').val().length > 200){
		alert("Description characters should be less than 200 ");
		return false;
	}
});
});



