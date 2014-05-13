<?php
// Template Name: Register with PHP
// http://www.cozmoslabs.com/1012-wordpress-user-registration-template-and-custom-user-profile-fields/

// Get Current User Info if logged in
if (is_user_logged_in()) {
  global $current_user, $wp_roles;
  get_currentuserinfo();
}

if (!is_user_logged_in()) {
  $usr = $new_user;
} else {
  $usr = $current_user->id;
}

// Load registration file.
require_once( ABSPATH . WPINC . '/registration.php' );


if (!is_user_logged_in()) {
  // Check if users can register.
  $registration = get_option( 'users_can_register' );
}

// If user registered, input info.
if (!is_user_logged_in()) {
  if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'adduser' ) {
    $login = 'Not Logged in';
  
    $userdata = array(
  		'user_pass' => $user_pass,
  		'user_login' => esc_attr( $_POST['username'] ),
  		'first_name' => esc_attr( $_POST['first_name'] ),
  		'last_name' => esc_attr( $_POST['last_name'] ),
  		'user_email' => esc_attr( $_POST['user_email'] ),
  		'user_pass' => esc_attr( $_POST['passwd'] ),
  		'user_url' => esc_attr( $_POST['website'] ),
  		'description' => esc_attr( $_POST['description'] ),
  		'role' => get_option( 'default_role' ),
  	);

  	if ( !$userdata['user_login'] ) {
  	  $error = __('Why. The passwords you entered do not match.  Your password was not updated.');
  	} elseif (username_exists($userdata['user_login'])) {
      $error = __('Sorry, that username already exists!');
  	} elseif (!is_email($userdata['user_email'], true)) {
      $error = __('You must enter a valid email address.');
  	} elseif (email_exists($userdata['user_email'])) {
      $error = __('Sorry, that email address is already used!');
  	} else {
  		$new_user = wp_insert_user($userdata);
      $user_pass = $userdata['user_pass'];  // User created password
      
      // $user_pass = wp_generate_password();  // Generate user password
  		wp_new_user_notification($new_user, $user_pass);
  		
      
      update_user_meta($new_user, 'member_type', $_POST['member_type'] );
    	update_user_meta($new_user, 'committee', $_POST['committee'] );
    	update_user_meta($new_user, 'partner', $_POST['partner'] );
    	update_user_meta($new_user, 'child1', $_POST['child1'] );
    	update_user_meta($new_user, 'child2', $_POST['child2'] );
    	update_user_meta($new_user, 'child3', $_POST['child3'] );
    	update_user_meta($new_user, 'child4', $_POST['child4'] );
    	
    	update_user_meta($new_user, 'class', $_POST['class'] );
    	update_user_meta($new_user, 'days', $_POST['days'] );
    	update_user_meta($new_user, 'birthday', $_POST['birthday'] );
    	
  		update_user_meta($new_user, 'display_name', esc_attr( $_POST['display_name']));
  		update_user_meta($new_user, 'tel', esc_attr( $_POST['tel']));
  		update_user_meta($new_user, 'street_address', esc_attr( $_POST['street_address']));
  		update_user_meta($new_user, 'locality', esc_attr( $_POST['locality']));
  		update_user_meta($new_user, 'region', esc_attr( $_POST['region']));
  		update_user_meta($new_user, 'postal_code', esc_attr( $_POST['postal_code']));
      update_user_meta($new_user, 'twitter', esc_attr( $_POST['twitter']));
  		update_user_meta($new_user, 'facebook', esc_attr( $_POST['facebook']));

  	}
  }
	
} else {
  
  if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user') {
    $login = 'Logged in';
    // print_r($current_user);
    
    // Update user password
    // if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
    //  if ( $_POST['pass1'] == $_POST['pass2'] ) {
    //    wp_update_user( array( 'ID' => $usr, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
    //  } else {
    //    $error = __('The passwords you entered do not match.  Your password was not updated.');
    //  }
    // }
	
  	update_user_meta($usr, 'first_name', esc_attr( $_POST['first_name']));
  	update_user_meta($usr, 'last_name', esc_attr( $_POST['last_name']));
  	update_user_meta($usr, 'display_name', esc_attr( $_POST['display_name']));
  	if (!empty( $_POST['email'])){
		  update_user_meta($usr, 'user_email', esc_attr( $_POST['email']));
		}
		// Mailing Address
		update_usermeta($usr, 'tel', esc_attr( $_POST['tel']));
		update_usermeta($usr, 'street_address', esc_attr( $_POST['street_address']));
		update_usermeta($usr, 'locality', esc_attr( $_POST['locality']));
		update_usermeta($usr, 'region', esc_attr( $_POST['region']));
		update_usermeta($usr, 'postal_code', esc_attr( $_POST['postal_code']));
		// Extra Profile Information
		update_user_meta($usr, 'description', esc_attr( $_POST['description']));
		if(strpos($_POST['website'], 'ttp://') || empty( $_POST['website'])){
		  update_user_meta($usr, 'user_url', esc_attr( $_POST['website']));
		} else {
		  update_user_meta($usr, 'user_url', 'http://' . esc_attr( $_POST['website']));
		}
		update_user_meta($usr, 'twitter', esc_attr( $_POST['twitter']));
		update_user_meta($usr, 'facebook', esc_attr( $_POST['facebook']));
	
		/* Redirect so the page will show updated info. */
		if ( !$error ) {
			wp_redirect( get_permalink() );
			exit;
		}
	}
	
} // end IF logged in
?>

<?php get_header(); ?>

<section id="registerBox">
	<div class="container">
    <div class="span8 offset2">
      <!-- <h2><?php echo $login; ?></h2> -->
      
      <?php
        if(defined('DOING_AJAX')){
          // stuff goes here
        }
      ?>
      
      <?php if ( $error ) : ?>
      	<p class="error">
      		<?php echo $error; ?>
      	</p><!-- .error -->
      <?php endif; ?>
      
      <!-- REGISTRATION FORM STARTS HERE -->
      <div class="well">
        <?php include 'functions/user_form.php'; ?>
      </div><!-- .well -->
      
      
      
      <!-- REGISTER FORM ENDS HERE -->
      
      
    </div> <!-- end span12 -->
	</div><!-- #container -->
</section>

<?php get_footer(); ?>