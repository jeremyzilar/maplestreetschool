<?php
// Dropdown Menus:
// http://goldenapplesdesign.com/2010/10/05/dropdown-menus-walker_nav_menu/

function check_for_submenu($classes, $item) {
    global $wpdb;
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id) FROM mss_postmeta WHERE meta_key='_menu_item_menu_item_parent' AND meta_value='".$item->ID."'");
    if ($has_children > 0) array_push($classes,'dropdown');
    return $classes;
}
 
add_filter( 'nav_menu_css_class', 'check_for_submenu', 10, 2);



class dropdown_walker extends Walker_Nav_Menu
{
	var $link_counter=0;

	function start_lvl(&$output, $depth) {
		global $link_counter;
		$class = 'dropdown-menu';
		$indent = str_repeat("\t",$depth);
		$output .= "\n$indent<ul class=\"$class\" id=\"sub-".$link_counter."\">\n";
	}

  function start_el(&$output, $item, $depth, $args) {
    global $wp_query;
    global $link_counter;
       $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

       $class_names = $value = '';

       $classes = empty( $item->classes ) ? array() : (array) $item->classes;

       $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
       $class_names = ' class="'. esc_attr( $class_names ) . '"';
	if (in_array('has_children',$classes)) $counter++;

       $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

       $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
       $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
       $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
       $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

	if (strpos($class_names,'dropdown')) {
		$link_counter++;
		$attributes .= ' class="dropdown-toggle" data-toggle="dropdown" id="link-'.$link_counter.'"';
		$caret .= ' <b class="caret"></b>';
	}

  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'>';
  $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
  $item_output .= $description.$args->link_after;
  $item_output .= $caret;
  $item_output .= '</a>';
  $item_output .= $args->after;

  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }
}

# -*- coding: utf-8 -*-
/**
 * Create a nav menu with very basic markup.
 *
 * @author Thomas Scholz http://toscho.de
 * @version 1.0
 */
class Pill_Walker extends Walker_Nav_Menu
{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth, $args )
	{
    // $class_names = $value = '';
    // $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    // $class_names = in_array("current_page_item",$item->classes) ? ' active' : '';
    $class_names = in_array("current_page_item",$item->classes) ? ' active' : '';
		$output     .= '<li class="'.$class_names.'">';
		$attributes  = '';
    
    
		! empty ( $item->attr_title )
			// Avoid redundant titles
			and $item->attr_title !== $item->title
			and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';

		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';

		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>"
						. "$args->link_after$args->after";

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters(
			'walker_nav_menu_start_el'
			,   $item_output
			,   $item
			,   $depth
			,   $args
		);
	}

	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output )
	{
		$output .= '<ul class="sub-menu">';
	}

	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output )
	{
		$output .= '</ul>';
	}

	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el( &$output )
	{
		$output .= '</li>';
	}
}
?>