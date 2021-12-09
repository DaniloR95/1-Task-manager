<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thot's brain | Recover</title>
    <link rel="shortcut icon" href="backgrouns/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <?php
        $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
        $conexion->set_charset("utf8");

        $PasswordEncriptada = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
        $sql = "update usuarios set password=? where idUsuario=? and token=?";
        $instruccion = $conexion->prepare($sql);
        $instruccion->bind_param('sis', $_REQUEST['password'], $_REQUEST['idUsuario'], $_REQUEST['token']);
        $instruccion->execute();
    ?>
    <div id="contenedor">
        <div id="restablecerPassword4">
            <p>Su contraseña ha sido modificada con exito</p>
            <input type="button" value="Iniciar sesión" class="botonRestablecer">
        </div>
    </div>
</body>
</html>
