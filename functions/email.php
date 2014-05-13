<?php

// embed the javascript file that makes the AJAX request
wp_enqueue_script( 'checkemail-ajax-request', bloginfo('template_url') . '/js/forms/checkemail.js', array( 'jquery' ) );

// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
wp_localize_script( 'checkemail-ajax-request', 'CheckEmail', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

// if both logged in and not logged in users can send this AJAX request,
// add both of these actions, otherwise add only the appropriate one
add_action( 'wp_ajax_nopriv_checkemail-submit', 'checkemail_submit' );
add_action( 'wp_ajax_checkemail-submit', 'checkemail_submit' );

function checkemail_submit() {
  // get the submitted parameters
  $postID = $_POST['postID'];

  // generate the response
  $response = json_encode( array( 'message' => 'why hello there javascript, Im doing fine thankyou' ) );

  // response output
  header( "Content-Type: application/json" );
  echo $response;

  // IMPORTANT: don't forget to "exit"
  exit;
}


//data connection file
// require "config.php";
// extract($_REQUEST);
// 
// if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
//   $sql = "select * from users where email='$email'";
//   $rsd = mysql_query($sql);
//   $msg = mysql_num_rows($rsd); //returns 0 if email not already exists
// } else {
//   $msg = "invalid";
// }
// 
// echo $msg;
?>