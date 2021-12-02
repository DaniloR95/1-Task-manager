<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pruebas_style.css">
    <title>Document</title>
</head>
<body>
    <div id="contenedor">

    

        <?php
            $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', '<M-~/7uf\x&=pX^x', 'id18050069_proyecto');
            $conexion->set_charset("utf8");
            $sql = "select email from usuarios where email=?";
            $instruccion = $conexion->prepare($sql);
            $instruccion->bind_param("s", $_POST["email"]);
            $instruccion->execute();
            $tabla = $instruccion->get_result();
            if ($tabla->num_rows == 1) {
        ?>      <div id="usuarioNoCreado">
                    <p>Ya existe una cuenta asociada a ese correo electronico</p>
                    <a href="javascript: history.go(-1)"><input type="button" value="Volver" class="botonRestablecer"></a>
                </div>
        <?php
            }
            else{
                $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', '<M-~/7uf\x&=pX^x', 'id18050069_proyecto');
                $sql = "insert into usuarios (nombreUsuario, apellidosUsuario, email, password) values (?,?,?,?)";
                $instruccion = $conexion->prepare($sql);
                $PasswordEncriptada = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $instruccion->bind_param('ssss', $_POST["nombre"], $_POST["apellidos"], $_POST["email"], $PasswordEncriptada);
                $instruccion->execute();
        ?>
                <div id="usuarioCreado">
                    <p>El usuario se ha creado correctamente</p>
                    <a href="index.html"><input type="button" value="Iniciar sesión" class="botonRestablecer"></a>
                </div>
        <?php
            }
        ?>
    </div>
</body>
</html>