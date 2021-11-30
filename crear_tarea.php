<?php

    $conexion = new mysqli('127.0.0.1', 'root', '', 'proyecto');
    $sql = "insert into tareas (emailUsuario, tituloTarea, descripcionTarea, estadoTarea) values (?,?,?,?)";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('sssi', $_POST["email"], $_POST["titulo"], $_POST["descripcion"], $_POST["estado"]);
    $instruccion->execute();

?>