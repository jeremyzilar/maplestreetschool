<?php
// Template Name: Register with Ajax
?>

<?php get_header(); ?>

<section id="register">
	<div class="container">
    <div class="span12">
      <?php
        if(defined('DOING_AJAX')){
      ?>
        <div id="output">

        </div>
      <?php
        }
      ?>
      
      
      
      <!-- REGISTRATION FORM STARTS HERE -->

      <div class="row">
      	<form id="newuser" class="form-horizontal user-forms" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
          
      	  <fieldset>
      	    <legend>Register</legend>
      	    <p>You are creating an account for yourself at Maple Street School.<br />
      	    Your partner/spouse should register separately.</p>

            <div class="control-group">
      			  <label class="control-label" for="user_login">Username</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="user_login" type="text" id="user_login" value="abcdefg" />
      			    <p class="help-block">Supporting help text</p>
      			  </div>
      			</div>


            <div class="control-group">
      			  <label class="control-label" for="first_name">First Name</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="first_name" type="text" id="first_name" value="ABC" />
      			  </div>
      			</div>

            <div class="control-group">
              <label class="control-label" for="last_name">Last Name</label>
              <div class="controls">
                <input class="input-xlarge" name="last_name" type="text" id="last_name" value="XYZ" />
              </div>
            </div>

            <input type="hidden" name="display_name" value="display_firstlast" />

      			<div class="control-group">
      			  <label class="control-label" for="user_email">E-mail</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="user_email" type="text" id="user_email" value="WWW@silencematters.com" />
      			    <p class="help-block">This is the address we'll send all Maple Street e-mail.</p>
      			  </div>
            </div>

            <div class="control-group">
      			  <label class="control-label" for="tel">Phone #</label>
      			  <div class="controls">
      			    <input class="span2 input-xlarge" name="tel" type="text" id="tel" value="555-555-5555" />
      			    <p class="help-block">555-555-5555</p>
      			  </div>
      			</div>

            <legend>MSS</legend>

            <div class="control-group">
      			  <label class="control-label" for="member_type">Member Type</label>
      			  <div class="controls">
      			    <select class="span2" name="state">
                	<option value="current_parent">current_parent</option>
                	<option value="staff">staff</option>
                	<option value="alumni">alumni</option>
                	<option value="current_student">current_student</option>
                </select>
      			  </div>
      			</div>

      			<div class="control-group">
      			  <label class="control-label" for="class">Current Class</label>
      			  <div class="controls">
      			    <select class="span2" name="state">
                	<option value="stars">Stars</option>
                	<option value="roots">Roots</option>
                	<option value="waves">Waves</option>
                </select>
      			  </div>
      			</div>

      			<div class="control-group">
      			  <label class="control-label" for="days">Days of the Week</label>
      			  <div class="controls">
      				  <label class="checkbox inline">
                  <input type="checkbox" id="monday_day" name="monday_day" value="monday">
                  Monday
                </label>
                <label class="checkbox inline">
                  <input type="checkbox" id="tuesday_day" name="tuesday_day" value="tuesday">
                  Tuesday
                </label>
                <label class="checkbox inline">
                  <input type="checkbox" id="wednesday_day" name="wednesday_day" value="wedsnesday">
                  Wednesday
                </label>
                <label class="checkbox inline">
                  <input type="checkbox" id="thursday_day" name="thursday_day" value="thursday">
                  Thursday
                </label>
                <label class="checkbox inline">
                  <input type="checkbox" id="friday_day" name="friday_day" value="friday">
                  Friday
                </label>
              </div>
            </div>

            <?php
              $current_year = date("Y");
              $child_year = strtotime ( '-4 year' , strtotime( $current_year ));
              $child_year = date('Y', $child_year);
            ?>
            <div class="control-group">
      			  <label class="control-label" for="birthday">Birthday</label>
      			  <div class="controls input-append date" data-date="01-01-<?php echo $child_year; ?>" data-date-format="dd-mm-yyyy">
      			    <input type="text" class="span2 input-xlarge" name="birthday" value="01-01-<?php echo $child_year; ?>" id="bday">
      			    <span class="add-on"><i class="icon-th"></i></span>
      			    <p class="help-block">?</p>
      			  </div>
      			</div>


      			<legend>Mailing Address</legend>

      			<div class="control-group">
      			  <label class="control-label" for="street_address">Street Address / Apt #</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="street_address" type="text" id="street_address" value="555 Lincoln Rd. Apt 6A" />
      			    <p class="help-block"><em>555 Lincoln Rd. Apt 6A</em></p>
      			  </div>
      			</div>

      			<div class="control-group">
      			  <label class="control-label" for="locality">City</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="locality" type="text" id="locality" value="Brooklyn" />
      			    <p class="help-block">Supporting help text</p>
      			  </div>
      			</div>

      			<div class="control-group">
      			  <label class="control-label" for="region">State</label>
      			  <div class="controls">
      			    <select name="state">
                	<option value="AL">Alabama</option>
                	<option value="AK">Alaska</option>
                	<option value="AZ">Arizona</option>
                	<option value="AR">Arkansas</option>
                	<option value="CA">California</option>
                	<option value="CO">Colorado</option>
                	<option value="CT">Connecticut</option>
                	<option value="DE">Delaware</option>
                	<option value="DC">District of Columbia</option>
                	<option value="FL">Florida</option>
                	<option value="GA">Georgia</option>
                	<option value="HI">Hawaii</option>
                	<option value="ID">Idaho</option>
                	<option value="IL">Illinois</option>
                	<option value="IN">Indiana</option>
                	<option value="IA">Iowa</option>
                	<option value="KS">Kansas</option>
                	<option value="KY">Kentucky</option>
                	<option value="LA">Louisiana</option>
                	<option value="ME">Maine</option>
                	<option value="MD">Maryland</option>
                	<option value="MA">Massachusetts</option>
                	<option value="MI">Michigan</option>
                	<option value="MN">Minnesota</option>
                	<option value="MS">Mississippi</option>
                	<option value="MO">Missouri</option>
                	<option value="MT">Montana</option>
                	<option value="NE">Nebraska</option>
                	<option value="NV">Nevada</option>
                	<option value="NH">New Hampshire</option>
                	<option value="NJ">New Jersey</option>
                	<option value="NM">New Mexico</option>
                	<option value="NY" selected="selected">New York</option>
                	<option value="NC">North Carolina</option>
                	<option value="ND">North Dakota</option>
                	<option value="OH">Ohio</option>
                	<option value="OK">Oklahoma</option>
                	<option value="OR">Oregon</option>
                	<option value="PA">Pennsylvania</option>
                	<option value="RI">Rhode Island</option>
                	<option value="SC">South Carolina</option>
                	<option value="SD">South Dakota</option>
                	<option value="TN">Tennessee</option>
                	<option value="TX">Texas</option>
                	<option value="UT">Utah</option>
                	<option value="VT">Vermont</option>
                	<option value="VA">Virginia</option>
                	<option value="WA">Washington</option>
                	<option value="WV">West Virginia</option>
                	<option value="WI">Wisconsin</option>
                	<option value="WY">Wyoming</option>
                </select>
      			    <p class="help-block">Supporting help text</p>
      			  </div>
      			</div>

            <div class="control-group">
      			  <label class="control-label" for="postal_code">Postal Code</label>
      			  <div class="controls">
      			    <input class="span1 input-xlarge" name="postal_code" type="text" id="postal_code" value="11225" />
      			  </div>
      			</div>

            <legend>Profile</legend>

            <div class="control-group">
      			  <label class="control-label" for="description">Tell us about yourself</label>
      			  <div class="controls">
      			    <textarea class="input-xlarge" name="description" id="description" rows="5" cols="30"></textarea>
      			    <p class="help-block">Supporting help text</p>
              </div>
            </div>

            <div class="control-group">
      			  <label class="control-label" for="website">Personal Website</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="website" type="text" id="website" value="" />
      			    <p class="help-block">http://example.com</p>
      			  </div>
      			</div>

            <div class="control-group">
      			  <label class="control-label" for="twitter">Twitter</label>
      			  <div class="controls">
      			    <div class="input-prepend">
                  <span class="add-on">@</span>
                  <input class="span2 input-xlarge" name="twitter" type="text" id="twitter" value="" />
                </div>
      			    <p class="help-block">Your Twitter username</p>
      			  </div>
      			</div>

      			<div class="control-group">
      			  <label class="control-label" for="facebook">Facebook</label>
      			  <div class="controls">
      			    <input class="input-xlarge" name="facebook" type="text" id="facebook" value="" />
      			    <p class="help-block">http://facebook.com/your.name</p>
      			  </div>
      			</div>

            <?php do_action('register_form'); ?>
            <div class="control-group">
              <button name="register" class="btn btn-primary" type="submit" id="register" value="Register">Register</button>
            </div>
          </fieldset>
      	</form><!-- #newuser -->
      </div> <!-- end row -->

      <!-- REGISTER FORM ENDS HERE -->
      
      
    </div> <!-- end span12 -->
	</div><!-- #container -->
</section>

<?php get_footer(); ?>