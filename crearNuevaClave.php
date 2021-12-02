<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', '<M-~/7uf\x&=pX^x', 'id18050069_proyecto');
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
