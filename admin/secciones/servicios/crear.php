<?php
include("../../bd.php"); //* Conexion BD
/* crear servicio */
if($_POST)
{ //* recepcion de valores del formulario
    $icono=(isset($_POST['icono']))? $_POST['icono']:'';
        $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
            $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';


//* Sentencia de insercion de valores
$sentencia=$conexion->prepare("INSERT INTO `tbl_servicios` (`ID`,`icono`,`titulo`,`descripcion`) VALUES (NULL, :icono,:titulo,:descripcion);"); 

//* Coloca los valores en las variables del formulario
$sentencia->bindParam(':icono', $icono);    
    $sentencia->bindParam(':titulo', $titulo);   
        $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->execute();
                $mensaje="Registro ha agregado  correctamente"; header("Location:index.php?mensaje=".$mensaje);                
}
//* Obtiene el ultimo id ingresado para mostrarlo en una alerta al usuario
include("../../template/header.php"); //* Conexion Header
?>
<div class="card">
    <div class="card-header">Crear Servicio</div>
    <div class="card-body">
<!-- Formulario -->
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input type="text" 
                class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="icono" />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input type="text" 
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" 
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion" />
            </div>

            <button type="submit" class="btn btn-primary">AGREGAR</button>
            |
           <a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../template/footer.php"); //* Conexion Footer
?>