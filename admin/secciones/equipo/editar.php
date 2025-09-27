<?php 
//*Conexxion a la bd
include("../../bd.php"); //*Borrar registro 
if(isset($_GET['txtID'])){ //* Se ejecuta una intruccion de borrado en la BD
$txtID = (isset ($_GET['txtID']))? $_GET['txtID']:""; 
$sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id"); 
    $sentencia->bindParam(':id', $txtID);    
        $sentencia->execute();
            $registro=$sentencia->fetch(PDO::FETCH_LAZY); //* Recupera la informacion registrada
                $titulo=$registro['imagen']; //* recepcion de valores del formulario
                    $subtitulo=$registro['nombre completo'];
                        $imagen=$registro['cargo'];
                            $descripcion=$registro['twitter'];
                                $cliente=$registro['facebook'];
                                    $categoria=$registro['linkedin'];
}
if($_POST){//* recepcion de valores del formulario
$txtID=(isset($_POST['txtID']))? $_POST['txtID']:'';
$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:'';
    $nombre_completo=(isset($_POST['nombre completo']))? $_POST['nombre completo']:'';
        $cargo=(isset($_POST['cargo']))? $_POST['cargo']:'';
            $twitter=(isset($_POST['twitter']))? $_POST['twitter']:'';
                $facebook=(isset($_POST['facebook']))? $_POST['facebook']:'';
                    $linkedin=(isset($_POST['linkedin']))? $_POST['linkedin']:'';

//*Adjuntado imagenes
$fecha_imagen=new DateTime();
$nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";

$tmp_imagen=$_FILES["imagen"] ["tmp_name"];
if($tmp_imagen!=""){
     move_uploaded_file($tmp_imagen,".../.../.../assets/img/portfolio/",$nombre_archivo_imagen);//carpeta destino
}

//* Sentencia de insercion de valores
$sentencia=$conexion->prepare("UPDATE tbl_equipo SET imagen=:imagen,nombre completo=:nombre completo,cargo=:cargo,twitter=:twitter,facebook=:facebook,linkedin=:linkedin WHERE id=:id");
//* Coloca los valores en las variables del formulario
$sentencia->bindParam(':imagen', $imagen);    
    $sentencia->bindParam(':nombre completo', $nombre_completo);
        $sentencia->bindParam(':cargo', $cargo);
            $sentencia->bindParam(':twitter', $twitter);
                $sentencia->bindParam(':facebook', $facebook);
                    $sentencia->bindParam(':linkedin', $linkedin);
                        $sentencia->execute();
                        $mensaje="Registro ha agregado  correctamente"; header("Location:index.php?mensaje=".$mensaje);
}
include("../../template/header.php");
?>
<!-- Editar equipo -->
<div class="card">
    <div  class="card-header">Editar Equipo</div>
        <div class="card-body">
<!-- Formulario -->
        <form action ="" enctype="multipart/form-data" method="post">
<!-- iD -->
<div class="mb-3">
    <label for="txtID" class="form-label">id:</label>
    <input readonly value="<?php echo $txtID;?>" 
    type="text"
    class="form-control" 
    name="txtID" 
    id="txtID" 
    aria-describedby="helpId" 
    placeholder="id"/>
</div>
<!-- Imagen -->
<div class="mb-3">
    <label for="imagen" class="form-label">Imagen:</label>
    <input
        type="file"
        class="form-control"
        <?php echo $imagen;?>
        name="imagen"
        id="imagen"
        aria-describedby="fileHelpId"
        placeholder="Imagen" />
</div>
<!-- nombre completo -->
<div class="mb-3">
    <label for="nombre completo" class="form-label">Nombre Completo:</label>
    <input 
        type="text"
        class="form-control" 
        value="<?php echo $titulo;?>" 
        name="nombre completo"
        id="nombre completo"
        aria-describedby="helpId"
        placeholder="Nombre Completo"/>
</div>
<!-- cargo -->
<div class="mb-3">
    <label for="cargo" class="form-label">Cargo:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $subtitulo;?>"
        name="cargo"
        id="cargo"
        aria-describedby="helpId"
        placeholder="Cargo"/>
</div>
<!-- twitter -->
<div class="mb-3">
    <label for="twitter" class="form-label">Twitter:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $subtitulo;?>"
        name="twitter"
        id="twitter"
        aria-describedby="helpId"
        placeholder="Twitter"/>
</div>
<!-- facebook -->
<div class="mb-3">
    <label for="facebook" class="form-label">facebook:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $subtitulo;?>"
        name="facebook"
        id="facebook"
        aria-describedby="helpId"
        placeholder="facebook"/>
</div>
<!-- linkedin -->
<div class="mb-3">
    <label for="linkedin" class="form-label">Linkedin:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $subtitulo;?>"
        name="linkedin"
        id="linkedin"
        aria-describedby="helpId"
        placeholder="Linkedin"/>
</div>
<!-- Botones -->
<button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            |
            <a name="" id="" class="btn btn-success" href="index.php" role="button">CANCELAR</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php");
?>
