<?php

class menu_walker extends Walker_Nav_Menu {
  var $db_fields = array( 'parent' => 'parent_id', 'id' => 'object_id' );  

  function start_lvl(&$output, $depth=0, $args=array()) {  
    $output .= "\n<ul>\n";  
  }  
  function end_lvl(&$output, $depth=0, $args=array()) {  
    $output .= "</ul>\n";  
  }
  function start_el(&$output, $item, $depth=0, $args=array()) {
    // $output .= "<li>".esc_attr($post->label);
    
    $output .= '<li class="' . $post->post_name . '"><a href="#' .  $post->post_name . '" title="' . esc_attr( wp_strip_all_tags( apply_filters( 'the_title', $post->post_title, $post->ID ) ) ) . '">' . $link_before . apply_filters( 'the_title', $post->post_title, $post->ID ) . $link_after . '</a>';
  }
  
  function end_el(&$output, $item, $depth=0, $args=array()) {  
    $output .= "</li>\n";  
  }
}


class Nfr_Menu_Walker extends Walker_Nav_Menu{


/**
SOURCE
http://wordpress.stackexchange.com/questions/26934/add-caret-to-menu-items-with-sub-menus-in-wordpress-theme

* Traverse elements to create list from elements.
*
* Display one element if the element doesn't have any children otherwise,
* display the element and its children. Will only traverse up to the max
* depth and no ignore elements under that depth. It is possible to set the
* max depth to include all depths, see walk() method.
*
* This method shouldn't be called directly, use the walk() method instead.
*
* @since 2.5.0
*
* @param object $element Data object
* @param array $children_elements List of elements to continue traversing.
* @param int $max_depth Max depth to traverse.
* @param int $depth Depth of current element.
* @param array $args
* @param string $output Passed by reference. Used to append additional content.
* @return null Null on failure with no changes to parameters.
*/
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

		//Adds the 'parent' class to the current item if it has children               
		if( ! empty( $children_elements[$element->$id_field] ) ) {
			array_push($element->classes,'dropdown-menu');
			$element->title .= ' <b class="caret"></b>';
		}

		$cb_args = array_merge( array(&$output, $element, $depth), $args);

		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
       		$newlevel = true;
       		//start the child delimiter
       		$cb_args = array_merge( array(&$output, $depth), $args);
       		// call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}
		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
	}
	
	function start_lvl(&$output, $depth) {
	    $indent = str_repeat("\t", $depth);
	    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	  }
}


?>