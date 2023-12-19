<?php

  require_once 'classes/DBConnector.php';

  try {
    $main = Get::byId('article', $_GET["id"]);
    $writer = Get::byId('writer',  $main->writer_id);
    $convertedDate = date('d/m/y', strtotime( $main->date));
    $smallStories = Get::all('article',4, 4);
    $writers = Get::all('writer');

//       echo "<pre>";
//   print_r($main);
//   echo "</pre>";
    
  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }

//   echo "<pre>";
//   print_r($stories);
//   echo "</pre>";

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
    <title>Article page</title>
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
         <div class="Nested topStory width-7">
            <div class="width-12">
                <h1 class="articleHeading"><?= $main->headline ?></h1>
            </div>
            <div class="width-12"><h5 class="articleDateWriter"><?= $writer->first_name ?> <?= $writer->last_name ?> - <?= $convertedDate ?></h5></a></div>
            
        
        <div class="width-12 ">
            <p class="main"><?= nl2br($main->article) ?></p>
        </div>
    </div>
        <!-- break between the article and small headlines -->
    <div class="width-1"></div>

        <div class="width-4 smallStories nested ">
            
        <?php foreach($smallStories as $small) { 
            $genre = Get::byId('genre', $small->genre_id);
            $writer = Get::byId('writer', $small->writer_id);
            $convertedDate = date('d/m/y', strtotime($small->date))
            ?>

            <div class="width-12"><hr></div>
            <div class="tag width-1"><p><?= $genre->name ?></p></div>
            <div class="width-11"><h5 class="authorSmall"><?= $writer->first_name ?> <?= $writer->last_name ?> - <?= $convertedDate ?></h5></div>
            <div class="width-12 headline">
                <h3><a href="article.php?id=<?= $small->id ?>"><?= $small->headline ?></a></h3>
            </div>
            
             <?php } ?>       
         </div>   
     </div>
     
     
     <div class="footer">
       
       <div class="container">
       <h1 class="footerHeading width-12">K-MAGAZINE PRESENTS</h1>
           <div class="width-3">
           <ul class="writersList">
             <li>
                <a class="categoryFooter">Contact our writers </a>
            </li>
            <br>
            <!-- foreach of the writers only the last writer updates -->
            <?php foreach($writers as $writer) {?>
             <li class="footerContent">
                <a href="writer.php?id=<?= $writer->id ?>"><?= $writer->first_name ?> <?= $writer->last_name ?></a>
            </li>
            <?php } ?>
        </ul>
   </div>
   <div class="width-2"></div>
   <div class="width-4">
   <ul class="JoinUsList">
        <li>
           <a class="categoryFooter">Join Our Team</a>
       </li>
       <br>
       <li class="footerContent">  
             <a href="addAuthorForm.php">Become an Author</a>
       </li>
       <li class="footerContent">  
           <a href="addStoryForm.php">Add Your Story</a>
       </li>
       <li class="footerContent">
           <a href="viewAuthorForm.php">view our authors</a>
   </div>

   </ul>
   </div>
   </div>
</body>
</html>