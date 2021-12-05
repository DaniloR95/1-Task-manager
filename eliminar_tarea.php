<?php
    $conexion = new mysqli('127.0.0.1', 'root', '', 'proyecto');
    $sql = "delete from tareas where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('i', $_POST["idTarea"]);
    $instruccion->execute();
?>