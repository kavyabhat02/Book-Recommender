<?php
  require('../vendor/autoload.php');
// Create connection
// Localhost is the server name, 
// root is the username, 
// password is empty
// database name is gfg
$db = new mysqli('localhost', 'root', '', 'engage');
  
// Checking connection
if ($db->connect_errno) {
  echo "Failed " . $db->connect_error;
  exit();
}

  
        // Get csv file
        include('./html/recommendations.html');
        ?>

        <section class="blog_section layout_padding">
        <div class="row">

        <?php
        if(($handle = fopen("books.csv", 
                        "r")) !== FALSE) {
            $n = 1;
            while(($row = fgetcsv($handle)) 
                                !== FALSE) {
  
                // SQL query to store data in 
                // database our table name is
                // table2
                $db->query('INSERT INTO books 
                VALUES ("'.$row[0].'","'.$row[1].'",
                "'.$row[2].'", "'.$row[3].'", "'.$row[4].'", "'.$row[5].'",
                "'.$row[6].'", "'.$row[7].'", "'.$row[8].'")');
                }
              
                // Increment records
                $n++;
              
        // Closing the file
        fclose($handle);
    }

    $command = escapeshellcmd('python ./models/train.py');
    $output = shell_exec($command);
    $array = explode('\'', $output);

    ?>