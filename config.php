<?php
    $usuario  = "root";
    $password = "";
    $servidor = "127.0.0.1";
    $basededatos = "proyecto";
    $con = mysqli_connect($servidor, $usuario, $password, $basededatos) or die("No se ha podido conectar al Servidor");
?>