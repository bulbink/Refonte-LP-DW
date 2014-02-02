<?php
class Brand extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'brand_widget', // Base ID
			'Brand', // Name
			array( 'description' => __( 'Brand Widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );
		$title = $instance['title'];
		$link = $instance['link'];
		$image = $instance['image'];

		//echo $before_widget;
		echo "<li>";
		if ( ! empty( $link ) )
			echo '<a href="'.$link.'">';
		echo '<img src="'.$image.'" title="'.$title.'" alt="" />';
		if ( ! empty( $link ) )
			echo '</a>';
		echo "</li>";
		//echo $after_widget;
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link'] = strip_tags( $new_instance['link'] );
		$instance['image'] = strip_tags( $new_instance['image'] );
		return $instance;
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$link    = isset( $instance['link'] ) ? esc_attr( $instance['link'] ) : ''; 
		$image    = isset( $instance['image'] ) ? esc_attr( $instance['image'] ) : ''; 
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','qode'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Link:','qode' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'Image:','qode' ); ?></label> 
		<input class="widefat brand_image" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
		</p>
		<?php 
	}

} 
add_action( 'widgets_init', create_function( '', 'register_widget( "Brand" );' ) );
?>