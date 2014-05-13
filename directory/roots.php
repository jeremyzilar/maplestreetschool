<?php
/*
Template Name: Roots
*/
?>

<?php get_header(); ?>

<section id="directory">
	<div class="container">
	  <div class="row">
	    <div class="span8 offset2 mssdoc">
	    <h2>Coop Handbook</h2>
  		<?php if(function_exists('wp_nav_menu')) {
          wp_nav_menu(array(
            'sort_column' => 'menu_order',
            'container' => 'div',
            'container_id' => '',
            'container_class' => 'contents',
            'menu_class' => 'chapter',
            'theme_location' => 'coop-handbook',
            'fallback_cb' => 'nav_fallback'
          ));
        } ?>
      </div><!-- .span8 mssdoc -->
    </div><!-- .row -->
  </div>
</section>

<?php get_footer(); ?>