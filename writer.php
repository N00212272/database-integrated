<?php
    require_once 'classes/DBConnector.php';

  try {
    $main = Get::all('writer');


  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/reset.css">
   <link rel="stylesheet" href="css/grid.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>writer page</title>
</head>
<body>
    <div class="container width-12 nested nav">
        <!-- go back to home page link button -->
        <h1 class="heading width-3"><a href="index.php">K-Magazine.ie</h1></a>
        <h3 class="news category width-1">News</h3>
        <h3 class="sport category width-1">Sport</h3>
        <h3 class="global category width-1">Global</h3>
        <h3 class="health category width-1">Health</h3>
        <h3 class="politics category width-1">Politics</h3>
        <h3 class="crime category width-1">Crime</h3>
     
     </div>
     <hr class="navHr">
     <div class="container">
    <h1 class="addingHeading width-12 ">update author</h1>
        <div class="width-1">

        <form method="POST" action="updateAuthor.php">

    <!-- first name -->
         
        <label for="first_name" class="textForm">First name</lable>
        <input id="firstName" type="text" name="first_name" value=<?= $main->first_name ?>>
        <div id="firstName_error" class="error"><?php if (isset($errors["firstName"])) echo $errors["firstName"]; ?></div>
    <!-- last name -->
   
        <label for="last_name" class="textForm">Last name</lable>
        <input id="lastName" type="text" name="last_name" value=<?= $main->last_name ?>>
        <div id="lastName_error" class="error"> <?php if (isset($errors["lastName"])) echo $errors["lastName"]; ?></div>
    <!-- link -->
   
        <label class="textForm">Link</lable>
        <input id="link" type="text" name="link" value=<?=$main->link?>>
        <div id="link_error" class="error"> <?php if (isset($errors["link"])) echo $errors["link"]; ?></div>
        <div class="buttons">
        <button id="submit_btn" class="button primary" type="submit" formaction="updateAuthor.php">submit</button>
                <a class="button light" href="index.php">Cancel</a>
            </div>

            </form> 
</div>
    
