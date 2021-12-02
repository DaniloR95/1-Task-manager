<?php
    $usuario  = "id18050069_proyectotaskmanager";
    $password = "Y0/Er%vE@GlmrsU>";
    $servidor = "localhost";
    $basededatos = "id18050069_proyecto";
    $con = mysqli_connect($servidor, $usuario, $password) or die("No se ha podido conectar al Servidor");
    $db = mysqli_select_db($con, $basededatos) or die("Upps! Error en conectar a la Base de Datos");
?>