<?php
//Conexxion a la bd
include("../../bd.php");
// Borrar registro 
if(isset($_GET['txtID'])){
$txtID = (isset ($_GET['txtID']))? $_GET['txtID']:"";

//* Se ejecuta una intruccion de borrado en la BD
$sentencia=$conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id"); 
    $sentencia->bindParam(':id', $txtID);    
        $sentencia->execute();
//* Recupera la informacion registrada
            $registro=$sentencia->fetch(PDO::FETCH_LAZY);
            //* recepcion de valores del formulario
            $icono=$registro['icono'];
                $titulo=$registro['titulo'];
                    $descripcion=$registro['descripcion'];
}
if($_POST){ //* recepcion de valores del formulario
$txtID=(isset($_POST['txtID']))? $_POST['txtID']:'';
    $icono=(isset($_POST['icono']))? $_POST['icono']:'';
        $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
            $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';

//* Sentencia de insercion de valores
$sentencia=$conexion->prepare("UPDATE tbl_servicios 
SET 
icono=:icono,
titulo=:titulo,
descripcion=:descripcion 
WHERE id=:id");

//* Coloca los valores en las variables del formulario
$sentencia->bindParam(':icono', $icono);    
    $sentencia->bindParam(':titulo', $titulo);   
        $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->bindParam(':id', $txtID);
                $sentencia->execute();
                    $mensaje="Registro ha sido modificado con exito administrador.";
                    header("Location:index.php?mensaje=".$mensaje);
}
include("../../template/header.php");
?>

<div class="card">
<div class="card-header">Editar Servicio</div>
    <div class="card-body">
<!-- Formulario -->
        <form action="" enctype="multipart/form-data" method="post">
<!-- iD -->
            <div class="mb-3">
                <label for="txtID" class="form-label">id:</label>
                <input readonly value="<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="id"/>
            </div>

            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input value="<?php echo $icono;?>" type="text" 
                class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono" />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input value="<?php echo $titulo;?>" type="text" 
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo" />
            </div>
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input 
                value="<?php echo $descripcion;?>" 
                type="text" 
                class="form-control" 
                name="descripcion" 
                id="descripcion" 
                aria-describedby="helpId" 
                placeholder="descripcion"/>
            </div>
           
            <button type="submit" class="btn btn-success">ACTUALIZAR</button>
            |
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
        </form>
    </div>
<div class="card-footer text-muted"></div>
</div>

<?php include("../../template/footer.php");?>
