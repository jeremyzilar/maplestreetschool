<?php if ( $post->post_type == 'page' ) { // Check to see if this is a page ?>
  <!-- Floating Nav -->
  <div id="sidenavWrap">
    <div id="sidenav" class="well span3">
      <ul class="nav nav-list">
        <li class="nav-header"><?php echo get_the_title($id);?></li>
        <!-- $id = TOP most parent page -->
        
        <?php
        $sWalker = new Walker_Child_Classes();
        wp_list_pages( array( 'title_li' => null, 'walker' => $sWalker, 'sort_column' => 'menu_order', 'child_of' => $id ) );
        ?>

      </ul>
      
    </div><!-- #sidenav -->
  </div><!-- #sidenavWrap -->
      
<?php } elseif (is_search() || is_page('Search') || is_404()) { 
    get_search_form();
  }
?>



