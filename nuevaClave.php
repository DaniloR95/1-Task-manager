<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thot's brain | Recover password</title>
    <link rel="shortcut icon" href="backgrouns/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id="contenedor">
        <form action="crearNuevaClave.php" method="post" id="formularioRestablecerPassword">
            <div id="restablecerPassword3">
                <h1>Restablecer Contraseña</h1>
                <input type="text" name="idUsuario" value="<?php echo $_REQUEST['idUsuario']; ?>" hidden="true">
                <input type="text" name="token" value="<?php echo $_REQUEST['token']; ?>" hidden="true">
                <input type="password" id="passwordRecuperar" placeholder="Nueva contraseña" name="password" class="rellenarRegistro" onkeyup="comprobarPassword(this.value);">
                <span id="spanPasswordRecuperar" class="spanError">* La contraseña debe contener letras mayusculas, minuscula, numeros y 8 caracteres como minimo</span>
                <input type="password" id="password2Recuperar" placeholder="Repetir contraseña" class="rellenarRegistro" onkeyup="comprobarPassword2(this.value)">
                <span id="spanPassword2Recuperar" class="spanError">* La contraseña no coincide con la anterior</span>
                <input type="button" value="Modificar" class="botonRestablecer" onclick="validarRegistro();">
            </div>
        </form>
    </div>
    <script>
        function comprobarPassword(password){
            inputPassword = document.getElementById("passwordRecuperar");
            mensajeError = document.getElementById("spanPasswordRecuperar");
            regexp_password = /^(?=.*[a-zñ])(?=.*[A-ZÑ])(?=.*\d)[a-zñA-ZÑ\d]{8,}$/;
            if(password.length<1){
                inputPassword.style.border="1px solid grey";
                mensajeError.style.display="none";
            }
            else if (!regexp_password.test(inputPassword.value)) {
                inputPassword.style.border="2px solid red";
                mensajeError.style.display="block";
            }
            else{
                inputPassword.style.border="2px solid green";
                mensajeError.style.display="none";
            }
        }
        function comprobarPassword2(password2){
            mensajeError = document.getElementById("spanPassword2Recuperar");
            inputPassword = document.getElementById("passwordRecuperar").value;
            inputPassword2 = document.getElementById("password2Recuperar");
            if(password2 != inputPassword){
                inputPassword2.style.border="2px solid red";
                mensajeError.style.display="block";

            }
            else{
                inputPassword2.style.border="2px solid green";
                mensajeError.style.display="none";

            }
        }

        function validarRegistro(){
            var password = document.getElementById("passwordRecuperar");
            var password2 = document.getElementById("password2Recuperar");
            var filterPassword = /^(?=.*[a-zñ])(?=.*[A-ZÑ])(?=.*\d)[a-zñA-ZÑ\d]{8,}$/;

            if (!filterPassword.test(password.value) || password.value!=password2.value) {
                return;
            }
            else{
                document.getElementById("formularioRestablecerPassword").submit();
            }
        }
    </script>
</body>
</html>