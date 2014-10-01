<?php

add_action('init', 'cptui_register_my_cpt_student');

function cptui_register_my_cpt_student() {
register_post_type('student', array(
'label' => 'Students',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'page',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'student', 'with_front' => true),
'query_var' => true,
'exclude_from_search' => true,
'supports' => array('title','thumbnail'),
'taxonomies' => array(''),
'labels' => array (
  'name' => 'Students',
  'singular_name' => 'Student',
  'menu_name' => 'Students',
  'add_new' => 'Add Student',
  'add_new_item' => 'Add New Student',
  'edit' => 'Edit',
  'edit_item' => 'Edit Student',
  'new_item' => 'New Student',
  'view' => 'View Student',
  'view_item' => 'View Student',
  'search_items' => 'Search Students',
  'not_found' => 'No Students Found',
  'not_found_in_trash' => 'No Students Found in Trash',
  'parent' => 'Parent Student',
)
) ); }

?>