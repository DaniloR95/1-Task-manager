<?php
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
    $sql = "update tareas set estadoTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $estado = 0;
    if($_POST["estado"]==0){
        $estado = 1;
    }
    if($_POST["estado"]==1){
        $estado = 0;
    }
    $instruccion->bind_param("ii", $estado, $_POST["id"]);
    $instruccion->execute();
?>