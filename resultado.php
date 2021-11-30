<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="tareas_style.css">
    <title>Document</title>
</head>
<body>
    <div id="contenedor">

        <main id="main">
            <?php
                $conexion = new mysqli("127.0.0.1", "root", "", "proyecto");
                $conexion->set_charset("utf8");
                $sql = "select * from tareas where emailUsuario=?";
                $instruccion = $conexion->prepare($sql);
                $instruccion->bind_param("s", $_POST["email"]);
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
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="estado">
                                    <i class="fas fa-check-square"></i>
                                </div>
                                <div class="editar">
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
                    <?php
                }        
            ?>
            <form action="resultado.php" method="post">
                <div id="nuevaTarea">
                    <div class="titulo">
                        <h1>Nueva tarea</h1>
                    </div>

                    <input type="text" name="email" class="ocultar" value="<?=$_POST["email"]?>">
                    <input type="text" placeholder="Titulo" name="titulo" class="rellenarNewTarea" required>
                    <textarea name="descripcion"  class="rellenarNewTarea2" placeholder="Descripción"></textarea>
                    <input type="number" name="estado" class="ocultar" value="0">
                    <div class="botones">
                        <input type="button" value="Crear" class="botonCrear" onclick="crearTarea(this.form.email.value, this.form.titulo.value, this.form.descripcion.value, this.form.estado.value);">
                        <input type="button" value="Cancelar" class="botonCancelar" onclick="cancelarTarea();">    
                    </div>
                </div>
            </form>
            <div id="sumarTarea" onclick="nuevaTarea();">
                <h1>+</h1>
            </div>
        </main>
    </div>

    <script>
        function mostrar(descripcion){
            descripcionMostrar = document.getElementById(descripcion);
            descripcionMostrar.style.display="block";
        }

        function eliminar(idTarea){
            var parametros = 
            {
                "idTarea" : idTarea
            };
            $.ajax({
                data: parametros,
                url: 'eliminar_tarea.php',
                type: 'POST',
                success: function(tarea)
                {
                    location.reload();
                }
            });
        }
        function nuevaTarea(){
            nuevaTarea = document.getElementById("nuevaTarea");
            nuevaTarea.style.display="grid";

        }
        function cancelarTarea(){
            nuevaTarea = document.getElementById("nuevaTarea");
            nuevaTarea.style.display="none";
        }
        function crearTarea(email, titulo, descripcion, estado){
            var parametros = 
            {
                "email" : email,
                "titulo" : titulo,
                "descripcion" : descripcion,
                "estado" : estado
            };
            $.ajax({
                data: parametros,
                url: 'crear_tarea.php',
                type: 'POST',
                success: function(tarea)
                {
                    location.reload();
                }
            });

        }
    </script>

</body>
</html>