<?php

require_once 'classes/DBConnector.php';

function truncate($string, $length=100, $append="&hellip;") {

 
    $string = trim($string);
    
    if(strlen($string) > $length) {
      $string = str_replace("\n", " ", $string);
      $string = wordwrap($string, $length);

      $string = explode("\n", $string, 2);
      $string = $string[0] . $append;
    }

    return $string;
  }
try {
      
    $mainStories = Get::all('article', 1,3);
    $smallStories = Get::all('article', 4,5);
    $mediumStories = Get::byCategory('sport',4 );
    $mediumStories2 = Get::byCategory('health',4 );
    $writers = Get::all('writer');


      
  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }

//   echo"<pre>";
//   print_r($articles);
//   echo"</pre>";
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
</head>
<body>
    <div class="container width-12 nested nav">
   <h1 class="heading width-3">K-Magazine.ie</h1>
   <h3 class="news category width-1">News</h3>
   <h3 class="sport category width-1">Sport</h3>
   <h3 class="global category width-1">Global</h3>
   <h3 class="health category width-1">Health</h3>
   <h3 class="politics category width-1">Politics</h3>
   <h3 class="crime category width-1">Crime</h3>

</div>
<hr class="navHr">

    <div class="container">
        <!-- This is my main story -->
        <div class="width-7 topStory nested">
        


        <?php foreach($mainStories as $article) { 
            $genre = Get::byId('genre', $article->genre_id);
            $writer = Get::byId('writer', $article->writer_id);
            $convertedDate = date('d/m/y', strtotime($article->date))
            ?>


            <div class="width-12 "><hr></div>
            <div class="tag width-1"><p><?= $genre->name ?></p> </div>
            <div class="width-11"><h5 class="author"><?= $writer->first_name ?> <?= $writer->last_name ?> - <?= $convertedDate ?></h5></div>

            <div class="width-5">
                <h1><a href="article.php?id=<?= $article->id ?>"><?= $article->headline ?></a></h1>
            </div>

            <div class="width-7 article">
                <p><?= truncate($article->article, 600) ?></p>
            </div>



            <?php } ?>
        </div>       

        
        <div class="width-5 smallStories nested ">
            <!-- random small stories -->
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

        <div class="width-12 medium nested">
            <!-- SPORT MEDIUMS -->
        <?php foreach($mediumStories as $medium) { 
            $genre = Get::byId('genre', $medium->genre_id);
            $writer = Get::byId('writer', $medium->writer_id);
            $convertedDate = date('d/m/y', strtotime($medium->date))
            ?>
            

            <div class="width-3">
                <div class="tag width-1 "><p><?= $genre->name ?></p></div>
                <div class="width-11"><h5 class="authorSmall"><?= $writer->first_name ?> <?= $writer->last_name ?> - <?= $convertedDate ?></h5></div>
                <h3><a href="article.php?id=<?= $medium->id ?>"><?= $medium->headline ?></a></h3>
            
                <p class="medium"><?= truncate($medium->article, 200) ?></p>

            </div>
        
        <?php } ?>
        </div>
        <div class="width-12 medium nested">
            <!-- All Health MEDIUMS -->
        <?php foreach($mediumStories2 as $medium2) { 
            $genre = Get::byId('genre', $medium2->genre_id);
            $writer = Get::byId('writer', $medium2->writer_id);
            $convertedDate = date('d/m/y', strtotime($medium2->date))
            ?>

            <div class="width-3">
                <div class="tag width-1 "><p><?= $genre->name ?></p></div>
                <div class="width-11"><h5 class="authorSmall"><?= $writer->first_name ?> <?= $writer->last_name ?> - <?= $convertedDate ?></h5></div>
                <h3><a href="article.php?id=<?= $medium2->id ?>"><?= $medium2->headline ?></a></h3>
            
                <p class="medium"><?= truncate($medium2->article, 200) ?></p>

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
            
        </div>

        </ul>
        </div>
        </div>
        
</body>

</html>