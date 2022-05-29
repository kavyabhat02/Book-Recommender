<?php
  require __DIR__."/../../vendor/autoload.php";
  $start_time = microtime(true);
  
  $title = $_GET['title'];
  $title = escapeshellarg($title);
  
  $algorithm = $_GET['algo'];
  $algorithm = escapeshellarg($algorithm);

  //connect to database
  $dsn = "pgsql:"
    . "host=ec2-34-230-153-41.compute-1.amazonaws.com;"
    . "dbname=ddjch665qb09r6;"
    . "user=gyzavjeurpfmax;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=6a4681fdbc4ad33ad34787a4680471b8e63a6a0e49c6bc6b98c425ba37a508c9";

  $db = new PDO($dsn);
  
  if ($db->connect_errno) {
    echo "Failed " . $db->connect_error;
    exit();
  }
    
  //call python script to obtain recommendations
  $command = escapeshellcmd("python books.py $title $algorithm");
  $output = shell_exec($command);  
  $titleList = explode("\"", $output);

  include(__DIR__.'/../html/recommendations.html');
?>

<!--- new section in html page --->
<section class="blog_section layout_padding">
  <div class="row">
    
  <?php
    $i = 0;
    //iterate through list of recommendations
    while($i < count($titleList)) {
      $currentTitle = pg_escape_string($titleList[$i]);

      //query to database to get all details of listed book
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
            ID: <?php echo $row['bookid'];?>
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
      }
    }
    $end_time = microtime(true);
    $execution_time = $end_time - $start_time;
  ?>
  </div>
  <div style="text-align:center;">
    Search was processed in <?php echo $execution_time ?> seconds.
  </div>
</section>