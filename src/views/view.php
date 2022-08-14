<?php
    use Proy\Notas\models\Note;

    if (count($_POST)>0) {
        //actualizar nota
        $title = isset($_POST['title']) ? $_POST['title'] : ''; // ?? funciona como un if, sino le ponemos un vacio
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $uuid = $_POST['id'];
        
        $note = Note::get($uuid); 
        $note->setTitle($title);
        $note->setContent($content);
        $note->update();

    }else if(isset($_GET['id'])) {
        
        $note = NOTE::get($_GET['id']);

    }else{
        header('Location: http://localhost/Proyectosphp/ProyNotas/?view=home');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="src/views/resources/main.css">
</head>
<body>
    <?php
        require 'resources/navbar.php';
    ?>
    <h1>VIEW</h1>
    <div class="notes-container">    

    

    

    <form action="?view=view&id=<?php echo $note->getUUID(); ?>" method="POST">
        <input type ="text" name="title" placeholder="Title....." value="<?php echo $note->getTitle(); ?>">
        <input type="hidden" name="id" value="<?php echo $note->getUUID(); ?>">
        <textarea name="content"  cols="30" rows="10"><?php echo $note->getContent(); ?></textarea>
        <input type="submit" value="Update Note">
        
    </form>

</body>
</html>