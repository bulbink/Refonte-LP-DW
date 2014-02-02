<?php

if(get_post_meta(get_the_ID(), "qode_show-sidebar", true) != ""){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_flat['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];
	
if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_flat['responsive_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_flat['fixed_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){
 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);
}else{
	$title_image = $qode_options_flat['title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_flat['title_height'];
}

if(isset($qode_options_flat['twitter_via']) && !empty($qode_options_flat['twitter_via'])) {
	$twitter_via = " via " . $qode_options_flat['twitter_via'];
} else {
	$twitter_via = 	"";
}

if(get_post_meta(get_the_ID(), "qode_content-animation", true) != ""){
 $content_animation = get_post_meta(get_the_ID(), "qode_content-animation", true);
}else{
	if(isset($qode_options_flat['content_animation'])){
		$content_animation = $qode_options_flat['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>
					<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
						<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
						<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title-text", true)) { ?>
							<div class="container">
								<div class="container_inner clearfix">
									<h1>
										<?php if(get_post_meta(get_the_ID(), "qode_page-title-text", true)){ ?>
											<?php the_title(); ?>
										<?php } else { ?>
											<?php _e('Blog','qode'); ?>
										<?php } ?>
									</h1>
									<?php if(get_post_meta(get_the_ID(), "qode_page-subtitle", true)) { ?><span class="subtitle"> <?php echo get_post_meta(get_the_ID(), "qode_page-subtitle", true) ?></span><?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
				
				<?php if($qode_options_flat['show_back_button'] == "yes") { ?>
					<a id='back_to_top' href='#'>
						<span class='back_to_top_inner'>
							<span>&nbsp;</span>
						</span>
					</a>
				<?php } ?>
				
				<?php
					$revslider = get_post_meta(get_the_ID(), "qode_revolution-slider", true);
					if (!empty($revslider)){
						echo do_shortcode($revslider);
					}
				?>
				<div class="container <?php if($content_animation == 'yes'){ echo 'animation_content'; }  ?>">
					<div class="container_inner">
				
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="blog_single_holder blog_holder_v2">
						<?php 
							if(!get_post_format()) {
								get_template_part('format_single', 'standard');
							} else {
								get_template_part('format_single', get_post_format());
							}
						?>
						</div>
						<?php
							if($blog_hide_comments != "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div class="blog_single_holder blog_holder_v2">	
											<?php 
												if(!get_post_format()) {
													get_template_part('format_single', 'standard');
												} else {
													get_template_part('format_single', get_post_format());
												}
											?>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div class="blog_single_holder blog_holder_v2">	
											<?php 
												if(!get_post_format()) {
													get_template_part('format_single', 'standard');
												} else {
													get_template_part('format_single', get_post_format());
												}
											?>
											</div>
											<?php
												if($blog_hide_comments != "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	