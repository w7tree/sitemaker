<?php
function is_sp() {
  $useragents = array(
  'iPhone', // Apple iPhone
  'iPod', // Apple iPod touch
  'Android', // 1.5+ Android
  'dream', // Pre 1.5 Android
  'CUPCAKE', // 1.5+ Android
  'blackberry9500', // Storm
  'blackberry9530', // Storm
  'blackberry9520', // Storm v2
  'blackberry9550', // Storm v2
  'blackberry9800', // Torch
  'webOS', // Palm Pre Experimental
  'incognito', // Other iPhone browser
  'webmate' // Other iPhone browser
  );
  $pattern = '/'.implode('|', $useragents).'/i';
  return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

function is_lt_IE8() {
  $agent = getenv( "HTTP_USER_AGENT" );
  if ( mb_ereg("MSIE 6.0", $agent) ) {
    // echo $agent;
    // echo "<br />";
    // echo "MSIE 6.0";
    return true;
  }
  if ( mb_ereg("MSIE 7.0", $agent) ) {
    // echo $agent;
    // echo "<br />";
    // echo "MSIE 7.0";
    return true;
  }
  if ( mb_ereg("MSIE 8.0", $agent) ) {
    // echo $agent;
    // echo "<br />";
    // echo "MSIE 8.0";
    return true;
  }
  return false;
}
