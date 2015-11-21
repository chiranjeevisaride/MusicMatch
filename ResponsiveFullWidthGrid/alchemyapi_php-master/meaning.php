<?php
    require_once 'alchemyapi.php';
    $alchemyapi = new AlchemyAPI();
	
	$response = $alchemyapi->keywords('text', "Oh, love of mine
With a song and a whine
You're harsh and divine
Like truths and a lie

But the tale ends not here
I have nothing to fear
For my love is yell of giving and hold on

And the bright emptiness
In a room full of it
Is a cruel mistress
Whoa oh!", array('sentiment'=>1));
    foreach ($response['keywords'] as $keyword) {
        echo $keyword['text'], PHP_EOL;
        echo "<br />";
	}
?>