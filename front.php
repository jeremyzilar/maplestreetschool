<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>


<section id="main">

  <?php
    if (have_posts()) : while (have_posts()) : the_post();
      the_content();
    endwhile;
    endif;
  ?>
  
</section>

<?php get_footer(); ?>