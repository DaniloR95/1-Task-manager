<?php
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
    $sql = "update tareas set tituloTarea=?, descripcionTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param("ssi",$_POST["titulo"], $_POST["descripcion"], $_POST["id"]);
    $instruccion->execute();
?>