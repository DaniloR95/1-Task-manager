<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <title>Thot's brain | Login</title>
    <link rel="shortcut icon" href="backgrouns/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id="contenedor">
    
<?php
    include('config.php');

    $correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco
    $consulta           = ("select * from usuarios where email ='".$correo."'");
    $queryconsulta      = mysqli_query($con, $consulta);
    $cantidadConsulta   = mysqli_num_rows($queryconsulta);
    $dataConsulta       = mysqli_fetch_array($queryconsulta);

    if($cantidadConsulta ==0){ 
        ?>
        <div id="restablecerPassword2">
            <p>No existe ninguna cuenta asociada a <?=$correo?></p>
            <a href="index.html"><input type="button" value="Volver al inicio" class="botonRestablecer"></a>
        </div>
        <?php
        exit();
    }
    else{
        
        function generandoTokenClave($length = 20) {
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
        }
        $miTokenClave = generandoTokenClave();

        $updateClave = ("update usuarios set token='$miTokenClave' WHERE email='".$correo."' ");
        $queryResult = mysqli_query($con,$updateClave); 


        $linkRecuperar = "https://danilorivero.com/nuevaClave.php?idUsuario=".$dataConsulta['idUsuario']."&token=".$miTokenClave;


        $destinatario = $correo; 
        $asunto = "Recuperar contraseña";
        $cuerpo = $linkRecuperar;
        $header = "From: thotsbrain@gmail.com" . "\r\n";
        $header.= "Reply-To: thotsbrain@gmail.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();

        if(mail($destinatario,$asunto,$cuerpo,$header)){

            ?>
                <div id="restablecerPassword2">
                    <p>Se ha enviado un correo electronico a <?=$correo?> para que recupere su contraseña</p>
                    <a href="index.html"><input type="button" value="Volver al inicio" class="botonRestablecer"></a>
                </div>
            <?php
            exit();
        }

    }


?>
    </div>
</body>
</html>