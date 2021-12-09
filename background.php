<?php
    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
    $conexion->set_charset("utf8");
    $sql = "update usuarios set background=? where idUsuario=?";
    $instruccion = $conexion->prepare($sql);
    $background = 0;
    if($_POST["background"]==0){
        $background = 1;
    }
    if($_POST["background"]==1){
        $background = 0;
    }
    $instruccion->bind_param("ii", $background, $_POST["idUsuario"]);
    $instruccion->execute();
?>