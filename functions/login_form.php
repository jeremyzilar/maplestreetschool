<?php
// ADD the "Lost My Password" link to the login form
add_action( 'login_form_bottom', 'add_lost_password_link' );
function add_lost_password_link() {
  return '<p class="login-forgot"><a href="./wp-login.php?action=lostpassword">Lost Password?</a></p>';
}

//Changes the Site Admin link to "Dashboard"
add_action( 'register' , 'register_replacement' );
function register_replacement( $link ){
  $link = str_replace('Site Admin' , 'Dashboard' , $link);
  return $link;
}

// Redirects the Register link to custom register page
// add_action('init','register_redirect');
// function register_redirect(){
//  global $pagenow;
//  if( 'wp-login.php' == $pagenow ) {
//   wp_redirect('./register');
//   exit();
//  }
// }



function tml_new_user_registered( $user_id ) {
  wp_set_auth_cookie( $user_id, false, is_ssl() );
  wp_redirect( home_url() );
  exit;
}
add_action( 'tml_new_user_registered', 'tml_new_user_registered' );


// Redirect admins to the dashboard and other users elsewhere
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
function my_login_redirect( $redirect_to, $request, $user ) {
  // Is there a user?
  if ( is_array( $user->roles ) ) {
    // Is it an administrator?
    if ( in_array( 'administrator', $user->roles ) )
      return home_url( '/#' );
    else
      return home_url();
      // return get_permalink( 83 );
  }
}

?>