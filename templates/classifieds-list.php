<div class="classifieds">
  <h4>Classifieds</h4>
  <p class="helper">Want to post an item?<br /><a href="<?php echo get_post_type_archive_link( 'classified' ); ?>">E-mail us</a>.</p>
  <?php
  $args = array(
  	'post_type' => array('classified'),
  	'post_status' => 'publish',
  	'posts_per_page' => 5
  );
  $the_query = new WP_Query( $args );
  if ($the_query -> have_posts()) {
    while ( $the_query->have_posts() ) : $the_query->the_post();
      include('templates/classifieds.php');
    endwhile; ?>
      <p><a class="btn btn-small btn-primary" href="<?php echo get_post_type_archive_link( 'classified' ); ?>">See all</a></p>
    <?php
  }?>
</div>