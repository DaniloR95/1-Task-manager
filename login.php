<?php
    $usuario = $_POST['email'];
    $password = $_POST['password'];

    $conexion = new mysqli('127.0.0.1', 'root', '', 'proyecto');
    $conexion->set_charset("utf8");
    $sql = "select * from usuarios where email='$usuario'";
    $instruccion = $conexion->prepare($sql);
    $instruccion->execute();
    $tabla = $instruccion->get_result();
    $resultado = $tabla->fetch_object();
    $passwordCofificada = $resultado->password;

    echo $passwordCofificada;
    echo $password;

    if(password_verify($password, $passwordCofificada)){
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location: resultado.php");
    }
    else{
        header("location: index.html");
    }
?>