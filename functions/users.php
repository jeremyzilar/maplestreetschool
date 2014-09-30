<?php


// Get the 'parent' by ID of the 'student' post_type
function get_user_by_meta_value($student_id){
  $args = array(
    'meta_key' => 'child1',
    'meta_value' => $student_id,
    'meta_compare' => '='
  );
  $user = get_users( $args );
  return $user;
}




// Add a column to the User Table
function test_modify_user_table( $column ) {
    $column['children'] = 'Children';
    return $column;
}
add_filter( 'manage_users_columns', 'test_modify_user_table' );

function get_child_name($child_id){
	$child = get_post( $child_id );
	$child_name = (!empty($child) ? $child->post_title : '');
	// $child_name = $child->post_title;
	return $child_name;
}

function test_modify_user_table_row( $val, $column_name, $user_id ) {
    $user = get_userdata( $user_id );
    $meta = get_user_meta($user->ID);
    
    $child1 = (!empty($meta['child1']['0']) ? get_child_name($meta['child1']['0']) . '<br/>' : '');
    $child2 = (!empty($meta['child2']['0']) ? get_child_name($meta['child2']['0']) . '<br/>' : '');
    $child3 = (!empty($meta['child3']['0']) ? get_child_name($meta['child3']['0']) . '<br/>' : '');
    $child4 = (!empty($meta['child4']['0']) ? get_child_name($meta['child4']['0']) . '<br/>' : '');
    $children = <<<EOF
    	$child1
    	$child2
    	$child3
    	$child4
EOF;
    switch ($column_name) {
        case 'children' :
            // return '$children';
            return $children;
            break;
        default:
    }
    return $return;
}
add_filter( 'manage_users_custom_column', 'test_modify_user_table_row', 10, 3 );