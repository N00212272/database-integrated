<?php
  require_once 'classes/DBConnector.php';

  try {
      
    $data=[
        'headline' => $_POST['headline'],
        'headline_short' => $_POST['headline_short'],
        'sub_heading' => $_POST['sub_heading'],
        'article' => $_POST['article'],
        'summary' => $_POST['summary'],
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'writer_id' => $_POST['writer_id'],
        'genre_id' => $_POST['genre_id'],
        
    ];

    Post::create('article', $data);

    header("Location: index.php");

  } catch (Exception $e) {
    die("Exception: " . $e->getMessage());
  }
?>