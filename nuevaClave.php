<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="contenedor0">
        <form action="crearNuevaClave.php" method="post">
            <div id="restablecerPassword3">
                <h1>Restablecer Contraseña</h1>
                <input type="text" name="idUsuario" value="<?php echo $_REQUEST['idUsuario']; ?>" hidden="true">
                <input type="text" name="token" value="<?php echo $_REQUEST['token']; ?>" hidden="true">
                <input type="password" placeholder="Nueva contraseña" name="password" class="rellenarRegistro">
                <input type="password" placeholder="Repetir contraseña" class="rellenarRegistro">
                <input type="submit" value="Modificar" class="botonRestablecer">
            </div>
        </form>
    </div>
</body>
</html>