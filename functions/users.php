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




// META Boxes for Student Pages

add_action( 'add_meta_boxes', 'student_info_add' );
function student_info_add() {
	add_meta_box( 'student_info-id', 'Student Info', 'student_info', 'student', 'normal', 'high' );
}

function student_info( $post )
{
	$values = get_post_custom( $post->ID );
	$birthday = isset( $values['birthday'] ) ? esc_attr( $values['birthday'][0] ) : '';
	$days = isset( $values['days'] ) ? unserialize($values['days'][0]) : '';
	$day_type = isset( $values['day_type'] ) ? esc_attr( $values['day_type'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #birthday_box{}
	  #birthday_box label,
	  #birthday_box input,
	  #birthday_box small{}
	  #birthday_box label{
	    padding:0 2px;
	  }
    #birthday{
      width:100%;
    }
    #birthday_box small{
      padding:0 3px;
      color:#999;
    }
	</style>
	<div id="birthday_box">
  	<p>
  		<label for="birthday">Birthday</label><br />
  		<input type="text" name="birthday" id="birthday" value="<?php echo $birthday; ?>" /><br />
  		<small>e.g. 07/23/2009</small>
  	</p>
	</div><!-- #birthday_box -->

	<div id="days_box">
		<label for="days">Days</label><br />
    <ul>
      <?php foreach (get_weekdays() as $key => $value): ?>
        <li><input value="<?php echo $key; ?>" name="days[]" <?php if (is_array($days)) { if (in_array($key, $days)) { ?>checked="checked"<?php } }?> type="checkbox" /> <?php echo $value; ?></li>
      <?php endforeach ?>
    </ul>
	</div><!-- #days_box -->

	<div id="day_type_box">
		<label for="day_type">Day Type</label><br />
  	<select id="day_type" name="day_type">
      <?php 
      print_r($day_type);
    	foreach (get_day_types() as $key => $value): 
  			if ($key == $day_type) { ?>
  				<option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
  			<?php } else { ?>
  				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  			<?php } ?>
    	<?php endforeach ?>
    </select>
	</div><!-- #day_type_box -->

	<?php	
}


add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	// now we can actually save the data
	$allowed = array( 
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);
	
	if( isset( $_POST['birthday'] ) )
		update_post_meta( $post_id, 'birthday', wp_kses( $_POST['birthday'], $allowed ) );

	if( isset( $_POST['days'] ) )
		update_post_meta( $post_id, 'days', wp_kses( $_POST['days'], $allowed ) );

	if( isset( $_POST['day_type'] ) )
		update_post_meta( $post_id, 'day_type', wp_kses( $_POST['day_type'], $allowed ) );
	
}


