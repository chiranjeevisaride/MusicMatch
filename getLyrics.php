<?php
$url="http://api.musixmatch.com/ws/1.1/track.lyrics.get?apikey=76bda465128468ccea51f3ad58f3fcdd&track_id=15525091&format=xml";
$xml=simplexml_load_file($url);
$value=(string) $xml->body->lyrics->lyrics_body;

print_r($value);

?>