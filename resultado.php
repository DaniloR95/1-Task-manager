<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php
        session_start();
        $usuario = $_SESSION['usuario'];
        $conexion2 = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
        $conexion2->set_charset("utf8");
        $sql2 = "select * from usuarios where email='$usuario'";
        $instruccion2 = $conexion2->prepare($sql2);
        $instruccion2->execute();
        $tabla2 = $instruccion2->get_result();
        $color = $tabla2->fetch_object();
        echo "<link rel='stylesheet' href='style" . $color->background . ".css'>";
    ?>
    <title>Thot's brain | Home</title>
    <link rel="shortcut icon" href="backgrouns/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id='contenedor'>
        <main id="main">
            <?php

                if(!isset($usuario)){
                    header("location: index.html");
                }

                else{
                    
                ?>
                    <div id="header">
                <?php
                        $conexion1 = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
                        $conexion1->set_charset("utf8");
                        $sql1 = "select * from usuarios where email='$usuario'";
                        $instruccion1 = $conexion1->prepare($sql1);
                        $instruccion1->execute();
                        $tabla1 = $instruccion1->get_result();
                        $datos = $tabla1->fetch_object();
                        echo "<h2 id='nombreUsuario'>" . $datos->nombreUsuario . " " . $datos->apellidosUsuario ."</h2>";
                        echo "<a id='botonSalir' href='cerrarSesion.php'>SALIR <i class='fas fa-power-off'></i></a>";
                        echo "<button id='botonBackground" . $datos->background . "' onclick = 'background(" . $datos->idUsuario . ", " . $datos->background . ");'><span><i class='fas fa-sun'></i></span><span><i class='fas fa-moon'></i></span><div id='bola'></div></button>";
                ?>
                    </div>
                <?php

                    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
                    $conexion->set_charset("utf8");
                    $sql = "select * from tareas where emailUsuario='$usuario'";
                    $instruccion = $conexion->prepare($sql);
                    $instruccion->execute();
                    $tabla = $instruccion->get_result();
                    while ($fila = $tabla->fetch_object()) {
                        ?>
                            <div class="tarea">
                                <div class="nombre">
                                    <?=$fila->tituloTarea?>
                                </div>
                                <div class="opciones">
                                    <div class="mostrar" onclick="mostrar('<?=$fila->idTarea?>');">
                                        <i class="fas fa-chevron-down" id='flechaMostrar<?=$fila->idTarea?>'></i>
                                    </div>
                                    <div class="estado" onclick="estado(<?=$fila->idTarea?>, <?=$fila->estadoTarea?>)">
                                        <i class="fas fa-check-square estado<?=$fila->estadoTarea?>"></i>
                                    </div>
                                    <div class="editar" onclick="editar('modificar<?=$fila->idTarea?>');">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="eliminar" onclick="eliminar('<?=$fila->idTarea?>');">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </div>
                                <div class="descripcion" id="<?=$fila->idTarea?>">
                                    <?=$fila->descripcionTarea?>
                                </div>
                            </div>

                            <form action="">
                                <div class="modificarTarea" id="modificar<?=$fila->idTarea?>">
                                    <div class="titulo">
                                        <h1><?=$fila->tituloTarea?></h1>
                                    </div>
                                    <input type="text" placeholder="Titulo" name="newTitulo" class="rellenarNewTarea" value="<?=$fila->tituloTarea?>">
                                    <textarea name="newDescripcion" class="rellenarNewTarea2" placeholder="Descripción"><?=$fila->descripcionTarea?></textarea>
                                    <div class="botones">
                                        <input type="button" value="Modificar" class="botonCrear" onclick="modificarTarea(<?=$fila->idTarea?>, this.form.newTitulo.value, this.form.newDescripcion.value);">
                                        <input type="button" value="Cancelar" class="botonCancelar" onclick="cancelarModificar('modificar<?=$fila->idTarea?>');">    
                                    </div>
                                </div>
                            </form>
                        <?php
                    }
                }        
            ?>
            <form action="resultado.php" method="post">
                <div id="nuevaTarea">
                    <div class="titulo">
                        <h1>Nueva tarea</h1>
                    </div>

                    <input type="text" name="email" hidden="true" value="<?=$usuario?>">
                    <input type="text" placeholder="Titulo" name="titulo" class="rellenarNewTarea" required>
                    <textarea name="descripcion"  class="rellenarNewTarea2" placeholder="Descripción"></textarea>
                    <input type="number" name="estado" class="ocultar" value="0">
                    <div class="botones">
                        <input type="button" value="Crear" class="botonCrear" onclick="crearTarea(this.form.email.value, this.form.titulo.value, this.form.descripcion.value, this.form.estado.value);">
                        <input type="button" value="Cancelar" class="botonCancelar" onclick="nuevaTarea('0');">    
                    </div>
                </div>
            </form>
            <div id="sumarTarea" onclick="nuevaTarea('1');">
                <h2><i class="fas fa-plus"></i> NUEVA TAREA</h2>
            </div>
        </main>
    </div>

    <script src="java_script.js"></script>

</body>
</html>