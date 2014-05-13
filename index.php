<?php get_header(); ?>
<!-- <?php echo 'mssdebug_index.php'; ?> -->

<section id="blog">
	<div class="container">
	<?php
	  if (have_posts()) : while (have_posts()) : the_post();
      include('entry.php');
    endwhile;
    endif;
	?>
	  <div class="navigation hide"><p><?php posts_nav_link(); ?></p></div>
  </div>
</section>

<?php get_footer(); ?>