<?php
    $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', 'Y0/Er%vE@GlmrsU>', 'id18050069_proyecto');
    $sql = "delete from tareas where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('i', $_POST["idTarea"]);
    $instruccion->execute();
?>