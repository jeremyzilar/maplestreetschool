<div id="inbox" class="">
  <?php global $user_ID; if( $user_ID ) : ?>
  <?php if( current_user_can('level_0') ) : ?>

  Welcome back <?php global $current_user; get_currentuserinfo(); echo ($current_user->user_login); ?>
  <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
  <?php else : ?>
  <?php endif; ?>
  <?php endif; ?>
</div>