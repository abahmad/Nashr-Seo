var $ = jQuery;
var count=1;
$(document).ready(function () {
	
	$('body').on('click','.token-input-delete-token',function () {
		$(this).closest('li').remove();
		if($(".token-input-list").find('li').size()==1){
			$(".autoComplete").attr("name", "mnbaa_seo_keywords[]");
			
		}
	});
	//
	$('#mnbaa_seo_title_ID').bind('keypress', function(e) {
		$("#mnbaasnippet .title").html($(this).val());
		
	});
	//
	$('#mnbaa_seo_description_ID').bind('keypress', function(e) {
		$("#mnbaasnippet .seo_content").html($(this).val());
		
	});
	
	
	

});


	
