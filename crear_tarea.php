<?php
/* Este archivo se encarga de insertar en la tabla 'tareas' un nuevo registro compuesto por los parametros pasados por el metodo 'post' */
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $sql = "insert into tareas (emailUsuario, tituloTarea, descripcionTarea, estadoTarea) values (?,?,?,?)";
    $instruccion = $conexion->prepare($sql);
    $instruccion->bind_param('sssi', $_POST["email"], $_POST["titulo"], $_POST["descripcion"], $_POST["estado"]);
    $instruccion->execute();

?>