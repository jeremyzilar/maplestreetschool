


<?php 

if ($post->post_type == 'event') { ?>
  <?php
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
  
<?php } else {
  
  if ($post->post_type == 'quote') {
    $quote = get_post_meta($post->ID, 'quote_text', true);
    // $quote = wpautop($quote);
    $quote_name = get_post_meta($post->ID, 'quote_name', true);
    $quote_age = get_post_meta($post->ID, 'quote_age', true);
    $quote_class = get_post_meta($post->ID, 'quote_class', true);
    $quote_leng = strlen( $quote );
    $quote_short = 135;
    $quote_long = 200;
    $quote_style = 'f900';
  
    if( strlen( $quote ) > $quote_short) {
      $quote_style = 'f600';
    }
    if (strlen( $quote ) > $quote_long) {
      $quote_style = 'f500';
    } {
    
    }
  } ?>


  <div class="row">
    <div <?php post_class('entry span10') ?> id="post-<?php the_ID(); ?>">
      <div class="row">
          <?php if ( $post->post_type == 'class_blog' ) { ?>
            <div class="span2 entry-meta">
          <?php } else { ?>
            <div class="span2 entry-meta">
          <?php } ?>
        

            <!-- Category -->
            
            <?php if ( $post->post_type == 'class_blog' ) {
              $terms = get_the_terms( $post->ID, 'classes' );
              if ( $terms && ! is_wp_error( $terms ) ) : 
              	$mssclasses_links = array();
              	foreach ( $terms as $term ) {
              		$mssclasses_links[] = $term->name;
              		if ($term->slug == 'roots' || $term->slug == 'waves' || $term->slug == 'stars'){
              		  $pog = '<div class="pog circle"><a href="'.$blog_url.'/classes/'.$term->slug.'"><img src="'.$template_url.'/img/'.$term->slug.'.png"/></a></div>';
              		  $className = '<h6 class="f200"><a href="'.$blog_url.'/classes/'.$term->slug.'">'.$term->name.'</a></h6>';
              		}
              	}
              	$mssclasses = join( ", ", $mssclasses_links );
              ?>
              <div class="category">
                <?php echo $pog; ?>
                <?php echo $className; ?>
              </div>  
              <?php endif;
            } ?>

            <!-- Date -->
            <p class="date"><?php the_time('F j, Y') ?></p>

            <!-- Author on Posts -->
            <?php if ( $post->post_type == 'post' || $post->post_type == 'class_blog' ) { ?>
            <address class="byline author vcard">By <?php the_author_posts_link(); ?></address>
            <?php } else if ($post->post_type == 'quote') {?>
            <address class="byline author vcard">Noted by <?php the_author_posts_link(); ?></address>
            <?php } ?>

          
            <!-- Tags -->
            <div class="tags">
              <?php the_tags('', ' ', ''); ?>
            </div><!-- .tags -->

          </div><!-- .span3 -->

          <div class="span8">
          
            <?php
            // <!-- Post/Page Title -->
            if (is_single()) { ?>
            <h2><?php the_title(); ?></h2>
            <?php } else if ($post->post_type == 'quote') {}
            else{?>
              <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <?php } ?>

            <!-- The Content   -->
              <?php if ($post->post_type == 'quote') { ?>
            	<div class="entry-content <?php echo $quote_style; ?>">
                <?php echo $quote; ?>
                <?php if ($quote_name == '') { // Checking to see if NAME is set ?>
                  <cite>— <span class="quote_name">Anonymous Child</span></cite>
                <?php } else { ?>
                  <cite>— <span class="quote_name"><?php echo $quote_name; ?></span><?php if (!$quote_age == '') { // Checking to see if AGE is set ?>, <span class="quote_age">Age <?php echo $quote_age; ?></span>
                  <?php }
                    if (!$quote_class == '') { ?>
                      <span class="quote_class"> / <?php echo $quote_class; ?></span>
                  <?php } ?>
                  </cite>
                <?php } ?>
            	</div>
          	
            	<?php } else { ?>
            	<div class="entry-content">
            		<?php the_content('Read the rest of this entry &raquo;'); ?>
            	</div>
            	<?php } ?>
          	
            	<?php include('templates/edit-history.php'); ?>

          </div><!-- .span8 -->

        <?php if ( $post->post_type == 'class_blog' ) { ?>
          <div class="span2">
            <p></p>
          </div><!-- .span2 -->  
        <?php } ?>
        
      </div><!-- .row -->
    </div><!-- .span12 -->
  </div><!-- .row -->
<?php } ?>
