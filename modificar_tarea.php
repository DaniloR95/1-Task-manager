<?php
    $conexion = new mysqli('127.0.0.1', 'root', '', 'proyecto');
    $conexion->set_charset("utf8");
    $sql = "update tareas set tituloTarea=?, descripcionTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param("ssi",$_POST["titulo"], $_POST["descripcion"], $_POST["id"]);
    $instruccion->execute();
?>