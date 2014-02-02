<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

$sidebar = $qode_options_flat['category_blog_sidebar'];

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_flat['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_flat['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_flat['title_image'];
}

$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_flat['title_height'];
}

if(isset($qode_options_flat['blog_page_range']) && $qode_options_flat['blog_page_range'] != ""){
	$blog_page_range = $qode_options_flat['blog_page_range'];
} else{
	$blog_page_range = $wp_query->max_num_pages;
}

if(get_post_meta($id, "qode_content-animation", true) != ""){
 $content_animation = get_post_meta($id, "qode_content-animation", true);
}else{
	if(isset($qode_options_flat['content_animation'])){
		$content_animation = $qode_options_flat['content_animation'];
	}else{
		$content_animation = 'yes';
	}
}

?>
	<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
			<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>	

				<?php
				
					if (is_tag()):
					$title = single_term_title("", false)." Tag";
					 
					elseif (is_date()):
					$title = get_the_time('F Y');
					 
					elseif (is_author()):
					$title = "Author: ".get_the_author();
					 
					else:
					$title = _e('Archive','qode');
					
					endif;
				?>
				
				<div class="container">
					<div class="container_inner clearfix">
				
						<h1><?php echo $title; ?></h1>
				
					</div>
				</div>
				
	</div>
	
	<?php if($qode_options_flat['show_back_button'] == "yes") { ?>
		<a id='back_to_top' href='#'>
			<span class='back_to_top_inner'>
				<span>&nbsp;</span>
			</span>
		</a>
	<?php } ?>
	
	<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
	?>
	
		<div class="container <?php if($content_animation == 'yes'){ echo 'animation_content'; }  ?>">
		<div class="container_inner clearfix">
				<?php if(($sidebar == "default")||($sidebar == "")) : ?>
				<?php switch ($qode_options_flat['blog_style']) {
					case 1: ?>
							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<?php 
									if(!get_post_format()) {
										get_template_part('format_blog', 'standard');
									} else {
										get_template_part('format_blog', get_post_format());
									}
								?>
								<?php endwhile; ?>
								<?php if($qode_options_flat['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
								<?php endif; ?>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
							</div>
					 <?php	break;
					case 2: ?>
						<div class="blog_holder_v2">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<?php 
									if(!get_post_format()) {
										get_template_part('format_blog_full', 'standard');
									} else {
										get_template_part('format_blog_full', get_post_format());
									}
								?>
							
							<?php endwhile; ?>
							<?php if($qode_options_flat['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
							<?php endif; ?>
							<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
							<?php endif; ?>
						</div>
					<?php	break;
					case 3: ?>
						<div class="blog_holder_v3">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<?php 
									if(!get_post_format()) {
										get_template_part('format_blog_box', 'standard');
									} else {
										get_template_part('format_blog_box', get_post_format());
									}
								?>
							<?php endwhile; ?>
							<?php if($qode_options_flat['pagination'] != "0") : ?>
								<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
							<?php endif; ?>
							<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
							<?php endif; ?>
						</div>
						<?php	break;
					
						
				} ?>
			<?php elseif(($sidebar == "1" || $sidebar == "2") && $qode_options_flat['blog_style'] != "3"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
						<div class="column_inner">
							<?php switch ($qode_options_flat['blog_style']) {
							case 1: ?>
								<div class="blog_holder">
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<?php 
												if(!get_post_format()) {
													get_template_part('format_blog', 'standard');
												} else {
													get_template_part('format_blog', get_post_format());
												}
											?>
									<?php endwhile; ?>
									<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
									<?php endif; ?>
									<?php if($qode_options_flat['pagination'] != "0") : ?>
										<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
									<?php endif; ?>
								</div>
							<?php	break;
							case 2: ?>
									<div class="blog_holder_v2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<?php 
												if(!get_post_format()) {
													get_template_part('format_blog_full', 'standard');
												} else {
													get_template_part('format_blog_full', get_post_format());
												}
											?>
										
										<?php endwhile; ?>
										<?php if($qode_options_flat['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
										<?php endif; ?>
									</div>
								<?php	break;
							case 3: ?>
							<div class="blog_holder_v3">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<?php 
										if(!get_post_format()) {
											get_template_part('format_blog_box', 'standard');
										} else {
											get_template_part('format_blog_box', get_post_format());
										}
									?>
								<?php endwhile; ?>
								<?php if($qode_options_flat['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
								<?php endif; ?>
								<?php else: //If no posts are present ?>
										<div class="entry">                        
												<p><?php _e('No posts were found.', 'qode'); ?></p>    
										</div>
								<?php endif; ?>
							</div>
								<?php	break;
							
						}
						
						?>		
						</div>
					</div>
					<div class="column2">
					<?php get_sidebar(); ?>	
					</div>
				</div>
		<?php elseif(($sidebar == "3" || $sidebar == "4") && $qode_options_flat['blog_style'] != "3"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> background_color_sidebar grid2 clearfix">
					<div class="column1">
					<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
								<?php switch ($qode_options_flat['blog_style']) {
								case 1: ?>
									<div class="blog_holder">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
												<?php 
													if(!get_post_format()) {
														get_template_part('format_blog', 'standard');
													} else {
														get_template_part('format_blog', get_post_format());
													}
												?>
										<?php endwhile; ?>
										<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
										<?php endif; ?>
										<?php if($qode_options_flat['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
									</div>
								 <?php	break;
								case 2: ?>
									<div class="blog_holder_v2">
										<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
											<?php 
												if(!get_post_format()) {
													get_template_part('format_blog_full', 'standard');
												} else {
													get_template_part('format_blog_full', get_post_format());
												}
											?>
										
										<?php endwhile; ?>
										<?php if($qode_options_flat['pagination'] != "0") : ?>
											<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
										<?php endif; ?>
										<?php else: //If no posts are present ?>
												<div class="entry">                        
														<p><?php _e('No posts were found.', 'qode'); ?></p>    
												</div>
										<?php endif; ?>
									</div>
								<?php	break;
								case 3: ?>
								<div class="blog_holder_v3">
									<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
										<?php 
											if(!get_post_format()) {
												get_template_part('format_blog_box', 'standard');
											} else {
												get_template_part('format_blog_box', get_post_format());
											}
										?>
									<?php endwhile; ?>
									<?php if($qode_options_flat['pagination'] != "0") : ?>
										<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
									<?php endif; ?>
									<?php else: //If no posts are present ?>
											<div class="entry">                        
													<p><?php _e('No posts were found.', 'qode'); ?></p>    
											</div>
									<?php endif; ?>
								</div>
								<?php	break;
				
								
						}
						
						?>		
						</div>
					</div>
				</div>
			<?php elseif(($sidebar == "1" || $sidebar == "2" || $sidebar == "3" || $sidebar == "4") &&  $qode_options_flat['blog_style'] == "3"): ?>
				<div class="blog_holder_v3">
					<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
						<?php 
							if(!get_post_format()) {
								get_template_part('format_blog_box', 'standard');
							} else {
								get_template_part('format_blog_box', get_post_format());
							}
						?>
					<?php endwhile; ?>
					<?php if($qode_options_flat['pagination'] != "0") : ?>
						<?php pagination($wp_query->max_num_pages, $blog_page_range, $paged); ?>
					<?php endif; ?>
					<?php else: //If no posts are present ?>
							<div class="entry">                        
									<p><?php _e('No posts were found.', 'qode'); ?></p>    
							</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	
<?php get_footer(); ?>