<?php

  require_once 'classes/DBConnector.php';

try {
      $smallStories = Get::all('article', 4,5);
    } catch (Exception $e) {
      die("Exception: " . $e->getMessage());
    }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Add Author</title>
</head>
<body>
<div class="container width-12 nested nav">
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
    <h1 class="addingHeading width-12 ">Add a new Author</h1>
        <div class="width-1">

        <form method="POST" action="addAuthor.php">

    <!-- first name -->

        <label for="first_name" class="textForm">First name</lable>
        <input id="firstName" type="text" name="first_name" value="<?php if (isset($data["firstName"])) echo $data["firstName"]; ?>">
        <div id="firstName_error" class="error"> <?php if (isset($errors["firstName"])) echo $errors["firstName"]; ?></div>
    <!-- last name -->
   
        <label for="lastName" class="textForm">Last name</lable>
        <input id="lastName" type="text" name="lastName" value="<?php if (isset($data["lastName"])) echo $data["lastName"]; ?>">
        <div id="lastName_error" class="error"> <?php if (isset($errors["lastName"])) echo $errors["lastName"]; ?></div>
    <!-- link -->
   
        <label class="textForm">Link</lable>
        <input id="link" type="text" name="link" value="<?php if (isset($data["link"])) echo $data["link"]; ?>">
        <div id="link_error" class="error"> <?php if (isset($errors["link"])) echo $errors["link"]; ?></div>
        <div class="buttons">
                <button id="submit_btn" class="button primary" type="submit" formaction="addAuthor.php">submit</button>
                <a class="button light" href="index.php">Cancel</a>
            </div>

            </form> 
</div>
<div class="width-5 "></div>
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
       <li class="footerContent">
           <a href="https://www.independent.ie/opinion/independent-journalists/kevin-palmer/">Kevin Palmer</a>
       </li>
       <li class="footerContent">
           <a href="https://twitter.com/carlmarkham?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">Carl Markham</a>
       </li>
       <li class="footerContent">
           <a href="https://www.independent.co.uk/author/rory-sullivan">Rory Sulivan</a>
       </li>
       <li class="footerContent">
           <a href="https://www.independent.co.uk/author/andrew-woodcock">Andew Woodcock</a>
       </li>
       </div>
       <div class="width-3">
       <li class="inline footerContent ">
           <a href="https://www.independent.co.uk/author/bevan-hurley">Bevan Hurley</a>
       </li>
       <li class="footerContent">
           <a href="https://www.independent.co.uk/author/rebecca-thomas">Rebecca Thomas</a>
       </li>
       <li class="footerContent">
           <a href="https://www.rte.ie/author/932924-paul-reynolds/">Paul Reynolds</a>
       </li>
       <li class="footerContent">
           <a href="https://www.rte.ie/author/992922-tommy-meskill/">Tommy Meskill</a>
       </li>
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
    <script src="js/author_validate.js"></script>
</html>
