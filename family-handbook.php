<?php
/*
Template Name: Family Handbook
*/
?>

<?php get_header(); ?>

<section id="main">
	<div class="container">
    
    <h1>The Comprehensive Family Handbook</h1>
    
    <?php 
	  if(function_exists('wp_nav_menu')) {
      wp_nav_menu(array(
        'theme_location' => 'family-handbook',
        'container' => '',
        'container_id' => '',
        'menu_id' => 'family-handbook',
        'fallback_cb' => 'nav_fallback',
      ));
    } ?>
    
  </div>
</section>
<?php get_footer(); ?>