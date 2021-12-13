<?php
/* Este archivo se encarga de eliminar de la tabla 'tareas' el registro con el 'idTarea' pasado por el metodo 'post' */
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $sql = "delete from tareas where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('i', $_POST["idTarea"]);
    $instruccion->execute();
?>