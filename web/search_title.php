<?php
  require('../vendor/autoload.php');

  $start_time = microtime(true);

  $title = $_GET['title'];
  
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

  $title = pg_escape_string($title);
  $result = $db->query("SELECT * FROM books 
    WHERE title LIKE '%$title%' OR lower(title) LIKE '%$title%' OR upper(title) LIKE '%$title%'");

  $titleList = [];

  //search for similar titles from database
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $currentTitle = $row['title'];
    array_push($titleList, $currentTitle);
  }

  $i = 0;

  include('recommendations.html');
?>

<section class="blog_section layout_padding">
  <div class="row">

  <?php
    $i = 0;
    $count = 0;
    while($i < count($titleList) && $count < 20) {
      $currentTitle = pg_escape_string($titleList[$i]);
      
      //get book details from database
      $result = $db->query("SELECT * FROM books 
        WHERE title LIKE '%$currentTitle%' OR lower(title) = '%$currentTitle%' OR upper(title) = '%$currentTitle%'");
      $i += 1;
      $count += 1;
                
      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $url = "images/".$row['title'].".jpg";
        if(!file_exists($url)) {
          $url = "images/samplebook.jpg";
        } 
  ?>
                
  <div class="col-md-6">
    <div class="box">
      <div class="img-box">
        <img src=<?php $url ?> alt="">
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