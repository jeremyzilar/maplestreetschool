<?php
/*
Template Name: Photos
*/
?>

<?php get_header(); ?>

<section id="main">
	<div class="container">
	  
  <?php if ( is_user_logged_in() ) { ?>
	  <div id="gallery" class="mssphotos" data-toggle="modal-gallery" data-target="#modal-gallery" data-selector="div.gallery-item">
	    <?php 
      // global $wpdb;
      $pictures = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_type = 'attachment' AND post_status != 'trash' AND (post_mime_type = 'image/jpeg' OR post_mime_type = 'image/gif' OR post_mime_type = 'image/png') ORDER BY ID DESC")); ?>

      <?php foreach($pictures as $picture) {
        // print_r($picture);
        $img = wp_get_attachment_image_src( $picture->ID,"w220");
        $img_title = $picture->post_title;
        $img_caption = $picture->post_excerpt;
        $img_id = $picture->ID;
        $img_full = wp_get_attachment_image_src( $img_id,'full');
        $img_link = $img_full[0];
        echo '<div class="photo gallery-item" data-href="'.$img_link.'" title="'.$img_title.'">'.wp_get_attachment_image( $img_id,'w220').'</div>';

      } ?>
      
	  </div>
	  
	  <div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
      <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
      </div>
      <div class="modal-body"><div class="modal-image"></div></div>
      <div class="modal-footer">
        <a class="btn btn-primary modal-next">Next <i class="icon-arrow-right icon-white"></i></a>
        <a class="btn btn-info modal-prev"><i class="icon-arrow-left icon-white"></i> Previous</a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000"><i class="icon-play icon-white"></i> Slideshow</a>
        <a class="btn modal-download" target="_blank"><i class="icon-download"></i> Download</a>
      </div>
    </div>
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