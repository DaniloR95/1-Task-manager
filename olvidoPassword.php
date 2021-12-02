<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="recuperarClaveConLink.php" method="post">
        <div id="restablecerPassword">
            <h1>¿Olvidaste la contraseña?</h1>
            <p>Escribe el correo electrónico con el que te registraste y haz clic en "Restablecer contraseña".</p>
            <input type="email" id="emailRecuperar" name="email" placeholder="Email">
            <input type="button" value="Restablecer contraseña" class="botonRestablecer" onclick="this.form.submit();">
        </div>
    </form>
</body>
</html>