<?php

$name= $_GET["songName"];
$url="http://api.musixmatch.com/ws/1.1/track.search?apikey=76bda465128468ccea51f3ad58f3fcdd&q=$name&format=xml";
$xml=simplexml_load_file($url);
$i=0;
$countOf= $xml->body->track_list->track->count();

while($i <= $countOf-1)
{
	  $trackid=(string) $xml->body->track_list->track[$i]->track_id;
   print_r($trackid);
   echo "<br />";
   $i++;
}


?>