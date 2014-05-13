<?php
/*
Template Name: Waves
*/
?>

<?php get_header(); ?>

<section id="directory">
	<div class="container">
	  <div class="row">
	    <div class="span8 offset2">
	    <h2>Waves</h2>
	    
      <iframe id="forum_embed"
        src="javascript:void(0)"
        scrolling="no"
        frameborder="0"
        width="900"
        height="700">
      </iframe>

      <script type="text/javascript">
        document.getElementById('forum_embed').src = 'https://groups.google.com/a/maplestreetschool.org/forum/embed/?place=forum/waves' + '&showsearch=true&showpopout=false&showtabs=false';
      </script>
      
      </div><!-- .span8 -->
    </div><!-- .row -->
  </div>
</section>

<?php get_footer(); ?>