<?php
    $conexion = new mysqli("127.0.0.1", "root", "", "proyecto");
    $conexion->set_charset("utf8");
    $sql = "update tareas set idTarea=?, emailUsuario=?, tituloTarea=?, descripcionTarea=?, estadoTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $estado = 0;
    if($_POST["estado"]==0){
        $estado = 1;
    }
    if($_POST["estado"]==1){
        $estado = 0;
    }
    $instruccion->bind_param("isssi", $_POST["id"], $_POST["email"], $_POST["titulo"], $_POST["descripcion"], $estado);
    $instruccion->execute();
?>