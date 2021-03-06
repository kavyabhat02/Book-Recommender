<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>BookBuddy</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              BookBuddy
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link pl-lg-0" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./php/categories.html">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./php/search.php"> Books </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h5>
                      BookBuddy - A Book Finder
                    </h5>
                    <h1>
                      For All Your <br>
                      Reading Needs
                    </h1>
                    <p>
                      Find a new book today!
                    </p>
                    <a href="./php/search.php">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img-1.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h5>
                      BookBuddy - A Book Finder
                    </h5>
                    <h1>
                      For All Your <br>
                      Reading Needs
                    </h1>
                    <p>
                      View the performance of different searching algorithms here.
                    </p>
                    <a href="./php/search.php">
                      Explore
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn_box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->


  <!-- category section -->

  <section class="category_section layout_padding">
    <div class="category_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Books Categories
          </h2>
          <p>
            There are different genres to discover! Here are a few you can explore.
          </p>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat1.png" alt="">
              </div>
              <div class="detail-box">
                <a href="./php/search_genre.php?title=fantasy" style="color: black; font-size:large;">
                  <b>Fantasy</b>
                </a>
                <p>
                  A genre of writing in which the plot could not happen in real life - think magic, wizards
                  and different worlds.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat2.png" alt="">
              </div>
              <div class="detail-box">
                <a href="./php/search_genre.php?title=biography" style="color: black; font-size:large;">
                  <b>Biography</b>
                </a>
                <p>
                  Biographies are true stories about real people, set within a real historical 
                  framework with the unique social and political conditions that existed during the subject's life.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat3.png" alt="">
              </div>
              <div class="detail-box">
                <a href="./php/search_genre.php?title=history" style="color: black; font-size:large;">
                  <b>History</b>
                </a>
                <p>
                  Historical fiction is a literary genre in which 
                  the plot takes place in a setting related to the past events, but is fictional.
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat4.png" alt="">
              </div>
              <div class="detail-box">
                <a href="./php/search_genre.php?title=humor" style="color: black; font-size:large;">
                  <b>Humor</b>
                </a>
                <p>
                  Discover the funniest stories and books here :)
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat5.png" alt="">
              </div>
              <div class="detail-box">
                <a href="./php/search_genre.php?title=drama" style="color: black; font-size:large;"">
                  <b>Drama</b>
                </a>
                <p>
                  The drama genre is strongly based in a character, or characters, that are in 
                  conflict at a crucial moment in their lives. 
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/cat6.png" alt="">
              </div>
              <div class="detail-box">
                <a href = "./php/search_genre.php?title=philosophy" style="color: black; font-size:large;">
                  <b>Philosophy</b>
                </a>
                <p>
                  All about the fundamental nature of knowledge, reality, and existence as an academic discipline.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end category section -->

  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info-col">
          <div class="info_detail">
            <h4>
              About Me
            </h4>
            <p>
              I'm Kavya Bhat, a rising junior at NITK Surathkal. <br>
              Avid reader, singer, and tech enthusiast.
            </p>
            <div class="info_social">
              <a href="https://github.com/kavyabhat02">
                <i class="fa fa-github" aria-hidden="true"></i>
              </a>
              <a href="https://www.linkedin.com/in/kavyabhat02/">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> Built by Kavya Bhat 
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>