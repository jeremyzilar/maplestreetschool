<div class="msslogo">
  <?php if (is_page('coop-docs') || $post->post_type == 'coop-docs' || $post->post_type == 'classrooms'){
    $msslogo = 'mss_logo_c.png';
  } else {
    $msslogo = 'mss_logo_b.png';
  } ?>
  <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/<?php echo $msslogo; ?>" width="170" height="170" alt="<?php bloginfo('name'); ?>"></a>
</div>
<div class="msstype">
  <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/mss_type.png" width="385" height="150" alt="<?php bloginfo('name'); ?>"></a></h1>
</div>

<?php if (is_page('class-blog') || $post->post_type == 'class_blog' || $post->post_type == 'notes') { ?>
<div class="msssection">
  <h2>
    <img src="<?php bloginfo('template_url'); ?>/img/mss_classblog.png" width="340" height="40" alt="Class Blog">
  </h2>
</div>
<?php } else if (is_page('coop-docs') || $post->post_type == 'coop-docs' || $post->post_type == 'classrooms') { ?>
<div class="msssection">
  <h2>
    <img src="<?php bloginfo('template_url'); ?>/img/mss_coophandbook.png" width="340" height="40" alt="COOP Handbook">
  </h2>
</div>
<?php } else if (is_page('event') || $post->post_type == 'event') { ?>
<div class="msssection">
  <h2>
    <img src="<?php bloginfo('template_url'); ?>/img/mss_events.png" width="340" height="40" alt="Events">
  </h2>
</div>
<?php } else if (is_post_type_archive('classified')) { ?>
<div class="msssection">
  <h2>
    <img src="<?php bloginfo('template_url'); ?>/img/mss_classified.png" width="340" height="40" alt="Events">
  </h2>
</div>
<?php } else if (is_page('wendys-blog') || $post->post_type == 'post') { ?>
<div class="msssection">
  <h2>
    <img src="<?php bloginfo('template_url'); ?>/img/mssdirectorsblog.png" width="340" height="40" alt="Directors Blog">
  </h2>
</div>  
<?php } ?>

