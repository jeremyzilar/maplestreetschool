<?php get_header(); ?>
<!-- <?php echo 'mssdebug_page.php'; ?> -->

<?php
  if (have_posts()) : while (have_posts()) : the_post();
    $menu_name = $post->post_name;
    $template = 'templates/public-page.php';
    // echo $menu_name;
    
    if(is_nav_menu($menu_name)) { // Looks for a Menu to drive the prder of the page
      pagemenu($menu_name, $template);
    } else { //if no menu found, drives the page based off of children of that page
      $offset = 'offset2';
      include($template);
    }
  
  endwhile;
  endif;
?>

<?php get_footer(); ?>