<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>

<section id="blog">
	<div class="container">

		<?php
  		$args = array(
      	'post_type' => array('event'),
      	'post_status' => 'publish',
      	'posts_per_page' => 15
      );
      $the_query = new WP_Query( $args );
      if ($the_query -> have_posts()) {
        while ( $the_query->have_posts() ) : $the_query->the_post();

          $event_date = get_post_meta($post->ID, 'event_date', true);
          $event_time = get_post_meta($post->ID, 'event_time', true);
          $event_cost = get_post_meta($post->ID, 'event_cost', true);
          $event_url = get_post_meta($post->ID, 'event_url', true);
          $event_desc = get_post_meta($post->ID, 'event_desc', true);

          ?>
          <div class="row">
            <div <?php post_class('entry span12') ?> id="post-<?php the_ID(); ?>">
              <div class="row">
                <div class="span8">
                  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  
                  <!-- <img src="http://placehold.it/620x300" alt=""> -->
                  
                  <?php
                    if ( has_post_thumbnail() ) {
                    	the_post_thumbnail('w620');
                    }
                  ?>
                  
                  <?php the_content(); ?>
                  <p><?php echo $event_desc; ?></p>
                </div>
                <div class="span3 well well-small event_details">
                  <h3 class="event_detail event_date"><?php echo $event_date; ?></h3>
                  <h4 class="event_detail event_time"><?php echo $event_time; ?></h4>
                  <h5 class="event_detail event_cost"><?php echo $event_cost; ?></h5>
                  <p class="event_detail event_url"><a href="<?php echo $event_url; ?>" title=""><?php echo $event_url; ?></a></p>
                </div>
                
              </div>
            </div>
          </div>
          <?php
        endwhile;
      } else {
       ?>
        <h4 class="pagetitle 404">Dead End</h4>
    		<div class="entry">
    		<p class="text404">Start a <a href="<?php bloginfo('url'); ?>">new game »</a></p>  
    		</div>
       <?php 
      } ?>


  </div>
</section>

<?php get_footer(); ?>