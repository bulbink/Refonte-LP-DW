<?php 
$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];
}

?>
<article class="mix link">
	<div class="post_content_holder">
		<div class="post_text">
			<span class="info"><span class="left"><?php the_time('d M Y'); ?>, <?php _e('in','qode'); ?> <?php the_category(', '); ?></span></span>
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
		</div>
		<div class="blog_like">
			<?php if( function_exists('qode_like') ) qode_like(); ?>
		</div>
	</div>
</article>