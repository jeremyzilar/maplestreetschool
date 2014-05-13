<?php
// Menus
add_theme_support( 'menus' );
add_action( 'after_setup_theme', 'registerMenus' );

function registerMenus() {
  // This theme uses wp_nav_menu() in four locations.
  register_nav_menus(array(
    'login-bar' => __( 'Login Bar' ),
    'main-nav' => __( 'Main Navigation' ),
    'docs-nav' => __( 'Coop Handbook Nav' ),
    'coop-handbook' => __( 'Coop Handbook Index' ),
    'events-nav' => __( 'Events Nav' ),
    'classrooms-nav' => __( 'Classrooms Nav' ),
    'pages' => __( 'Pages' ),
    'footer-col1' => __( 'Footer Column 1' ),
    'footer-col2' => __( 'Footer Column 2' ),
    'footer-col3' => __( 'Footer Column 3' ),
  ));
}


// When the page is missing a Nav Menu, show this to the Admin
function nav_fallback() {
  if(is_user_logged_in() && current_user_can('admin')) {
    ?>
      <div class="alert alert-info">
        <strong>Admin -</strong><br />You missing navigation in this part of the page.<br /><br />
        Simply <a href="./wp-admin/nav-menus.php">add a Menu</a> and assign it to this region.
      </div>
    <?php
  }
}

?>