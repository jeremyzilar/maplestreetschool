<div class="navbar navbar-fixed-top login-bar">
  <div class="navbar-inner">
    <div class="container">
      <?php
      if ( is_user_logged_in() ) { ?>
        <?php $current_user = wp_get_current_user(); ?>
        
        
        <ul class="nav pull-right">
          <li><a href="#"><i class="icon-user"></i> <?php echo $current_user->first_name .' '. $current_user->last_name; ?></a></li>
          <li><a href="<?php echo admin_url(); ?>" target="new">Dashboard</a></li>
          <li><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Log out</a></li>
        </ul>
        
        <?php
        if(function_exists('wp_nav_menu')) {
          wp_nav_menu(array(
            'sort_column' => 'menu_order',
            'container' => '',
            'container_id' => '',
            'container_class' => '',
            'menu_class' => 'nav committee-nav',
            'theme_location' => 'login-bar',
            'fallback_cb' => 'nav_fallback'
          ));
        }
        ?>
        
      <?php } else { ?>
        <?php 
          $args = array(
            'label_username' => __( 'E-mail' )
          );
          wp_login_form($args);
          
        ?>
          
        <ul class="nav pull-right">
          <li><a class="login" target="new" href="#">Log in</a></li>
          <?php if (get_option('users_can_register')){
            //echo '<li><a class="register" href="./?page_id=16">Register</a></li>';
          }?>
        </ul>
        
        <?php
        if(function_exists('wp_nav_menu')) {
          wp_nav_menu(array(
            'sort_column' => 'menu_order',
            'container' => '',
            'container_id' => '',
            'container_class' => '',
            'menu_class' => 'nav committee-nav',
            'theme_location' => 'login-bar',
            'fallback_cb' => 'nav_fallback'
          ));
        }
        ?>
        
      <?php } ?>
      </ul>
    </div>
  </div>
</div>