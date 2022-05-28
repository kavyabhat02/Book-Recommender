<?php
  require('../vendor/autoload.php');

  use Kreait\Firebase\Factory;
  use Kreait\Firebase\Contract\Auth;
  $factory = (new Factory)
    ->withServiceAccount('bookbuddy-d0ee9-firebase-adminsdk-t1x7z-cae16e7b9a.json')
    ->withDatabaseUri('https://bookbuddy-d0ee9-default-rtdb.firebaseio.com/');
  
  $database = $factory->createDatabase();

  $auth = $factory->createAuth();
?>
