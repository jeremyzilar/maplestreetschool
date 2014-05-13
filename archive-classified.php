<?php
/*
Template Name: Classified
*/
?>

<?php get_header(); ?>

<section id="classifieds">
	<div class="container">
    
		<?php if ( is_user_logged_in() ) { ?>
		  <div class="row">
		    <div class="alert alert-info span8 offset2">
		      <?php $nextFriday = date('l, m/d', strtotime('next friday')); ?>
		      <h4>Do you have a classified or a shift swap to post?</h4>
		      <p>Please send an e-mail to <a href="mailto:communication@maplestreetschool.org">communication@maplestreetschool.org</a> with the text, means of contacting you. Your posting will go out to all parents in a newsletter on <strong><?php echo $nextFriday; ?></strong>.</p>
		    </div><!-- .alert alert-info -->
		  </div>
		  
		  <div class="row">		    
		    <hr />
		    <div class="ads span12">
		      <?php
    		  $args = array(
          	'post_type' => array('classified'),
          	'post_status' => 'publish',
          	'posts_per_page' => 15
          );
          $the_query = new WP_Query( $args );
          if ($the_query -> have_posts()) {
            while ( $the_query->have_posts() ) : $the_query->the_post();
              include('templates/classifieds.php');
            endwhile;
          }
    		  ?>
		    </div>
		  </div>
		<?php } else { ?>
      
      <div class="span7 offset2">
        <div class="alert alert-warning">
          <strong>Ooops!</strong><br />Only current parents and staff of Maple Street School can view the <?php the_title(); ?><br /><a class="login" href="#">Log in</a> or <a href="<?php echo $blog_url; ?>/?page_id=16">Register</a>.
        </div>
      </div><!-- .span5 -->
      
      
    <?php } ?>

  </div>
</section>

<?php get_footer(); ?>