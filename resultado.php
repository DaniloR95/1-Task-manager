<!DOCTYPE html>
<!-- Esta es la pagina a la que se accede cuando el usuario se logea correctamente -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <?php
    /* Aqui se inicia la sesion con la funcion 'session_start' y con el parametro 'usuario' el cual corresponde al correo utilizado para inicial la sesion */
        session_start();
        $usuario = $_SESSION['usuario'];
        /* Con esta consulta se busca cual es el valor del campo 'backgound' de la tabla 'usuarios' correspondiente al usuario que ha iniciado sesion, y se utiliza un archivo css u otro (modo dia o modo noche) en funcion de esto */
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
    <link rel="shortcut icon" href="imagenes/icono/Brain_icon_from_Noun_Project.png">
</head>
<body>
    <div id='contenedor'>
        <main id="main">
            <?php
/* En el caso de que se intente acceder a el link de esta pagina sin logearse, se redireccionara a la pagina de inicio */
                if(!isset($usuario)){
                    header("location: index.html");
                }
/* En el caso contrario, se podra acceder al contenido de este archivo */
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
                ?>
                        <div id='opcionesHeader'>
                            <!-- Con este boton se cambia entre el modo dia y el modo noche -->
                            <button class='modo' id='botonBackground<?=$datos->background?>' onclick = 'background(<?=$datos->idUsuario?>, <?=$datos->background?>);'><span><i class='fas fa-sun'></i></span><span><i class='fas fa-moon'></i></span><div id='bola'></div></button>
                            <h2 id='nombreUsuario'><?=$datos->nombreUsuario?> <?=$datos->apellidosUsuario?></h2>
                            <!-- Con este boton se ejecuta el archivo 'cerrarSesion.php' que cierra la sesion -->
                            <a id='botonSalir' href='cerrarSesion.php'><span>SALIR</span><i class='fas fa-power-off'></i></a>
                        </div>
                    </div>
                <?php
                    /* En esta consulta se buscan todos los registros de la tabla 'tareas' cuyo email corresponda con el del usuario  */
                    $conexion = new mysqli('localhost', 'u106913443_thotsbrain', 'S@0v6Rp?', 'u106913443_thotsbrain');
                    $conexion->set_charset("utf8");
                    $sql = "select * from tareas where emailUsuario='$usuario'";
                    $instruccion = $conexion->prepare($sql);
                    $instruccion->execute();
                    $tabla = $instruccion->get_result();
                    /* Con este while se muestra en pantalla todas las tareas recogidas con la consulta anterior, asi como su interface para editarlas (el cual estara oculto hasta que el usuario lo active) */
                    while ($fila = $tabla->fetch_object()) {
                        ?>
                            <div class="tarea hecha<?=$fila->estadoTarea?>">
                                <div class="nombre">
                                    <?=$fila->tituloTarea?>
                                </div>
                                <!-- Este div contiene otros 4 divs los cuales al hacer click encima de ellos se realizan diversos cambio en las tareas -->
                                <div class="opciones">
                                    <!-- Con este se muestra/oculta la descripcion de la tarea -->
                                    <div class="mostrar" onclick="mostrar('<?=$fila->idTarea?>');" title="Descripción">
                                        <i class="fas fa-chevron-down" id='flechaMostrar<?=$fila->idTarea?>'></i>
                                    </div>
                                    <!-- Con este se cambia el estado de la tarea (hecha/sin hacer) -->
                                    <div class="estado" onclick="estado(<?=$fila->idTarea?>, <?=$fila->estadoTarea?>)" title="Hecha / Sin hacer">
                                        <i class="fas fa-check-square estado<?=$fila->estadoTarea?>"></i>
                                    </div>
                                    <!-- Con este se puede visualizar la interface para editar la tarea -->
                                    <div class="editar" onclick="editar('modificar<?=$fila->idTarea?>');" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <!-- Finalmente con este se puede eliminar la tarea seleccionada -->
                                    <div class="eliminar" onclick="eliminar('<?=$fila->idTarea?>');" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </div>
                                </div>
                                <div class="descripcion" id="<?=$fila->idTarea?>" style=" display: none; ">
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
            <!-- Con este formulario el usuario puede escribir una nueva tarea, la cual al enviarse se implementara en la tabla 'tareas' de la base de datos -->
            <form action="resultado.php" method="post">
                <div id="nuevaTarea">
                    <div class="titulo">
                        <h1>Nueva tarea</h1>
                    </div>

                    <input type="text" name="email" hidden="true" value="<?=$usuario?>">
                    <input type="text" placeholder="Titulo" name="titulo" class="rellenarNewTarea" id="tituloNewTarea" required>
                    <textarea name="descripcion"  class="rellenarNewTarea2" placeholder="Descripción" id="descripcionNewTarea"></textarea>
                    <input type="number" name="estado" class="ocultar" value="0">
                    <div class="botones">
                        <input type="button" value="Crear" class="botonCrear" onclick="crearTarea(this.form.email.value, this.form.titulo.value, this.form.descripcion.value, this.form.estado.value);">
                        <input type="button" value="Cancelar" class="botonCancelar" onclick="nuevaTarea('0');">    
                    </div>
                </div>
            </form>
            <!-- Al hacer click en este div, se podra ver la interface para agregar una tarea -->
            <div id="sumarTarea" onclick="nuevaTarea('1');">
                <h2><i class="fas fa-plus"></i> NUEVA TAREA</h2>
            </div>
        </main>
    </div>

    <script src="java_script.js"></script>

</body>
</html>