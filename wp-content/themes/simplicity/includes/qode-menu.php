<?php

/* Custom WP_NAV_MENU function for top navigation */

if (!class_exists('qode_type1_walker_nav_menu')) {
	class qode_type1_walker_nav_menu extends Walker_Nav_Menu {
		
	// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
			{
					$id_field = $this->db_fields['id'];
					if ( is_object( $args[0] ) ) {
							$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
					}
					return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			
			$indent = str_repeat("\t", $depth);
			if($depth == 0){
				$out_div = '<div class="second"><div class="inner_arrow"></div><div class="inner"><div class="inner2">';
			}elseif($depth == 1){
				$out_div = '<div class="third">';
			}else{
				$out_div = '';
			}
			
			// build html
			$output .= "\n" . $indent . $out_div  .'<ul>' . "\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			
			if($depth == 0){
				$out_div_close = '</div></div></div>';
			}elseif($depth == 1){
				$out_div_close = '</div>';
			}else{
				$out_div_close = '';
			}
			
			$output .= "$indent</ul>". $out_div_close ."\n";
		}

		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			global $qode_options_flat;
			$sub = "";
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth==0 && $args->has_children) : 
				$sub = ' has_sub';
			endif;
			if($depth==1 && $args->has_children) : 
				$sub = 'sub';
			endif;
			
			
			$active = "";
			
			// depth dependent classes
			if ((($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0)) && ($qode_options_flat['page_transitions'] == "0")):
				
					$active = 'active';
				
			endif;
		
			
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
			// build html
			$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub .'">';
			
			$current_a = "";
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
			$current_a .= ' current ';
			endif;
			$attributes .= ' class="'. $current_a . '"';
			
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
			
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		
	}
}


/* Custom WP_NAV_MENU function for mobile navigation */

if (!class_exists('qode_type2_walker_nav_menu')) {
	class qode_type2_walker_nav_menu extends Walker_Nav_Menu {
		
	// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
			{
					$id_field = $this->db_fields['id'];
					if ( is_object( $args[0] ) ) {
							$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
					}
					return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			
			$indent = str_repeat("\t", $depth);
			
			// build html
			$output .= "\n" . $indent  .'<ul class="sub_menu">' . "\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
		
			$output .= "$indent</ul>" ."\n";
		}

		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;
			global $qode_options_flat;
			$sub = "";
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth >=0 && $args->has_children) : 
				$sub = ' has_sub';
			endif;
			
			$active = "";
			
			// depth dependent classes
			if ((($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0)) && ($qode_options_flat['page_transitions'] == "0")):
				
					$active = 'active';
				
			endif;
		
			
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
			// build html
			$output .= $indent . '<li id="mobile_menu_item-'. $item->ID . '" class="' . $class_names . ' ' . $active . $sub .'">';
			
			$current_a = "";
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
			$current_a .= ' current ';
			endif;
			$attributes .= ' class="'. $current_a . '"';
			
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s<span class="mobile_arrow"></span></a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
			
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		
	}
}
