<?php   
  // Check to see if this is a page
  if ( $post->post_type == 'page' ) { 

    $page_title = get_the_title($post->ID);  
    $pageid = get_the_ID();
    $parent_title = get_the_title($post->post_parent);
  
    // Then check to see if this page has a parent
    if ($post->post_parent)	{
    // If it does have a parent, then set these variables  
    	$ancestors=get_post_ancestors($post->ID);
    	$root=count($ancestors)-2;
    	$parent = $ancestors[$root];
  	
    } elseif ($post->post_parent) {
    	$parent = $post->ID;
    } 
    ?>

    <?php
    // echo $parent_title . ' » ';
    // echo $page_title . ' » (';
    // echo $parent . '/';
    // echo $post->post_parent . ')';
  
    // Checks to see what Page Template is being used.
    // If it is a listing page, it is likely going to need to display the menu of the same name
    if (is_page_template('project-listing.php') && is_page($page_title)) { 
      wp_nav_menu( array( 'menu' => $page_title ) );

    // If the Page Template is a Project page, then it will need to display the menu that is named the same as it's parent.
    } elseif (is_page_template('project.php')) { 
      wp_nav_menu( array( 'menu' => $parent_title ) );
    }
  }
  
  // If search page or 404 page
  if (is_search() || is_page('Search') || is_404()) { 
    get_search_form();
  }
?>



<!-- Floating Nav -->
<div id="sidenavWrap">
  <div id="sidenav" class="well span3">
  	<?php wp_nav_menu( array('menu' => 'Side Menu', 'sort_column' => 'menu_order', 'container_class' => 'menu-header' ) ); ?>
  	<ul class="nav nav-list">
  	  <li class="nav-header">
  	    List header
  	  </li>
  	  <li class="active">
  	    <a href="#">Home</a>
  	  </li>
  	  <li>
  	    <a href="#">Library</a>
  	  </li>
  	</ul>
  </div><!-- #sidenav -->
</div><!-- #sidenavWrap -->
