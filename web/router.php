<?php
  require('../vendor/autoload.php');
  $option = $_POST['optionList']; //get selected option from dropdown menu
  $title = $_POST['title']; //get title entered by user
  $algorithm = $_POST['algo']; //get selected algorithm from dropdown

  //search with empty title gives first 10 books stored
  if($title=="") {
    header("Location: search.php?"); 
    exit();
  }


  if($option == 'a') {  
    header("Location: search_title.php?title=".$title); //search by title
    exit();
  }
  else if ($option == 'b') {
    header("Location: search_popular.php?title=".$title."&algo=".$algorithm);
    exit();
  }  
  else if ($option == 'c') {
    header("Location: search_genre.php?title=".$title); //search by genre
    exit();
  } 

  header("Location: search_title.php?title=".$title); //default 'ALL' option
  exit();
?>
