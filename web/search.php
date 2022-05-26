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
        include('recommendations.html');
        ?>

        <div class="row">

        <?php
               $result = $db->query('SELECT * FROM books 
                WHERE bookID <= 10');
                
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
                }
    ?>
    </div>
    </section>