<?php get_header(); ?>

<section id="blog">
	<div class="container">
		<?php if ( is_user_logged_in() ) {
      // This sets out a variable called $term - we'll use it ALOT for what we're about to do.  
      $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
      // print_r($term);
      ?>
      <div class="row">
        <div class="span8 offset2">
          <h3><?php echo $term->name; ?></h3>
        </div>
      </div>

      <?php while (have_posts()) : the_post();
        include('entry.php');
      endwhile; ?>
      
    <?php } else { ?>
      <div class="row">
        <div class="span7 offset2">
          <div class="alert alert-warning">
            <strong>Ooops!</strong><br />Only current parents and staff of Maple Street School can view the <?php the_title(); ?><br /><a class="login" href="#">Log in</a> or <a href="<?php bloginfo('url'); ?>/?page_id=16">Register</a>.
          </div>
        </div><!-- .span5 -->
      </div><!-- .row -->
    <?php } ?>
  </div>
</section>

<?php get_footer(); ?>