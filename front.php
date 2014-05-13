<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
<!-- <?php echo 'mssdebug_front.php'; ?> -->


<section id="main">
	<div class="container">
	  <div class="row">
	    
	   	<div id="mainCarousel" class="carousel slide span12">
    		<div class="carousel-inner">
    		  
					<div class="active item">
      		  <img src="<?php bloginfo('template_url'); ?>/img/slides/admissions.jpg" width="940" height="400" alt="Admissions 2014-15">
      		  <div class="carousel-caption">
              <h4>Admissions are Open!</h4>
              <p>Now accepting applications for the 2014-15 School Year | <a href="http://maplestreetschool.org/admissions" title="Admissions |  Maple Street School | Brooklyn's Cooperative Pre-school">Apply Now!</a></p>
            </div>
      		</div>
     
      	</div>
      	<!-- Carousel nav -->
        <!-- <a class="carousel-control left" href="#mainCarousel" data-slide="prev">&lsaquo;</a> -->
        <!-- <a class="carousel-control right" href="#mainCarousel" data-slide="next">&rsaquo;</a> -->
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="promo span6">
        <a href="http://maplestreetschool.org/maple-street-giving-app/" title="Maple Street Giving App |  Maple Street School | Brooklyn's Cooperative Pre-school"><img src="<?php bloginfo('template_url'); ?>/img/promos/giving-app-promo.jpg" alt="Maple Street Giving App"></a>
      </div>
    </div>
  </div>

  
  <div class="container hide">
    <div class="row">
      <div class="promo span3"></div>
      <div class="promo span3"></div>
      <div class="promo span3"></div>
      <div class="promo span3"></div>
    </div>

    <div class="row">
      <div class="promo span6 giving-app">
        <img src="http://maplestreetschool.org/wp/wp-content/uploads/2012/11/mss1280-620x387.png">
      </div>
      <div class="promo span6"></div>
    </div>
  </div>
  
</section>

<?php get_footer(); ?>