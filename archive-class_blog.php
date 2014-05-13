<?php
/*
Template Name: Coop Docs / Handbook Index
*/
?>

<?php get_header(); ?>
<!-- <?php echo 'mssdebug_class-blog.php'; ?> -->

<section id="blog">
	<div class="container">
    
    <div class="row classnav hide">
      <div class="span2 offset2 well">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/stars.png" width="60" height="60" alt="Stars">
        </div>
        <h6>Stars</h6>
      </div>
      <div class="span2 well">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/waves.png" width="60" height="60" alt="Waves">
        </div>
        <h6>Waves</h6>
      </div>
      <div class="span2 well">
        <div class="pog circle">
          <img src="<?php echo $template_url; ?>/img/roots.png" width="60" height="60" alt="Roots">
        </div>
        <h6>Roots</h6>
      </div>
    </div>
    
		<?php if ( is_user_logged_in() ) { ?>
		  
			<!-- Classifieds -->
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
      
      <div class="row">
        <div id="blogposts" class="span10">
					
	        <?php
	      		$args = array(
	          	'post_type' => array('class_blog', 'notes', 'quote'),
	          	'post_status' => 'publish',
	          	'posts_per_page' => 15
	          );
	          query_posts($args);
	          if ( have_posts() ) : 
	            while ( have_posts() ) : the_post();
	              include('entry.php');
	            endwhile;
	          else :
	            get_template_part( 'content', 'none' );
	          endif;
						?>
						<div class="nextprev row">
						  <div class="col-xs-12">
						    <div class="pull-left"><?php previous_posts_link('<span class="btn btn-sm btn-primary">Previous Posts</span>') ?></div>
						    <div class="pull-right"><?php next_posts_link('<span class="btn btn-sm btn-primary">Next Posts</span>','') ?></div>
						  </div>
						</div>
          <?php

     } else { ?>

          <div class="row">
            <div class="span7 offset2">
              <div class="alert alert-warning">
                <strong>Ooops!</strong><br />Only current parents and staff of Maple Street School can view the <?php the_title(); ?><br /><a class="login" href="#">Log in</a> or <a href="<?php bloginfo('url'); ?>/?page_id=16">Register</a>.
              </div>
            </div><!-- .span5 -->
          </div><!-- .row -->


        <?php } ?>
        
          
        </div>
      </div>
        
      

  </div>
</section>

<?php get_footer(); ?>