<?php
  require('../vendor/autoload.php');
  $title = $_GET['title'];

  //details of Heroku Postgres Database
  $dsn = "pgsql:"
    . "host=ec2-34-230-153-41.compute-1.amazonaws.com;"
    . "dbname=ddjch665qb09r6;"
    . "user=gyzavjeurpfmax;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=6a4681fdbc4ad33ad34787a4680471b8e63a6a0e49c6bc6b98c425ba37a508c9";

  //connect to database
  $db = new PDO($dsn);
  
  if ($db->connect_errno) {
    echo "Failed " . $db->connect_error;
    exit();
  }

  $title = pg_escape_string($title);
  $result = $db->query("SELECT * FROM books 
    WHERE categories LIKE '%$title%' OR lower(categories) LIKE '%$title%' OR upper(categories) LIKE '%$title%'");

  $titleList = [];

  //search for similar titles from database
  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $currentTitle = $row['title'];
    array_push($titleList, $currentTitle); //add to array of results
  }

  $i = 0;
  include('recommendations.html'); 
?>

<!--begin new section in html page --->

<section class="blog_section layout_padding">
<div class="row">

  <?php
    $i = 0;
    $count = 0;

    //iterate through 20 items of titleList
    while($i < count($titleList) && $count < 20) {
      $currentTitle = pg_escape_string($titleList[$i]);
      $result = $db->query("SELECT * FROM books 
        WHERE title LIKE '%$currentTitle%' OR lower(title) = '%$currentTitle%' OR upper(title) = '%$currentTitle%'");
      $i += 1;
      $count += 1;
      
      //display all books in query result
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
      }
    }
  ?>
  
  </div>
</section>