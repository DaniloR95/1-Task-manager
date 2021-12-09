<?php
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $sql = "delete from tareas where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('i', $_POST["idTarea"]);
    $instruccion->execute();
?>