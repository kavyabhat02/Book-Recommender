<?php
require('../vendor/autoload.php');
    $title = $_GET['title'];
    //$title = escapeshellarg($title);
    //echo $title;

    $db = new mysqli('localhost', 'root', '', 'engage');
  
    // Create connection 
    // Localhost is the server name, 
    // root is the username,  
    // password is empty
    // database name is gfg 
    // Checking connection 
    if ($db->connect_errno) {
      echo "Failed " . $db->connect_error;
      exit();
    }

    $title = $db->real_escape_string($title);
    $result = $db->query("SELECT * FROM books 
    WHERE categories LIKE '%$title%' OR lower(categories) LIKE '%$title%' OR upper(categories) LIKE '%$title%'");

    $array = [];

    //search for similar titles from database
    foreach($result as $row) {
      $currentTitle = $row['title'];
      //echo $currentTitle;
      array_push($array, $currentTitle);
    }

    $i = 0;

    /*
    $recommendationArray = [];
    while($i < count($array)) {
      $currentTitle = $array[$i];
      $command = escapeshellcmd("python books.py $currentTitle");
      $output = shell_exec($command);
      
      array_push($array, explode("\"", $output));
    }*/

    include('recommendations.html');
    ?>

    <section class="blog_section layout_padding">
    <div class="row">

    
    <?php
      $i = 0;
      $count = 0;
      while($i < count($array) && $count < 20) {
                
      $currentTitle = $array[$i];
          
      $currentTitle = $db->real_escape_string($currentTitle);
      $result = $db->query("SELECT * FROM books 
        WHERE title LIKE '%$currentTitle%' OR lower(title) = '%$currentTitle%' OR upper(title) = '%$currentTitle%'");
      $i += 1;
      $count += 1;
      foreach($result as $row) {
      ?>
                
      <div class="col-md-6">
      <div class="box">
      <div class="img-box">
      <h4 class="blog_date">
        <span>
          <?php echo $row['bookID'];?>
        </span>
      </h4>
      </div>
      <div class="detail-box">
              <h5>
              <?php echo $row['title'];?>
              </h5>
              <p>
                Author: <?php echo $row['author'];?>
              </p>
              <p>
                Average Rating: <?php echo $row['average_rating'];?>
              </p>
              <p>
                Categories: <?php echo $row['categories'];?>
              </p>
            </div>
          </div>
        </div>
        <?php
            }}
    ?>
    </div>
    </section>