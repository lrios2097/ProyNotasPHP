<?php
//Creo este archivo, no fue gen automaticamente
    //echo "Hola Mundo";
    if(isset($_GET['view'])){
        $view = $_GET['view'];

        require 'src/views/' .$view. '.php'; // aqui van a estar todas nuestras views, para navegar por las url, EJM ProyectosPHP/PROYNOTAS/?view=create, open "create.php"

    }else{ // si no existe, cargamos este home. QUE SON VISTAS ?????
        require 'src/views/home.php'; 
    }

?>