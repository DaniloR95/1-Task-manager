<?php
/* Aqui se realiza el cambio entre el modo dia y el modo noche */
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
/* Actualiza el campo 'background' de la tabla 'usuarios' donde el 'idUsuario' sea el pasado con el metodo 'post'*/
    $sql = "update usuarios set background=? where idUsuario=?";
    $instruccion = $conexion->prepare($sql);
    $background = 0;
/* Compara el valor del parametro 'background' que se le pasa con el metodo 'post', con los dos valores que puede tener el campo en la base de datos, y lo cambia por el opuesto */
    if($_POST["background"]==0){
        $background = 1;
    }
    if($_POST["background"]==1){
        $background = 0;
    }
    $instruccion->bind_param("ii", $background, $_POST["idUsuario"]);
    $instruccion->execute();
?>