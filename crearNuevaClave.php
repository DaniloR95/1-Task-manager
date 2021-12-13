<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <title>Thot's brain | Recover</title>
    <link rel="shortcut icon" href="imagenes/icono/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <?php
/* Aqui se recibe la nueva contraseña que ha escrito el usuario y se actualiza en la base de datos */
        $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
        $conexion->set_charset("utf8");
/* Con la funcion 'password_hash' se encripta la contraseña, de manera que no pueda verse tal cual en la base de datos */
        $PasswordEncriptada = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $sql = "update usuarios set password=? where idUsuario=? and token=?";
        $instruccion = $conexion->prepare($sql);
        $instruccion->bind_param('sis', $PasswordEncriptada, $_REQUEST['idUsuario'], $_REQUEST['token']);
        $instruccion->execute();
    ?>
<!-- Se le muestra al usuario un mensaje confirmandole el cambio de contraseña -->
    <div id="contenedor">
        <div id="restablecerPassword4">
            <p>Su contraseña ha sido modificada con exito</p>
            <a href="index.html"><input type="button" value="Volver al inicio" class="botonRestablecer"></a>
        </div>
    </div>
</body>
</html>
