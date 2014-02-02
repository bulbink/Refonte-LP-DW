<?php 
/*
Template Name: Blog Standard
*/ 
?>
<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }
$sidebar = get_post_meta($id, "qode_show-sidebar", true);
query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_flat['responsive_title_image'];
}

$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];
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
			
	<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
		<div class="title <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
			<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
			<?php if(!get_post_meta($id, "qode_show-page-title-text", true)) { ?>
				<div class="container">
					<div class="container_inner clearfix">
						<h1><?php echo get_the_title($id); ?></h1>
						<?php if(get_post_meta($id, "qode_page-subtitle", true)) { ?><span class="subtitle"> <?php echo get_post_meta($id, "qode_page-subtitle", true) ?></span><?php } ?>
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
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
	?>
	<div class="container <?php if($content_animation == 'yes'){ echo 'animation_content'; }  ?>">
		<div class="container_inner clearfix">
			<?php if(($sidebar == "default")||($sidebar == "")) : ?>
					<div class="blog_holder">
					<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('class-name'); ?>>
						<?php 
							if(!get_post_format()) {
								get_template_part('format_blog', 'standard');
							} else {
								get_template_part('format_blog', get_post_format());
							}
						?>
					</div>
					<?php endwhile; ?>
					<?php else: //If no posts are present ?>
						<div class="entry">                        
								<p><?php _e('No posts were found.', 'qode'); ?></p>    
						</div>
					<?php endif; ?>
					<?php if($qode_options_flat['pagination'] != "0") : ?>
						<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
					<?php endif; ?>
				</div>
			<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
				<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> clearfix grid2 background_color_sidebar">
					<div class="column1">
						<div class="column_inner">
							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<div id="post-<?php the_ID(); ?>" <?php post_class('class-name'); ?>>
									<?php 
										if(!get_post_format()) {
											get_template_part('format_blog', 'standard');
										} else {
											get_template_part('format_blog', get_post_format());
										}
									?>
								</div>
								<?php endwhile; ?>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
								<?php if($qode_options_flat['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="column2">
						<?php get_sidebar(); ?>	
					</div>
				</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> grid2 clearfix background_color_sidebar">
					<div class="column1">
						<?php get_sidebar(); ?>	
					</div>
					<div class="column2">
						<div class="column_inner">
							<div class="blog_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
									<div id="post-<?php the_ID(); ?>" <?php post_class('class-name'); ?>>
									<?php 
										if(!get_post_format()) {
											get_template_part('format_blog', 'standard');
										} else {
											get_template_part('format_blog', get_post_format());
										}
									?>
								</div>
								<?php endwhile; ?>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
								<?php if($qode_options_flat['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages, $wp_query->max_num_pages, $paged); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
		</div>
	</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>