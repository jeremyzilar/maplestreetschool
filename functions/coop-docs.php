<?php
register_post_type('coop-docs', array(	'label' => 'Co-op Docs','description' => 'The main documents that that the Co-op uses to manage itself.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'page','hierarchical' => true,'has_archive' => true,'query_var' => true,'supports' => array('title','editor','excerpt','trackbacks','custom-fields','comments','revisions','thumbnail','author','page-attributes',),'labels' => array (
  'name' => 'Co-op Docs',
  'singular_name' => 'Co-op Doc',
  'menu_name' => 'Co-op Docs',
  'add_new' => 'Add Co-op Doc',
  'add_new_item' => 'Add New Co-op Doc',
  'edit' => 'Edit',
  'edit_item' => 'Edit Co-op Doc',
  'new_item' => 'New Co-op Doc',
  'view' => 'View Co-op Doc',
  'view_item' => 'View Co-op Doc',
  'search_items' => 'Search Co-op Docs',
  'not_found' => 'No Co-op Docs Found',
  'not_found_in_trash' => 'No Co-op Docs Found in Trash',
  'parent' => 'Parent Co-op Doc',
),) );

?>