<?php
include("../../bd.php"); //Conexion BD
/* crear portafolio */
if($_POST){ 
    //* recepcion valores del formulario
    $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
        $subtitulo=(isset($_POST['subtitulo']))? $_POST['subtitulo']:'';
            $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:'';
                $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';
                    $cliente=(isset($_POST['cliente']))? $_POST['cliente']:'';
                        $categoria=(isset($_POST['categoria']))? $_POST['categoria']:'';
                            $url=(isset($_POST['url']))? $_POST['url']:'';

/* Adjunta img*/
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

// Variable temporal archivo img
    $tmp_imagen=$_FILES['imagen']['tmp_name'];
    if($tmp_imagen!=""){ 
//carpeta destino archivo imagen
    move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen); 
    } 

//* Sentencia de insercion de valores a la tabla 
    $sentencia=$conexion->prepare("INSERT INTO `tbl_portafolio` 
    (`ID`,`titulo`,`subtitulo`,`imagen`,`descripcion`,`cliente`,`categoria`,`url`)
    VALUES (NULL,:titulo,:subtitulo,:imagen,:descripcion,:cliente,:categoria,:url);"); 

//* Valores insertados en el formulario
    $sentencia->bindParam(':titulo', $titulo);    
        $sentencia->bindParam(':subtitulo', $subtitulo);
            $sentencia->bindParam(':imagen', $nombre_archivo_imagen);
                $sentencia->bindParam(':descripcion', $descripcion);
                    $sentencia->bindParam(':cliente', $cliente);
                        $sentencia->bindParam(':categoria', $categoria);
                            $sentencia->bindParam(':url', $url);
                            $sentencia->execute(); /* ejecuta la sentencia */
                            $mensaje="Registro ha agregado  correctamente";
                            header("Location:index.php?mensaje=".$mensaje);
}
include("../../template/header.php");
?>

<!-- Crear portafilo -->
<div class="card">
    <div  class="card-header">CREAR PORTAFILIO</div>
        <div class="card-body">

<!-- Formulario -->
            <form action ="" enctype="multipart/form-data" method="post">
                <!-- Titulo -->
                <div class="mb-3">
                    <label  for="titulo" class="form-label">Titulo:</label>
                    <input  type="text"
                            class="form-control"
                            name="titulo"
                            id="titulo"
                            aria-describedby="helpId"
                            placeholder="Titulo"/>
                    </div>
                <!-- Subtitulo -->
                <div class="mb-3">
                    <label  for="subtitulo" class="form-label">Subtitulo:</label>
                    <input  type="text"
                            class="form-control"
                            name="subtitulo"
                            id="subtitulo"
                            aria-describedby="helpId"
                            placeholder="Subtitulo"/>
                    </div>
                <!-- Imagen -->
                <div class="mb-3">
                    <label  for="imagen" class="form-label">Imagen:</label>
                    <input  type="file"
                            class="form-control"
                            name="imagen"
                            id="imagen"
                            aria-describedby="filehelpId"
                            placeholder="imagen"/>
                    </div>
            <!-- Descripcion -->
            <div class="mb-3">
                <label  for="descripcion" class="form-label">Descripcion:</label>
                <input  type="text"
                        class="form-control"
                        name="descripcion"
                        id="descripcion"
                        aria-describedby="helpId"
                        placeholder="Descripcion"/>
                </div>
            <!-- Cliente -->
            <div class="mb-3">
                <label  for="cliente" class="form-label">Cliente:</label>
                <input  type="text"
                        class="form-control"
                        name="cliente"
                        id="cliente"
                        aria-describedby="helpId"
                        placeholder="Cliente"/>
            </div>
            <!-- Categoria -->
            <div class="mb-3">
                <label  for="categoria" class="form-label">Categoria:</label>
                <input  type="text"
                        class="form-control"
                        name="categoria"
                        id="categoria"
                        aria-describedby="helpId"
                        placeholder="categoria"/>
            </div>
            <!-- Url -->
            <div class="mb-3">
                <label  for="url" class="form-label">Url:</label>
                <input  
                    type="text"
                    class="form-control"
                    name="url"
                    id="url"
                    aria-describedby="helpId"
                    placeholder="url"/>
            </div>
            <!-- Botones -->
            <button type="submit" 
                    class="btn btn-primary">AGREGAR</button>
                    |
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
        </form>
</div>
<div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php");?>