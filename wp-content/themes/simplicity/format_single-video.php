<article class="video">
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
				<div class="post_image_video">
						<?php $_video_type = get_post_meta(get_the_ID(), "video_format_choose", true);?>
						<?php if(get_post_meta(get_the_ID(), "video_height", true) != "") { 
							$video_height = get_post_meta(get_the_ID(), "video_height", true);
						} else {
							$video_height = 600;
						} ?>
						<?php if($_video_type == "youtube") { ?>
							<iframe height="<?php echo $video_height; ?>" src="http://www.youtube.com/embed/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
						<?php } elseif ($_video_type == "vimeo"){ ?>
							<iframe height="<?php echo $video_height; ?>" src="http://player.vimeo.com/video/<?php echo get_post_meta(get_the_ID(), "video_format_link", true);  ?>?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
						<?php } ?>
				</div>
			</div>
		<div class="post_text">
			<div class="inner">
				<span class="info"><span class="left"><?php _e('Posted by','qode'); ?> <span><?php the_author(); ?></span> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span><span class="right"><?php echo do_shortcode('[social_share]'); ?></span></span>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
				<?php if(get_next_posts_link() || has_tag()) { ?>
					<div class="info_single_bottom">
						<?php if(get_next_posts_link()) { ?>
							<span class="left">
								<?php wp_link_pages('before=&after=&pagelink=<span>%</span>'); ?>
							</span>
						<?php } ?>
						<?php if( has_tag()) { ?><span class="right single_tags"><?php the_tags('','',''); ?></span><?php } ?>
					</div>	
				<?php } ?>			
				
			</div>
		</div>
	</div>
</article>