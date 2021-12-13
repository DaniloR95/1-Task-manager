<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style0.css">
    <title>Thot's brain | Registration</title>
    <link rel="shortcut icon" href="imagenes/icono/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id="contenedor">

    

        <?php
/* Aqui primero se comprueba que el email introducido por el usuario no exista en la base de datos */
            $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
            $conexion->set_charset("utf8");
            $sql = "select email from usuarios where email=?";
            $instruccion = $conexion->prepare($sql);
            $instruccion->bind_param("s", $_POST["email"]);
            $instruccion->execute();
            $tabla = $instruccion->get_result();
/* En el caso de que exista, se le notifica esto al usuario y le da la opcion de volver al paso anterior */
            if ($tabla->num_rows == 1) {
        ?>      <div id="usuarioNoCreado">
                    <p>Ya existe una cuenta asociada a ese correo electronico</p>
                    <a href="javascript: history.go(-1)"><input type="button" value="Volver" class="botonRestablecer"></a>
                </div>
        <?php
            }
/* Si no existe, se crea el registro en la tabla 'usuarios' y se le notifica al usuario que su cuenta se ha creado correctamente, dandole acceso a la pagina */
            else{
                $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
                $sql = "insert into usuarios (nombreUsuario, apellidosUsuario, email, password, background) values (?,?,?,?,?)";
                $instruccion = $conexion->prepare($sql);
/* Con la funcion 'password_hash' se encripta la contraseña, de manera que no pueda verse tal cual en la base de datos */
                $PasswordEncriptada = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $background = 0;
                $instruccion->bind_param('ssssi', $_POST["nombre"], $_POST["apellidos"], $_POST["email"], $PasswordEncriptada, $background);
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