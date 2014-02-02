<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_flat;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_flat['disable_qode_seo'])) $disable_qode_seo = $qode_options_flat['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<?php
	$responsiveness = "yes";
	if (isset($qode_options_flat['responsiveness'])) $responsiveness = $qode_options_flat['responsiveness'];
	if($responsiveness != "no"){
	?>
	<meta name=viewport content="width=device-width,initial-scale=1,user-scalable=no">
	<?php 
	}else{
	?>
	<meta name=viewport content="width=1200,user-scalable=no">
	<?php } ?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	<?php if ($disable_qode_seo != "yes") { ?>
	<?php if($seo_description) { ?>
	<meta name="description" content="<?php echo $seo_description; ?>" />
	<?php } else if($qode_options_flat['meta_description']){ ?>
	<meta name="description" content="<?php echo $qode_options_flat['meta_description'] ?>" />
	<?php } ?>
	<?php if($seo_keywords) { ?>
	<meta name="keywords" content="<?php echo $seo_keywords; ?>" />
	<?php } else if($qode_options_flat['meta_keywords']){ ?>
	<meta name="keywords" content="<?php echo $qode_options_flat['meta_keywords'] ?>" />
	<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_flat['favicon_image']; ?>" />
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	
	<?php
		$loading_animation = true;
		if (isset($qode_options_flat['loading_animation'])){ if($qode_options_flat['loading_animation'] == "off") { $loading_animation = false; }};
	
		if (isset($qode_options_flat['loading_image'])){ $loading_image = $qode_options_flat['loading_image'];}else( $loading_image =  get_template_directory_uri().'/img/ajax-loader.gif' );
	?>
	<?php if($loading_animation){ ?>
		<div class="ajax_loader"><div class="ajax_loader_1"><div class="ajax_loader_2"><img src="<?php echo $loading_image; ?>" alt="" /></div></div></div>
	<?php } ?>
	<div class="wrapper">
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_flat['google_analytics_code'])){
				if($qode_options_flat['google_analytics_code'] != "") { 
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_flat['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->
	
<?php
	$centered_logo = false;
	if (isset($qode_options_flat['center_logo_image'])){ if($qode_options_flat['center_logo_image'] == "yes") { $centered_logo = true; }};
	
	$color_bar_number = 8;
	if (isset($qode_options_flat['color_bar_number'])){ $color_bar_number = $qode_options_flat['color_bar_number'];};
	
?>

<div class="spectar head spectar<?php echo $color_bar_number; ?> clearfix">
	<?php
		for ($i=1; $i <= $color_bar_number; $i++){
			if(isset($qode_options_flat['color_bar_'.$i.''])){
				$color = $qode_options_flat['color_bar_'.$i.''];
			} else {
				$color = 'transparent';
			}
			echo '<span style="background-color: '.$color.';"></span>';
		}
	?>
</div>
<header class="<?php if($centered_logo){ echo " centered_logo"; } ?>">
	
	
		<div class="container">
			<div class="container_inner">
	
				<div class="header_inner clearfix">
					<?php
						if (isset($qode_options_flat['logo_image_sticky'])){ $logo_image_sticky = $qode_options_flat['logo_image_sticky'];}else( $logo_image_sticky =  get_template_directory_uri().'/img/logo_black.png' );
					?>
					<div class="logo"><a href="<?php echo home_url(); ?>/"><img class="normal" src="<?php echo $qode_options_flat['logo_image']; ?>" alt="Logo"/><img class="sticky" src="<?php echo $logo_image_sticky; ?>" alt="Logo"/></a></div>
					<div class="header_inner_right">
						
						<nav class="main_menu drop_down">
						<?php
							
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type1_walker_nav_menu()
						 ));
						?>
						</nav>
						
						<div class='mobile_menu_button'><span>&nbsp;</span></div>
						
						<?php	
						$display_header_widget = $qode_options_flat['header_widget_area'];
						if($display_header_widget == "yes"){ ?> 
							<div class="header_right_widget">
								<?php dynamic_sidebar('header_right'); ?>
							</div>
						<?php } ?>
					</div>

					<nav class="mobile_menu">
						<?php
							
							wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																	'container'  => '', 
																	'container_class' => '', 
																	'menu_class' => '', 
																	'menu_id' => '',
																	'fallback_cb' => 'top_navigation_fallback',
																	'link_before' => '<span>',
																	'link_after' => '</span>',
																	'walker' => new qode_type2_walker_nav_menu()
						 ));
						?>
					</nav>
				</div>
	
			</div>
		</div>
	
	
</header>
	<div class="content">
		<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$animation = get_post_meta($id, "qode_show-animation", true);
if (!empty($_SESSION['qode_animation']) && $animation == "")
	$animation = $_SESSION['qode_animation'];

?>
			<?php if($qode_options_flat['page_transitions'] == "1" || $qode_options_flat['page_transitions'] == "2" || $qode_options_flat['page_transitions'] == "3" || $qode_options_flat['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_flat['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_flat['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_flat['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_flat['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
				
			