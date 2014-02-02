<?php 
$blog_hide_comments = "";
if (isset($qode_options_flat['blog_hide_comments'])) {
	$blog_hide_comments = $qode_options_flat['blog_hide_comments'];
}

?>
<article class="mix audio">
	<div class="post_content_holder">
		<div class="post_image">
			<audio src="<?php echo get_post_meta(get_the_ID(), "audio_link", true) ?>" controls="controls">
				<?php _e("Your browser don't support audio player","qode"); ?>
			</audio>
		</div>
		<div class="post_text">
			<span class="info"><span class="left"><?php the_time('d M Y'); ?>, <?php _e('in','qode'); ?> <?php the_category(', '); ?></span></span>
			<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			<?php the_excerpt(); ?>
		</div>
	</div>
	<div class="post_info">
		<div class="inner">
			<?php if($blog_hide_comments != "yes"){ ?>
				<div class="left"><a  class="comments" href="<?php comments_link(); ?>"><?php comments_number( __('no comment','qode'), '1 '.__('comment','qode'), '% '.__('comments','qode') ); ?></a></div>
			<?php } ?>
			<div class="right"><?php echo do_shortcode('[social_share]'); ?></div>
		</div>
		<div class="blog_like">
			<?php if( function_exists('qode_like') ) qode_like(); ?>
		</div>
	</div>
</article>