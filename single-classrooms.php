<?php get_header(); ?>

<?php
$classroom_text = get_post_meta($post->ID, 'class_roster', true);
$_title = strtolower(get_the_title());

?>

<section id="classrooms">
	<div class="container">
	  <div class="row">
	    <div class="span12">
	      
	      <?php
          if (have_posts()) : while (have_posts()) : the_post();
    	      $pog = '<div class="pog circle"><img src="'.$template_url.'/img/'.$_title.'.png"/><h2>'.get_the_title().'</h2></div>';
            echo $pog;

            if ( is_user_logged_in() ) { ?>

    	      <ul class="nav nav-pills" id="classroomTabs">
              <li class="active"><a href="#roster" data-toggle="pill">Parent Roster</a></li>
              <li><a href="#classemail" data-toggle="pill">Class E-mail</a></li>
            </ul>

            <div class="tab-content">

              <div class="tab-pane active" id="roster">
                <?php if (isset($classroom_text)) { ?>

                  <div class="alert">
                    <strong>Don't be spammy!</strong><br />Be courteous with other parent's e-mails.<br /><br />

                    Have a <a href="<?php echo get_post_type_archive_link('classifieds'); ?>">classified or a shift swap</a> to post? Send an e-mail to <a href="mailto:&#x63;&#x6F;&#x6D;&#x6D;&#x75;&#x6E;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">communication@maplestreetschool.org</a> and we'll post it in the Classifieds column on our <a href="<?php echo get_post_type_archive_link('class_blog'); ?>">Class Blog</a> and in our weekly newsletter.<br />
                    Questions? E-mail <a href="mailto:&#x63;&#x6F;&#x6D;&#x6D;&#x75;&#x6E;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">communication@maplestreetschool.org</a>
                  </div>

                  <!-- This is the code that gets dropped in via the admin -->
                  <?php echo $classroom_text; ?>


                <?php } else { ?>
                  <div class="alert alert-info">
                    <p>The roster has not been linked with this page.</p>
                  </div>
                <?php } ?>
              </div>
              
              <div class="tab-pane" id="classemail">
                <div class="well">
                  <h2><a href="mailto:<?php echo $_title; ?>@maplestreetschool.org"><?php echo $_title; ?>@maplestreetschool.org</a></h2>
                </div>
                
                <div class="alert">
                  <strong>Group Rules:</strong><br />
                  Class groups help centralize communication. Please use groups for official school-related communication, i.e. school announcements, committee updates, etc.  If you have a classified, i.e. nanny for hire, lost item at school, etc., please see directions below.<br />
                  - Any parent can post messages to the <?php the_title(); ?> group by e-mailing <a href="mailto:<?php echo $_title; ?>@maplestreetschool.org"><?php echo $_title; ?>@maplestreetschool.org</a> or using the form below.<br />
                  - Parents in the <?php the_title(); ?> class can post directly, all other postings will be moderated.<br />
                  - Request access to the <?php echo $_title; ?> group.<br />
                  - Be kind, be courteous, be helpful.<br /><br />
                  
                  Have a <a href="<?php echo get_post_type_archive_link('classifieds'); ?>">classified or a shift swap</a> to post? Send an e-mail to <a href="mailto:&#x63;&#x6F;&#x6D;&#x6D;&#x75;&#x6E;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">communication@maplestreetschool.org</a> and we'll post it in the Classifieds column on our <a href="<?php echo get_post_type_archive_link('class_blog'); ?>">Class Blog</a> and in our weekly newsletter.<br />
                  Questions? E-mail <a href="mailto:&#x63;&#x6F;&#x6D;&#x6D;&#x75;&#x6E;&#x69;&#x63;&#x61;&#x74;&#x69;&#x6F;&#x6E;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">communication@maplestreetschool.org</a>
                </div>
              </div>
            </div>

            <script>
              $(function () {
                $('#classroomTabs a:last').tab('show');
              })
            </script>

    	      <?php } else { ?>
    	        <div class="row">
                <div class="span7 offset2">
                  <div class="alert alert-warning">
                    <strong>Ooops!</strong><br />Only current parents and staff of Maple Street School can view the <?php the_title(); ?><br /><a class="login" href="#">Log in</a> or <a href="<?php bloginfo('url'); ?>/?page_id=16">Register</a>.
                  </div>
                </div><!-- .span5 -->
              </div><!-- .row -->
    	      <?php } 
          endwhile;
          endif;
        ?>
	    </div>
	    
	    
	  </div>
  </div>
</section>

<?php get_footer(); ?>