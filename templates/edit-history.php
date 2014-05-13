<?php if ( is_user_logged_in() ) { ?>
  <!-- Last Edited by... -->
  <div class="editHistory">
    <address class="byline author vcard">Last edited by <?php the_author_posts_link(); ?>, on <?php the_time('F j, Y') ?></address> 
    <div class="edit"><?php edit_post_link('edit this page', '', '', $page->ID); ?></div>
  </div><!-- .editHistory -->
<?php } ?>