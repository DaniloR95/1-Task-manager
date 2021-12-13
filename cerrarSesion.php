<?php
/* Aqui se ejecuta la funcion 'session_destroy' con la cual se cierra la sesion del usuario, y regresa a la pagina de inicio */
    session_start();

    session_destroy();

    header('location: index.html');
    exit();
?>