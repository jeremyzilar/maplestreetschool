<?php
// Adds the page name as a hash AND class to the end of every page URL
// http://wordpress.stackexchange.com/questions/24073/add-slug-of-children-to-li-using-wp-list-pages
// class Walker_Child_Classes extends Walker_page {
//   function start_el(&$output, $page, $depth, $args, $current_page) {
//     if ( $depth )
//       $indent = str_repeat("\t", $depth);
//     else
//       $indent = '';
// 
//     extract($args, EXTR_SKIP);
//     
//     $output .= $indent . '<li class="' . $page->post_name . '"><a href="#' .  $page->post_name . '" title="' . esc_attr( wp_strip_all_tags( apply_filters( 'the_title', $page->post_title, $page->ID ) ) ) . '">' . $link_before . apply_filters( 'the_title', $page->post_title, $page->ID ) . $link_after . '</a>';
//   }
// }
// 
// 
// function get_top_parent_page_id() {
//   global $post;
//   // Check if page is a child page (any level)
//   if ($post->post_parent) {
//     $ancestors=get_post_ancestors($post->ID);
//     $root=count($ancestors)-1;
//     $parent = $ancestors[$root];
//     //  Grab the ID of top-level page from the tree
//     return $parent;
//   } else {
//     // Page is the top level, so use  it's own id
//     return $post->ID;
//   }
// }

?>