<?php
require('../vendor/autoload.php');
    $title = $_GET['title'];
    $title = escapeshellarg($title);
    //echo $title;

    $dsn = "pgsql:"
    . "host=ec2-34-230-153-41.compute-1.amazonaws.com;"
    . "dbname=ddjch665qb09r6;"
    . "user=gyzavjeurpfmax;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=6a4681fdbc4ad33ad34787a4680471b8e63a6a0e49c6bc6b98c425ba37a508c9";

  $db = new PDO($dsn);
  
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
    
    $command = escapeshellcmd("python train_popular.py $title");
    $output = shell_exec($command);  
    $array = explode("\"", $output);

    echo $output;
    /*
    include('recommendations.html');
    ?>

    <section class="blog_section layout_padding">
    <div class="row">
    
    <?php
      $i = 0;
      while($i < count($array)) {
                
      $currentTitle = $array[$i];
          
      $currentTitle = pg_escape_string($currentTitle);
      $result = $db->query("SELECT * FROM books 
        WHERE title = '$currentTitle'");
      $i += 1;
                
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      ?>
                
      <div class="col-md-6">
      <div class="box">
      <div class="img-box">
      <h4 class="blog_date">
        <span>
          <?php echo $row['bookid'];?>
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
            }}*/
    ?>
    </div>
    </section>