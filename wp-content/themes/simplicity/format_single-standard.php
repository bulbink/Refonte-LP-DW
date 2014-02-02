<article class="standard">
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
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post_image">
				<div class="inner">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>
				</div>
			</div>
		<?php } ?>
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