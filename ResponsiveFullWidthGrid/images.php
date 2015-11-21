<?php
$url_image='https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=77ba63794367be8f4b47e1b9fb7b9a3d&text=maheshbabu&per_page=10';
$xml_image=simplexml_load_file($url_image);
$value_id=$xml_image->photos->photo["id"];
$value_secret=$xml_image->photos->photo["secret"];
$value_server=$xml_image->photos->photo["server"];
$value_farm=$xml_image->photos->photo["farm"];
$value_id=$xml_image->photos->photo["id"];

?>