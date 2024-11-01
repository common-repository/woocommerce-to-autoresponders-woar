<?php 	 
$error 		= '';
$message 	= '';

$woar_autoresponder = get_option('woar_autoresponder');
$aweber =get_option('hangout_amber_from');
$hangout_Mailchimp_api_key =get_option('hangout_Mailchimp_api_key');		
$hangout_Mailchimp_list_id =get_option('hangout_Mailchimp_list_id');		

$aweber_name =get_option('hangout_amber_name_field');
$aweber_email =get_option('hangout_amber_name_email');
$hangout_ImnicaMail_list_id =get_option('hangout_ImnicaMail_list_id');
$hangout_Icontact_list_id =get_option('hangout_Icontact_list_id');
$hangout_Sendreach_api_key =get_option('hangout_Sendreach_api_key');
$hangout_Sendreach_secret_key =get_option('hangout_Sendreach_secret_key');
$hangout_Sendreach_user_id =get_option('hangout_Sendreach_user_id');

$hangout_Icontact_user_password =get_option('hangout_Icontact_user_password');
$hangout_Icontact_user_name =get_option('hangout_Icontact_user_name');
$hangout_Icontact_app_id =get_option('hangout_Icontact_app_id');
$hangout_GetResponce_api_key =get_option('hangout_GetResponce_api_key');
$hangout_Sendreach_list_id =get_option('hangout_Sendreach_list_id');
$hangout_InfusionSoft_list_id =get_option('hangout_InfusionSoft_list_id');
$hangout_InfusionSoft_tag_id =get_option('hangout_InfusionSoft_tag_id');
$hangout_InfusionSoft_app =get_option('hangout_InfusionSoft_app');
$hangout_GetResponce_campaign_name =get_option('hangout_GetResponce_campaign_name');
$hangout_Aweber_api_key =get_option('hangout_Aweber_api_key');
$hangout_Aweber_consumer_Key =get_option('hangout_Aweber_consumer_Key');
$hangout_Aweber_consumer_Secret =get_option('hangout_Aweber_consumer_Secret');
$hangout_Aweber_access_Secret =get_option('hangout_Aweber_access_Secret');
$hangout_Aweber_account_id =get_option('hangout_Aweber_account_id');
$hangout_Aweber_list_id =get_option('hangout_Aweber_list_id');
$hangout_Aweber_list_name =get_option('hangout_Aweber_list_name');
$hangout_Aweber_app_id =get_option('hangout_Aweber_app_id');
$klicktip_username = get_option('klicktip_username');	
$klicktip_password = get_option('klicktip_password');


$site_url	=	site_url();


if(isset($_GET['reset_sync']) && $_GET['reset_sync'] == '1'){
	global $wpdb;
	update_option('woar_last_export','');
	$message = 'Time is reset, next cron will update all orders to Selected AutoResponders';
}


if(isset($_POST['need_autoresponder_submit'])){
	update_option('need_aweber',$_POST['need_aweber']);
	update_option('need_infusionsoft',$_POST['need_infusionsoft']);
	update_option('need_sendreach',$_POST['need_sendreach']);
	update_option('need_imnicamail',$_POST['need_imnicamail']);
	update_option('need_mailchimp',$_POST['need_mailchimp']);
	update_option('need_icontact',$_POST['need_icontact']);
	update_option('need_getresponse',$_POST['need_getresponse']);
	update_option('need_klicktipp',$_POST['need_klicktipp']);
}

	if(isset($_POST['license_submit'])){
	
			$error	= 'Please Purchase Pro Version.';
		}	
		else{	
				
		}
	
	/* klicktip account */
	if(isset($_POST['woar_submit'])) {
	
		$woar_autoresponder		=	trim($_POST["woar_autoresponder"]);
		update_option("woar_autoresponder",$_POST["woar_autoresponder"]);
		
		
			update_option("hangout_amber_from",$_POST["hangout_amber_from"]);
			update_option("hangout_Aweber_api_key",$_POST["hangout_Aweber_api_key"]);
			update_option("hangout_Aweber_consumer_Key",$_POST["hangout_Aweber_consumer_Key"]);
			update_option("hangout_Aweber_consumer_Secret",$_POST["hangout_Aweber_consumer_Secret"]);
			update_option("hangout_Aweber_access_Secret",$_POST["hangout_Aweber_access_Secret"]);
			update_option("hangout_Aweber_account_id",$_POST["hangout_Aweber_account_id"]);
			$aweber_list=$_POST["hangout_Aweber_list_id"];
			$aweber_list_name_id=explode('%',$aweber_list);
			update_option("hangout_Aweber_list_id",$aweber_list_name_id[0]);
			update_option("hangout_Aweber_list_name",$aweber_list_name_id[1]);
			update_option("hangout_Aweber_app_id",$_POST["hangout_Aweber_app_id"]);
	
			$hangout_InfusionSoft_list_id	=	trim($_POST['hangout_InfusionSoft_list_id']);
			$hangout_InfusionSoft_app	=	trim($_POST['hangout_InfusionSoft_app']);
			$hangout_InfusionSoft_tag_id	=	trim($_POST['hangout_InfusionSoft_tag_id']);
			if($hangout_InfusionSoft_list_id == ''){
				//$error = "Enter InfusionSoft API Key";		
			}
			else if($hangout_InfusionSoft_app == ''){
				//$error = "Enter InfusionSoft App";		
			}
			else if($hangout_InfusionSoft_tag_id == ''){
				//$error = "Enter InfusionSoft Tag ID";		
			}
			else{
				update_option("hangout_InfusionSoft_list_id",$_POST["hangout_InfusionSoft_list_id"]);
				update_option("hangout_InfusionSoft_app",$_POST["hangout_InfusionSoft_app"]);
				update_option("hangout_InfusionSoft_tag_id",$_POST["hangout_InfusionSoft_tag_id"]);
				//$message	=	'InfusionSoft Account Saved Successfully';	
			}
			
		
			$hangout_Sendreach_list_id	=	trim($_POST['hangout_Sendreach_list_id']);
			if($hangout_Sendreach_list_id	==	''){
				//$error = "Enter Sendreach List ID";
			}
			else{
				//$message	=	'Sendreach Account Saved Successfully';	
				update_option("hangout_Sendreach_list_id",$_POST["hangout_Sendreach_list_id"]);
			}
			
		
			$hangout_ImnicaMail_list_id	=	trim($_POST['hangout_ImnicaMail_list_id']);
			if($hangout_ImnicaMail_list_id	==	''){
				//$error = "Enter ImnicaMail List ID";
			}
			else{
				//$message	=	'ImnicaMail Account Saved Successfully';	
				update_option("hangout_ImnicaMail_list_id",$_POST["hangout_ImnicaMail_list_id"]);
			}
		
			$hangout_Mailchimp_list_id	=	trim($_POST['hangout_Mailchimp_list_id']);
			$hangout_Mailchimp_api_key	=	trim($_POST['hangout_Mailchimp_api_key']);
			if($hangout_Mailchimp_api_key	==	''){
				//$error = "Enter Mailchimp API Key";
			}
			else if($hangout_Mailchimp_list_id	==	''){
				//$error = "Enter Mailchimp List ID";
			}
			else{
				update_option("hangout_Mailchimp_list_id",$_POST["hangout_Mailchimp_list_id"]);
				update_option("hangout_Mailchimp_api_key",$_POST["hangout_Mailchimp_api_key"]);	
				//$message	=	'Mailchimp Account Saved Successfully';	
			}
			
	
			$hangout_Icontact_list_id				=	trim($_POST['hangout_Icontact_list_id']);
			$hangout_Icontact_user_name		=	trim($_POST['hangout_Icontact_user_name']);
			$hangout_Icontact_user_password	=	trim($_POST['hangout_Icontact_user_password']);
			$hangout_Icontact_app_id				=	trim($_POST['hangout_Icontact_app_id']);
			
			if($hangout_Icontact_app_id	==	''){
				//$error = "Enter Icontact App ID";
			}
			else if($hangout_Icontact_user_name	==	''){
				//$error = "Enter Icontact Username";
			}
			else if($hangout_Icontact_user_password	==	''){
				//$error = "Enter Icontact Password";
			}
			else if($hangout_Icontact_list_id	==	''){
				//$error = "Enter Icontact List ID";
			}
			else{
				update_option("hangout_Icontact_list_id",$_POST["hangout_Icontact_list_id"]);
				update_option("hangout_Icontact_user_password",$_POST["hangout_Icontact_user_password"]);
				update_option("hangout_Icontact_user_name",$_POST["hangout_Icontact_user_name"]);
				update_option("hangout_Icontact_app_id",$_POST["hangout_Icontact_app_id"]);
				//$message	=	'Icontact Account Saved Successfully';	
			}
			
		
			$hangout_GetResponce_api_key	=	trim($_POST['hangout_GetResponce_api_key']);
			$hangout_GetResponce_campaign_name	=	trim($_POST['hangout_GetResponce_campaign_name']);
			if($hangout_GetResponce_api_key	==	''){
				//$error = "Enter GetResponce API Key";
			}
			else if($hangout_GetResponce_campaign_name	==	''){
				//$error = "Enter GetResponce Campaign Name";
			}
			else{
				update_option("hangout_GetResponce_api_key",$_POST["hangout_GetResponce_api_key"]);
				update_option("hangout_GetResponce_campaign_name",$_POST["hangout_GetResponce_campaign_name"]);
				//$message	=	'Mailchimp GetResponce Saved Successfully';	
			}
			
		
			$klicktip_username	=	trim($_POST['klicktip_username']);	
			$klicktip_password	=	trim($_POST['klicktip_password']);
			if($klicktip_username==''){				
				//$error = "Enter Klick-Tipp Username";			
			}	
			else if($klicktip_password==''){	
				//$error	= 'Enter Klick-Tipp Password';	
			}			
			else{		
				require ('klicktipp.api.php');
				$klicktip_username = $klicktip_username;
				$klicktip_password = $klicktip_password;			

				$connector = new KlicktippConnector();
				$correct_creds	=	$connector->login($klicktip_username, $klicktip_password);
				if($correct_creds){
					update_option('klicktip_username',$klicktip_username);	
					update_option('klicktip_password',$klicktip_password);	
					//$message	=	'Klick-Tipp Account Saved Successfully';	
				}
				else{
					//$error	= 'Wrong Klick-Tipp Credentials';	
				}
				
			}
		}
		
		
	$yes		= -1;
	
if(isset($_POST['woar_wordpress_cron_submit']))	{
	if(isset($_POST['woar_wordpress_cron'])){
		update_option('woar_wordpress_cron',1);
	}
	else{
		update_option('woar_wordpress_cron',0);
	}
	$message	=	'Cron Saved Successfully';
}


?>


<script type='text/javascript'>
/* <![CDATA[ */
var g_hangout = {"ajaxurl": "<?php echo site_url(); ?>\/wp-admin\/admin-ajax.php"};
var site_url	=	"<?php echo site_url(); ?>";
/* ]]> */
</script>
<body>
<div id="hangout_main">

    <!-- Start Header -->
    <div class="gh_header">
		<div class="row-fluid">
			<div class="span6">
     			<div class="block_left">
                	WooCommerce <i class="fa fa-send"></i><span> AutoResponders</span>
                </div>
    		</div>
    		<div class="span6">
            	<div class="block_right">
					<?php 
					
					$yes		= -1;
					if($yes>0){
					?>
     				<img src="<?php echo plugin_dir_url(__FILE__); ?>/img/activated.png" alt="" align="top" /> Pro Version
					<?php 
					}
					else{
					?>
					<img src="<?php echo plugin_dir_url(__FILE__); ?>/img/deactivated.png" alt="" align="top" /> Free Version
					<?php 
					}
					?>
                </div>
    		</div>
    	</div>
    </div>
    <!-- End Header -->
    <div class="hangout_activated">
		<?php 
				
		if ( !function_exists( 'woocommerce_get_page_id' ) )
			echo '<div class="error"><p>Please activate WooCommerce plugin for use of this plugin.</p></div>';
		else{		
		?>
    	<!-- Start Tabs -->
    	<div class="gh_tabs">
		<div class="row-fluid">
			<div class="span12">
     		<ul class="gh_tabs_list">
				<li class="span4"><a href="#hangouts_settings_panel"><span><i class="fa fa-file-text-o"></i></span>License </a></li>
				<li class="span4"><a href="#hangouts_panel"><span><i class="fa fa-send"></i></span>AutoResponders Account </a></li>
				<li class="span4"><a href="#email_settings_panel"><span><i class="fa fa-gear"></i></span>Settings </a></li>      
			</ul>
    		</div>
    	</div>
    	</div>
    	<!-- End Tabs -->
    <!-- Start Container -->
    <div class="gh_container">		
		<div class="row-fluid">		
			<div class="span12">
   <?php 
   if($error)
   {
   	echo '<div class="error"><p>'.$error.'</p></div>';	
   	}
   	if($message)
   	{
		echo '<div class="updated"><p>'.$message.'</p></div>';	
	}
		?>
				<!-- Start Hangouts Settings Panel -->
     			<div id="hangouts_settings_panel" class="gh_tabs_div">
                	<div class="gh_container_header">				
					<?php 
					 $version = '';
						if($yes>0){
							$version	= 'Pro Version';
						}else{	
							$version	= 'Free Version, <a target="_blank" href="http://spideb.in/woar">Upgrade to Pro to get more Autoresponders</a><br/>';						
						}
					?>	
                    	<strong>License</strong><?php echo $version; ?>
                    </div>
                    	
                    </div>
                <!-- End Hangouts Settings Panel -->
			
                <!-- Start Hangouts Panel -->
                <div id="hangouts_panel" class="gh_tabs_div">
                	<div class="gh_container_header">
                    	<strong>AutoResponders Account</strong>
                    </div>
                    	<form action="" method="post" class="hangouts_form">
                    	<div class="gh_tabs_div_inner">
						
                       
                       
						
							<?php 
								if($yes<=0){
								?>
								<div id="myMenu101" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Mailchimp  </div>
								<div id="myDiv101" class="gh_accordian_div">
									<div class="row-fluid-outer">
									<div class="row-fluid">
										<div class="span4">
											<strong>Autoresponder API Key </strong>
										</div>
										<div class="span8">
											<input type="text" class="longinput" name="hangout_Mailchimp_api_key" id="hangout_Mailchimp_api_key" value="<?php echo $hangout_Mailchimp_api_key; ?>" /></span>
											<a target="_blank" href="http://kb.mailchimp.com/accounts/management/about-api-keys">Click Here</a>
										</div>
									</div>
								</div>
								<div class="row-fluid-outer">
									<div class="row-fluid">
										<div class="span4">
											<strong>Autoresponder List ID </strong>
										</div>
										<div class="span8">
											<input type="text" class="longinput" name="hangout_Mailchimp_list_id" id="hangout_Mailchimp_list_id" value="<?php echo $hangout_Mailchimp_list_id; ?>" /></span>
											<a target="_blank" href="http://kb.mailchimp.com/lists/managing-subscribers/find-your-list-id">Click Here</a>
										</div>
									</div>
								</div>
								</div>
								
								<div id="myMenu106" class="gh_accordian_tab"><i class="icon-plus-sign"></i> InfusionSoft  </div>
								<div id="myDiv106" class="gh_accordian_div">
								<div class="row-fluid-outer">
									<div class="row-fluid">
										<div class="span4">
											<strong>Autoresponder Api Key </strong>
										</div>
										<div class="span8">
											<input type="text" class="longinput" name="hangout_InfusionSoft_list_id" id="hangout_InfusionSoft_list_id" value="<?php echo $hangout_InfusionSoft_list_id; ?>" /></span>
											<a target="_blank" href="http://ug.infusionsoft.com/article/AA-00442/0/Infusionsoft-API-Key.html">Click Here</a>
										</div>
									</div>
									</div>
								<div class="row-fluid-outer">
									<div class="row-fluid">
										<div class="span4">
											<strong>Autoresponder App  </strong>
										</div>
										<div class="span8">
											<input type="text" class="longinput" name="hangout_InfusionSoft_app" id="hangout_InfusionSoft_app" value="<?php echo $hangout_InfusionSoft_app; ?>" /></span>
											<a target="_blank" href="https://www.youtube.com/watch?v=ls1ZYJl_9SI">Click Here</a>
										</div>
									</div>
								</div>
								<div class="row-fluid-outer">
									<div class="row-fluid">
									
										<div class="span4">
											<strong>Autoresponder Tag Id </strong>
										</div>
										<div class="span8">
											<input type="text" value="<?php echo $hangout_InfusionSoft_tag_id; ?>" id="hangout_InfusionSoft_tag_id" name="hangout_InfusionSoft_tag_id" class="longinput">
											<a target="_blank" href="http://ug.infusionsoft.com/article/AA-00306/0/Add-edit-or-delete-a-tag.html">Click Here</a>
										</div>

									</div>
								</div>
								</div>
								
								
								<div id="myMenu104" class="gh_accordian_tab"><i class="icon-plus-sign"></i> ImnicaMail  </div>
									<div id="myDiv104" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder List ID </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_ImnicaMail_list_id" id="hangout_ImnicaMail_list_id" value="<?php echo $hangout_ImnicaMail_list_id; ?>" /></span>
											</div>
										</div>
									</div>
									</div>
								
								
								
								<?php
								}
								else{
							?>
								<div id="myMenu101" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Mailchimp  </div>
								<div id="myDiv101" class="gh_accordian_div">
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder API Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Mailchimp_api_key" id="hangout_Mailchimp_api_key" value="<?php echo $hangout_Mailchimp_api_key; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder List ID </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Mailchimp_list_id" id="hangout_Mailchimp_list_id" value="<?php echo $hangout_Mailchimp_list_id; ?>" /></span>
											</div>
										</div>
									</div>
									</div>
									
									<div id="myMenu106" class="gh_accordian_tab"><i class="icon-plus-sign"></i> InfusionSoft  </div>
									<div id="myDiv106" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Api Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_InfusionSoft_list_id" id="hangout_InfusionSoft_list_id" value="<?php echo $hangout_InfusionSoft_list_id; ?>" /></span>
											</div>
										</div>
										</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder App  </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_InfusionSoft_app" id="hangout_InfusionSoft_app" value="<?php echo $hangout_InfusionSoft_app; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
										
											<div class="span4">
												<strong>Autoresponder Tag Id </strong>
											</div>
											<div class="span8">
												<input type="text" value="<?php echo $hangout_InfusionSoft_tag_id; ?>" id="hangout_InfusionSoft_tag_id" name="hangout_InfusionSoft_tag_id" class="longinput">
											</div>

										</div>
									</div>
									</div>
									
									<div id="myMenu104" class="gh_accordian_tab"><i class="icon-plus-sign"></i> GetResponse  </div>
									<div id="myDiv104" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder API Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_GetResponce_api_key" id="hangout_GetResponce_api_key" value="<?php echo $hangout_GetResponce_api_key; ?>" /></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Campaign Name </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_GetResponce_campaign_name" id="hangout_GetResponce_campaign_name" value="<?php echo $hangout_GetResponce_campaign_name; ?>" /></span>
											</div>
										</div>
									</div>
									</div>
									
									<div id="myMenu102" class="gh_accordian_tab"><i class="icon-plus-sign"></i> ImnicaMail  </div>
									<div id="myDiv102" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder List ID </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_ImnicaMail_list_id" id="hangout_ImnicaMail_list_id" value="<?php echo $hangout_ImnicaMail_list_id; ?>" /></span>
											</div>
										</div>
									</div>
									</div>
							
								
								<div id="myMenu103" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Icontact  </div>
									<div id="myDiv103" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder APP ID </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Icontact_app_id" id="hangout_Icontact_app_id" value="<?php echo $hangout_Icontact_app_id; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder User Name </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Icontact_user_name" id="hangout_Icontact_user_name" value="<?php echo $hangout_Icontact_user_name; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Password </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Icontact_user_password" id="hangout_Icontact_user_password" value="<?php echo $hangout_Icontact_user_password; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder List ID </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Icontact_list_id" id="hangout_Icontact_list_id" value="<?php echo $hangout_Icontact_list_id; ?>" /></span>
											</div>
										</div>
									</div>
									</div>
									
									<div id="myMenu105" class="gh_accordian_tab"><i class="icon-plus-sign"></i> SendReach  </div>
									<div id="myDiv105" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder List Id </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Sendreach_list_id" id="hangout_Sendreach_list_id" value="<?php echo $hangout_Sendreach_list_id; ?>" /></span>
											</div>
										</div>
										</div>
									</div>
									
									<div id="myMenu107" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Aweber  </div>
									<div id="myDiv107" class="gh_accordian_div">
									<div id="set_up_data" >
									<?php if($hangout_Aweber_api_key==''){?>
									<div class="row-fluid-outer">
										<div class="row-fluid">				
											<div class="span4">
												<strong>Autoresponder Set Up </strong>
											</div>
											<div class="span8">
												<input id="allow_access_event" type="button" value="setup" name="setup_aweber" class="hangout_btn" onclick="window.open('https://auth.aweber.com/1.0/oauth/authorize_app/abc9dca2 ');" >
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Auth Code </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_auth_code" id="hangout_Aweber_auth_code" value="<?php echo $hangout_Aweber_auth_code; ?>" />							
												<input id="set_connection" type="button" value="Create Connection" class="hangout_btn">
											</div>
										</div>
									</div>
									<?php }else { ?>
									<div class="row-fluid-outer"> 
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Access Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_api_key" id="hangout_Aweber_api_key" value="<?php echo $hangout_Aweber_api_key; ?>" /></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										 <div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Consumer Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_consumer_Key" id="hangout_Aweber_consumer_Key" value="<?php echo $hangout_Aweber_consumer_Key; ?>" /></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Consumer Secret </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_consumer_Secret" value="<?php echo $hangout_Aweber_consumer_Secret; ?>" ></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Access Secret Key </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_access_Secret" id="hangout_Aweber_access_Secret" value="<?php echo $hangout_Aweber_access_Secret; ?>" /></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Account Id </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_Aweber_account_id" id="hangout_Aweber_account_id" value="<?php echo $hangout_Aweber_account_id; ?>" /></span>
											</div>
										</div>
										</div>
										<div class="row-fluid-outer">
										<div class="row-fluid">
										<div class="span4">
												<strong>Autoresponder List  </strong>
											</div>

											<div class="span8">
											<select name="hangout_Aweber_list_id" id="hangout_Aweber_list_id">
												<option  class="longinput"  value="<?php echo $hangout_Aweber_list_id.'%'.$hangout_Aweber_list_name; ?>" ><?php echo $hangout_Aweber_list_name; ?></option>
											</select>

											<input  type="submit" value="Refresh List" name="refresh_list" class="hangout_btn" onclick="window.open('https://auth.aweber.com/1.0/oauth/authorize_app/abc9dca2 ');" >

											</div>
										</div>
									</div> 
									<?php } ?>
									</div>
									</div>
									
									
									<div id="myMenu108" class="gh_accordian_tab"><i class="icon-plus-sign"></i> Klick-Tipp  </div>
									<div id="myDiv108" class="gh_accordian_div">
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Klick-Tipp Username </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" id="klicktip_username" name="klicktip_username" value="<?php echo $klicktip_username; ?>">
											</div>
										</div>
										</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Klick-Tipp Password  </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" id="klicktip_password" name="klicktip_password" value="<?php echo $klicktip_password; ?>" />                            
											</div>
										</div>
										</div>
									</div>
									
									
									<div    style="display:none;" >
										<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder Name Field Name </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_amber_name_field" id="hangout_amber_name_field" value="<?php echo $aweber_name; ?>" /></span>
											</div>
										</div>
									</div>
									<div class="row-fluid-outer">
										<div class="row-fluid">		
											<div class="span4">
												<strong>Autoresponder Email Field Name </strong>
											</div>
											<div class="span8">
												<input type="text" class="longinput" name="hangout_amber_name_email" id="hangout_amber_name_email" value="<?php echo $aweber_email; ?>" /></span>
											</div>
										</div>
									</div>

									<div class="row-fluid-outer">
										<div class="row-fluid">
											<div class="span4">
												<strong>Autoresponder HTML code </strong>
											</div>
											<div class="span8">
												<textarea name="hangout_amber_from" cols="80" rows="10"><?php echo $aweber; ?></textarea></span>
											</div>
										</div>
									</div>
									</div>
								<?php } ?>	
								</div>
                       
								<div class="actionBar">
									<button type="submit"  name="woar_submit" class="hangout_btn"><i class="icon-save"></i> Save Settings</button>               
								</div>
							</form>			
					</div>
                        
              
                <!-- End Hangouts Panel -->                
                <!-- Start Email Settings Panel -->
                <div id="email_settings_panel" class="gh_tabs_div">	

					<div class="cron_back">					
                		<form action="" method="post">
						Autoresponders : 
						<?php 
						if($yes<=0){
						?>
						<input type="checkbox" name="need_mailchimp" value="1" <?php echo get_option('need_mailchimp')=='1'?'checked':''; ?> /> Mailchimp
						<input type="checkbox" name="need_infusionsoft" value="1" <?php echo get_option('need_infusionsoft')=='1'?'checked':''; ?> /> InfusionSoft
						<input type="checkbox" name="need_getresponse" value="1" <?php echo get_option('need_getresponse')=='1'?'checked':''; ?> /> GetResponse
						<?php
						}
						else{
						?>
						<input type="checkbox" name="need_mailchimp" value="1" <?php echo get_option('need_mailchimp')=='1'?'checked':''; ?> /> Mailchimp
						<input type="checkbox" name="need_infusionsoft" value="1" <?php echo get_option('need_infusionsoft')=='1'?'checked':''; ?> /> InfusionSoft
						<input type="checkbox" name="need_getresponse" value="1" <?php echo get_option('need_getresponse')=='1'?'checked':''; ?> /> GetResponse
						<input type="checkbox" name="need_aweber" value="1" <?php echo get_option('need_aweber')=='1'?'checked':''; ?> /> Aweber						
						<input type="checkbox" name="need_sendreach" value="1" <?php echo get_option('need_sendreach')=='1'?'checked':''; ?> /> Sendreach
						<input type="checkbox" name="need_imnicamail" value="1" <?php echo get_option('need_imnicamail')=='1'?'checked':''; ?> /> ImnicaMail						
						<input type="checkbox" name="need_icontact" value="1" <?php echo get_option('need_icontact')=='1'?'checked':''; ?> /> Icontact						
						<input type="checkbox" name="need_klicktipp" value="1" <?php echo get_option('need_klicktipp')=='1'?'checked':''; ?> /> Klick-Tipp
						<?php 
						}
						?>
						
						<button class="hangout_btn" type="submit" name="need_autoresponder_submit">Save</button>
						</form>
                	</div>
						
                	<div class="cron_back">					
                		Last data transfer : <?php 
						$last_updated_date = trim(get_option('woar_last_export'));
						if($last_updated_date == '')
							echo "Not transferred any data.";
						else
						{	
							/* get gmt offset */
							$gmt_offset	=	get_option('gmt_offset');
							if($gmt_offset!=''){
								$gmt_offset = get_option('gmt_offset');
								$explode_time = explode('.',$gmt_offset);
								$matched = strpos($explode_time[0],"-");

								if(trim($matched)===''){
									$min_sign = '+';
								}
								else{
									$min_sign = '-';
								}

								if(!empty($explode_time[1]))
								{
									if($explode_time[1] == '5')
									{
										$min = '30';
									}
									elseif($explode_time[1] == '75')
									{
										$min = '45';
									}
									else
									{
										$min = '0';
									}
								}
								else
								{
									$min = '0';
								}
								
								echo date("Y-m-d H:i:s",strtotime($explode_time[0]." hours ".$min_sign.$min." min",$last_updated_date));

								
							}	
							else
								echo date("Y-m-d H:i:s",$last_updated_date); 
						}		
						?>				
                	</div>					
                	<div class="cron_back" class="extcron">
					You can to trigger the plugin via an external cron job.
					<br /><br />
					 wget -q <?php echo site_url();?>/wp-cron.php -o /dev/null<br /><br />
					 (e.g. enter "*/5" to minute field) May to define( 'DISABLE_WP_CRON', true ); in your wp-config.php file.<br />
					</div>
					<div class="cron_back">					
                		<form action="" method="post">
						Wordpress Cron : <input type="checkbox" name="woar_wordpress_cron" value="1" <?php echo get_option('woar_wordpress_cron')=='1'?'checked':''; ?> />
						<button class="hangout_btn" type="submit" name="woar_wordpress_cron_submit">Save</button>
						</form>
                	</div>
					<div class="cron_back">
					To set ontime Wordpress Cron Schedule (triggers within 5 minutes) <a target="_blank" href="<?php echo site_url();?>/wp-cron.php">Click Here</a>
					</div>
					<div class="cron_back">
					Reset Sync Time <a href="admin.php?page=woar&reset_sync=1">Click Here</a>
					</div>		
				</div>
                <!-- End Email Settings Panel -->
                </div>               
				</div>
    		</div>
			<?php } ?>    
			</div>    
			</div>    <!-- End Container --> 
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('#woar_autoresponder').change(function(){
				if($('#woar_autoresponder').val() == "Default")
				{
					$("#hangout_autoresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "Mailchimp")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").hide();
					$("#Mailchimp").show();
					$("#Icontact").hide();
					$("#klick-tipp").hide();
					$("#GetResponce").hide();
					$("#Sendreach").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "ImnicaMail")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").show();
					$("#Mailchimp").hide();
					$("#Icontact").hide();
					$("#klick-tipp").hide();
					$("#GetResponce").hide();
					$("#Sendreach").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "Icontact")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").hide();
					$("#Icontact").show();
					$("#Mailchimp").hide();
					$("#klick-tipp").hide();
					$("#GetResponce").hide();
					$("#Sendreach").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "GetResponce")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").hide();
					$("#GetResponce").show();
					$("#Mailchimp").hide();
					$("#Icontact").hide();
					$("#klick-tipp").hide();
					$("#Sendreach").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "Aweber")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").hide();
					$("#Aweber").show();
					$("#GetResponce").hide();
					$("#Mailchimp").hide();
					$("#Icontact").hide();
					$("#Sendreach").hide();
					$("#klick-tipp").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}
				else if($('#woar_autoresponder').val() == "Sendreach")
				{ 
					$("#hangout_autoresponder").show();
					$("#Sendreach").show();
					$("#ImnicaMail").hide();
					$("#Icontact").hide();
					$("#klick-tipp").hide();
					$("#Mailchimp").hide();
					$("#GetResponce").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").hide();
				}	
				else if($('#woar_autoresponder').val() == "InfusionSoft")
				{ 
					$("#hangout_autoresponder").show();
					$("#InfusionSoft").show();
					$("#Sendreach").hide();
					$("#ImnicaMail").hide();
					$("#Icontact").hide();
					$("#klick-tipp").hide();
					$("#Mailchimp").hide();
					$("#GetResponce").hide();
					$("#Aweber").hide();
					$("#hangout_othersresponder").hide();
				}	
				else if($('#woar_autoresponder').val() == "Klick-Tipp")
				{ 
					$("#hangout_autoresponder").show();
					$("#ImnicaMail").hide();
					$("#Icontact").hide();
					$("#klick-tipp").show();
					$("#Mailchimp").hide();
					$("#GetResponce").hide();
					$("#Sendreach").hide();
					$("#Aweber").hide();
					$("#InfusionSoft").hide();
					$("#hangout_othersresponder").show();
				}
				
					
		});
	});			
				
</script>			
</body>
</html>
