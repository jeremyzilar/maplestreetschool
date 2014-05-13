// Register
/* Created by jankoatwarpspeed.com */
// http://www.jankoatwarpspeed.com/post/2009/09/28/webform-wizard-jquery.aspx
// http://www.jankoatwarpspeed.com/examples/webform_to_wizard/#

(function($) {
  $.fn.formToWizard = function(options) {
    options = $.extend({  
      submitButton: "registerUser",
      validationEnabled : true
    }, options); 
    
    var element = this;

    var steps = $(element).find("fieldset");
    var count = steps.size();
    var submmitButtonName = "#" + options.submitButton;
    $(submmitButtonName).hide();

    // 2
    $(element).before("<ul id='steps'></ul>");

    steps.each(function(i) {
      $(this).wrap("<div id='step" + i + "'></div>");
      var stpid = 'step' + i + 'commands';
      // $('.stepper').attr('id', stpid);
      $(this).append("<div id='"+stpid+"' class='stepper span7'></div>");

      // 2
      var name = $(this).find("legend").html();
      $("#steps").append("<li id='stepDesc" + i + "'><span>" + (i + 1) + "</span>" + name + "</li>");

      if (i == 0) {
        createNextButton(i);
        selectStep(i);
      }
      else if (i == count - 1) {
        $("#step" + i).hide();
        createPrevButton(i);
      }
      else {
        $("#step" + i).hide();
        createNextButton(i);
        createPrevButton(i);
      }
    });


    function createNextButton(i) {
      var stepName = "step" + i;
      $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Next' class='btn btn-large btn-primary next'>Next</a>");
      // var n = stepName + 'Next';
      // $("#" + stepName + "commands").append("<button name='"+n+"' id='" + n + "' class='btn btn-large btn-info next'>Next</button>");
      $("#" + stepName + "Next").bind("click", function(e) {
        e.preventDefault();
        if (options.validationEnabled) {
          var stepIsValid = true;
          $("#" + stepName + " :input").each( function(index) {
            var xy = element.validate().element(this);
            if(xy == undefined){
              xy = true; 
            }
            stepIsValid = xy && stepIsValid;
            
          });
          if (!stepIsValid) {
            return false;
          } else {
            $("#" + stepName).hide('fast');
            $("#step" + (i + 1)).show('fast');
            if (i + 2 == count) {
              $(submmitButtonName).show('fast');
            }
            selectStep(i + 1);
          }
          
        }
      });
    }
    
    function createPrevButton(i) {
      var stepName = "step" + i;
      $("#" + stepName + "commands").append("<a href='#' id='" + stepName + "Prev' class='btn prev'>Back</a>");
      // $("#" + stepName + "commands").append("<button id='" + stepName + "Prev' class='btn btn-mini prev'>Back</button>");

      $("#" + stepName + "Prev").bind("click", function(e) {
        e.preventDefault();
        $("#" + stepName).hide('fast');
        $("#step" + (i - 1)).show('fast');
        $(submmitButtonName).hide('fast');
        selectStep(i - 1);
      });
    }

    function selectStep(i) {
      $("#steps li").removeClass("current");
      $("#stepDesc" + i).addClass("current");
    }
    // $('.next').click(function(event) {
    //   event.preventDefault();
    // });
    
  }
    
})(jQuery);

$(document).ready(function () {
  $("#adduser").formToWizard();
  $("#registerBox #steps").fadeIn();
  $("#registerBox form").fadeIn('fast');
  
});



           


// Make username lowercase
// $("#username").keyup(function(){
//   $(this).val($(this).val().toLowerCase());
// });



// // jQuery Form Options
// var options = {
//   beforeSubmit:  validateForm,  // pre-submit callback 
//   clearForm: true,        // clear all form fields after successful submit 
//   resetForm: true        // reset the form after successful submit 
//   // success: showResponse   // post-submit callback 
// };
// 
// $('#adduser').ajaxForm(options);


// Get User Info
function get_usr(id, email){
  var usr;
  var data = {
    action: 'get_usr',
    usr: id,
    email: email
  };
  $.ajax({
    async: false,
    url: ajaxurl,
    type: 'POST',
    data: data,
    dataType: "text",
    success: function(usrData) {
      console.log(usrData);
    }
  });
}

// Checks E-mail for previously registered user
function chk_email(value){
  var usr;
  var response;
  var data = {
    action: 'chk_email',
    email: $('#user_email').val()
  };
  $.ajax({
    async: false,
    url: ajaxurl,
    type: 'POST',
    data: data,
    dataType: "text",
    success: function(msg) {
      console.log(msg);
      if (msg == '0') {
        response = true;
        
      } else{
        console.log(value);
        usr = get_usr(value);
        response = false;
      }
    }
  })
  // console.log(usr);
  console.log(response);
  return response;
}

// Register Form Validator
$.validator.addMethod('chk_email', chk_email, "This email address has already been registered");


// function validateForm(){
$("#adduser").validate({
  // debug: true,
  rules: {
    user_login: {
      required: true,
      minlength: 3,
      nowhitespace: true,
      alphanumeric: true
    },
    first_name: {
      required: true,
    },
    last_name: {
      required: true,
    },
    user_email: {
      required: true,
      email: true,
      nowhitespace: true,
      // remote: { url: ajaxurl, type: 'post' }
      chk_email: true
    },
    passwd: {
      required: true,
      minlength: 8,
    },
    passwd2: {
      required: true,
      equalTo: "#passwd",
      minlength: 5
    },
    tel: {
      required: true,
      phoneUS: true
    },
    street_address: {
      required: true
    },
    locality: {
      required: true
    },
    region: {
      required: true
    },
    postal_code: {
      required: true,
      minlength: 5,
      digits: true
    },
  },
  messages: {
    user_login: {
      required: "Required",
      user_login: "A username needs to be atleast 3 charachters long."
    },
    user_email: {
      required: "Are you sure this is right?",
      user_email: "Your email address must be in the format of name@domain.com",
      nowhitespace: "yeah"
    },
  },
  errorElement: 'span',
  errorClass: 'help-inline',
  errorPlacement: function(error, element) {
    error.insertAfter(element);
  },
  highlight: function(element) {
    var parent = $(element).parents('.control-group');
    $('.next').addClass('disabled');
    $(element).addClass('error');
    $(parent).addClass('error');
  },
  unhighlight: function(element) {
    var parent = $(element).parents('.control-group');
    $('.next').removeClass('disabled');
    $(element).removeClass('error');
    $(parent).removeClass('error');
  },

  submitHandler: function(form) {
    console.log(form);
    $(form).ajaxSubmit(function(){
      // target: "#result"
      
      
      var receipt_email = $('#p_user_email').text();
      console.log(receipt_email);
      $('#thanks #receipt_email').html(receipt_email);
      $('#registerBox #steps, #registerBox form').hide();
      $('#thanks').show();
      
      
      // alert("Thank you for registering!");
    });
    $(form).resetForm();
  }
});





// - - - - - - - - - - - - - - - - - - 

// Radio Buttons on forms
$(".radio input").click(function(){
  $('.radio').removeClass('focus');
  if($(this).is(":checked")){
    $(this).parent().addClass("focus");
  }
  
  // var member_type = $(this).attr('value');
  // $('#adduser').show('fast');
  // $('#memberPicker').hide('fast');
});


// Copy e-mail field to username field
// Requirement: A plugin that allows users to login with e-mail addresses
$('#user_email').blur(function() {
  var em = $('#user_email').val();
  $('#username').val(em);
});

$('#bday').datepicker({
	format: 'mm-dd-yyyy'
});


$('#tel').blur(function(i, t) {
  var t = $('#tel').val().replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, "$1-$2-$3");
  $(this).val(t);
});

$('#wktel').blur(function(i, t) {
  var t = $('#wktel').val().replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, "$1-$2-$3");
  $(this).val(t);
});


// Profile Prevew
$('#adduser input, #adduser select, #adduser .checkbox input').blur(function() {
  var name = $(this).attr('name');
  var val = $(this).val();
  console.log(name);
  console.log(val);
  // var line = '<p class="'+name+' itemPrev">'+val+'</p>';
  $('#profile #p_'+ name).html(val).show();
});





