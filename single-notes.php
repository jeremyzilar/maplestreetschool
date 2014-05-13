<?php get_header(); ?>
<!-- <?php echo 'mssdebug_notes'; ?> -->

<section id="notes">
	<div class="container">
		<div class="row">
		  <div class="span10">
		    <?php if (have_posts()) : while (have_posts()) : the_post();
		      include('templates/notes.php');
          endwhile;
          endif; ?>
		  </div>
		</div>

  </div>
</section>

<?php get_footer(); ?>