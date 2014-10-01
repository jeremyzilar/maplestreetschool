<?php

function scripts_styles() {
	global $wp_styles;
	$q = 'v302';

	// Le JS

  wp_enqueue_script('timeago', get_template_directory_uri() . '/js/jquery.timeago.js', array( 'jquery' ), $q, true );
  wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', array( 'jquery' ), $q, true );


  wp_enqueue_script('jquery.form', get_template_directory_uri() . '/js/forms/jquery.form.js', array( 'jquery' ), $q, true );
  wp_enqueue_script('jquery.validate', get_template_directory_uri() . '/js/forms/jquery.validate.js', array( 'jquery' ), $q, true );
  wp_enqueue_script('additional-methods', get_template_directory_uri() . '/js/forms/additional-methods.js', array( 'jquery' ), $q, true );
  

  wp_enqueue_script('checkemail', get_template_directory_uri() . '/js/forms/checkemail.js', array( 'jquery' ), $q, true );
  wp_enqueue_script('submit', get_template_directory_uri() . '/js/forms/submit.js', array( 'jquery' ), $q, true );
	

	wp_enqueue_script('bootstrap-transition', get_template_directory_uri() . '/js/bootstrap/bootstrap-transition.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-datepicker', get_template_directory_uri() . '/js/bootstrap/bootstrap-datepicker.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-alert', get_template_directory_uri() . '/js/bootstrap/bootstrap-alert.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-modal', get_template_directory_uri() . '/js/bootstrap/bootstrap-modal.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-dropdown', get_template_directory_uri() . '/js/bootstrap/bootstrap-dropdown.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-scrollspy', get_template_directory_uri() . '/js/bootstrap/bootstrap-scrollspy.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-tab', get_template_directory_uri() . '/js/bootstrap/bootstrap-tab.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-tooltip', get_template_directory_uri() . '/js/bootstrap/bootstrap-tooltip.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-popover', get_template_directory_uri() . '/js/bootstrap/bootstrap-popover.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-button', get_template_directory_uri() . '/js/bootstrap/bootstrap-button.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-collapse', get_template_directory_uri() . '/js/bootstrap/bootstrap-collapse.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-carousel', get_template_directory_uri() . '/js/bootstrap/bootstrap-carousel.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-typeahead', get_template_directory_uri() . '/js/bootstrap/bootstrap-typeahead.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('bootstrap-image-gallery', get_template_directory_uri() . '/js/bootstrap-image-gallery.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('tablesorter', get_template_directory_uri() . '/js/jquery.tablesorter.min.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('register', get_template_directory_uri() . '/js/register.js', array( 'jquery' ), $q, true );
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), $q, true );





	// Le CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css',array(), $q);
	wp_enqueue_style( 'typography', get_template_directory_uri() . '/css/type.css',array(), $q);
	wp_enqueue_style( 'navigation', get_template_directory_uri() . '/css/navigation.css',array(), $q);
	wp_enqueue_style( 'login-bar', get_template_directory_uri() . '/css/login-bar.css',array(), $q);
	wp_enqueue_style( 'inbox', get_template_directory_uri() . '/css/inbox.css',array(), $q);
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css',array(), $q);
	wp_enqueue_style( 'register', get_template_directory_uri() . '/css/register.css',array(), $q);
	wp_enqueue_style( 'datepicker', get_template_directory_uri() . '/css/datepicker.css',array(), $q);
	wp_enqueue_style( 'classifieds', get_template_directory_uri() . '/css/classifieds.css',array(), $q);
	wp_enqueue_style( 'images', get_template_directory_uri() . '/css/images.css',array(), $q);
	wp_enqueue_style( 'front-page', get_template_directory_uri() . '/css/front-page.css',array(), $q);
	wp_enqueue_style( 'bootstrap-image-gallery', get_template_directory_uri() . '/css/bootstrap-image-gallery.min.css',array(), $q);
	wp_enqueue_style( 'styles', get_stylesheet_uri(),array(), $q);
}
add_action( 'wp_enqueue_scripts', 'scripts_styles' );

function register_admin_scripts() {
	wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin.js', array( 'jquery-ui-datepicker' ), true );
  wp_enqueue_style( 'jquery-ui-datepicker', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css' );
} // end register_admin_scripts

add_action( 'admin_enqueue_scripts', 'register_admin_scripts');

?>
