<?php
    include('config.php');

    $correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco
    $consulta           = ("select * from usuarios where email ='".$correo."'");
    $queryconsulta      = mysqli_query($con, $consulta);
    $cantidadConsulta   = mysqli_num_rows($queryconsulta);
    $dataConsulta       = mysqli_fetch_array($queryconsulta);

    if($cantidadConsulta ==0){ 
        header("Location:index.html");
        exit();
    }
    else{
        
        function generandoTokenClave($length = 20) {
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
        }
        $miTokenClave = generandoTokenClave();


        //Agregando Token en la tabla BD
        $updateClave = ("update usuarios set token='$miTokenClave' WHERE email='".$correo."' ");
        $queryResult = mysqli_query($con,$updateClave); 


        $linkRecuperar = "localhost/Proyecto/nuevaClave.php?idUsuario=".$dataConsulta['idUsuario']."&token=".$miTokenClave;

        $destinatario = $correo; 
        $asunto = "Recuperar contraseña";
        $cuerpo = $linkRecuperar;
        $header = "From: projecttaskmanager@gmail.com" . "\r\n";
        $header.= "Reply-To: projecttaskmanager@gmail.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();

        if(mail($destinatario,$asunto,$cuerpo,$header)){

            header("Location:index.html");
            exit();
        }
    }


?>
