<?php
/*
Template Name: Donations & Annual Appeal
*/
?>

<?php get_header(); ?>
<section class="banner banner-top">
	<div class="container">
	  
	  <div id="donateCardWrap">
	    <div id="dontateCard" class="row">
        <div class="span3 well">
          
          <div class="goals">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              
              <?php
                $donate_video_url = get_post_meta($post->ID, 'donate_video_url', true);
                $donate_email = get_post_meta($post->ID, 'donate_email', true);
                $donate_num = get_post_meta($post->ID, 'donate_num', true);
                $donate_amt = get_post_meta($post->ID, 'donate_amt', true);
                $donate_total = get_post_meta($post->ID, 'donate_total', true);
                $donate_percent = ($donate_amt/$donate_total)*100;
                $donate_percent = round( $donate_percent, 0, PHP_ROUND_HALF_UP);
              ?>
            <h4><span class="donate_num"><?php echo $donate_num; ?></span> families have given</h4>
            <h4><span class="donate_amt">$<?php echo $donate_amt; ?></span> <?php echo $donate_percent; ?>% of <em class="donate_total"><?php echo $donate_total; ?></em></h4>
            <?php  ?>
            <div class="progress progress-info progress-striped active">
              <div class="bar" style="width: <?php echo $donate_percent; ?>%;"></div>
            </div>
            <?php endwhile; else: ?>
            <?php endif; ?>
            
            <form id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="hosted_button_id" value="W6XJEVEE9MYF8">
              <input class="donate-btn btn btn-large btn-block btn-success" value="Donate" type="submit" name="submit" alt="PayPal">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <div class="giving-opts-btn">
              <button class="btn btn-info btn-mini" type="button">Learn about Matching Donations</button>
            </div><!-- #giving-opts -->
            <p class="well">Or send a check to:<br />
              <strong>Little Friends Campaign</strong><br />
              21 Lincoln Rd.<br />
              Brooklyn, NY 11225<br /><br />
              <em>Payable to Maple Street School</em></p>
            <p>All donations are 100% tax deductible.</p>
            <div id="social-btn">
              <button class="btn" type="button">Share</button>
              <?php include('edit-history.php'); ?>
            </div><!-- #email-this-button -->
            
          </div>
        </div>
  	  </div>
	  </div><!-- #donateCardWrap -->

	  <?php 
      if (!empty($donate_video_url)) { ?>
        
	  <div class="row">
      <div class="span9">
        <div class="video">
          <iframe width="680" height="383" src="<?php echo $donate_video_url; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
    
    <?php }
    ?>

  </div>
</section>



<section  class="banner alt">
	<div class="container">
	  <div class="row">

	    <div class="span8">
	      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	      <h3>Your Donation Makes Maple Street a Better Place</h3>
	      
	      <?php the_content(); ?>

        
        <!-- Button to trigger modal -->
        <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">FAQs</a>

        <!-- Modal -->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">FAQs</h3>
          </div>
          <div class="modal-body">
            <?php
              $donate_faq = get_post_meta($post->ID, 'donate_faq', true);
              echo wpautop($donate_faq);
            ?>
        <?php endwhile; else: ?>
        <?php endif; ?>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
        </div>
        
        
       
      </div>
      
	  </div><!-- .row -->

  </div>
</section>

<section id="social" class="banner">
 	<div class="container">
 	  <div class="row">
 	    <div class="span7">
 	      <h3>Spread the Love &#9829;</h3>
 	      <p>E-mail your family and friends and share the campaign on Facebook and Twitter.</p>
 	      
 	      <div class="share">
 	        <!-- Twitter -->
          <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://maplestreetschool.org/donations/" data-via="mapltweet">Tweet</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
 	        <!-- Facebook -->
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=98080491270";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like" data-href="http://maplestreetschool.org/donations/" data-send="true" data-width="560" data-show-faces="true"></div>
 	      </div>


 	    </div>
 	  </div>
 	  
 	  <div id="email" class="row">
 	    
 	    <div class="span7 well emailsend">
 	      <h6>E-mail this page to friends</h6>
 	      <?php
        if(isset($_POST['submitted'])) {
        	if(trim($_POST['to_address']) === '') {
        		$to_addressError = 'Please enter the e-mail address.';
        		$hasError = true;
        	} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['to_address']))) {
        		$to_addressError = 'You entered an invalid email address.';
        		$hasError = true;
        	} else {
        		$to_address = trim($_POST['to_address']);
        	}

        	if(trim($_POST['to_name']) === '')  {
        		$to_nameError = 'Please enter your name.';
        		$hasError = true;
        	} else {
        		$to_name = trim($_POST['to_name']);
        	}
        	
        	if(trim($_POST['from_name']) === '')  {
        		$from_nameError = 'Please enter your name.';
        		$hasError = true;
        	} else {
        		$from_name = trim($_POST['from_name']);
        	}

        	if(trim($_POST['giving_message']) === '') {
        		$giving_messageError = 'Please enter a message.';
        		$hasError = true;
        	} else {
        		if(function_exists('stripslashes')) {
        			$giving_message = stripslashes(trim($_POST['giving_message']));
        		} else {
        			$giving_message = trim($_POST['giving_message']);
        		}
        	}

        	if(!isset($hasError)) {
            $emailFrom = 'littlefriendscampaign@maplestreetschool.org';
            // $emailTo = 'jeremyzilar@gmail.com';
            $state = $giving_message;
            $emailTo = $to_address;
        		$subject = 'Little Friends Campaign | Maple Street School From '.$from_name;
        		$body = $state;
        		$headers = 'From: '.$from_name.' <'.$emailFrom.'>' . "\r\n" . 'Reply-To: ' . $emailFrom;
        		wp_mail($emailTo, $subject, $body, $headers);
        		$emailSent = true;
        	}

        } ?>
        <?php if(isset($emailSent) && $emailSent == true) { ?>
          <div class="thanks">
          	<p>Thanks, your email was sent successfully.</p>
          </div>
        <?php } else { ?>

          <form id="giving_form" class="giving_email" action="<?php the_permalink(); ?>" method="post" accept-charset="utf-8">

            <label class="control-label" for="to_name">To:</label>
            <input class="span3 required requiredField" type="text" name="to_name" value="<?php if(isset($_POST['to_name']))  echo $_POST['to_name'];?>" id="to_name" placeholder="Name">
            <?php if($to_nameError != '') { ?>
        			<span class="error"><?=$to_nameError;?></span>
        		<?php } ?>
            
            <label class="control-label" for="to_address">E-mail:</label>
            <input class="span3 required requiredField email" type="text" name="to_address" value="<?php if(isset($_POST['to_address'])) echo $_POST['to_address'];?>" id="to_address" placeholder="example@example.com">
            <?php if($to_addressError != '') { ?>
        			<span class="error"><?=$to_addressError;?></span>
        		<?php } ?>
          		
          		
            <?php if(isset($_POST['giving_message'])) {
              if (function_exists('stripslashes')) {
                echo stripslashes($_POST['giving_message']);
              } else {
                echo $_POST['giving_message'];
              }
            }?>
            
            <label for="giving_message">Message:</label>
            <textarea class="required requiredField giving_message" name="giving_message" rows="8" cols="40"><?php if(isset($_POST['giving_message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['giving_message']); } else { echo $_POST['giving_message']; } } ?></textarea>
            <?php if($giving_messageError != '') { ?>
        			<span class="error"><?=$giving_messageError;?></span>
        		<?php } ?>
        		
        		<label class="" for="from_name">From:</label>
        		<input type="text" name="from_name" value="<?php if(isset($_POST['from_name'])) echo $_POST['from_name'];?>" class="span3 required requiredField" id="from_name" placeholder="Your name">
        		<?php if($from_nameError != '') { ?>
        			<span class="error"><?=$from_nameError;?></span>
        		<?php } ?>

            <input class="send btn btn-primary" type="submit" value="Send It">
            <input type="hidden" name="submitted" id="submitted" value="true" />
          </form>
        <?php } ?>
      </div>
      
      <div class="span7 well emailthanks">
        <h3>Whooosh, Your E-mail Sent!</h3>
        <p>Thank you for taking the time to share our campaign with your friends.</p>
        <button class="emailagain btn btn-info btn-large">Send Another</button>
      </div>
    </div>
    
    <div class="row">
      <!-- Begin MailChimp Signup Form -->
      <div id="mc_embed_signup" class="span7 well">
        <form action="http://maplestreetschool.us4.list-manage2.com/subscribe/post?u=b96672a97a269ad6c4c6dc182&amp;id=d07be67df4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="form-horizontal validate" target="_blank" novalidate>
        	<label for="mce-EMAIL">Subscribe to our mailing list</label>
        	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
        	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-primary">
        </form>
      </div>
      <!--End mc_embed_signup-->
    </div>
 	</div><!-- .row -->
 	
</div>
</section>



<section id="giving-opts" class="banner alt">
	<div class="container">
	  <div class="row">
	    <div class="span4">
	      <h3>More Information</h3>
	    </div>
	  </div>
	  <div class="row">
	    <div class="span7">
	      <p><strong>Send a check to:</strong><br />
	        <p class="well">
            <strong>Little Friends Campaign</strong><br />
            21 Lincoln Rd.<br />
            Brooklyn, NY 11225<br /><br />
            <em>Payable to Maple Street School</em></p>
      </div>
	  </div><!-- .row -->
	  <div class="row">
	    <div class="span7">
	      <p><strong>Matching Gifts</strong></p>
	      
	      <p>Matching gifts are a great way to double or even triple the impact of your donation. Ask your employer's personnel or human resources department for matching gift instructions, or <a href="http://maplestreetschool.org/wp/wp-content/uploads/2012/12/Matching_Gift_Programs_Companies.pdf" title="Matching gift Programs">click here for a list of companies that have matching gift programs</a>.</p>
	      <p>Check with your employer's personnel or human resources department for more information.</p>
				<p>If you'd like help navigating the process, send an e-mail to <a target="new" href="mailto:&#x64;&#x6F;&#x6E;&#x61;&#x74;&#x65;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">donate@maplestreetschool.org</a> and our dedicated matching gifts consultant will get back to you.</p>
      </div>
	  </div><!-- .row -->
	  <div class="row">
	    <div class="span7">
        <p><strong>Other Ways to Give</strong></p>
        <p>Once you've contributed to the Little Friends Campaign please consider supporting Maple Street School every time you shop on Amazon. Our Giving App automatically donates 4-6% of the purchase price to Maple Street at no cost to you. <a href="http://maplestreetschool.org/maple-street-giving-app/" title="Maple Street Giving App |  Maple Street School | Brooklyn's Cooperative Pre-school">Learn more »</a></p>
      </div>
	  </div><!-- .row -->

  </div>
</section>


<?php get_footer(); ?>