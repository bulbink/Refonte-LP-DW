<?php 
global $qode_options_flat; 

?>	

<?php get_header(); ?>
			<div class="title" >
				<div class="container">
					<div class="container_inner clearfix">
						<h1><?php if($qode_options_flat['404_title'] != ""): echo $qode_options_flat['404_title']; else: ?> <?php _e('404', 'qode'); ?> <?php endif;?></h1>
						<span class="subtitle"><?php if(isset($qode_options_flat['404_subtitle']) && $qode_options_flat['404_title'] != "") { ?> <?php echo $qode_options_flat['404_subtitle']; ?><?php } else { ?><?php _e('Page not found', 'qode'); ?><?php } ?></span>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="container_inner">
					<div class="page_not_found element_fade_in">
					    <p><img src="http://i.imgur.com/62wcKsm.png"></p>
						<h2><?php if($qode_options_flat['404_text'] != ""): echo $qode_options_flat['404_text']; else: ?> <?php _e('The page you requested does not exist', 'qode'); ?> <?php endif;?></h2>
						<p><a class="button" href="<?php echo home_url(); ?>/"><?php if($qode_options_flat['404_backlabel'] != ""): echo $qode_options_flat['404_backlabel']; else: ?> <?php _e('Back to homepage', 'qode'); ?> <?php endif;?></a></p>
					</div>
				</div>
			</div>
			
<?php get_footer(); ?>	