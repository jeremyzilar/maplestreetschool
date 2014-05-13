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



  
  

	<!-- Le javascript
	================================================== -->
	<script type="text/javascript" charset="utf-8">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script>

  <!-- jQuery & friends -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.timeago.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-color.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/masonry.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-scrolltofixed-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js" type="text/javascript" charset="utf-8"></script>
		
	<!-- Form Validation -->
  <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/forms/jquery.form.js"></script>
  <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/forms/jquery.validate.js"></script>
  <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/forms/additional-methods.js"></script>
  
  <!-- AJAX -->
  <script src="<?php bloginfo('template_url'); ?>/js/forms/checkemail.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/forms/submit.js"></script>
  
	<!-- Bootstrap JS -->
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-transition.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-datepicker.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-alert.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-modal.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-dropdown.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-scrollspy.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-tab.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-tooltip.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-popover.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-button.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-collapse.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-carousel.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-typeahead.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php bloginfo('template_url'); ?>/js/bootstrap/bootstrap-typeahead.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.imagesloaded.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/bootstrap-image-gallery.js" type="text/javascript" charset="utf-8"></script>
	
	
  <!-- Custom JS -->
  <script src="<?php bloginfo('template_url'); ?>/js/login.js?=<?php echo $v; ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/register.js?=<?php echo $v; ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/custom.js?=<?php echo $v; ?>" type="text/javascript" charset="utf-8"></script>
	
	
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