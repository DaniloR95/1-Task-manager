<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <title>Thot's brain | Recover password</title>
    <link rel="shortcut icon" href="imagenes/icono/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id="contenedor">
    
<?php
/* Este archivo, recive el email introducido por el usuario en la ventana de restablecer password de 'index.html' y realiza una serie de acciones */
    include('config.php');

    $correo             = trim($_REQUEST['email']); //Quitamos algun espacion en blanco
    $consulta           = ("select * from usuarios where email ='".$correo."'");
    $queryconsulta      = mysqli_query($con, $consulta);
    $cantidadConsulta   = mysqli_num_rows($queryconsulta);
    $dataConsulta       = mysqli_fetch_array($queryconsulta);
/* Primero se verifica que el elaim introducido, coincida con alguno presente en la tabla 'usuarios' */
/* En el caso de que no exista, se le notifica al usuario de esto */
    if($cantidadConsulta ==0){ 
        ?>
        <div id="restablecerPassword2">
            <p>No existe ninguna cuenta asociada a <?=$correo?></p>
            <a href="index.html"><input type="button" value="Volver al inicio" class="botonRestablecer"></a>
        </div>
        <?php
        exit();
    }
/* Si por el contrario, existe este email, se le envia a este, un correo electronico con el link al cual debera acceder para cambiar su contraseña */
    else{
        /* Esta funcion crea un string aleatorio el cual se añade añade a la tabla 'usuarios' y al link de recuperacion de la contraseña para relacionar estos y hacer fas dificil que alguien que no sea el usuario, pueda modificar la contraseña */
        function generandoTokenClave($length = 20) {
            return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
        }
        $miTokenClave = generandoTokenClave();

        $updateClave = ("update usuarios set token='$miTokenClave' WHERE email='".$correo."' ");
        $queryResult = mysqli_query($con,$updateClave); 

/* Este es el link que le llegara al usuario, esta compuesto por la ruta hacia la pagina que deja cambiar la contraseña, y los datos que dicha pagina necesita para relacionarse con el usuario adecuado */
        $linkRecuperar = "https://danilorivero.com/nuevaClave.php?idUsuario=".$dataConsulta['idUsuario']."&token=".$miTokenClave;

/* Aqui se especifican los datos necesarios para que funcione la funcion 'mail' */
        $destinatario = $correo; 
        $asunto = "Recuperar contraseña";
        $cuerpo = $linkRecuperar;
        $header = "From: thotsbrain@gmail.com" . "\r\n";
        $header.= "Reply-To: thotsbrain@gmail.com" . "\r\n";
        $header.= "X-Mailer: PHP/". phpversion();

        if(mail($destinatario,$asunto,$cuerpo,$header)){
/* Aqui se le notifica al usuario que el correo electronico se ha enviado a la direccion que el especifico */
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