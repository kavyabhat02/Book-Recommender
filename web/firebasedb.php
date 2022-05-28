<?php
  require __DIR__."/../vendor/autoload.php";

  use Kreait\Firebase\Factory;
  use Kreait\Firebase\Contract\Auth;
  $factory = (new Factory())->withServiceAccount(__DIR__.'/bookbuddy-d0ee9-firebase-adminsdk-t1x7z-cae16e7b9a.json');
  $auth = $factory->createAuth();
?>
