<?php

// Extending User Profiles
// http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields



add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>
	
	<?php $uid = $user->ID; ?>

  <h3>Phone</h3>
	<table class="form-table">
	  <!-- Phone # -->
	  <tr>
			<th><label for="tel">Primary Phone #</label></th>
			<td>
				<input type="text" name="tel" id="tel" value="<?php echo esc_attr( get_the_author_meta( 'tel', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description"> e.g. 718-555-1234</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="wktel">Work Phone #</label></th>
			<td>
				<input type="text" name="wktel" id="wktel" value="<?php echo esc_attr( get_the_author_meta( 'wktel', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description"> e.g. 718-555-1234</span>
			</td>
		</tr>
	</table>
    
  <h3>Mailing Address</h3>
	<table class="form-table">
		
    <!-- Street Address -->
	  <tr>
			<th><label for="street_address">Street Address</label></th>
			<td>
				<input type="text" name="street_address" id="street_address" value="<?php echo esc_attr( get_the_author_meta( 'street_address', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description">Please include apt # 125 Ocean #4A</span>
			</td>
		</tr>
		
		<!-- City -->
	  <tr>
			<th><label for="locality">City</label></th>
			<td>
				<?php 
				$locality = esc_attr( get_the_author_meta( 'locality', $uid ) );
				if (empty($locality)) {
					$locality = 'Brooklyn';
				}
				?>
				<input type="text" name="locality" id="locality" value="<?php echo $locality; ?>" class="regular-text" /><br />
				<span class="description">Brooklyn, most likely</span>
			</td>
		</tr>
		
		<!-- State -->
	  <tr>
			<th><label for="region">State</label></th>
			<td>
        <select id="region" name="region">
		      <?php 
		      	$region = get_the_author_meta('region', $uid );
			    	$regions = get_regions();
		      	foreach (get_regions() as $key => $value): 
	      			if ($key == $region) { ?>
		    				<option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
		    			<?php } else { ?>
		    				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
		    			<?php } ?>
		      	<?php endforeach ?>
        </select>

				<span class="description">Hopefully you live in NY</span>
			</td>
		</tr>
		
		<!-- postal-code -->
	  <tr>
			<th><label for="postal_code">Postal Code</label></th>
			<td>
				<input type="text" name="postal_code" id="postal_code" value="<?php echo esc_attr( get_the_author_meta( 'postal_code', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description">Zip Code</span>
			</td>
		</tr>
	</table>
	

	
	<h3>MSS</h3>
	<table class="form-table">

    <!-- Committees -->
    <tr>
      <th><label for="committee">Work Committee</label></th>
      <td>
        <select id="committee" name="committee">
		      <?php 
	      	$committee = get_the_author_meta('committee', $uid );
	      	print_r($committee);
	      	foreach (get_committees() as $key => $value): 
      			if ($key == $committee) { ?>
	    				<option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
	    			<?php } else { ?>
	    				<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
	    			<?php } ?>
	      	<?php endforeach ?>
        </select>
      </td>
    </tr>

    <!-- Spouse/Partner -->
	  <tr>
			<th><label for="partner">Spouse/Partner</label></th>
			<td>
				<select id="partner" name="partner">
					<option value="">- - - - -</option>
		      <?php 
		      global $blogusers;
	      	$partner = get_the_author_meta('partner', $uid );
	      	foreach ($blogusers as $user): 
	      		$name = $user->display_name;
      			if ($name == $partner) { ?>
	    				<option selected value="<?php echo $name; ?>"><?php echo $name; ?></option>
	    			<?php } else { ?>
	    				<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
	    			<?php } ?>
	      	<?php endforeach ?>
        </select>
				<br />
				<span class="description">partner</span>
			</td>
		</tr>

<?php 
function get_students($key, $uid){
	$meta = get_the_author_meta($key, $uid );
  $student_args = array(
	  'post_type' => 'student',
	  'post_status' => 'publish',
	  'posts_per_page' => -1
	);
	$student_query = null;
	$student_query = new WP_Query($student_args);
	if( $student_query->have_posts() ) {
	  while ($student_query->have_posts()) : $student_query->the_post(); 
	  	$student_id = get_the_ID();
	    if ($student_id == $meta) { ?>
				<option selected value="<?php echo $student_id; ?>"><?php echo get_the_title(); ?></option>
			<?php } else { ?>
				<option value="<?php echo $student_id; ?>"><?php echo get_the_title(); ?></option>
			<?php } 
	  endwhile;
	}
	wp_reset_query();
}
?>
		
		<!-- Child 1 -->
	  <tr>
			<th><label for="child1">Child #1</label></th>
			<td>
				<select id="child1" name="child1">
					<option value="">- - - - -</option>
		      <?php
		      	$key = 'child1';
		      	get_students($key, $uid);
					?>
        </select><br />
				<span class="description">Child</span>
			</td>
		</tr>
		
		<!-- Child 2 -->
	  <tr>
			<th><label for="child2">Child #2</label></th>
			<td>
				<select id="child2" name="child2">
					<option value="">- - - - -</option>
		      <?php
		      	$key = 'child2';
		      	get_students($key, $uid);
					?>
        </select><br />
				<span class="description">Child</span>
			</td>
		</tr>
		
		<!-- Child 3 -->
	  <tr>
			<th><label for="child3">Child #3</label></th>
			<td>
				<select id="child3" name="child3">
					<option value="">- - - - -</option>
		      <?php
		      	$key = 'child3';
		      	get_students($key, $uid);
					?>
        </select><br />
				<span class="description">Child</span>
			</td>
		</tr>
		
		<!-- Child 4 -->
	  <tr>
			<th><label for="child4">Child #4</label></th>
			<td>
				<select id="child4" name="child4">
					<option value="">- - - - -</option>
		      <?php
		      	$key = 'child4';
		      	get_students($key, $uid);
					?>
        </select><br />
				<span class="description">Child</span>
			</td>
		</tr>
		
	</table>

	<table class="form-table">
		<h3>Student Info</h3>

		<!-- Class -->
	  <tr>
			<th><label for="class">Class</label></th>
			<td>
			  <select name="class" id="classroom">
			    <?php 
			    $class = get_the_author_meta('class', $uid );
			    $classes = get_classes();
			    foreach ($classes as $key => $value):
			    	if ($key == $class) { ?>
			    		<option selected value="<?php echo $key; ?>"><?php echo $value; ?></option>
			    	<?php } else { ?>
			    		<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			    	<?php }
			    ?>
		      <?php endforeach ?>
  		  </select>
			</td>
		</tr>


		
	</table>
	
	
	
	<h3>Personal Info</h3>
	<table class="form-table">

    <!-- Twitter -->
		<tr>
			<th><label for="twitter">Twitter</label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your <a href="http://twitter.com/" title="Twitter">Twitter</a> username.</span>
			</td>
		</tr>
		
    <!-- Facebook -->
		<tr>
			<th><label for="facebook">Facebook</label></th>
			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $uid ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your <a href="http://www.facebook.com/">Facebook</a> Profile URL.</span>
			</td>
		</tr>
	</table>
<?php }




add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );



function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_user_meta( $user_id, 'tel', $_POST['tel'] );
	update_user_meta( $user_id, 'wktel', $_POST['wktel'] );
	update_user_meta( $user_id, 'street_address', $_POST['street_address'] );
	update_user_meta( $user_id, 'locality', $_POST['locality'] );
	update_user_meta( $user_id, 'region', $_POST['region'] );
	update_user_meta( $user_id, 'postal_code', $_POST['postal_code'] );
	
	update_user_meta( $user_id, 'committee', $_POST['committee'] );
	update_user_meta( $user_id, 'partner', $_POST['partner'] );
	update_user_meta( $user_id, 'child1', $_POST['child1'] );
	update_user_meta( $user_id, 'child2', $_POST['child2'] );
	update_user_meta( $user_id, 'child3', $_POST['child3'] );
	update_user_meta( $user_id, 'child4', $_POST['child4'] );
	
	update_user_meta( $user_id, 'class', $_POST['class'] );
	update_user_meta( $user_id, 'days', $_POST['days'] );
	update_user_meta( $user_id, 'day_types', $_POST['day_types'] );
	update_user_meta( $user_id, 'birthday', $_POST['birthday'] );
	
	update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
	update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
}


?>