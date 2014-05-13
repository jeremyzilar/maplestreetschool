<?php
// Change the Admin Menu Labels
// http://wordpress.stackexchange.com/questions/9211/changing-admin-menu-labels

require_once('wp-admin-menu-classes.php');
add_action('admin_menu','my_admin_menu');
function my_admin_menu() {
  swap_admin_menu_sections('Pages','Posts');              // Swap location of Posts Section with Pages Section
  // rename_admin_menu_section('Media','Photos & Video');    // Rename Media Section to "Photos & Video"
  // delete_admin_menu_section('Links');                     // Get rid of Links Section
  // $movie_tags_item_array = get_admin_menu_item_array('Movies','Movie Tags');  // Save off the Movie Tags Menu
  // update_admin_menu_section('Movies',array(               // Rename two Movie Menu Items and Delete the Movie Tags Item
  //   array('rename-item','item'=>'Movies','new_title'=>'List Movies'),
  //   array('rename-item','item'=>'Add New','new_title'=>'Add Movie'),
  //   array('delete-item','item'=>'Movie Tags'),
  // ));
  // copy_admin_menu_item('Movies',array('Actors','Add New')); // Copy the 'Add New' over from Actors
  // renamed_admin_menu_item('Movies','Add New','Add Actor');  // Rename copied Actor 'Add New' to 'Add Actor
  // add_admin_menu_item('Movies',array(                       // (Another way to get a 'Add Actor' Link to a section.)
  //   'title' => 'Alt Add Actor ',
  //   'slug' => 'post-new.php?post_type=actor',
  // ), array(// Add Back the Movie Tags at the end.
  //   'where'=>'end'
  // ));
  // add_admin_menu_item('Movies',$movie_tags_item_array,array(// Add Back the Movie Tags at the end.
  //   'where'=>'end'
  // ));
  // delete_admin_menu_section('Actors');                      // Finally just get rid of the actors section
}


// function change_post_menu_label() {
//   global $menu;
//   global $submenu;
//   $menu[5][0] = 'Contacts';
//   $submenu['edit.php'][5][0] = 'Contacts';
//   $submenu['edit.php'][10][0] = 'Add Contacts';
//   $submenu['edit.php'][15][0] = 'Status'; // Change name for categories
//   $submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
//   echo '';
// }
// 
// function change_post_object_label() {
//   global $wp_post_types;
//   $labels = &$wp_post_types['post']->labels;
//   $labels->name = 'Contacts';
//   $labels->singular_name = 'Contact';
//   $labels->add_new = 'Add Contact';
//   $labels->add_new_item = 'Add Contact';
//   $labels->edit_item = 'Edit Contacts';
//   $labels->new_item = 'Contact';
//   $labels->view_item = 'View Contact';
//   $labels->search_items = 'Search Contacts';
//   $labels->not_found = 'No Contacts found';
//   $labels->not_found_in_trash = 'No Contacts found in Trash';
// }
// add_action( 'init', 'change_post_object_label' );
// add_action( 'admin_menu', 'change_post_menu_label' );
// 
// 
// // CUSTOMIZE ADMIN MENU ORDER
// function custom_menu_order($menu_ord) {
//   if (!$menu_ord) return true;
//   return array(
//     'index.php', // this represents the dashboard link
//     'edit.php', //the posts tab
//     'upload.php', // the media manager
//     'edit.php?post_type=page', //the posts tab
//   );
// }
// add_filter('custom_menu_order', 'custom_menu_order');
// add_filter('menu_order', 'custom_menu_order');

?>