function registrarse(){
    panelRegistro = document.getElementById("registro");
    login = document.getElementById("login");
    login.style.display="none";
    panelRegistro.style.display="grid";
}
function cancelarRegistro(){
    document.getElementById("nombre").value = "";
    document.getElementById("apellidos").value = "";
    document.getElementById("email").value = "";
    document.getElementById("password").value = "";
    document.getElementById("password2").value = "";

    document.getElementById("nombre").style.border="1px solid grey";
    document.getElementById("apellidos").style.border="1px solid grey";
    document.getElementById("email").style.border="1px solid grey";
    document.getElementById("password").style.border="1px solid grey";
    document.getElementById("password2").style.border="1px solid grey";

    document.getElementById("spanNombre").style.display="none";
    document.getElementById("spanApellidos").style.display="none";
    document.getElementById("spanEmail").style.display="none";
    document.getElementById("spanPassword").style.display="none";
    document.getElementById("spanPassword2").style.display="none";
    panelRegistro = document.getElementById("registro");
    login = document.getElementById("login");
    login.style.display="grid";
    panelRegistro.style.display="none";
}
function comprobarNombre(nombreIntroducido){
    var nombre = document.getElementById('nombre');
    mensajeError = document.getElementById("spanNombre");
    var filter = /^[a-zñA-ZÑ ]{3,}$/;

    if(nombreIntroducido.length<1){
        nombre.style.border="1px solid grey";
        mensajeError.style.display="none";
    }
    else if (!filter.test(nombre.value)) {
        nombre.style.border="2px solid red";
        mensajeError.style.display="block";
    }
    else{
        nombre.style.border="2px solid green";
        mensajeError.style.display="none";

    }
}
function comprobarApellidos(apellidosIntroducidos){
    var apellidos = document.getElementById('apellidos');
    mensajeError = document.getElementById("spanApellidos");
    var filter = /^[a-zñA-ZÑ ]{3,}$/;

    if(apellidosIntroducidos.length<1){
        apellidos.style.border="1px solid grey";
        mensajeError.style.display="none";
    }
    else if (!filter.test(apellidos.value)) {
        apellidos.style.border="2px solid red";
        mensajeError.style.display="block";
    }
    else{
        apellidos.style.border="2px solid green";
        mensajeError.style.display="none";

    }
}
function comprobarEmail(emailIntroducido){
    var email = document.getElementById('email');
    mensajeError = document.getElementById("spanEmail");
    var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(emailIntroducido.length<1){
        email.style.border="1px solid grey";
        mensajeError.style.display="none";
    }
    else if (!filter.test(email.value)) {
        email.style.border="2px solid red";
        mensajeError.style.display="block";
    }
    else{
        email.style.border="2px solid green";
        mensajeError.style.display="none";

    }
}
function comprobarPassword(password){
    inputPassword = document.getElementById("password");
    mensajeError = document.getElementById("spanPassword");
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
    mensajeError = document.getElementById("spanPassword2");
    inputPassword = document.getElementById("password").value;
    inputPassword2 = document.getElementById("password2");
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
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');
    var email = document.getElementById('email');
    var password = document.getElementById("password");
    var password2 = document.getElementById("password2");

    var filterNombreYApellidos = /^[a-zñA-ZÑ ]{3,}$/;
    var filterEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var filterPassword = /^(?=.*[a-zñ])(?=.*[A-ZÑ])(?=.*\d)[a-zñA-ZÑ\d]{8,}$/;

    if (!filterNombreYApellidos.test(nombre.value) || !filterNombreYApellidos.test(apellidos.value) || !filterEmail.test(email.value) || !filterPassword.test(password.value) || password.value!=password2.value) {
        return;
    }
    else{
        document.getElementById("formulario").submit();
    }


}