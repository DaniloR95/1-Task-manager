<?php
    require 'conexion.php';
    session_start();
    $usuario = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select count(*) as contar from usuarios where email = '$usuario' and password = '$password'";
    $consulta = mysqli_query($conexion,$sql);
    $array = mysqli_fetch_array($consulta);

    if($array['contar']>0){
        $_SESSION['usuario'] = $usuario;
        header("location: resultado.php");
    }
?>