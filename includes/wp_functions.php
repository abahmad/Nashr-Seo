<?php
// call all hook on startup plugin 
/////////////////////////////////////////  Invalid  /////////////////////////////////////////////
// License key is Invalid
function license_Invalid() {
	//add_action( 'add_meta_boxes', 'license_Invalid_alert' );
	add_action( 'admin_menu', 'mnbaa_seo_add_licnse_page' );
}

function license_valid(){
	mnbaa_seo_run_plugin();
}
function license_Invalid_alert() {
	$screens = array( 'post', 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box( 
           'seo_div',
           __('license_Invalid_alert ','mnbaa-seo'),
           'license_Invalid_alert_callback',
           $screen,
           'normal'
      );
	}
}

function license_Invalid_alert_callback($post){
?>
<div id="mytabs" class="">
	<?php echo __('License key is Invalid', 'mnbaa-seo')?>
	<br>
	<a href="admin.php?page=mnbaa_seo">insert secret key here</a>
	<br>
	<a href="http://clientarea.mnbaa.com/clientarea.php?action=products">get secret key here</a>
</div>
<?php
}

//////////////////////////////////////////  Expired  /////////////////////////////////////////////
// License key is Invalid
function license_Expired() {
	 add_action( 'add_meta_boxes', 'license_Expired_alert' );
	add_action( 'admin_menu', 'mnbaa_seo_add_menu_page' );
	//echo "EXPI";
}

function license_Expired_alert() {
	$screens = array( 'post', 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box( 
           'seo_div',
           __('license_Expired_alert ','mnbaa-seo'),
           'license_Expired_alert_callback',
           $screen,
           'normal'
      );
	}
}

function license_Expired_alert_callback($post){
?>
<div id="mytabs" class="">
	<?php echo __('License key is Expired', 'mnbaa-seo')?>
	<br>
	<a href="admin.php?page=mnbaa_seo"><?php echo __('Insert secret key here', 'mnbaa-seo')?></a>
	<br>
	<a href="http://clientarea.mnbaa.com/clientarea.php?action=products"><?php echo __('get secret key here', 'mnbaa-seo')?></a>
</div>
<?php
}

//////////////////////////////////////////  Suspended  /////////////////////////////////////////////
// License key is Suspended
function license_Suspended() {
	add_action( 'add_meta_boxes', 'license_Suspended_alert' );
	add_action( 'admin_menu', 'add_seo_menu_page' );
}

function license_Suspended_alert() {
	$screens = array( 'post', 'page' );
	foreach ( $screens as $screen ) {
		add_meta_box( 
           'seo_div',
           __('license_Suspended_alert ','mnbaa-seo'),
           'license_Suspended_alert_callback',
           $screen,
           'normal'
      );
	}
}

function license_Suspended_alert_callback($post){
?>
<div id="mytabs" class="">
	<?php echo __('License key is Suspended', 'mnbaa-seo')?>
	<br>
	<a href="admin.php?page=mnbaa_seo">insert secret key here</a>
	<br>
	<a href="http://clientarea.mnbaa.com/clientarea.php?action=products">get secret key here</a>
</div>
<?php
}


function mnbaa_seo_run_plugin() {
	add_action('add_meta_boxes', 		'mnbaa_seo_add_meta_box' );
	add_action('admin_enqueue_scripts', 'mnbaa_seo_run_styles' );
	add_action('save_post',      		'mnbaa_seo_save_meta_box_data' );
	add_action('wp_head',        		'mnbaa_seo_header_data' );
	add_filter('wp_title',       		'mnbaa_seo_wp_title', 10, 2 );
	add_action('admin_menu',     		'mnbaa_seo_add_menu_page' );
	add_action('admin_menu',     		'mnbaa_seo_add_social_menu_page' );
	add_action('wp_ajax_mnbaa_seo_get_word_count', 'mnbaa_seo_get_word_count');
	//
	$version_option=get_option('mnbaa_seo_private_update' );
	if($version_option=='TRUE'){
		//echo "true";
		// include( plugin_dir_path( __FILE__ ) . 'includes/mnbaa_functions.php');
		// include( plugin_dir_path( __FILE__ ) . 'includes/mnbaa_functions.php');
	}
	
	
}
function mnbaa_seo_add_meta_box() {
	$screens = json_decode(get_option('mnbaa_seo_screens'));
	
	if(sizeof($screens)>0){
		foreach ( $screens as $screen ) {
			add_meta_box( 
			   'seo_div',
			   __('Nashr SEO by <a href="http://mnbaa.com" target="_blank" style="text-decoration: none;font-size: 14px;">Mnbaa</a> ','mnbaa-seo'),
			   'mnbaa_seo_metabox_callback',
			   $screen,
			   'normal'
		  );
		}
	}
}
function mnbaa_seo_run_styles() {
	$lang=get_bloginfo("language");
	$lang=substr($lang,0, 2);
	wp_enqueue_style('autocomplete', plugins_url('../styles/autocomplete-'.$lang.'.css', __FILE__ ));
}



function mnbaa_seo_metabox_callback($post){
	global $socialMediaItems;
	?>
	<div id="mytabs">
		<input type="hidden" value="<?php echo $post->ID; ?>"  id="post_id"/>
		<input type="hidden" value="<?php echo $post->post_title; ?>"  id="search_title"/>
		<h2 class="nav-tab-wrapper" id="wpseo-tabs" style="padding:0px;">
   		<ul class="category-tabs" style="margin:0px;padding:0px;">
		<?php foreach ($socialMediaItems as $k => $item):?>
			<li id="tab-list"><a href="#tabs-<?php echo $k?>" class="nav-tab nav-tab-active"  style="background:#f1f1f1"><?php echo ucfirst($item['label'])?></a></li>
		<?php endforeach ?>
       	</ul>
       	</h2>
       	<br class="clear" />
       
       	<?php 
       	// Add an nonce field so we can check for it later.
		wp_nonce_field( 'seo_metabox', 'seo_metabox_nonce' );
		foreach ($socialMediaItems as $k => $item):
			$itemArray = $item['val'].'_meta_fields';
			global $$itemArray;
			$fields = $$itemArray;
		?>
		
		<div id="tabs-<?php echo $k?>">‏
			<table class="form-table">
				<?php foreach ($fields as $field):
					$post_seo_meta = get_post_meta($post->ID, $field['name'], true);?>
				<tr>
					<th><?php mnbaa_seo_make_label($field['label'], $field['name'])?> </th>
					<td>
				  <?php
					switch ($field['type']) {
						
						case 'snippet' :
							mnbaa_seo_make_snippet($field, $post->ID);
							break;
							
						case 'text' :
							mnbaa_seo_make_input($field, $post_seo_meta);
							break;

						case 'textarea' :
							mnbaa_seo_make_textarea($field, $post_seo_meta);
							break;

						case 'image' :
							mnbaa_seo_make_img_input($field, $post_seo_meta);
							break;

						case 'select' :
							mnbaa_seo_make_select($field, $post_seo_meta);
							break;
							
						case 'multi-select' :
							mnbaa_seo_make_multi_select($field, $post_seo_meta);
							break;
							
						case 'div' :
							mnbaa_seo_make_div_contain_li($field, $post_seo_meta);
							break;

						default :
							break;
					}
				?>
			</td>
				</tr>
					
				<?php endforeach ?>
			</table>
		</div>
		<?php endforeach ?>
	</div>
    <?php
}

function mnbaa_seo_save_meta_box_data($post_id)
{
	//echo $post_id;
	global $socialMediaItems;
	// Check if our nonce is set.
	if ( ! isset( $_POST['seo_metabox_nonce'] ))	return;

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['seo_metabox_nonce'], 'seo_metabox' )) return;
	

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] )
		if ( ! current_user_can( 'edit_page', $post_id ) )
			return;
	else
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;
	

	foreach ($socialMediaItems as $k => $item)
	{	
		$itemArray = $item['val'].'_meta_fields';
		global $$itemArray;
		$fields = $$itemArray;

		foreach($fields as $field){
			if ( !isset( $_POST[$field['name']] ) )
			 {
				return;
			 }
			 else
			 {
			 	$old_data 	= get_post_meta($post_id, $field['name'], true);
				$field_data="";
				if($field['name']=='mnbaa_seo_keywords'){
					$key_words =$_POST[$field['name']];
					if($key_words[count($key_words)-1]== ''){
						array_pop($key_words);
					}
					foreach ($key_words as $key => $word) {
						if($word!='')
							($word === end($key_words))? $field_data .=$word : $field_data.=$word.',';
						}
					
				}
				else{
					$field_data = sanitize_text_field( $_POST[$field['name']] );
				}
					
				if ($field_data && $field_data != $old_data) {
					update_post_meta($post_id, $field['name'], $field_data);
					}
				 elseif ('' == $field_data && $old_data) {
					delete_post_meta($post_id, $field['name'], $old_data);
			 		}
			}
		}
	}
}

function mnbaa_seo_header_data(){
	$post_id=get_the_ID();
	$post_type=get_post_type($post_id);
	$screens_option = json_decode(get_option('mnbaa_seo_screens'));
	global $settingSocialMediaItems;
	global $socialMediaItems;
	
 if(in_array($post_type,$screens_option))
 {
	echo "<!-- Mnbaa SEO plugin meta Tags Start -->"."\n";
	foreach ($socialMediaItems as $k => $item)
	{
		$itemArray = $item['val'].'_meta_fields';
		global $$itemArray;
		$fields = $$itemArray;
		
		foreach ($fields as $field)
		 {
			$content = get_post_meta($post_id, $field['name'], true);
			
			if($content!=''){
				//check if is link meta tag
				if($field['prop']=='link')
				{
					mnbaa_seo_make_linkTage($field['val'], $content);
				}
				else{
					if($field['val']=='og:image'){
						$img= wp_get_attachment_image_src($content,'full');
						$content=$img[0];
					}
					mnbaa_seo_make_metaTage($field['prop'], $field['val'], $content);
				}
			}
		}
	}	
	
	//get  different times of post
	$publish_date=get_post_time( 'c');
	//modified date
	$revision_data = wp_post_revision_title( $post ,false );
    // $modified_date= $date_time[0].'at'.$date_time[1];
    $modified_date=get_the_modified_date('c');
    	//get the category of this post
   	$cats=get_the_category( $post_id );
	//$cat='';
	foreach ($cats as $key => $value) {
		echo '<meta property="article:section" content="'.$value->name .'" />'."\n";
		
	}
	//get url of post
	$permalink_url = get_permalink();
	//get site title
	$site_name=get_bloginfo('name');
	//get locale
	$locale=get_locale();
	//print static meta tags 
	echo '<meta property="og:locale" content="'.$locale.'" />'."\n";
	echo '<meta property="og:url" content="'.$permalink_url.'" />'."\n";
	echo '<meta property="article:published_time" content="'.$publish_date .'" />'."\n";
	echo '<meta property="article:modified_time" content="'.$modified_date.'" />'."\n";
	echo '<meta property="og:updated_time" content="'.$modified_date.'" />'."\n";
 

	foreach ($settingSocialMediaItems as $k => $item)
	{
		$itemArray = $item['val'].'_seo_meta_setting';
		global $$itemArray;
		$fields = $$itemArray;
		
		foreach ($fields as $seo_field) 
		{
			$seo_meta	= get_option($seo_field['name']);
			
			if($seo_meta)
			{
				mnbaa_seo_make_metaTage($seo_field['prop'], $seo_field['val'], $seo_meta);
			}	

		}
	}
 	echo "<!-- Mnbaa SEO plugin meta Tags END -->"."\n";
 	}	
}

function mnbaa_seo_wp_title(){
	global $prefix;
	$post_id=get_the_ID();
	$title = get_post_meta($post_id, $prefix.'title', true);
	return $title;
}
//
function mnbaa_seo_add_licnse_page(){
	add_menu_page( __('Nashr SEO Settings','mnbaa-seo'),__('Nashr SEO','mnbaa-seo'), 'manage_options', 'mnbaa_seo', 'mnbaa_seo_licnse_menu_page',plugins_url( '', __FILE__ ).'/../images/seo-icon.png');
}
function mnbaa_seo_add_menu_page(){
	add_menu_page( __('Nashr SEO Settings','mnbaa-seo'),__('Nashr SEO','mnbaa-seo'), 'manage_options', 'mnbaa_seo', 'mnbaa_seo_custom_menu_page',plugins_url( '', __FILE__ ).'/../images/seo-icon.png');
}
function mnbaa_seo_add_custom_license_page(){
	add_menu_page( __('Nashr SEO license','mnbaa-seo'),__('Nashr SEO license','mnbaa-seo'), 'manage_options', 'mnbaa_seo', 'mnbaa_seo_custom_license_page',plugins_url( '', __FILE__ ).'/../images/seo-icon.png');
}

function mnbaa_seo_add_social_menu_page(){
	add_submenu_page( 
          'mnbaa_seo'  
        , __('Social Media Setting','mnbaa-seo') 
        , __('Social Media','mnbaa-seo')
        , 'manage_options'
        , 'mnbaa_social_seo'
        , 'mnbaa_seo_social_custom_menu_page'
    );
}

function mnbaa_seo_licnse_menu_page(){
	if ( isset($_POST['Submit']) ) {
		echo "yes";
		$license_value=$_POST['license_key'];
		if ( get_option('license_key') !== false ) {
	    // The option already exists, so we just update it.
	    update_option('license_key', $license_value );
		} else {
		    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
		    add_option('license_key', $license_value );
		}
	//
	}
	include( plugin_dir_path( __FILE__ ) .  '../views/license_page.php');
	
}
function mnbaa_seo_custom_menu_page(){
	if ( isset($_POST['Submit']) ) {
		
			mnbaa_seo_update_options();
		}
		include( plugin_dir_path( __FILE__ ) . 'general_setting.php');
}

function mnbaa_seo_social_custom_menu_page(){
	
	global $settingSocialMediaItems;
	?>
		<form action="" method="post" enctype="multipart/form-data">
		<table class="form-table">
	<?php
	foreach ($settingSocialMediaItems as $k => $item):
		$itemArray = $item['val'].'_seo_meta_setting';
		global $$itemArray;
		$fields = $$itemArray; ?>
        <tr><th colspan="2"><h1><?php echo ucfirst($item['label']); ?></h1></th></tr>
        <?php
		foreach ($fields as $seo_field) {
			if ( isset($_POST['Submit']) ) {
				
					if ( ! isset( $_POST[$seo_field['name']] ) ) {
						
						return;
					}else{
						if(isset($seo_field['label_type'])){
							//$seo_field_data = $_POST[$seo_field['name']];
							$meta_arr=explode('content',$_POST[$seo_field['name']]);
							if(sizeof($meta_arr) !=1)
								
								$seo_field_data = rtrim(ltrim($meta_arr[1],'=\"'),'\" />');
							
							else
								$seo_field_data = sanitize_text_field( $_POST[$seo_field['name']] );	
						}else
							$seo_field_data = sanitize_text_field( $_POST[$seo_field['name']] );
						update_option($seo_field['name'], $seo_field_data);
					}
			} 
			
            $seo_meta = get_option($seo_field['name']); ?>
			<tr><th>
			<?php if(isset($seo_field['label_type']))mnbaa_seo_make_link($seo_field['href'],$seo_field['label']) ; else mnbaa_seo_make_label($seo_field['label'], $seo_field['name']); ?>
			</th>
			<td>
			<?php
			switch($seo_field['type']) {
				//text
				case 'text':
				//$var=str_replace(\"\\","",htmlspecialchars($seo_meta));
				//$var=trim(htmlspecialchars($seo_meta), \' \\');
					mnbaa_seo_make_input($seo_field, htmlspecialchars($seo_meta));
				break;
		
			} //end switch
			?></td>
			</tr>
	<?php }
	endforeach; ?>
		
	
	</table><p class="submit">
  

	<input type="submit" name="Submit" id="button" value="<?php echo __('Save','mnbaa-seo') ?>" class="button button-primary" /></p>
</form>
<?php
 }
//
////////////////////////////// activation hook ////////////////////
function Mnbaa_seo_activate()
{
	
    //$screen_options = 'mnbaa_seo_screens';
    $post_types = get_post_types( array('public'=>'ture'),'names' );
    $screen_value='[';
    foreach ($post_types as $post_type) {
        $screen_value=$screen_value.'"'.$post_type.'",';
    }
    $screen_value=substr($screen_value, 0, -1);
    $screen_value=$screen_value.']';
	//
	$version_value=get_option('mnbaa_seo_private_update'); 
	mnbaa_seo_update_options($screen_value,$version_value);
	
} 
function mnbaa_seo_update_options($screen_value=false,$version_value=false){
	$version_options="mnbaa_seo_private_update";
	
	if($version_value=='')$version_value="FALSE";
	if(isset($_POST['mnbaa_seo_private_update'])&& !empty($_POST['screens'])){   
		$version_value="TRUE";
	}
	if ( get_option( $version_options ) !== false ) {
	    // The option already exists, so we just update it.
	    update_option( $version_options, $version_value );
		} else {
		    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
		    add_option( $version_options, $version_value );
		}
	//
	
	$screen_options = 'mnbaa_seo_screens';
	if(isset($_POST['screens']) && !empty($_POST['screens'])){   
		$screen_value=json_encode($_POST['screens']);
				
	}
	//check that wp option is exist in database 
	
	if ( get_option( $screen_options ) !== false ) {
	    // The option already exists, so we just update it.
	    update_option( $screen_options, $screen_value );
	} else {
	    // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
	   
	    add_option( $screen_options, $screen_value );
	}
			
}
?>
