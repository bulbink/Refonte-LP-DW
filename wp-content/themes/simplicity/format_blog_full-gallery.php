<?php 
$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];
}

?>
<article class="gallery element_fade_in">
	<div class="post_info">
		<div class="inner">
			<div class="post_date">
				<span class="date"><?php the_time('d'); ?></span>
				<span class="month"><?php the_time('M'); ?></span>
			</div>
			<div class="blog_like">
				<?php if( function_exists('qode_like') ) qode_like(); ?>
			</div>
		</div>
	</div>
	<div class="post_content_holder">
		<div class="post_image">
			<div class="flexslider">
				<ul class="slides">
					<?php
					$post_content = get_the_content();
					preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
					$array_id = explode(",", $ids[1]);
					
					foreach($array_id as $img_id){ ?>
						<li><a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $img_id, 'full' ); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	
		<div class="post_text">
			<span class="info"><span class="left"><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span><span class="right"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a><?php echo do_shortcode('[social_share]'); ?></span></span>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>