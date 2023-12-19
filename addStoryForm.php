<?php

  require_once 'classes/DBConnector.php';

  try {
   
        $genre = Get::all('genre');
        $writer = Get::all('writer');
       $smallStories = Get::all('article', 7);
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
    <title>Add Story</title>
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
    <h1 class="addingHeading width-12 ">Add a new Story</h1>
    <div class="width-2">
    <form method="POST" action="addStory.php">

    	<label for="headline" class="textForm">Headline</lable>
        <input id="headline" type="text" name="headline" value="<?php if (isset($data["headline"])) echo $data["headline"]; ?>">
        <div id="headline_error" class="error"> <?php if (isset($errors["headline"])) echo $errors["headline"]; ?></div>

        <label for="shortHeadline" class="textForm">Short Headline</lable>
        <input id="shortHeadline" type="text" name="shortHeadline" value="<?php if (isset($data["shortHeadline"])) echo $data["shortHeadline"]; ?>">
        <div id="shortHeadline_error" class="error"> <?php if (isset($errors["shortHeadline"])) echo $errors["shortHeadline"];?></div>

        <label for="subHeading" class="textForm">Sub heading</lable>
        <input id="subHeading" type="text" name="subHeading" value="<?php if (isset($data["subHeading"])) echo $data["subHeading"]; ?>">
        <div id="subHeading_error" class="error"> <?php if (isset($errors["subHeading"])) echo $errors["subHeading"]; ?></div>

        <label for="article" class="textForm">article</lable>
        <textarea name="article" id="article" rows="10" cols="30" type="text" <?php if (isset($data["article"])) echo $data["article"]; ?>></textarea>
        <div id="article_error" class="error"> <?php if (isset($errors["article"])) echo $errors["article"]; ?></div>

        <label for="summary" class="textForm">Summary</lable>
        <textarea name="summary" id="summary" rows="10" cols="30" type="text" <?php if (isset($data["summary"])) echo $data["summary"]; ?>></textarea>
        <div id="summary_error" class="error"> <?php if (isset($errors["summary"])) echo $errors["summary"]; ?></div>

        <label for="date" class="textForm">Date</lable>
        <input id="date" type="text" name="date" value="<?php if (isset($data["date"])) echo $data["date"]; ?>">
         <div id="date_error" class="error"> <?php if (isset($errors["date"])) echo $errors["date"]; ?></div>

        <label for="time" class="textForm">Time</lable>
        <input id="time" type="text" name="time" value="<?php if (isset($data["time"])) echo $data["time"]; ?>">
        <div id="time_error" class="error"> <?php if (isset($errors["time"])) echo $errors["time"]; ?></div>

        <label class="textForm">Writer</lable>
        <select name="writer_id">
        

        <?php foreach($writer as $author) {?>
             <option value="<?= $author->id ?>"><?= $author->first_name ?> <?= $author->last_name ?></option>
        <?php }?>

            </select>

        <label class="textForm">Genre</lable>
        <select name="genre_id">
       

            <?php foreach($genre as $category) {?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php }?>

        </select>
    
        <div class="buttons">
                <button id="submit_btn" class="button primary" type="submit" formaction="add.story.php">submit</button>
                <a class="button light" href="index.php">Cancel</a>
            </div>
            </div>
    </form>
            
    <div class="width-6"></div>
    <div class="width-4 smallStories nested">

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
    <script src="js/story_validate.js"></script>
</html>