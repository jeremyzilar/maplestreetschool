<?php
$ad_text = wpautop(get_post_meta($post->ID, 'ad_text', true));
$ad_link = get_post_meta($post->ID, 'ad_link', true);
$ad_src = get_permalink();

if ($post->post_type == 'classified') {
  $span = '';
} else {
  $span = 'span3';
}

?>

<div class="ad <?php echo $span; ?>">
  <h5><?php the_title(); ?></h5>
  <?php echo $ad_text; ?>
  <p class="date">Posted: <?php the_time('m/d/y') ?></p>
</div>
