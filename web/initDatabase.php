<?php
  require('../vendor/autoload.php');

    $command = escapeshellcmd('python ./models/train.py');
    $output = shell_exec($command);
    $array = explode('\'', $output);

?>