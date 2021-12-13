/* -------- INDEX.HTML -------- */
// Con esta funcion se muestra la interface para que el usuario inicie sesion
function mostrarLogin(){
    panelHome = document.getElementById("home");
    login = document.getElementById("login");
    login.style.display="grid";
    panelHome.style.display="none";
}
// Con esta funcion se muestra la interface de registro
function registrarse(){
    panelRegistro = document.getElementById("registro");
    panelHome = document.getElementById("home");
    login = document.getElementById("login");
    panelHome.style.display="none";
    login.style.display="none";
    panelRegistro.style.display="grid";
}
// con esta funcion se muestra la interface que permite recuperar la contraseña 
function olvido(){
    panelOlvido = document.getElementById("restablecerPassword");
    login = document.getElementById("login");
    login.style.display="none";
    panelOlvido.style.display="grid";
}
// Con esta funcion se comprueba que el nombre introducido contenga un minimo de 3 caracteres, y que estos solo puedan ser letras, en caso contrario se le hace saber al usuarion del error
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
// Con esta funcion se compueda que el apellido introducido este compuesto de un minimo de 3 caracteres y que estos sean letras, en caso contrario se le hace saber al usuarion del error
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
// Esta funcion comprueba que el email introducido sea uno valido, en caso contrario se le hace saber al usuarion del error
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
// Esta funcion comprueba que la contraseña escrita por el usuario tenga un minimo de 8 caracteres y este compuesto unicamente por letras (minusculas y mayusculas) y numeros, teniendo que tener como minimo uno de cada uno de esos tipos caracteres, en caso contrario se le hace saber al usuarion del error
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
// Con esta funcion se compueba que la contraseña de confirmacion sea igual a la primera que el usuario introdujo, en caso contrario se le hace saber al usuarion del error
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
// Esta funcion comprueba que todos los campos necesarios para el registro cumplan con los requisitos exigidos, si esto es asi, se hace el submit del formulario, en caso contrario no hace nada
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
// Esta funcion limpia todos los inputs del registro y regresa al usuario al inicio de la pagina
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
// Esta funcion comprueba que el email introducido para la recuperacion d ela contraseña sea valido, si no lo es, le notifica esto al usuario
function comprobarEmailRecuperar(emailIntroducido){
    var email = document.getElementById('emailRecuperar');
    mensajeError = document.getElementById("spanEmailRecuperar");
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
// esta funcion al igual que la anterior, comprueba la validez del email, y si este es correcto, realiza el submit, en caso contrario no hace nada
function comprobarRecuperar(){
    var emailRecuperar = document.getElementById('emailRecuperar');
    var filterEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!filterEmail.test(emailRecuperar.value)) {
        return;
    }
    else{
        document.getElementById("recuperar").submit();
    }
}
// Con esta funcion se cierra la interface de recuperacion de contraseña, y se regresa al usuario al estado anterior
function olvidoCancelar(){
    panelOlvido = document.getElementById("restablecerPassword");
    login = document.getElementById("login");
    login.style.display="grid";
    panelOlvido.style.display="none";
}

/* -------- RESULTADO.PHP -------- */
// Esta funcion se encarga de enviar al archivo 'background.php' (el cual realiza el cambio entre el modo dia y el modo noche) los datos necesarios para su funcionamiento, su resultado se vuelve a cargar en esta pagina
function background(idUsuario, background){
    var parametros = 
    {
        "idUsuario" : idUsuario,
        "background" : background
    };
    $.ajax({
        data: parametros,
        url: 'background.php',
        type: 'POST',
        success: function(tarea)
        {
            location.reload();
        }
    });
}
// Esta funcion comprueba cual es el valor del display de la descripcion de la tarea y lo modifica para que sea visible o no (dependiendo de su estado anterior)
function mostrar(descripcion){
    descripcionMostrar = document.getElementById(descripcion);
    flechaMostrar = document.getElementById("flechaMostrar" + descripcion);
    if(descripcionMostrar.style.display=="none"){
        descripcionMostrar.style.display="block";
        flechaMostrar.style.transform="rotate(180deg)";
        return;
    }
    if(descripcionMostrar.style.display="block"){
        descripcionMostrar.style.display="none";
        flechaMostrar.style.transform="rotate(0deg)";
        return;
    }
}
// Esta funcion se encarga de enviar al archivo 'estado_tarea.php' (el cual le cambia el estado a la tarea) los datos necesarios para su funcionamiento, su resultado se vuelve a cargar en esta pagina
function estado(id, estado){
    var parametros = 
    {
        "id" : id,
        "estado" : estado
    };
    $.ajax({
        data: parametros,
        url: 'estado_tarea.php',
        type: 'POST',
        success: function(tarea)
        {
            location.reload();
        }
    });
}
// Con esta funcion se muestra la interface para editar la tarea correspondiente
function editar(id){
    mostrarEditar = document.getElementById(id);
    mostrarNewTarea = document.getElementById("nuevaTarea");
    mostrarEditar.style.display="grid"
    mostrarNewTarea.style.display="none";
}
// Esta funcion se encarga de enviar al archivo 'eliminar_tarea.php' el id de la tarea seleccionada, para que este lo elimine, y recarga la pagina, mostrando el resultado
function eliminar(idTarea){
    var parametros = 
    {
        "idTarea" : idTarea
    };
    $.ajax({
        data: parametros,
        url: 'eliminar_tarea.php',
        type: 'POST',
        success: function(tarea)
        {
            location.reload();
        }
    });
}
// Con esta funcion se le envia al archivo 'modificar_tarea.php' los datos para que realice su funcion (modificar los datos de una tarea), y recarga la pagina para mostrar el resultado
function modificarTarea(id, titulo, descripcion){
    var parametros = 
    {
        "id" : id,
        "titulo" : titulo,
        "descripcion" : descripcion
    };
    $.ajax({
        data: parametros,
        url: 'modificar_tarea.php',
        type: 'POST',
        success: function(tarea)
        {
            location.reload();
        }
    });
}
// Con esta funcion se cierra la interface para modificar una tarea
function cancelarModificar(id){
    mostrar = document.getElementById(id);
    mostrar.style.display="none"
    location.reload();
}
// Con esta funcion se envian los datos necesarios para crear una nueva tarea al archivo 'crear_tarea.php' el cual se encarga de esto
function crearTarea(email, titulo, descripcion, estado){
    var parametros = 
    {
        "email" : email,
        "titulo" : titulo,
        "descripcion" : descripcion,
        "estado" : estado
    };
    $.ajax({
        data: parametros,
        url: 'crear_tarea.php',
        type: 'POST',
        success: function(tarea)
        {
            location.reload();
        }
    });

}
// Esta funcion se encarga de mostrar/ocultar la interface para crear una nueva tarea
function nuevaTarea(ver){
    mostrarNewTarea = document.getElementById("nuevaTarea");
    if(ver == "1"){
        mostrarNewTarea.style.display="grid";
    }
    if(ver == "0"){
        mostrarNewTarea.style.display="none";
        document.getElementById("tituloNewTarea").value = "";
        document.getElementById("descripcionNewTarea").value = "";
    }
}