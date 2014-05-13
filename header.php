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
  
  <!-- CSS -->
  <?php $v = '790'; ?>
  <?php $b = 'css'; ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/<?php echo $b; ?>/bootstrap.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/type.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/navigation.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/login-bar.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/inbox.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/register.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/datepicker.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/images.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/classifieds.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/front-page.css?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-image-gallery.min.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?=<?php echo $v; ?>" type="text/css" media="screen" title="no title" charset="utf-8">

  <!-- GRID in Dev environment -->
  <?php
  $host = parse_url($domain, PHP_URL_HOST);
  if($host == 'maplestreetschool.org') {
    echo '<!-- no grid -->';
  } else {
    echo '<!-- yes grid -->';
  }
  ?>
  <!-- <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/grid.css" type="text/css" media="screen" title="no title" charset="utf-8"> -->
  
  

	
  <!-- Fonts vis Typekit -->
  <script type="text/javascript" src="http://use.typekit.com/tbw7hzq.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Le fav and touch icons -->
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
  <!-- Good things start here ! -->
  
<?php $slug = get_the_slug(); ?>
<body <?php body_class($slug); ?> data-spy="scroll" data-target="#sidenav">

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