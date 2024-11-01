<?php 
set_time_limit(0);


global $wpdb;
global $woocommerce;

$site_url	=	site_url();



	function filter_where_wpa89155($where = '') {
		/*posts in the last 30 days*/
		$woar_last_export	=	trim(get_option('woar_last_export',true));
		if($woar_last_export == '' || $woar_last_export == '1')
			$where = '';
		else
			$where .= " AND post_modified_gmt > '" . date('Y-m-d H:i:s', $woar_last_export) . "'";
		return $where;

	}

	add_filter('posts_where', 'filter_where_wpa89155');

	/* get all the orders of woocomerce */

	$order_args	=	array(

						'posts_per_page'   => -1,
						'offset'           => 0,
						'category'         => '',
						'orderby'          => 'post_date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'shop_order',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'post_status'      => 'publish',
						'suppress_filters' => false ); 

					

	$order_posts	=	get_posts($order_args);

	remove_filter('posts_where', 'filter_where_wpa89155');

	if(!empty($order_posts)){
$counter = 0;
		foreach($order_posts as $order){

			$email_address	=	get_post_meta($order->ID,'_billing_email',true);
			$billing_first_name	=	get_post_meta($order->ID,'_billing_first_name',true);
			$billing_last_name	=	get_post_meta($order->ID,'_billing_last_name',true);
			
			$fields = array();
			$args   = array();	
			$woo_order = new WC_Order($order->ID);
				
			$orderdata = (array) $woo_order;
			$order_status = $orderdata['post_status'];

			 if($order_status=='wc-completed'){
				
				
				if(get_option('need_infusionsoft')=='1'){
					/*if($yes>0){*/
						$app_name   = trim(get_option('hangout_InfusionSoft_app'));
						$api_key 		= trim(get_option('hangout_InfusionSoft_list_id'));
						$tag_id			= trim(get_option('hangout_InfusionSoft_tag_id'));
						try {
							require_once("infusionsoft_src/isdk.php");
							$app = new iSDK;
							$data = $app->cfgCon($app_name, $api_key);
							$conDat = array('FirstName' => $billing_first_name,
											'lastName'  => $billing_last_name,
											'Email'     => $email_address);
											
							$conID = $app->addCon($conDat);
							$result = $app->grpAssign($conID,$tag_id);
						}
						catch (Exception $e) {
						}	
					/*}*/
					
				}
				
				
				if(get_option('need_mailchimp')=='1'){
					
						require_once('MCAPI.class.php');
						$listId=get_option('hangout_Mailchimp_list_id');	
						$apikey=get_option('hangout_Mailchimp_api_key');
						$MailChimp = new MailChimp($apikey);
						$result = $MailChimp->call('lists/subscribe', array(
										'id'                => $listId,
										'email'             => array('email'=>$email_address),
										'merge_vars'        => array('FNAME'=>$billing_first_name, 'LNAME'=>$billing_last_name),
										'double_optin'      => false,
										'update_existing'   => true,
										'replace_interests' => false,
										'send_welcome'      => false,
									));
					
										
				}
				
				
			
				if(get_option('need_imnicamail')=='1'){
					if($yes>0){
						$ch		=	curl_init('http://www.imnicamail.com/v4/api.php');
						$list_id=get_option('hangout_ImnicaMail_list_id');		
						curl_setopt($ch,CURLOPT_POST,true);
						$var='Command=Subscriber.Subscribe&ResponseFormat=JSON&JSONPCallBack=true&ListID='.$list_id.'&EmailAddress='.$email_address.'&IPAddress='.$_SERVER["REMOTE_ADDR"].'';
						curl_setopt($ch,CURLOPT_POSTFIELDS,$var);
						curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
						try{
							$output	=	curl_exec($ch);
						}catch (Exception $e) {
						}
					}
					
				}
				
			}
			$counter++;
		}
		//echo "ad";
		/* after inserting records update option of last updated time */
		$current_time	=	time();
		update_option('woar_last_export',$current_time);
	}
	


?>