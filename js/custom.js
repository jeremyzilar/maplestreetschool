(function($){
  jQuery(document).ready(function() {

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
  $("#roster").tablesorter(); 
  
  function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
  }

  var donate_amt = $('.donate_amt').text();
  $('.donate_amt').html(commaSeparateNumber(donate_amt));
  
  var donate_total = $('.donate_total').text();
  $('.donate_total').html(commaSeparateNumber(donate_total));
  
  var message = "We love our wonderful preschool and want to share an amazing video with you to show you why it's such a special place. \n\nThis video was made to support Maple Street School's Little Friends Campaign.  Please take a moment to watch it and make a donation. \n\nEvery dollar raised goes to support tuition assistance, ensuring that Maple Street School remains an affordable preschool for families from all walks of life. \n\nDonate today: http://maplestreetschool.org/donations/\n\n";

  $("#giving_form .giving_message").html(message);
  $("#giving_form").validate({
    submitHandler: function(form) {
      $(form).ajaxSubmit();
      $('.emailsend').hide();
      $('.emailthanks').show();
      $(form).resetForm();
    }
  });
  $('.emailagain').click(function(e){
    $('.emailthanks').hide();
    $('.emailsend').show();
  });  
  
  $('#faq_btn').click(function(e){
    $(this).hide();
    $('#faq').show(300);
    $('html, body').animate({
      scrollTop: $("#faq").offset().top - 20
    }, 900);
    e.preventDefault();
  });

  $('.giving-opts-btn').click(function(e){
    $('html, body').animate({
      scrollTop: $("#giving-opts").offset().top - 20
    }, 900);
    e.preventDefault();
  });
  
  $('#social-btn').click(function(e){
    $('html, body').animate({
      scrollTop: $("#social").offset().top - 20
    }, 900);
    e.preventDefault();
  });


  $('#classifieds .container .ads').masonry({
    itemSelector: '.ad',
    gutterWidth: 20
  });
  
  
  
  // MASONRY for Photos page
  var allphotos = $('.mssphotos img').imagesLoaded();
  // Always
  allphotos.always( function(){
    console.log( 'all images has finished with loading, do some stuff...' );
  });

  // Resolved
  allphotos.done( function( $images ){
    // callback provides one argument:
    // $images: the jQuery object with all images
    $('.mssphotos').masonry({
      itemSelector: '.photo',
      gutterWidth: 20
    });
  });

  // Make Circle Images
  // Circle Images
  var dfd = $('.circle img, .pog img').imagesLoaded(); // save a deferred object

  // Always
  dfd.always( function(){
    console.log( 'Circle images has finished with loading, do some stuff...' );
  });

  // Resolved
  dfd.done( function( $images ){
    // callback provides one argument:
    // $images: the jQuery object with all images
    var img = $images;
    $.each(img, function(i,c) {
      console.log(c.src);
      $(this).wrap(function(){
        return '<span class="image-wrap ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
      });
      $(this).css("opacity","0");
    });
    console.log( 'deferred is resolved with ' + $images.length + ' properly loaded images' );
  });

  // Rejected
  dfd.fail( function( $images, $proper, $broken ){
    // callback provides three arguments:
    // $images: the jQuery object with all images
    // $proper: the jQuery object with properly loaded images
    // $broken: the jQuery object with broken images
    console.log( 'deferred is rejected with ' + $broken.length + ' out of ' + $images.length + ' images broken' );
  });

  // Notified
  dfd.progress( function( isBroken, $images, $proper, $broken ){
    // function scope (this) is a jQuery object with image that has just finished loading
    // callback provides four arguments:
    // isBroken: boolean value of whether the loaded image (this) is broken
    // $images:  jQuery object with all images in set
    
    // $proper:  jQuery object with properly loaded images so far
    // $broken:  jQuery object with broken images so far
    console.log( 'Loading progress: ' + ( $proper.length + $broken.length ) + ' out of ' + $images.length );
  });


});


$(document).ready(function () {
  // <span class="pflag" rel="popover" data-content="And here's some amazing content. It's very engaging. right?" data-original-title="A Title">This page is <span class="label label-important">Staff Only</span></span>
  $('.pflag').popover();  

});

$('#sidenav li').scrollspy();


// fix sub nav on scroll
var $win = $(window)
  , $nav = $('.subnav')
  , navTop = $('.subnav').length && $('.subnav').offset().top - 23
  , isFixed = 0

processScroll()

$win.on('scroll', processScroll)

function processScroll() {
  var i, scrollTop = $win.scrollTop()
  if (scrollTop >= navTop && !isFixed) {
    isFixed = 1
    $nav.addClass('subnav-fixed')
  } else if (scrollTop <= navTop && isFixed) {
    isFixed = 0
    $nav.removeClass('subnav-fixed')
  }
};



// Fix Side Nav on Scroll
// http://jqueryfordesigners.com/fixed-floating-elements/
$(document).ready(function () { 
  if ($('#sidenav').length != 0) {
    var top = $('#sidenav').offset().top - (parseFloat($('#sidenav').css('marginTop').replace(/auto/,0)) + 78);
    var bottom = $('#sidenav').offset().bottom - parseFloat($('#sidenav').css('marginTop').replace(/auto/,0) + 2000);
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
        $('#sidenav').addClass('fixed');
      } else {
        // otherwise remove it
        $('#sidenav').removeClass('fixed');
      }
    });
  }
});

$(document).ready(function () { 
  if ($('#dontateCard').length != 0) {
    var top = $('#dontateCard').offset().top - (parseFloat($('#dontateCard').css('marginTop').replace(/auto/,0)) + 45);
    var bottom = $('#dontateCard').offset().bottom - parseFloat($('#dontateCard').css('marginTop').replace(/auto/,0) + 5000);
    $(window).scroll(function (event) {
      // what the y position of the scroll is
      var y = $(this).scrollTop();

      // whether that's below the form
      if (y >= top) {
        // if so, ad the fixed class
        $('#dontateCard').addClass('fixed');
      } else {
        // otherwise remove it
        $('#dontateCard').removeClass('fixed');
      }
    });
  }
});

function truncate(element) {
  $(element + ' p').css({display: 'inline'});

  var theText = $(element).html();        // Original Text
  var item;                               // Current tag or text area being iterated
  var convertedText = '<span class="revealText">';    // String that will represent the finished result
  var limit = 240;                        // Max characters (though last word is retained in full)
  var counter = 0;                        // Track how far we've come (compared to limit)
  var lastTag;                            // Hold a reference to the last opening tag
  var lastOpenTags = [];                  // Stores an array of all opening tags (they get removed as tags are closed)
  var nowHiding = false;                  // Flag to set to show that we're now in the hiding phase

  theText = theText.replace(/[\s\n\r]{2,}/g, ' ');            // Consolidate multiple white-space characters down to one. (Otherwise the counter will count each of them.)
  theText = theText.replace(/(<[^<>]+>)/g,'|*|SPLITTER|*|$1|*|SPLITTER|*|');                      // Find all tags, and add a splitter to either side of them.
  theText = theText.replace(/(\|\*\|SPLITTER\|\*\|)(\s*)\|\*\|SPLITTER\|\*\|/g,'$1$2');           // Find consecutive splitters, and replace with one only.
  theText = theText.replace(/^[\s\t\r]*\|\*\|SPLITTER\|\*\||\|\*\|SPLITTER\|\*\|[\s\t\r]*$/g,''); // Get rid of unnecessary splitter (if any) at beginning and end.
  theText = theText.split(/\|\*\|SPLITTER\|\*\|/);            // Split theText where there's a splitter. Now we have an array of tags and words.

  for(var i in theText) {                                     // Iterate over the array of tags and words.
      item = theText[i];                                      // Store current iteration in a variable (for convenience)
      lastTag = lastOpenTags[lastOpenTags.length - 1];        // Store last opening tag in a variable (for convenience)
      if( !item.match(/<[^<>]+>/) ) {                         // If 'item' is not a tag, we have text
          if(lastTag && item.charAt(0) == ' ' && !lastTag[1].match(/span|SPAN/)) item = item.substr(1);   // Remove space from beginning of block elements (like IE does) to make results match cross browser
          if(!nowHiding) {                                        // If we haven't started hiding yet...
              counter += item.length;                             // Add length of text to counter.
              if(counter >= limit) {                              // If we're past the limit...
                  var length = item.length - 1;                   // Store the current item's length (minus one).
                  var position = (length) - (counter - limit);    // Get the position in the text where the limit landed.
                  while(position != length) {                     // As long as we haven't reached the end of the text...
                      if( !!item.charAt(position).match(/[\s\t\n]/) || position == length )   // Check if we have a space, or are at the end.
                          break;                                  // If so, break out of loop.
                      else position++;                            // Otherwise, increment position.
                  }
                  if(position != length) position--;
                  var closeTag = '', openTag = '';                // Initialize open and close tag for last tag.
                  if(lastTag) {                                   // If there was a last tag,
                      closeTag = '</' + lastTag[1] + '>';         // set the close tag to whatever the last tag was,
                      openTag = '<' + lastTag[1] + lastTag[2] + '>';  // and the open tag too.
                  }
                  // Create transition from revealed to hidden with the appropriate tags, and add it to our result string
                  var transition = '<span class="readMore"><span class="readMoreText">Read more »</span></span>' + closeTag + '</span><span class="hiddenText">' + openTag;
                  convertedText += (position == length)   ? (item).substr(0) + transition
                                                              : (item).substr(0,position + 1) + transition + (item).substr(position + 1).replace(/^\s/, '&nbsp;');
                  nowHiding = true;       // Now we're hiding.
                  continue;               // Break out of this iteration.
              }
          }
      } else {                                                // Item wasn't text. It was a tag.
          if(!item.match(/<br>|<BR>/)) {                      // If it is a <br /> tag, ignore it.
              if(!item.match(/\//)) {                         // If it is not a closing tag...
                  lastOpenTags.push(item.match(/<(\w+)(\s*[^>]*)>/));     // Store it as the most recent open tag we've found.
              } else {                                                    // If it is a closing tag.
                  if(item.match(/<\/(\w+)>/)[1] == lastOpenTags[lastOpenTags.length - 1][1]) {    // If the closing tag is a paired match with the last opening tag...
                      lastOpenTags.pop();                                                         // ...remove the last opening tag.
                  }
                  if(item.match(/<\/[pP]>/)) {            // Check if it is a closing </p> tag
                      convertedText += ('<span class="paragraphBreak"><br> <br> </span>');    // If so, add two line breaks to form paragraph
                  }
              }
          }
      }   
      convertedText += (item);            // Add the item to the result string.
  }
  convertedText += ('</span>');           // After iterating over all tags and text, close the hiddenText tag.
  $(element).html(convertedText);         // Update the container with the result.
}

truncate('.notes .entry'); 

$('.readMore').live('click', function(m) {
  var $hidden = $('.hiddenText');
  if($hidden.is(':hidden')) {
      $hidden.show();
      // $(this).insertAfter($('.notes .entry')).children('.readMoreText').text('Read less').siblings().hide();
      $('.readMore').hide();
  } else {
      $(this).appendTo($('.revealText')).children('.readMoreText').text(' Read more »').siblings().show();
      $hidden.hide();
      
  }
});

$('.readMore').click();



})(jQuery);