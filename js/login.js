// login bar
$('.login-submit #wp-submit').addClass('btn btn-info');

$('.login').toggle( function(){
  $('.login-bar').animate({
    marginTop: '0'
  }, 200);
 $('.login-bar .login').addClass('hide').html('Close <span>×</span>');
}, function() {
  $('.login-bar').animate({
    marginTop: '-227px'
  }, 200);     
  $(this).removeClass('hide').html('Log in');

});