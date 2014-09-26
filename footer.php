	<section id="footer">
		<div class="container">
			<div class="row">
			  <div class="span3">
			    <h3>Maple Street School</h3>
			    <p>A parent cooperative preschool in the Prospect Lefferts Gardens neighborhood in Brooklyn, NY.</p>
			  </div>
				<div class="span3">
				  <?php 
				  if(function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
              'theme_location' => 'footer-col1',
              'container' => '',
              'container_id' => '',
              'menu_id' => 'footer-col1',
              'fallback_cb' => 'nav_fallback',
            ));
          } ?>
				</div><!-- .span3 -->
				
				<div class="span3">
				  <?php 
				  if(function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
              'theme_location' => 'footer-col2',
              'container' => '',
              'container_id' => '',
              'menu_id' => 'footer-col2',
              'fallback_cb' => 'nav_fallback',
            ));
          } ?>
				</div><!-- .span3 -->
				
				<div class="span3">
				  <?php 
				  if(function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
              'theme_location' => 'footer-col3',
              'container' => '',
              'container_id' => '',
              'menu_id' => 'footer-col3',
              'fallback_cb' => 'nav_fallback',
            ));
          } ?>
				</div><!-- .span3 -->
			</div>
			
			
			<div class="row">
			  <div class="span12 location">
			    <p>© 2012 The Maple Street School &nbsp;21 Lincoln Rd. Brooklyn, NY, 11225 U.S.A. &nbsp;&nbsp;info@maplestreetsschool.org &nbsp;718-282-4345</p>
			  </div>
	    </div><!-- .row -->
	  </div>
	</section>



  
	<?php wp_footer(); ?>
	
	
  <!-- Google Analytics -->
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-11849546-2']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

  </script>
  
  
</body>
</html>