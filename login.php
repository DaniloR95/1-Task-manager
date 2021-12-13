<?php

/* Aqui se comprueba si la contraseña escrita por el usuario coincide con la de la base de datos, en tal caso inicia la sesion y se redirecciona a 'resultado.php' */
    $usuario = $_POST['email'];
    $password = $_POST['password'];

    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
    $sql = "select * from usuarios where email='$usuario'";
    $instruccion = $conexion->prepare($sql);
    $instruccion->execute();
    $tabla = $instruccion->get_result();
    $resultado = $tabla->fetch_object();
    $passwordCofificada = $resultado->password;
/* Con la funcion 'password_verifi' se comprueba que la contraseña introducida por el usuario, se corresponde a la contraseña encriptada que guarda la base de datos */
    if(password_verify($password, $passwordCofificada)){
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("location: resultado.php");
    }
    else{
/* En caso de que la contraseña no coincida, se redirecciona a la pagina de inicio */
        header("location: index.html");
    }
?>