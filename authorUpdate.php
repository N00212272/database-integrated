
 <div class="container">
    <h1 class="addingHeading width-12 ">Add a new Author</h1>
        <div class="width-1">

        <form method="POST" action="addAuthor.php">

    <!-- first name -->

        <label for="first_name" class="textForm">First name</lable>
        <input id="firstName" type="text" name="first_name" value=>
        <div id="firstName_error" class="error"></div>
    <!-- last name -->
   
        <label for="lastName" class="textForm">Last name</lable>
        <input id="lastName" type="text" name="lastName" value=>
        <div id="lastName_error" class="error"></div>
    <!-- link -->
   
        <label class="textForm">Link</lable>
        <input id="link" type="text" name="link" value=>
        <div id="link_error" class="error"></div>
        <div class="buttons">
                <button id="submit_btn" class="button primary" type="submit" formaction="addAuthor.php">submit</button>
                <a class="button light" href="index.php">Cancel</a>
            </div>

            </form> 
</div>