(function($) {
  $(function() {
    console.log('ooooo');
    // Check to make sure the input box exists
    if( 0 < $('#birthday').length ) {
        $('#birthday').datepicker();
    } // end if

  });
}(jQuery));