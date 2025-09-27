<?php 
include("../../bd.php"); //Conexion BD
/* Crear entradas */
if($_POST){ 
//* recepcion de valores del formulario 
   $fecha=(isset($_POST['fecha']))? $_POST['fecha']:'';
        $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
            $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';
                $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:'';

//*Adjuntado imagenes
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";

    // Variable temporal archivo img
    $tmp_imagen=$_FILES['imagen']['tmp_name'];
    if($tmp_imagen!=""){ 
    
    //carpeta destino archivo imagen
    move_uploaded_file($tmp_imagen,"../../../assets/img/about/".$nombre_archivo_imagen); 
    }        

//* Sentencia de insercion de valores
    $sentencia=$conexion->prepare("INSERT INTO `tbl_entradas` (`ID`,`fecha`,`titulo`,`descripcion`,`imagen`)VALUES (NULL,:fecha,:titulo,:descripcion,:imagen);");                             

//* Coloca los valores en las variables del formulario */
    $sentencia->bindParam(':fecha', $fecha);    
            $sentencia->bindParam(':titulo', $titulo);
            $sentencia->bindParam(':descripcion', $descripcion);
                $sentencia->bindParam(':imagen', $imagen);
                    
                    $sentencia->execute();
                    $mensaje="Registro ha agregado  correctamente"; header("Location:index.php?mensaje=".$mensaje);
}              
include("../../template/header.php");
?>
<!-- Crear entrada -->
<div class="card">
    <div  class="card-header">Crear Entrada</div>
    <div class="card-body">
        <form action ="" method="post" enctype="multipart/form-data">
        <!-- Fecha -->
            <div class="mb-3">
                <label  for="fecha" class="form-label">Fecha:</label>
                <input  type="text" 
                        class="form-control form-control-sm"
                        name="fecha"
                        id="fecha"
                        aria-describedby="helpId"
                        placeholder="fecha"/>
            </div>
        <!-- Titulo -->
            <div class="mb-3">
                <label  for="titulo" class="form-label">Titulo:</label>
                <input  type="text"
                        class="form-control form-control-sm"
                        name="titulo"
                        id="titulo"
                        aria-describedby="helpId"
                        placeholder="titulo"/>
            </div>
        <!-- Descripcion -->
            <div class="mb-3">
                <label  for="descripcion" class="form-label">Descripcion:</label>
                <input  type="text"
                        class="form-control form-control-sm"
                        name="descripcion"
                        id="descripcion"
                        aria-describedby="helpId"
                        placeholder="Descripcion"/>
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
                <!-- Botones -->
                <button type="submit" 
                    class="btn btn-primary">AGREGAR</button>
                    |
                    <a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
            </div>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php");?>