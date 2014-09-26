<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
  <?php if (is_single() || is_page()) { ?>
    <title><?php wp_title('|',true, 'right'); ?> <?php bloginfo('name'); ?> | Brooklyn's Cooperative Pre-school</title>
  <?php } else { ?>
    <title><?php wp_title('|',true, 'right'); ?> Brooklyn's Cooperative Pre-school</title>
  <?php } ?>
	
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if (is_single() || is_page()) { ?>
    <?php if ($post->post_excerpt) { ?>
      <meta name="description" content="<?php echo get_the_excerpt(); ?>" />
    <?php } else { ?>
  	  <meta name="description" content="<?php bloginfo('description'); ?>" />
  	<?php } ?>
  <?php } else { ?>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
  <?php } ?>
  <meta name="keywords" content="Brooklyn, Pre-School, pre-k, Early Child Development, learning, cooperative, community" />
  <meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/mss_logo_b.png"/>
  <link href="<?php bloginfo('template_url'); ?>/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
  

	
  <!-- Fonts vis Typekit -->
  <script type="text/javascript" src="http://use.typekit.com/tbw7hzq.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>


  <?php wp_head(); ?>

</head>

  <!-- Good things start here ! -->
  

<?php $slug = get_the_slug(); ?>
<body <?php body_class($slug); ?> data-spy="scroll" data-target="#sidenav">



  <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-N8RQ8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N8RQ8V');</script>
<!-- End Google Tag Manager -->



  <?php include 'includes/login-bar.php'; ?>
  
  <?php // include 'includes/inbox.php'; ?>
  
	<header id="header">
		<div class="container">
		  
		  <?php if (is_page_template('templates/giving.php') || is_page_template('templates/donate.php') ) {
        include 'includes/giving-masthead.php';
      } else {
        include 'includes/masthead.php';
        include 'includes/sub-nav.php';
      } ?>


	  </div>
	  
	</header>