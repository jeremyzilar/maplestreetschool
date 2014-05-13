<?php
/*
Template Name: Coop Docs / Handbook Index
*/
?>

<?php get_header(); ?>
<!-- <?php echo 'mssdebug_coop-docs'; ?> -->

<section id="blog">
	<div class="container">
	  
    <div class="row classnav hide">
      <div class="span2 offset2">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/stars.png" width="60" height="60" alt="Stars">
        </div>
        <h4>Stars</h4>
      </div>
      <div class="span2">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/waves.png" width="60" height="60" alt="Waves">
        </div>
        <h4>Waves</h4>
      </div>
      <div class="span2">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/roots.png" width="60" height="60" alt="Roots">
        </div>
        <h4>Roots</h4>
      </div>
    </div>
	  
	  <div class="row">
	    <div class="span8 offset2 mssdoc">
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