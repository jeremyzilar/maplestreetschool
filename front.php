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
      		  <img src="<?php bloginfo('template_url'); ?>/img/slides/bite-of-brooklyn.jpg" width="940" height="400" alt="Bite of Brooklyn 2014">
      		  <div class="carousel-caption">
              <h4><a href="http://maplestreetschool.org/bite-of-brooklyn/">Bite of Brooklyn</a></h4>
              <p>Our 4th Annual Food, Wine, Music and Auction Event | <a href="http://maplestreetschool.org/bite-of-brooklyn/">Learn more</a></p>
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