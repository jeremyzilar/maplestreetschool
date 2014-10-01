<?php 
function get_families(){
	$student_args = array(
	  'post_type' => 'student',
	  'post_status' => 'publish',
	  'posts_per_page' => -1
	);
	$student_query = null;
	$student_query = new WP_Query($student_args);
	$families = array();

	$n=0;
	// Loop through all 'students'
	if( $student_query->have_posts() ) {
	  while ($student_query->have_posts()) : $student_query->the_post();
	  	$student_id = get_the_ID();
	  	$families[$n]['child_name'] = get_the_title();

	  	$families[$n]['image'] = get_the_post_thumbnail( $student_id, 'large' );
	  	$families[$n]['classroom'] = get_post_meta( $student_id, 'classroom', true);
	  	$families[$n]['birthday'] = get_post_meta( $student_id, 'birthday', true);
	  	$birthday = new DateTime(get_post_meta( $student_id, 'birthday', true));
			$interval = $birthday->diff(new DateTime);
			$years = $interval->y;
			$mon = $interval->m;
			$day = $interval->d;
			$families[$n]['age'] =  $years . ' years, ' . $mon . ' months, ' . $day . ' days';
			$families[$n]['days'] = implode(', ', get_post_meta( $student_id, 'days', true));
			$families[$n]['day_type'] = get_post_meta( $student_id, 'day_type', true);
			// $families[$n]['days'] = get_post_meta( $student_id, 'days', true);

	  	$parents_data = get_user_by_meta_value($student_id);

	  	$i=0;
			$parent = array();
			foreach($parents_data as $user) {
				$meta = get_user_meta($user->ID);
				$first_name = esc_html( $meta['first_name']['0'] );
				$last_name = esc_html( $meta['last_name']['0'] );
				$user_email = '<a href="mailto:'.esc_html( $user->user_email ).'">'.esc_html( $user->user_email ).'</a> /';
				$tel = (!empty($meta['tel']['0']) ? $meta['tel']['0'] : '');
				$wktel = (!empty($meta['wktel']['0']) ? $meta['wktel']['0'] : '');
				$street_address = (!empty($meta['street_address']['0']) ? $meta['street_address']['0'] : '');
				$locality = (!empty($meta['locality']['0']) ? $meta['locality']['0'] : '');
				$region = (!empty($meta['region']['0']) ? $meta['region']['0'] : '');
				$postal_code = (!empty($meta['postal_code']['0']) ? $meta['postal_code']['0'] : '');
				$committee = (!empty($meta['committee']['0']) ? $meta['committee']['0'] : '');
				$partner = (!empty($meta['partner']['0']) ? $meta['partner']['0'] : '');
				$class = (!empty($meta['class']['0']) ? '<h6>' . $meta['class']['0']. '</h6>': '');
				$days = (!empty($meta['days']['0']) ? $meta['days']['0'] : '');
				
				$parent[$i]['firstname'] = $first_name;
				$parent[$i]['lastname'] = $last_name;
				$parent[$i]['user_email'] = $user_email;
				$parent[$i]['tel'] = $tel;
				$parent[$i]['wktel'] = $wktel;
				$parent[$i]['street_address'] = $street_address;
				$parent[$i]['locality'] = $locality;
				$parent[$i]['region'] = $region;
				$parent[$i]['postal_code'] = $postal_code;
				$parent[$i]['committee'] = $committee;
			  $i++;
			}
			$families[$n]['parents'] = $parent;
			$n++;
	  endwhile;
	  return $families;
	}
	wp_reset_query();  // Restore global post data stomped by the_post().
}

function show_family_cards(){
	$families = get_families();
	$i = 0;
	foreach ($families as $family) {
		// print_r($family);
		$child_name = $family['child_name'];
		$image = $family['image'];
		$classroom = $family['classroom'];
		$birthday = $family['birthday'];
		$age = $family['age'];
		$days = $family['days'];
		$day_type = $family['day_type'];
		echo <<< EOF
		<div class="row family">
			<div class="span3">
				$image
			</div>
			<div class="span9">
				<h6>$classroom</h6>
				<h3>$child_name <small title="$birthday">$age</small></h3>
				<p class="days">$day_type / $days</p>
EOF;
		
		foreach ($family['parents'] as $parent) {
			// print_r($parent);
			$firstname = $parent['firstname'];
			$lastname = $parent['lastname'];
			$user_email = $parent['user_email'];
			$tel = $parent['tel'];
			$wktel = (!empty($parent['wktel']) ? '/ wk: '.$parent['wktel'] : '');
			$street_address = (!empty($parent['street_address']) ? $parent['street_address'] .',' : '');
			$locality = (!empty($parent['locality']) ? $parent['locality'] .',' : '');
			$region = $parent['region'];
			$postal_code = $parent['postal_code'];
			$committee = $parent['committee'];
			echo <<< EOF
			<div class="parent">
				<h5>$firstname $lastname</h5>
				<p>$user_email $tel $wktel</p>
				<p>$street_address $locality $region $postal_code</p>
			</div>
EOF;
		}

		echo <<< EOF
			</div>
		</div>
EOF;
		$i++;
	}
}

function show_family_table(){

	echo <<< EOF
	<table id="roster" class="table">
		<thead>
			<tr>
				<th>Child Name</th>
				<th>Class</th>
				<th>Days</th>
			</tr>			
		</thead>
		<tbody>
EOF;
	
	$families = get_families();
	foreach ($families as $family) {
		$child_name = $family['child_name'];
		$image = $family['image'];
		$classroom = $family['classroom'];
		$birthday = $family['birthday'];
		$age = $family['age'];
		$days = $family['days'];
		$day_type = $family['day_type'];

		foreach ($family['parents'] as $parent) {
			// print_r($parent);
			$firstname = $parent['firstname'];
			$lastname = $parent['lastname'];
			$user_email = $parent['user_email'];
			$tel = $parent['tel'];
			$wktel = (!empty($parent['wktel']) ? '/ wk: '.$parent['wktel'] : '');
			$street_address = (!empty($parent['street_address']) ? $parent['street_address'] .',' : '');
			$locality = (!empty($parent['locality']) ? $parent['locality'] .',' : '');
			$region = $parent['region'];
			$postal_code = $parent['postal_code'];
			$committee = $parent['committee'];
// 			echo <<< EOF
// 			<div class="parent">
// 				<h5>$firstname $lastname</h5>
// 				<p>$user_email $tel $wktel</p>
// 				<p>$street_address $locality $region $postal_code</p>
// 			</div>
// EOF;
		}
		
		echo <<< EOF
		<tr>
			<td>$child_name</td>
			<td>$classroom</td>
			<td>$day_type / $days</td>
		</tr>
EOF;
	}

	echo <<< EOF
		</tbody>
	</table>
EOF;

}


show_family_cards();
show_family_table();

	
?>

