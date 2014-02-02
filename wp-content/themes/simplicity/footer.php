<?php global $qode_options_flat; ?>
				
		</div>
	</div>
		<div id="social_icons_widget">
			<div class="social_icons_widget_inner">
				<div class="social_icons_widget_inner2">
					<?php dynamic_sidebar( 'social_icons' ); ?>
				</div>	
			</div>
		</div>
		<footer>
			
				<?php	
				$display_brands_widget = false;
				if (isset($qode_options_flat['footer_brands_area'])){
					if ($qode_options_flat['footer_brands_area'] == "yes") $display_brands_widget = true;
				}
				if($display_brands_widget): ?> 
					<div class="carousel_slider_holder clearfix">
						<ul class="carousel_slider">
							<?php dynamic_sidebar( 'brands' ); ?>
						</ul>
					</div>
				<?php endif; ?>
				<?php 
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
			
				
				<div class="footer_top_holder">
					<div class="footer_top">
						<div class="container">
							<div class="container_inner">
								<?php
								$footer_widget_area = 1;
								if(isset($qode_options_flat['footer_widget_area'])){ $footer_widget_area = $qode_options_flat['footer_widget_area']; }
								
								if (!empty($_SESSION['qode_footer']))
									$footer_widget_area = $_SESSION['qode_footer'];
								?>
								<?php if($footer_widget_area == 1){ ?>
								<div class="footer_one_column">
									<?php dynamic_sidebar( 'footer_one_column' ); ?>
								</div>
								<?php
								}
								
								if($footer_widget_area == 2){
								?>
								<div class="four_columns clearfix">
									<div class="column1">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_1' ); ?>
										</div>
									</div>
									<div class="column2">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_2' ); ?>
										</div>
									</div>
									<div class="column3">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_3' ); ?>
										</div>
									</div>
									<div class="column4">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_4' ); ?>
										</div>
									</div>
								</div>
								<?php } ?>
								
							</div>
						</div>
					</div>
				</div>
				
				<?php
				$display_footer_text = false;
				if (isset($qode_options_flat['footer_text'])) {
					if ($qode_options_flat['footer_text'] == "yes") $display_footer_text = true;
				}
				if($display_footer_text): ?>
				<div class="footer_bottom_holder">
					<div class="footer_bottom">
						<?php dynamic_sidebar( 'footer_text' ); ?>
					</div>
				</div>
				<?php endif; ?>
		
		</footer>
</div>
<?php
global $qode_toolbar;
if(isset($qode_toolbar)) include("toolbar.php")
?>
	<?php wp_footer(); ?>
</body>
</html>