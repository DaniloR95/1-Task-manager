<?php
/* Aqui se actualiza el estado de la tarea con el 'id' pasado por el metodo 'post' */
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
    $sql = "update tareas set estadoTarea=? where idTarea=?";
    $instruccion = $conexion->prepare($sql);
    $estado = 0;
/* Aqui se compara el valor del parametro 'estado' recibido, con los dos valores que este puede contener, y se le asigna a la variante '$estado' el contrario, para que este sea el valor con el que se actualice en la base de datos */
    if($_POST["estado"]==0){
        $estado = 1;
    }
    if($_POST["estado"]==1){
        $estado = 0;
    }
    $instruccion->bind_param("ii", $estado, $_POST["id"]);
    $instruccion->execute();
?>