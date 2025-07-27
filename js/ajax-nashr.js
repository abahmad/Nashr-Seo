var $ = jQuery;
jQuery(document).ready(function() {
	//call function on load  page update
	$(".nashr-input-token").find('.title').each(function(){
		this_li=$(this).closest('li');
		get_words_count($(this).html(),this_li);
	});
	
$(".nashr-autoComplete").on('blur keypress', function(e) {
		//alert("hoda");
		var this_keyword	= $(this);
		//alert(e);
		var code = e.keyCode || e.which;
		var clone;
		var inputVal = $(this).val().trim();
		//alert(inputVal);
		inputVal = inputVal.replace(',', '');
		if(code == 13 || e.type == 'blur' || inputVal.indexOf(',') !== -1) {
			
			
			if (inputVal.length > 1) {
				
				//alert(inputVal);
				clone = 				$(this).closest('div#nashr-autoCompleteArea').find('.token-input-token-hidden').clone();
				//alert();
				clone.find('input[type=hidden]').attr("name", "mnbaa_seo_keywords[]");
			    clone.find('input[type=hidden]').val(inputVal);
			   	clone.find('p.title').html(inputVal);
			   	//
			
			   	this_keyword.closest('div#nashr-autoCompleteArea').find('ul.token-input-list').append('<li class="nashr-input-token">'+clone.html()+'</li>');
			   	this_li=this_keyword.closest('div#nashr-autoCompleteArea').find('ul.token-input-list li').last();
			   	// alert(this_li.html());
			   get_words_count(inputVal,this_li);
			}
			$(this).val('');
			return false;
		}
		
});
});

function get_words_count(word,this_li){
	
		
		var content=$("#content").val();
		var post_id=$("#post_id").val();
		var title=$("#search_title").val();
		var seo_desc=$("#mnbaa_seo_description_ID").val();
			//
			jQuery.ajax({
			type : "post",
			url : myAjax.ajaxurl,
			data : {
				action : "mnbaa_seo_get_word_count",
				keyword : word,
				id:post_id,
				content:content,
				title:title,
				seo_desc:seo_desc,
			},
			success : function(response) {
				result=response.split("#");
				this_li.append(result[0]);
				percent=result[1];
				if(percent>=0  && percent<30)this_li.addClass("red");   
				if(percent>=30 && percent<60)this_li.addClass("yello");   
				if(percent>=60 && percent<85)this_li.addClass("orange");   
				if(percent>=85 && percent<100)this_li.addClass("green");   
				
				
			}
		});

	
}
