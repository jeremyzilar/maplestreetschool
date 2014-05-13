<?php
include 'functions/common_arrays.php';
include 'functions/nav_menus.php';
include 'functions/pages.php';
include 'functions/dropdown_menus.php';
include 'functions/login_form.php';
include 'functions/images.php';
include 'functions/notes.php';
include 'functions/classifieds.php';
include 'functions/classrooms.php';
include 'functions/quotes.php';
include 'functions/roles.php';
include 'functions/class-blog.php';
include 'functions/coop-docs.php';

$template_url = get_bloginfo('template_url');
$blog_url = get_bloginfo('url');

add_theme_support( 'infinite-scroll', array(
    'container'  => 'blogposts',
		'type'       => 'click',
    'footer'     => 'footer',
) );

add_post_type_support('page', 'excerpt');

function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}

function get_the_slug(){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  return $slug;
}

function new_excerpt_more($more) {
  global $post;
	return ' <a href="'. get_permalink($post->ID) . '">Read more »</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');



// E-mail
function giving_email(){
  // $name = $_POST['name'];
  // $email = $_POST['email'];
  // $message = $_POST['message'];
  // $formcontent="From: $name \n Message: $message";
  // $recipient = "emailaddress@here.com";
  // $subject = "Contact Form";
  // $mailheader = "From: $email \r\n";
  // mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
  // Set $to as the email you want to send the test to
  // $to = "jeremyzilar@gmail.com";
  // 
  // // No need to make changes below this line
  // 
  // // Email subject and body text
  // $subject = 'wp_mail function test';
  // $message = 'This is a test of the wp_mail function: wp_mail is working';
  // $headers = '';
  // 
  // // Load WP components, no themes
  // // define('WP_USE_THEAMES', false);
  // // require('../../../wp-load.php');
  // 
  // // Call the wp_mail function, display message based on the result.
  // if( wp_mail( $to, $subject, $message) ) {
  //     // the message was sent...
  //     echo '<h4>The test message was sent. Check your email inbox.</h4>';
  // } else {
  //     // the message was not sent...
  //     echo '<h4>The message was not sent!</h4>';
  // };
  echo "Thank You!";
}


function pagemenu($menu_name, $template){
  $current = get_permalink( $post->ID );
  $menu = wp_get_nav_menu_object($menu_name);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_list = '<div id="sidenavWrap"><div id="sidenav" class="span3 well"><ul id="menu-' . $menu_name . '" class="nav nav-list">';
  $offset = 'offset3';
  $obPages = array();
  foreach ( (array) $menu_items as $key => $menu_item ) {
    $title = $menu_item->title;
    $url = $menu_item->url;
    $slug = basename($url);
    $hash = '#' . $slug;

    $obid = $menu_item->object_id;
    array_push($obPages, $obid);
    $menu_list .= '<li class="'.$slug.'"><a href="' . $hash . '" title="'.$title.'">' . $title . '</a></li>';
  }
  $menu_list .= '</ul></div></div>';
  // echo $menu_list;
  // return $obPages;

  foreach ($obPages as $obPagesID) {
		$args = array(
      'post_type' => 'any',
    	'post_status' => 'publish private',
    	'post__in' => array($obPagesID)
    );
    $the_query = new WP_Query( $args );
    if ($the_query -> have_posts()) {
      while ( $the_query->have_posts() ) : $the_query->the_post();
        if (!is_user_logged_in() && get_post_status($post->post_id) == 'private') {
          include('templates/private.php');
        } else {
          $slug = basename(get_permalink());
          include($template);
        }
      endwhile;
    } else {
     ?>
      <h4 class="pagetitle 404">Error</h4>
  		<div class="entry">
  		<p class="text404">Start a <a href="<?php bloginfo('url'); ?>">new game »</a></p>  
  		</div>
     <?php 
    }
  }
}

// AJAX Calls

// Check E-mail
add_action( 'wp_ajax_nopriv_' . $_REQUEST['action'], $_REQUEST['action']);
add_action( 'wp_ajax_' . $_POST['action'], $_POST['action']);

function chk_email(){  
  if (email_exists($_POST['email'])){
    echo email_exists($_POST['email']);
  } else {
    echo false;
  }
}


// Get User
function get_usr(){
  $email = $_POST['email'];
  $user = get_user_by('email', $_POST['email']);
  echo 'User: ' . $user . "\n";
  // echo usr;
  // return usr;
}



function get_current_user_role() {
	global $wp_roles;
	$current_user = wp_get_current_user();
	$roles = $current_user->roles;
	$role = array_shift($roles);
	return isset($wp_roles->role_names[$role]) ? translate_user_role($wp_roles->role_names[$role] ) : false;
}





// Remove the PRIVATE: from the headlines of Private posts
function remove_private_prefix($title) {
  $title = str_replace('Private:', '', $title);
  return $title;
}
add_filter('the_title','remove_private_prefix');



function the_category_filter($thelist,$separator=' ') {
	if(!defined('WP_ADMIN')) {
		//Category Names to exclude
		$exclude = array('Uncategorized', 'Private');

		$cats = explode($separator,$thelist);
		$newlist = array();
		foreach($cats as $cat) {
			$catname = trim(strip_tags($cat));
			if(!in_array($catname,$exclude))
				$newlist[] = $cat;
		}
		return implode($separator,$newlist);
	} else {
		return $thelist;
	}
}
add_filter('the_category','the_category_filter', 10, 2);



function customAdminStyles() {
  $url = get_settings('siteurl');
  // $url = bloginfo('template_url').'/css/admin.css';
  $admin = $url . '/wp-content/themes/mss/css/admin.css';
  echo '
    <!-- Fonts vis Typekit -->
    <script type="text/javascript" src="http://use.typekit.com/tbw7hzq.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  ';
  echo '
    <!-- custom admin css -->
    <link rel="stylesheet" type="text/css" href="' . $admin . '" />
  ';

}
add_action('admin_head', 'customAdminStyles');



// Redefine user notification function
if ( !function_exists('wp_new_user_notification') ) {
  function wp_new_user_notification( $user_id, $plaintext_pass = '' ) {
    $user = new WP_User($user_id);

    $user_login = stripslashes($user->user_login);
    $user_email = stripslashes($user->user_email);

    $message  = sprintf(__('New user registration on your blog %s:'), get_option('blogname')) . "\r\n\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
    $message .= sprintf(__('E-mail: %s'), $user_email) . "\r\n";

    @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), get_option('blogname')), $message);

    if ( empty($plaintext_pass) )
        return;

    $message  = __('Hi there,') . "\r\n\r\n";
    $message .= sprintf(__("Welcome to %s! Here's how to log in:"), get_option('blogname')) . "\r\n\r\n";
    $message .= wp_login_url() . "\r\n";
    $message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
    $message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n\r\n";
    $message .= sprintf(__('If you have any problems, please contact me at %s.'), get_option('admin_email')) . "\r\n\r\n";
    $message .= __('Adios!');

    wp_mail($user_email, sprintf(__('[%s] Your username and password'), get_option('blogname')), $message);
  }
}

