<?php
/* Aqui se define la ruta de la base de datos, para ser utilizada en el archivo 'recuperarClaveConLink.php' */
    $usuario  = "u106913443_thotsbrain";
    $password = "S@0v6Rp?";
    $servidor = "localhost";
    $basededatos = "u106913443_thotsbrain";
    $con = mysqli_connect($servidor, $usuario, $password, $basededatos) or die("No se ha podido conectar al Servidor");
?>