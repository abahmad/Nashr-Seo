<?php

$prefix = 'mnbaa_seo_';

//  title of tabs
$socialMediaItems =array(
	array('val'=>'SEO',
		 'label'=>__('Search Engine Optimization','mnbaa-seo')
		),
	array('val'=>'SM',
		 'label'=>__('Social Media','mnbaa-seo')
		 )
);

// general SEO fileds
$SEO_meta_fields = array(
	
	array(
		'label'	=> __('Snippet Preview','mnbaa-seo'),
		'prop'  => 'property',
		'val'  	=> 'og:description ',
		'name'  => $prefix.'facebook_description',
		'type'  => 'snippet',
		'desc'  =>__( 'This is a rendering of what this post might look like in Google search results.','mnbaa-seo')
	),
	array(
		'label'	=> __('Description','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'description',
		'name'  => $prefix.'description',
		'type'  => 'textarea',
		'desc'  => __('Description of the content (it will viewed as the description of search result)','mnbaa-seo'),
	),
	array(
		'label'	=> __('Title','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'title',
		'name'  => $prefix.'title',
		'type'  => 'text',
		'desc'  => __('If you leave this input blank defulte title will be used','mnbaa-seo'),
	),
	array(
		'label'	=> __('Keywords','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'keywords',
		'name'  => $prefix.'keywords',
		'type'  => 'div',
		'desc'  => __('keywords that related to content EX:(car,motors,spare parts)','mnbaa-seo')
	),
	array(
		'label'	=> __('Robots','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'robots',
		'name'  => $prefix.'robots',
		'type'  => 'textarea',
		'desc'  => __('How makes content available through search results.EX:noindex, nofollow','mnbaa-seo')
		
		 
	),
	array(
		'label'	=> __('Author','mnbaa-seo'),
		'prop'  => 'link',
		'val'  	=> 'author',
		'name'  => $prefix.'author',
		'type'  => 'text',
		'desc'  => __('Goolge+ Account of the author','mnbaa-seo')
	),
	
);
// social media  fields
$SM_meta_fields = array(
	array(
		'label'	=> __('Title','mnbaa-seo'),
		'prop'  => 'property',
		'val'	=> 'og:title',
		'name'  => $prefix.'facebook_title',
		'type'  => 'text',
		'desc'  => __('The title of your article.','mnbaa-seo')
			),
	array(
        'label'		=> __('Type','mnbaa-seo'),
		'prop'  	=> 'property',
		'val'   	=> 'og:type',
		'name'  	=> $prefix.'facebook_type',
        'type'  	=> 'select',
		'desc'  	=> __("Different types of media will change how your content shows up in Facebook's newsfeed",'mnbaa-seo'),
        'options' 	=> array (__('article','mnbaa-seo'),__('blog','mnbaa-seo'))
	),
	array(
		'label'	=> __('Image','mnbaa-seo'),
		'prop'  => 'property',
		'val'  	=> 'og:image',
		'name'  => $prefix.'facebook_image',
		'type'  => 'image',
		'desc'  => __('We suggest that you use an image of at least 1200x630 pixels','mnbaa-seo')
	),
	
	array(
		'label'	=> __('Description','mnbaa-seo'),
		'prop'  => 'property',
		'val'  	=> 'og:description ',
		'name'  => $prefix.'facebook_description',
		'type'  => 'textarea',
		'desc'  =>__( 'A detailed description of the piece of content','mnbaa-seo')
	),
	
	
	array(
        'label'	=> __('Twitter card','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'twitter:card',
        'name'  => $prefix.'tw_card',
        'type'  => 'select',
        'desc'  => __('How twitter view  your post','mnbaa-seo'),
        'options' => array (
			__('Summary','mnbaa-seo'),
			__('summary_large_image','mnbaa-seo'),
			__('photo','mnbaa-seo'),
			__('gallery','mnbaa-seo'),
			__('product','mnbaa-seo'),
			__('app','mnbaa-seo'),
			__('player','mnbaa-seo')
		)
	)
		
);
// seo setting titles
$settingSocialMediaItems = array(
	array(
		'label'=>__('Facebook settings','mnbaa-seo'),
		'val'=>'facebook'),
	array(
		'label'=>__('Twitter settings','mnbaa-seo'),
		'val'=>'twitter',
		),
	array(
		'label'=>__('Webmaster settings','mnbaa-seo'),
		'val'=>'webmaster',
		)
);
$facebook_seo_meta_setting = array(
	array(
		'label'=> __('Site Name','mnbaa-seo'),
		'prop'  => 'property',
		'val'	=> 'og:site_name',
		'name'    => $prefix.'fb_site_name',
		'type'  => 'text',
		'desc'  => __('The name of your website. Not the URL, but the name. (i.e. "Mnbaa" not "mnbaa.com".)','mnbaa-seo')
	),
	array(
		'label'=> __('Facebook Application Id','mnbaa-seo'),
		'prop'  => 'property',
		'val'	=> 'fb:app_id',
		'name'    => $prefix.'fb_app_id',
		'type'  => 'text',
		'desc'  => __('The application unique id that lets Facebook know the identity of your site','mnbaa-seo')
	)
	,
	array(
		'label'=> __('Facebook admin Id','mnbaa-seo'),
		'prop'  => 'property',
		'val'	=> 'fb:admins',
		'name'    => $prefix.'fb_admins',
		'type'  => 'text',
		'desc'  => __('Id of facebook account that create the facebook application','mnbaa-seo')
	)
);

$twitter_seo_meta_setting = array(
	array(
        'label'=> __('Twitter user ID','mnbaa-seo'),
		'prop'  => 'name',
		'val'	=> 'twitter:creator',
        'name'    => $prefix.'creator',
        'type'  => 'text',
        'desc'  => __('User ID of twitter content creator','mnbaa-seo'),
    )
);

$webmaster_seo_meta_setting = array(
	array(
        'label'=> __('Google Webmaster Tools','mnbaa-seo'),
		'prop'  => 'name',
        'name'    => $prefix.'google-site-verification',
        'type'  => 'text',
		'label_type' =>'link',
		'href' => 'https://www.google.com/webmasters/verification/home?hl=en',
     	'val'	=> 'google-site-verification',
     	'desc'  => __('&lt; meta name="google-site-verification" content="1234xxxxxxxxxxxxxx" &gt;','mnbaa-seo'),
    )
    ,
	array(
        'label'=> __('Alexa Verification ID','mnbaa-seo'),
		'prop'  => 'name',
        'name'    => $prefix.'alexaVerifyID',
        'type'  => 'text',
		'label_type' =>'link',
		'href' => 'http://www.alexa.com/siteowners/claim',
		'val'	=> 'alexaVerifyID',
		'desc'  => __('&lt; meta name="alexaVerifyID" content="1234xxxxxxxxxxxxxx" &gt;','mnbaa-seo'),
    
    ),
	array(
        'label'=> __('Bing Webmaster Tools','mnbaa-seo'),
		'prop'  => 'name',
        'name'    => $prefix.'msvalidate',
        'type'  => 'text',
		'label_type' =>'link',
		'href' => 'http://www.bing.com/toolbox/webmaster/#/Dashboard/',
		'val'	=> 'msvalidate.01',
		'desc'  => __('&lt;meta name="msvalidate.01" content="1234xxxxxxxxxxxxxx"&gt;','mnbaa-seo'),
     
    ),
	array(
        'label'=> __('Pinterest','mnbaa-seo'),
		'prop'  => 'name',
        'name'    => $prefix.'p:domain_verify',
        'type'  => 'text',
		'label_type' =>'link',
		'href' => 'https://help.pinterest.com/en/articles/verify-your-website#html_file',
     	'val'	=> 'p:domain_verify',
     	'desc'  => __('&lt; meta name="p:domain_verify" content="1234xxxxxxxxxxxxxx" &gt;','mnbaa-seo'),
    ),
	array(
        'label'=> __('Yandex Webmaster Tools','mnbaa-seo'),
		'prop'  => 'name',
        'name'    => $prefix.'yandex-verification',
        'type'  => 'text',
		'label_type' =>'link',
		'href' => 'http://help.yandex.com/webmaster/service/rights.xml#how-to',
		'val'	=> 'yandex-verification',
		'desc'  => __('&lt;meta name="yandex-verification" content="1234xxxxxxxxxxxxxx"&gt;','mnbaa-seo'),
     
    )
);
?>