<?php
function mnbaa_seo_get_word_count(){
	$keyword= $_POST['keyword'];
	$content=$_POST['content'];
	$pattern = "/<h1>(.*?)<\/h1>/";
	$countH1Word=0;
	preg_match_all($pattern,$content,$headings, PREG_SET_ORDER);
	foreach ($headings as $value) {
		$countH1Word +=substr_count(strtolower($value[0]), strtolower($keyword));
	 }
	
	$title=$_POST['title'];
	$seo_desc=$_POST['seo_desc'];
	$id=$_POST['id'];
	$str="";
	$premalink=get_permalink($id);
	$meta_values = get_post_meta($id);
	//var_dump( $meta_values);
	$count_in_metavalue= 0;
	foreach ($meta_values as  $value) {
		
		if(in_array($keyword, $value)){
			$count ++;
		}
	}
	$countTitleWord=substr_count(strtolower($title), strtolower($keyword));
	// echo $countTitleWord;
	$countContentWord=substr_count(strtolower($content), strtolower($keyword));
	$countDescWord=substr_count(strtolower($seo_desc),strtolower($keyword));
	$countPremaWord=substr_count(strtolower($premalink), strtolower($keyword));
	//
	//percent  ofexisting keyword
	$Keyword_density=0;
	($countTitleWord>0)?$Keyword_density+=20:$Keyword_density+=0;
	($countContentWord>0)?$Keyword_density+=20:$Keyword_density+=0;
	($countDescWord>0)?$Keyword_density+=15:$Keyword_density+=0;
	($countPremaWord>0)?$Keyword_density+=15:$Keyword_density+=0;
	($count_in_metavalue>0)?$Keyword_density+=15:$Keyword_density+=0;
	($countH1Word>0)?$Keyword_density+=15:$Keyword_density+=0;
	
	// response
	echo "<p>".$countTitleWord."</p><p>".$countContentWord."</p><p>".$countDescWord."</p><p>".$countPremaWord."</p>"."<p>".$count_in_metavalue."</p><p>".$countH1Word."</p>".'#'.$Keyword_density;
	die();
}
?>