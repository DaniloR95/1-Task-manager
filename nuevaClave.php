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
<!-- Aqui es a donde se envia al usuario al entrar en el link de recuperacion -->
<body>
    <div id="contenedor">
<!-- En este form, el usuario introducira su nueva contraseña. Tambien contiene datos ocultos para el usuario, necesarios para cambiar correctamente su contraseña -->
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
        /* Esta funcion se ejecuta cada vez que el usuario suelta una tecla mientra sescribe en el input asociado. le informa al usuario si la contraseña cumple los requisitos establecidos o no*/
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
        /* Esta funcion se ejecuta de la misma manera que la anterior, y comprueba que lo escrito en su input, sea igual a lo escrito en el primero */
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
        /* Al ejecutarse esta funcion, compueba tanto que la primera vez que escribe la contraseña, esta cumpla con los requisitos exigidos, y que la segunda contraseña sea igual a la primera. Si esto se cumple, los datos se envian a 'crearNuevaClave.php' para que se actualicen los datos, pero si no se cumplen, no hace nada */
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