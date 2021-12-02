<?php
    $conexion = new mysqli('localhost', 'id18050069_proyectotaskmanager', '<M-~/7uf\x&=pX^x', 'id18050069_proyecto');
    $conexion->set_charset("utf8");
    $sql = "update tareas set tituloTarea=?, descripcionTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param("ssi",$_POST["titulo"], $_POST["descripcion"], $_POST["id"]);
    $instruccion->execute();
?>