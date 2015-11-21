<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blueprint: Responsive Full Width Grid</title>
		<meta name="description" content="Blueprint: Responsive Full Width Grid Layout" />
		<meta name="keywords" content="100% grid, layout, columns, images, thumbnails, responsive, full width grid, image grid, css, jquery" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>Design to Feel</span>
				<h1>Music One</h1>
				<nav>
					<a href="../index.html" class="icon-arrow-left" data-info="Home">Previous Blueprint</a>
					<a href="http://tympanus.net/codrops/?p=14727" class="icon-drop" data-info="back to the Codrops article">back to the Codrops article</a>
				</nav>
			</header>	
			<ul class="cbp-rfgrid">
				 <!--<li><a href="#"><img src="images/cat.jpg" /><div><h3>Felis catus</h3></div></a></li> -->
				
                <?php

$name= $_GET["songName"];
$url="http://api.musixmatch.com/ws/1.1/track.search?apikey=76bda465128468ccea51f3ad58f3fcdd&q=$name&format=xml";
$xml=simplexml_load_file($url);
$i=0;
$countOf= $xml->body->track_list->track->count();
function remote_file_exists($url){
   return(bool)preg_match('~HTTP/1\.\d\s+200\s+OK~', @current(get_headers($url)));
} 
while($i <= $countOf-1)
{
	  $trackid=(string) $xml->body->track_list->track[$i]->track_id;
	   $trackname=(string) $xml->body->track_list->track[$i]->track_name;
	   $trackimage=(string) $xml->body->track_list->track[$i]->album_coverart_350x350;
	  if(remote_file_exists($trackimage)){
        echo '<li><a href="final.php?trackid=';echo $trackid; echo '"><img src="'; echo $trackimage; echo '" onerror="this.src=images/No.png" "/><div><h3>';
		  echo 	$trackname;echo '</h3></div></a></li>';  
    }
     
		   
         
   
   $i++;
}


?>
                
                
                
			</ul>
		</div>
	</body>
</html>
