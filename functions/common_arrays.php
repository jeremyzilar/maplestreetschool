<?php

function get_classes(){
  $mssclasses = array();
  $args=array(
    'post_type' => 'classrooms',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );
  $my_query = null;
  $my_query = new WP_Query($args);
  if( $my_query->have_posts() ) {
    global $post;
    while ($my_query->have_posts()) : $my_query->the_post();
    $mssclasses[$post->post_name] = get_the_title();
    endwhile;
  }
  wp_reset_query();  // Restore global post data stomped by the_post().

  return $mssclasses;
}
get_classes();

function get_weekdays(){
  $weekdays = array(
    'monday'=>'Monday',
    'tuesday'=>'Tuesday',
    'wednesday'=>'Wednesday',
    'thursday'=>'Thursday',
    'friday'=>'Friday'
  );
  return $weekdays;
}

function get_day_types(){
  $day_types = array(
    'full'=>'Full',
    'am'=>'AM',
    'pm'=>'PM'
  );
  return $day_types;
}

function get_committees(){
  $committees = array(
    'fundraising'=>'Fundraising',
    'phyical_plant'=>'Phyical Plant',
    'classroom_support'=>'Classroom Support',
    'communications'=>'Communications',
    'stratigic_planning'=>'Stratigic Planning',
    'expansion'=>'Expansion',
    'membership'=>'Membership',
    'finance'=>'Finance'
  );
  return $committees;
}

function get_regions(){
  $regions = array(
    'AL'=>"Alabama",
    'AK'=>"Alaska",  
    'AZ'=>"Arizona",  
    'AR'=>"Arkansas",  
    'CA'=>"California",  
    'CO'=>"Colorado",  
    'CT'=>"Connecticut",  
    'DE'=>"Delaware",  
    'DC'=>"District Of Columbia",  
    'FL'=>"Florida",  
    'GA'=>"Georgia",  
    'HI'=>"Hawaii",  
    'ID'=>"Idaho",  
    'IL'=>"Illinois",  
    'IN'=>"Indiana",  
    'IA'=>"Iowa",  
    'KS'=>"Kansas",  
    'KY'=>"Kentucky",  
    'LA'=>"Louisiana",  
    'ME'=>"Maine",  
    'MD'=>"Maryland",  
    'MA'=>"Massachusetts",  
    'MI'=>"Michigan",  
    'MN'=>"Minnesota",  
    'MS'=>"Mississippi",  
    'MO'=>"Missouri",  
    'MT'=>"Montana",
    'NE'=>"Nebraska",
    'NV'=>"Nevada",
    'NH'=>"New Hampshire",
    'NJ'=>"New Jersey",
    'NM'=>"New Mexico",
    'NY'=>"New York",
    'NC'=>"North Carolina",
    'ND'=>"North Dakota",
    'OH'=>"Ohio",  
    'OK'=>"Oklahoma",  
    'OR'=>"Oregon",  
    'PA'=>"Pennsylvania",  
    'RI'=>"Rhode Island",  
    'SC'=>"South Carolina",  
    'SD'=>"South Dakota",
    'TN'=>"Tennessee",  
    'TX'=>"Texas",  
    'UT'=>"Utah",  
    'VT'=>"Vermont",  
    'VA'=>"Virginia",  
    'WA'=>"Washington",  
    'WV'=>"West Virginia",  
    'WI'=>"Wisconsin",  
    'WY'=>"Wyoming"
  );
  return $regions;
}


?>