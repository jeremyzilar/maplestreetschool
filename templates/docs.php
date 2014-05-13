<section id="<?php the_slug(); ?>" class="canvas">
	<div class="container">
	  <?php 
	  if (isset($menu_list) && !$i++) {
      echo $menu_list;
    } ?>
		<div class="span8 <?php echo $offset; ?>">
      <h3><?php the_title(); ?></h3>
      <div class="entry"><?php the_content(); ?></div>
      <?php include('edit-history.php'); ?>
		</div><!-- .span8 -->
  </div>
</section>