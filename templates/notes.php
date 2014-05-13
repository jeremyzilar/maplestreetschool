<?php
$note_text = wpautop(get_post_meta($post->ID, 'note_text', true));

$note_link = get_post_meta($post->ID, 'note_link', true);
$note_src = get_permalink();

?>

<div class="row">
  <div <?php post_class('entry span10') ?> id="post-<?php the_ID(); ?>">
    <div class="row">
      <div class="span8 offset2">
  		  <div class="alert alert-warning">
  		    <?php if (is_post_type_archive() ) { ?>
  		      <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
  		    <?php } else { ?>
  		      <h3><?php the_title(); ?></h3>
  		    <?php } ?>
                    
          <div class="entry">
          <?php if (is_post_type_archive('class_blog')) {
          	the_excerpt();
          } else {
          	the_content();
          } ?>
          </div>
          
          <?php if ($note_link) { ?>
            <div class="note_link">
              <p><a href="<?php echo $note_link; ?>"><strong>&#8594; <?php echo $note_link; ?></strong></a></p>
            </div>
          <?php } ?>
          
  		  </div><!-- .alert alert-warning -->

        <?php include('edit-history.php'); ?>
        
  		</div><!-- .span8 -->
    </div>
  </div>
  
</div>