<?php
//--------------------------------------//
// Writes a logger file with timestamp, IP, city, country of the visitor + the full url
// hence just use one clone for any subpage
// -- simply include this in any html/php that has visitors counts next to nothing
// 
// *Requires GeoPlugin class
// http://www.geoplugin.com/webservices/php
// *Requires file "track.log" in the same dir
// *trashit.php to set cron at: 
// <?php 	file_put_contents('track.log', " ", LOCK_EX); ?>
// to regularly empty out the logger
//
//--------------------------------------//



require_once('geoplugin.class.php');

//-----------------logger---------------//
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
$geoplugin = new geoPlugin();
$geoplugin->locate();
$ip = $geoplugin->ip;
$cit = $geoplugin->city;
$ctr = $geoplugin->countryName;
$timestamp = date('Y-m-d  H:i:s');
$curUrl = curPageURL();	
	file_put_contents('track.log', 
	 $curUrl . ": " . $timestamp . ", ".  $ip . ", ". $cit . ", ". $ctr . PHP_EOL 
	 . "--- break --- " . PHP_EOL, 
	FILE_APPEND | LOCK_EX);
//-----------------logger---------------//
?>
