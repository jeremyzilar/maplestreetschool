<?php
/**
 * Template Name: Edit Profile Page
 *
 */
 
	/* Get user info. */
	global $current_user, $wp_roles;
	get_currentuserinfo();
 
	/* Load the registration file. */
	require_once( ABSPATH . WPINC . '/registration.php' );
	require_once( ABSPATH . 'wp-admin/includes' . '/template.php' ); // this is only for the selected() function
 
	/* If profile was saved, update profile. */
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user') {
 
		/* Update user password. */
		if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
			if ( $_POST['pass1'] == $_POST['pass2'] )
				wp_update_user( array( 'ID' => $current_user->id, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
			else
				$error = __('The passwords you entered do not match.  Your password was not updated.');
		}
 
		/* Update user information. */

		update_user_meta( $current_user->id, 'first_name', esc_attr( $_POST['first_name'] ) );
		update_user_meta( $current_user->id, 'last_name', esc_attr( $_POST['last_name'] ) );
		if ( !empty( $_POST['nickname'] ) )
			update_user_meta( $current_user->id, 'nickname', esc_attr( $_POST['nickname'] ) );
		update_user_meta( $current_user->id, 'display_name', esc_attr( $_POST['display_name'] ) );
		if ( !empty( $_POST['email'] ) )
			update_user_meta( $current_user->id, 'user_email', esc_attr( $_POST['email'] ) );
		if(strpos($_POST['website'], 'ttp://') || empty( $_POST['website'] ))
			update_user_meta( $current_user->id, 'user_url', esc_attr( $_POST['website'] ) );
		else
			update_user_meta( $current_user->id, 'user_url', 'http://' . esc_attr( $_POST['website'] ) );
		update_user_meta( $current_user->id, 'aim', esc_attr( $_POST['aim'] ) );
		update_user_meta( $current_user->id, 'yim', esc_attr( $_POST['yim'] ) );
		update_user_meta( $current_user->id, 'jabber', esc_attr( $_POST['jabber'] ) );
		update_user_meta( $current_user->id, 'description', esc_attr( $_POST['description'] ) );
		// Extra Profile Information
		update_user_meta( $current_user->id, 'twitter', esc_attr( $_POST['twitter'] ) );	
		update_user_meta( $current_user->id, 'birth', esc_attr( $_POST['birth'] ) );	
		update_user_meta( $current_user->id, 'hobbies', $_POST['hobbies'] );	
		update_user_meta( $current_user->id, 'agree', esc_attr( $_POST['agree'] ) );	
		/* Redirect so the page will show updated info. */
		if ( !$error ) {
			wp_redirect( get_permalink() );
			exit;
		}
	} ?>
 
<?php get_header(); ?>

<section id="register">
	<div class="container">
    <div class="span12">
 
      <!-- EDIT PROFILE STARTS HERE -->
			<?php if ( !is_user_logged_in() ) : ?>
 
 
			<?php else : ?>
 
        <?php include 'functions/user_form.php'; ?>
        <?php //include 'functions/old_user_form.php'; ?>

			<?php endif; ?>
      <!-- REGISTER FORM ENDS HERE -->
    </div> <!-- end span12 -->
	</div><!-- #container -->
</section>

<?php get_footer(); ?>