<?php
/*
Plugin Name:Nashr SEO
Plugin URI: http://www.mnbaa.com/en/%D9%85%D9%86%D8%AA%D8%AC%D8%A7%D8%AA/%D9%86%D8%B4%D8%B1-seo/
Description: wordpress plugin you can use to optimize your website for search engines and social media websites .
Author: Mnbaa CO
Author URI: http://www.mnbaa.com
Version: 1.0
Text Domian:mnbaa-seo
Domain Path: /languages
*/


// load ajax
wp_register_script("ajax-nashr",plugins_url('', __FILE__) .'/js/ajax-nashr.js', array('jquery'));
wp_localize_script('ajax-nashr', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
wp_enqueue_script('ajax-nashr');
// 

wp_enqueue_script('custom-js', plugins_url( '', __FILE__ ).'/js/custom-js.js');
wp_enqueue_script('limit', plugins_url( '', __FILE__ ).'/js/limit.js');
wp_enqueue_script('selectall', plugins_url( '', __FILE__ ).'/js/selectall.js');
wp_enqueue_script('jquery-ui', plugins_url('', __FILE__) . '/js/jquery-ui.js');
wp_enqueue_script('nashr-autocomplete', plugins_url('', __FILE__) . '/js/nashr-autocomplete.js', array( 'jquery-ui-autocomplete' ));
wp_enqueue_script('mytabs', plugins_url( '', __FILE__ ).'/js/mytabs.js',array( 'jquery-ui-tabs' ));
// load language files
load_plugin_textdomain('mnbaa-seo', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// include files
include( plugin_dir_path( __FILE__ ) . 'includes/mnbaa_functions.php');
include( plugin_dir_path( __FILE__ ) . 'controllers/ajax_functions.php');
include( plugin_dir_path( __FILE__ ) . 'includes/wp_functions.php');
include( plugin_dir_path( __FILE__ ) . 'includes/arrays.php');
include( plugin_dir_path( __FILE__ ) . 'includes/license_functions.php');
//
register_activation_hook( __FILE__, 'Mnbaa_seo_activate' );
//

$licensekey =  get_option('license_key');
$localkey 	= get_option('local_key');

// Validate the license key information
$results = mnbaa_PRFX_check_license($licensekey, $localkey);
//var_dump($results);

$option_name = 'local_key';
if ( get_option( $option_name ) !== false ) {
	if ($results['localkey']) {
		$localkey = $results['localkey'];
	}
    update_option( $option_name, $localkey );
} else {
    $deprecated = null;
    $autoload = 'no';
	$localkey = '9tjIxIzNwgDMwIjI6gjOztjIlRXYkt2Ylh2YioTO6M3OicmbpNnblNWasx1cyVmdyV2ccNXZsVHZv1GX
zNWbodHXlNmc192czNWbodHXzN2bkRHacBFUNFEWcNHduVWb1N2bExFd0FWTcNnclNXVcpzQioDM4ozc
7ISey9GdjVmcpRGZpxWY2JiO0EjOztjIx4CMuAjL3ITMioTO6M3OiAXaklGbhZnI6cjOztjI0N3boxWY
j9Gbuc3d3xCdz9GasF2YvxmI6MjM6M3Oi4Wah12bkRWasFmdioTMxozc7ISeshGdu9WTiozN6M3OiUGb
jl3Yn5WasxWaiJiOyEjOztjI3ATL4ATL4ADMyIiOwEjOztjIlRXYkVWdkRHel5mI6ETM6M3OicDMtcDM
tgDMwIjI6ATM6M3OiUGdhR2ZlJnI6cjOztjIlNXYlxEI5xGa052bNByUD1ESXJiO5EjOztjIl1WYuR3Y
1R2byBnI6ETM6M3OicjI6EjOztjIklGdjVHZvJHcioTO6M3Oi02bj5ycj1Ga3BEd0FWbioDNxozc7ICb
pFWblJiO1ozc7IyUD1ESXBCd0FWTioDMxozc7ISZtFmbkVmclR3cpdWZyJiO0EjOztjIlZXa0NWQiojN
6M3OiMXd0FGdzJiO2ozc7pjMxoTY8baca0885830a33725148e94e693f3f073294c0558d38e31f844
c5e399e3c16a';
    add_option( $option_name, $localkey, $deprecated, $autoload );
}

//
// Interpret response
switch ($results['status']) {
    case "Active":
        license_valid();
        break;
    case "Invalid":
		mnbaa_seo_run_plugin();
       // license_Invalid();
        
        // license_Invalid();
        break;
    case "Expired":
        license_Expired();
        break;
    case "Suspended":
        license_Suspended();
        break;
    default:
        die("Invalid Response");
        break;
}
//mnbaa_seo_run_plugin();

?>