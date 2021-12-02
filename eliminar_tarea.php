<?php
    $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', '<M-~/7uf\x&=pX^x', 'id18050069_proyecto');
    $sql = "delete from tareas where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('i', $_POST["idTarea"]);
    $instruccion->execute();
?>