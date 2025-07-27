jQuery(function(jQuery) {
	jQuery('.selectall').click(function()
	 {
	 	 jQuery('input[type="checkbox"]').not("#version").attr('checked', this.checked);
    	// jQuery(this.form.elements).filter(':checkbox').prop('checked', this.checked);
    	// jQuery("#version").attr('checked', false);
     });
});	