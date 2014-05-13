<?php
register_taxonomy('classes',array (
  0 => 'class_blog',
),array( 'hierarchical' => false, 'label' => 'Classes','show_ui' => true,'query_var' => true,'singular_label' => 'Class') );

register_post_type('class_blog', array(	'label' => 'Class Blog','description' => '','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'supports' => array('title','editor','excerpt','custom-fields','revisions','thumbnail','author',),'taxonomies' => array('category', 'classes','post_tag',),'labels' => array (
  'name' => 'Class Blog',
  'singular_name' => 'Post',
  'menu_name' => 'Class Blog',
  'add_new' => 'Add Post',
  'add_new_item' => 'Add New Post',
  'edit' => 'Edit',
  'edit_item' => 'Edit Post',
  'new_item' => 'New Post',
  'view' => 'View Post',
  'view_item' => 'View Post',
  'search_items' => 'Search Class Blog',
  'not_found' => 'No Posts Found',
  'not_found_in_trash' => 'No  Posts Found in Trash',
  'parent' => 'Parent Class Post',
),) );
?>