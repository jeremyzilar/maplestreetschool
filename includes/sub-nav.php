<?php if (is_page('register')) { ?>

<?php } else{ ?>
<div id="navigation">
  <?php
  if (is_page('coop-docs') || $post->post_type == 'coop-docs') {
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu(array(
        'sort_column' => 'menu_order',
        'container' => 'div',
        'container_id' => '',
        'container_class' => 'subnav',
        'menu_class' => 'nav nav-pills',
        'theme_location' => 'docs-nav',
        'fallback_cb' => 'nav_fallback',
        'walker' => new dropdown_walker()
      ));
    }
  } else if (is_page('event') || $post->post_type == 'event') {
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu(array(
        'sort_column' => 'menu_order',
        'container' => 'div',
        'container_id' => '',
        'container_class' => 'subnav',
        'menu_class' => 'nav nav-pills',
        'theme_location' => 'events-nav',
        'fallback_cb' => 'nav_fallback',
        'walker' => new dropdown_walker()
      ));
    }
  } else if ($post->post_type == 'classrooms') {
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu(array(
        'sort_column' => 'menu_order',
        'container' => 'div',
        'container_id' => '',
        'container_class' => 'subnav',
        'menu_class' => 'nav nav-pills',
        'theme_location' => 'classrooms-nav',
        'fallback_cb' => 'nav_fallback',
        'walker' => new dropdown_walker()
      ));
    }
  } else {
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu(array(
        'sort_column' => 'menu_order',
        'container' => 'div',
        'container_id' => '',
        'container_class' => 'subnav',
        'menu_class' => 'nav nav-pills',
        'theme_location' => 'main-nav',
        'fallback_cb' => 'nav_fallback',
        'walker' => new dropdown_walker()
      ));
    }
  }
 ?>
</div>
<?php } ?>