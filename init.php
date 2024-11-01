<?php

/*

Plugin Name: WOOCOMMERCE to AutoResponders Email Marketing
URI: http://spideb.in/woar
Description: Sync customers data between WooCommerce and AutoResponders
Version: 1.0.0
Author: Bhuvnesh Gupta
Author URI: https://wordpress.org/support/profile/bhuvnesh

*/


register_activation_hook(__FILE__,'woar_activate');

function woar_activate(){
   global $wpdb;
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');    /* file included for database */
	$reoccurence		=	'12perhour';
	wp_schedule_event( time(), $reoccurence, 'woar_cron_event');
	wp_schedule_event( time(), $reoccurence, 'woar_cron_event_cpanel');
	
}

register_deactivation_hook( __FILE__, 'woar_deactivation' );

/* On deactivation, remove all functions from the scheduled action hook. */
function woar_deactivation() {
	wp_clear_scheduled_hook( 'woar_cron_event' );
	wp_clear_scheduled_hook( 'woar_cron_event_cpanel' );
}

add_filter('cron_schedules','woar_cron_definer');

function woar_cron_definer(){
	global $wpdb;
	$hourresult	=	'12';
	$per_tym	=	'hour';
		$intrate	= $hourresult.'perhour';		
		$inttime	=	3600/$hourresult;		
		$schedules[$intrate] = array(
		  'interval'=> $inttime,
		  'display'=>  __( $hourresult.'times/hour')
		);
	return $schedules;
}

add_action('woar_cron_event', 'woar_cron_event_fun');
function woar_cron_event_fun(){
	if(get_option('woar_wordpress_cron')=='1'){
		include 'cron_execute.php';
	}
}

add_action('woar_cron_event_cpanel', 'woar_cron_event_cpanel_fun');
function woar_cron_event_cpanel_fun(){
	include 'cron_execute.php';
}


/* Start Function add menus  */
add_action('admin_menu','woar_add_menus');

function woar_add_menus(){
	$icon_url			=	plugin_dir_url(__FILE__).'logo.png';	
	add_menu_page( "WOAR", "WOAR", "administrator", "woar", "woar_fun",$icon_url);	
	//add_submenu_page( "edit.php?post_type=contest", "Buyers", "Buyers", "administrator", "rn_corporate_buyers", "rn_corporate_buyers_fun" );
}



add_action('admin_enqueue_scripts', 'woar_admin_files');



function woar_admin_files()

{

	wp_enqueue_script('jquery');

	wp_register_style('jquery-core-ui-css', plugins_url('jquery-ui.css', __FILE__));

	wp_enqueue_style('jquery-core-ui-css' );

	wp_register_style('jquery-google-font-css', 'http://fonts.googleapis.com/css?family=Kristi|Crafty+Girls|Yesteryear|Finger+Paint|Press+Start+2P|Spirax|Bonbon|Over+the+Rainbow');

	wp_enqueue_style('jquery-google-font-css');

	

	wp_register_style('prefix-style-source-css', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro');

	wp_enqueue_style('prefix-style-source-css' );
	
	wp_register_style('prefix-style-font-css', 'http://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800');

	wp_enqueue_style('prefix-style-font-css' );

	


	wp_register_style('prefix-style-roboto-css', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' );

	wp_enqueue_style('prefix-style-roboto-css' );

		wp_register_style('prefix-style-custom-css', plugins_url('custom-style.css', __FILE__) );

	wp_enqueue_style('prefix-style-custom-css' );



	wp_register_style('prefix-style-awesome-css', plugins_url('css/font-awesome.css', __FILE__) );

	wp_enqueue_style('prefix-style-awesome-css' );
	
	wp_register_style('prefix-style-max-css', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');

	wp_enqueue_style('prefix-style-max-css' );

	

	wp_enqueue_script('custom-js', plugin_dir_url( __FILE__ ).'js/custom-js.js');

}





function woar_fun(){

	include 'plugin.php';	

}



function woar_pre($arr){

	echo '<pre>';print_r($arr);echo '</pre>';

}
add_action( 'wp_ajax_nopriv_ghangout_aweber_set_up', 'woar_aweber_set_up_callback' );
add_action( 'wp_ajax_ghangout_aweber_set_up', 'woar_aweber_set_up_callback' );
function woar_aweber_set_up_callback(){

   include('ajax_set_up_aweber.php');

die;
}	

?>