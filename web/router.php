<?php
require('../vendor/autoload.php');
$option = $_POST['optionList'];
$title = $_POST['title'];

if($option == 'a') {
  echo "here";
  if($title=="") {
    header("Location: search.php?");
    exit();
  }
  header("Location: search_title.php?title=".$title);
  exit();
}
else if ($option == 'b') {
  header("Location: search_popular.php?title=".$title);
  exit();
} 
else if ($option == 'c') {
  header("Location: search_genre.php?title=".$title);
  exit();
} 

if($title=="") {
  header("Location: search.php?");
  exit();
}

header("Location: search_title.php?title=".$title);
exit();
/*
if (isset($_POST['searchButton']) || isset($_POST['similarTitle']) || isset($_POST['popularity']) || isset($_POST['genre'])) {
    // handle textarea

    if (isset($_POST['searchButton']) || isset($_POST['similarTitle']) ) {
        header("Location: search_title.php?title=".$title);
        exit();
    }
    else if (isset($_POST['popularity'])) {
      header("Location: search_popular.php?title=".$title);
      exit();
    } 

    header("Location: search_title.php?title=".$title);
    exit();
}*/

?>
