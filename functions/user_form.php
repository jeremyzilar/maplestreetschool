<div class="row">
	<form method="post" id="adduser" class="form-horizontal user-forms span7" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
	  
	  <fieldset>
	    
      <legend>Welcome</legend>
      
      <div class="alert">
        At the moment, we are only accepting current 2012-13 parents as members.
      </div>
	    
	    
	    
      

    </fieldset>
	  
	  
	  <fieldset>
	    <legend>Create Your Account</legend>
      <div class="message alert "><strong>Each parent is required to create a separate account.</strong><br /> This helps us with our records and ensures that you are able to receive communication about your child's life at school.</div>
      
      <div class="control-group">
			  <label class="control-label" for="first_name">First Name</label>
			  <div class="controls">
			    <input class="input-xlarge" name="first_name" type="text" id="first_name" value="<?php echo $_POST['first_name']; ?>" />
			  </div>
			</div>
      
      <div class="control-group">
        <label class="control-label" for="last_name"><?php _e('Last Name'); ?></label>
        <div class="controls">
          <input class="input-xlarge" name="last_name" type="text" id="last_name" value="<?php if ( $error ) echo wp_specialchars( $_POST['last_name'], 1 ); ?>" />
        </div>
      </div>
      
      <div class="control-group">
			  <label class="control-label" for="user_email">E-mail</label>
			  <div class="controls">
			    <input class="input-xlarge" name="user_email" type="text" id="user_email" value="<?php if ( $error ) echo wp_specialchars( $_POST['user_email'], 1 ); ?>" />
			    <p class="help-block">Must be a valid e-mail where we can reach you.<br />Only parents and teachers who are logged in to maplestreetschol.org will be able to see your e-mail.</p>
			  </div>
      </div>
	     
	    <div class="control-group">
			  <label class="control-label" for="passwd">Password</label>
			  <div class="controls">
			    <input class="input-xlarge" name="passwd" type="password" id="passwd"/>
          <p class="help-block">Use at least 8 characters</p>
			  </div>
      </div>
      
      <div class="control-group">
			  <label class="control-label" for="passwd2">Confirm Password</label>
			  <div class="controls">
			    <input class="input-xlarge" name="passwd2" type="password" id="passwd2" value="" />
			  </div>
      </div>
	    
      <!-- Username -->
			<input class="input-xlarge" name="username" type="hidden" id="username" value="<?php if ( $error ) echo wp_specialchars( $_POST['username'], 1 ); ?>" />
			
    </fieldset>
	  
	  
	  <fieldset>
			
			<legend>Contact Info</legend>
			
			<div class="message alert ">Your contact information will only be used for administration purposes and occasional mailings.</div>
			
			<div class="control-group">
			  <label class="control-label" for="tel">Primary Phone #</label>
			  <div class="controls">
			    <input class="span2 input-xlarge" name="tel" type="text" id="tel" value="<?php if ( $error ) echo wp_specialchars( $_POST['tel'], 1 ); ?>" />
			    <p class="help-block">718-555-1234</p>
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="wktel">Work Phone #</label>
			  <div class="controls">
			    <input class="span2 input-xlarge" name="wktel" type="text" id="wktel" value="<?php if ( $error ) echo wp_specialchars( $_POST['wktel'], 1 ); ?>" />
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="street_address">Street Address</label>
			  <div class="controls">
			    <input class="input-xlarge" name="street_address" type="text" id="street_address" value="<?php if ( $error ) echo wp_specialchars( $_POST['street_address'], 1 ); ?>" />
			    <p class="help-block"><em>555 Lincoln Rd. Apt 6A</em></p>
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="locality">City</label>
			  <div class="controls">
			    <input class="input-xlarge" name="locality" type="text" id="locality" value="Brooklyn" />
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="region"><?php _e('State'); ?></label>
			  <div class="controls">
			    <select name="region">
			      <?php foreach (get_regions() as $key => $value): ?>
			        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			      <?php endforeach ?>
          </select>
			  </div>
			</div>

      <div class="control-group">
			  <label class="control-label" for="postal_code"><?php _e('Zip'); ?></label>
			  <div class="controls">
			    <input class="span1 input-xlarge" name="postal_code" type="text" id="postal_code" value="<?php if ( $error ) echo wp_specialchars( $_POST['postal_code'], 1 ); ?>" />
			  </div>
			</div>
    </fieldset>
	  
		<?php
    // Admins & Staff ONLY
		?>
			
		<?php if (is_user_logged_in() && current_user_can('add_users')) { ?>
		<fieldset>
      <legend>Member Information</legend>
      
      <div class="control-group">
			  <label class="control-label" for="member_type"><?php _e('Member Type'); ?></label>
			  <div class="controls">
			    <select class="span2" name="member_type">
          	<option value="current_parent">current_parent</option>
          	<option value="staff">staff</option>
          	<option value="alumni">alumni</option>
          	<option value="current_student">current_student</option>
          </select>
			  </div>
			</div>
			
			<div class="control-group">
			  <label class="control-label" for="days">Committee</label>
			  <div class="controls">
			    <?php $committee = get_the_author_meta('committee', $user->ID ); ?>
			    <?php foreach (get_committees() as $key => $value): ?>
			      <label class="checkbox">
              <input type="checkbox" name="committee[]" id="<?php echo $key; ?>" value="<?php echo $key; ?>" <?php if (is_array($committee)) { if (in_array($key, $committee)) { ?>checked="checked"<?php } }?>>
              <?php echo $value; ?>
            </label>
		      <?php endforeach ?>
        </div>
      </div>
    </fieldset>
	  
	  
	  <fieldset>
      <legend>Student Information</legend>
			
			<div class="control-group">
			  <label class="control-label" for="class">Current Class</label>
			  <div class="controls">
			    <select class="span2" name="class">
          	<?php $class = get_the_author_meta('class', $user->ID ); ?>
  			    <?php foreach (get_classes() as $key => $value): ?>
  		        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
  		      <?php endforeach ?>
          </select>
			  </div>
			</div>
			
			
			<div class="control-group">
			  <label class="control-label" for="days">Days of the Week</label>
			  <div class="controls">
			    <?php $days = get_the_author_meta('days', $user->ID ); ?>
			    <?php foreach (get_weekdays() as $key => $value): ?>
			      <label class="checkbox inline">
              <input type="checkbox" name="days[]" id="<?php echo $key; ?>_day" value="<?php echo $key; ?>" <?php if (is_array($days)) { if (in_array($key, $days)) { ?>checked="checked"<?php } }?>>
              <?php echo $value; ?>
            </label>
		      <?php endforeach ?>
        </div>
      </div>
      
      
      <?php
        $current_year = date("Y");
        $child_year = strtotime ( '-4 year' , strtotime( $current_year ));
        $child_year = date('Y', $child_year);
      ?>
      <div class="control-group">
			  <label class="control-label" for="birthday"><?php _e('Birthday'); ?></label>
			  <div class="controls input-append date" data-date="01-01-<?php echo $child_year; ?>" data-date-format="dd-mm-yyyy">
			    <input type="text" class="span2 input-xlarge" name="birthday" value="01-01-<?php echo $child_year; ?>" id="bday">
			    <span class="add-on"><i class="icon-th"></i></span>
			    <p class="help-block">?</p>
			  </div>
			</div>
			
    <?php } ?>

    <fieldset>
      <legend>Submit</legend>
      <!-- Hidden Fields -->
      <input type="hidden" name="display_name" value="display_firstlast" />
      
      
      <div id="profile" class="span7">
        
        <div class="message alert">
          Please check that your information is correct:
        </div>
        <br clear="all" />
        
        <div class="p_info">

          <p class="p_name"><span id="p_first_name"></span> <span id="p_last_name"></span></p>
          
          <p><span id="p_user_email"></span></p>
          <p class="help-block">You will use this e-mail address to log in.</p>

          <p><label for="p_passwd">Password</label>
          <p><span id="p_passwd"></span></p>
          <p class="help-block">Your password will e-mailed to you for safe keeping</p>
          
          <p><span id="p_tel"></span></p>
          <p class="help-block">Primary Phone</p>
          <p><span id="p_wktel"></span></p>
          <p class="help-block">Work</p>
          
          <p id="address"><span id="p_street_address"></span><br /><span id="p_locality"></span>, <span id="p_region"></span><br /><span id="p_postal_code"></span></p>
        </div><!-- .p_info -->

      </div><!-- #infoPreview -->
      
      
      <div class="control-group">
			  <?php do_action('register_form'); ?>
			  <?php if (is_user_logged_in()) { ?>
          <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update'); ?>" />
        	<?php wp_nonce_field('update-user') ?>
        	<input name="action" type="hidden" id="action" value="update-user" />
			  <?php } else { ?>
			    
			    <input name="regi" type="submit" id="register" class="submit button btn btn-large btn-primary" value="<?php if ( current_user_can( 'create_users' ) ) _e('Add User'); else _e('Register'); ?>" />
			    
  			  <?php wp_nonce_field( 'adduser' ) ?>
  			  <input name="action" type="hidden" id="action" value="adduser" />
			  <?php } ?>
      </div>
			
			
    </fieldset>
    
    <p class="help">Trouble registering? Send us an e-mail: <a href="mailto:&#x6D;&#x65;&#x6D;&#x62;&#x65;&#x72;&#x73;&#x68;&#x69;&#x70;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;"><em>membership@maplestreetschool.org</em></a></p>
    
	</form><!-- #adduser -->
	
	
	<div id="thanks" class="span7">
	 <h2>Thank you!</h2>
	 <p>We will send you an e-mail at <span id="receipt_email"></span> when your membership has been approved. It should not take long.<br />Questions? E-mail: <a href="mailto:&#x6D;&#x65;&#x6D;&#x62;&#x65;&#x72;&#x73;&#x68;&#x69;&#x70;&#x40;&#x6D;&#x61;&#x70;&#x6C;&#x65;&#x73;&#x74;&#x72;&#x65;&#x65;&#x74;&#x73;&#x63;&#x68;&#x6F;&#x6F;&#x6C;&#x2E;&#x6F;&#x72;&#x67;">membership@maplestreetschool.org</a>.<br /><br />
	   <a href="http://maplestreetschool.org" title="The Maple Street School">http://maplestreetschool.org</a></p>
	</div>
	
	
	
</div> <!-- end row -->