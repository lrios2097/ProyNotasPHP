<?php

use Proy\Notas\models\Note;
    
if (count($_POST) > 0) {
    $title = isset($_POST['title']) ? $_POST['title'] : 'content test'; // ?? funciona como un if, sino le ponemos un vacio
    $content = isset($_POST['content']) ? $_POST['content'] : 'content test';

    $note =new Note($title,$content);
    $note->save();
       
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new Note</title>
    <link rel="stylesheet" href="src/views/resources/main.css">
</head>
<body>
    <?php
        require 'resources/navbar.php';
    ?>
    <h1>CREATE NOTE</h1>
    <div class="notes-container">
    
    
    <form action="?view=create" method="POST">
        <input type ="text" name="title" placeholder="Title.....">
        <textarea name="content"  cols="30" rows="10"></textarea>
        <input type="submit" value="Create Note">

    </form>
</body>
</html>