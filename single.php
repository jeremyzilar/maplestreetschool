<?php get_header(); ?>
<!-- <?php echo 'mssdebug_single.php'; ?> -->

<section id="blog">
	<div class="container">
		<div class="row">
		  <div class="span10">
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  

            <?php if ($post->post_type == 'coop-docs') {
              include('templates/docs.php');
            } else {
              include('entry.php');
            } ?>

      		<?php endwhile; ?>
          <?php if (!is_page()) { ?>
          <div class="paged-nav paged-nav-bottom">
      		  <?php include('paged-nav.php'); ?>
          </div>
          <?php } ?>

      	<?php else : ?>

      		<div class="row">
            <div class="span7 offset2">
              <div class="alert alert-warning">
                <h2>Ooops!</h2>
                <strong>Members Only</strong><br />Only current parents and staff of Maple Street School can view the <?php the_title(); ?><br /><a class="login" href="#">Log in</a> or <a href="<?php echo $blog_url; ?>/?page_id=16">Register</a>.
              </div>
            </div><!-- .span5 -->
          </div><!-- .row -->

      	<?php endif; ?>
		  </div>
		</div>

  </div>
</section>

<?php get_footer(); ?>