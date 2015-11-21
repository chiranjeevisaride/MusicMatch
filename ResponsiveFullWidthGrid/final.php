<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Juizy Slideshow - Full CSS3/HTML5 slideshow</title>
	
	<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="styles.css" />

	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="engine0/style.css" />
	<script type="text/javascript" src="engine0/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section --></head>
<body>
	
	<span id="sl_play" class="sl_command">&nbsp;</span>
	<span id="sl_pause" class="sl_command">&nbsp;</span>
	<span id="sl_i1" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i2" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i3" class="sl_command sl_i">&nbsp;</span>
	<span id="sl_i4" class="sl_command sl_i">&nbsp;</span>
	
	<h2 class="sread">The slideshow</h2>
	<div class="lyrics" style=" color:#FFF;  font-family:Verdana, Geneva, sans-serif;margin-top:30px;margin-bottom:20px;"><hr />
    
<?php

$id=$_GET["trackid"];

// To get lyrics
$url="http://api.musixmatch.com/ws/1.1/track.lyrics.get?apikey=76bda465128468ccea51f3ad58f3fcdd&track_id=".$id."&format=xml";
$xml=simplexml_load_file($url);
$value=(string) $xml->body->lyrics->lyrics_body;

print_r($value);
;



//to get meaning
require_once 'alchemyapi_php-master/alchemyapi.php';
    $alchemyapi = new AlchemyAPI();
	
	$response = $alchemyapi->keywords('text', "$value", array('sentiment'=>1));
    

?>

<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
	<div id="wowslider-container0">
	<div class="ws_images"><ul>
		
	
	

	
<?php
$i=0;
foreach ($response['keywords'] as $keyword) {
        
     
	//displaying images
$url_image='https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=77ba63794367be8f4b47e1b9fb7b9a3d&text='.$keyword['text'].'&per_page=10';
$xml_image=simplexml_load_file($url_image);
$value_id=$xml_image->photos->photo["id"];
$value_secret=$xml_image->photos->photo["secret"];
$value_server=$xml_image->photos->photo["server"];
$value_farm=$xml_image->photos->photo["farm"];
$value_id=$xml_image->photos->photo["id"];
echo '<li>';
echo '<img src=https://farm'.$value_farm.'.staticflickr.com/'.$value_server.'/'.$value_id.'_'.$value_secret.'.jpg id="wows0_'.$i.'"/>';
echo '</li>';
$i++;


}
 ?> 
 <li><a href="http://wowslider.com"><img src="data0/images/dummy640x3103.jpg" alt="wow slider" title="dummy-640x310-3" id="wows0_8"/></a></li>
		<li><img src="data0/images/dummy640x3104.jpg" alt="dummy-640x310-4" title="dummy-640x310-4" id="wows0_9"/></li>
   
</ul></div> 
<div class="ws_bullets"><div>
 <?php
foreach ($response['keywords'] as $keyword) {
        //displaying images
$url_image='https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=77ba63794367be8f4b47e1b9fb7b9a3d&text='.$keyword['text'].'&per_page=10';
$xml_image=simplexml_load_file($url_image);
$value_id=$xml_image->photos->photo["id"];
$value_secret=$xml_image->photos->photo["secret"];
$value_server=$xml_image->photos->photo["server"];
$value_farm=$xml_image->photos->photo["farm"];
$value_id=$xml_image->photos->photo["id"];



	echo'	<a href="#" ><span><img src="';
	echo 'https://farm'.$value_farm.'.staticflickr.com/'.$value_server.'/'.$value_id.'_'.$value_secret.'.jpg';
	echo '"/>1</span></a>';


}
 ?>  
        
        
</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">bootstrap carousel</a> by WOWSlider.com v8.6</div>
	<div class="ws_shadow"></div>
	</div>	
	<script type="text/javascript" src="engine0/wowslider.js"></script>
	<script type="text/javascript" src="engine0/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
 </body>
</html> 