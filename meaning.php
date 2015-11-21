<?php
  $textapi = new AYLIEN/TextAPI("11f75ff4", "4dfb0c9fefe78e3cff91b200197a155f");
  
  $sentiment = $textapi->Sentiment(array(
    'text' => 'John is a very good football player!'
  ));
?>