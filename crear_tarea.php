<?php

    $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', 'Y0/Er%vE@GlmrsU>', 'id18050069_proyecto');
    $sql = "insert into tareas (emailUsuario, tituloTarea, descripcionTarea, estadoTarea) values (?,?,?,?)";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('sssi', $_POST["email"], $_POST["titulo"], $_POST["descripcion"], $_POST["estado"]);
    $instruccion->execute();

?>