$(window).bind('resize load', function(){
  var window_size = $(window).width();
  if ( window_size <= 640 ) {
    $("html").css("zoom" , window_size/320 );
  } else {
    $("html").css("zoom" , 1 );
  }
});
