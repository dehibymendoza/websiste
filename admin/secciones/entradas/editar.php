<?php
//*Conexxion a la bd
include("../../bd.php"); //*Consulta la BD 
//* Recupera los datos del ID selecionado
if(isset($_GET['txtID'])) 
{
    $txtID = (isset ($_GET['txtID']))? $_GET['txtID']:""; 
    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id"); //* Realiza la consulta en la BD
        $sentencia->bindParam(':id', $txtID);    
            $sentencia->execute(); /* Ejecuta la  sentencia preparada */
                $registro=$sentencia->fetch(PDO::FETCH_ASSOC); //* Recupera la informacion registrada
                    
                //* recepcion de valores del formulario
                $fecha=$registro['fecha'];
                    $titulo=$registro['titulo'];
                        $descripcion=$registro['descripcion'];
                            $imagen=$registro['imagen'];
}
//* recepcion de valores del formulario
if($_POST)
{
    $txtID=(isset($_POST['txtID']))? $_POST['txtID']:'';
        $fecha=(isset($_POST['fecha']))? $_POST['fecha']:'';
            $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
                $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';
                
    //* Sentencia de insercion de valores
    $sentencia=$conexion->prepare("UPDATE tbl_entradas 
    SET 
    fecha=:fecha,
    titulo=:titulo,
    descripcion=:descripcion
    WHERE id=:id");

    //* Coloca los valores en las variables del formulario
    $sentencia->bindParam(':fecha', $fecha);    
        $sentencia->bindParam(':titulo', $titulo);
            $sentencia->bindParam(':descripcion', $descripcion);
                $sentencia->bindParam(':id', $txtID);
                $sentencia->execute();
                    $mensaje="Registro editado con exito administrador.";
                    header("Location:index.php?mensaje=".$mensaje);

    /*Verifica la img de ID seleccionado en la BD*/
    if($_FILES['imagen']['tmp_name']!="")
    {
        /* valida img adjunta */
        $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:'';
        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";/* nombre archivo img */
        
        $tmp_imagen=$_FILES['imagen']['tmp_name'];
        
        move_uploaded_file($tmp_imagen,"../../../assets/img/about/".$nombre_archivo_imagen); //carpeta destino assets/img/about/nombre_archivo_imagen

        //* Borrado img Selecciona el registro ID en la BD
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);    
        $sentencia->execute();//* Ejecuta sentencia
        
        //* Devuelve los resultados
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
        
            if(isset($registro_imagen['imagen']))
            {
                if(file_exists("../../../assets/img/about/".$registro_imagen['imagen'])){
                unlink("../../../assets/img/about/".$registro_imagen['imagen']);
                } 
            }

        /*Sentencia que actualiza la img */
        $sentencia=$conexion->prepare("UPDATE tbl_entradas SET imagen=:imagen WHERE id=:id");
            $sentencia->bindParam(':imagen', $nombre_archivo_imagen);
                $sentencia->bindParam(':id', $txtID);
                    $sentencia->execute(); /*  Ejecutamos la sentencia */
    }  

    $mensaje="Registro editado con exito administrador.";
        header("Location:index.php?mensaje=".$mensaje);
} 
include("../../template/header.php");
?>
<!-- Editar entrada -->
<div class="card">
    <div  class="card-header">Edita Entrada</div>
        <div class="card-body">
<!-- Formulario -->
<form action ="" enctype="multipart/form-data" method="post">
<!-- ID -->
    <div class="mb-3">
        <label  for="txtID" class="form-label">id:</label>
            <input  type= "text"
                    class="form-control" 
                    name="txtID" 
                    id="txtID"
                    value="<?php echo $txtID;?>" 
                    aria-describedby="helpId" 
                    placeholder="id"/>
    </div>
<!-- Fecha -->
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input 
            type="text"
            class="form-control" 
            value="<?php echo $fecha;?>" 
            name="fecha"
            id="fecha"
            aria-describedby="helpId"
            placeholder="Fecha"/>
    </div>
<!-- Titulo -->
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input 
            type="text"
            class="form-control" 
            value="<?php echo $titulo;?>" 
            name="titulo"
            id="titulo"
            aria-describedby="helpId"
            placeholder="Titulo"/>
    </div>
<!-- Descripcion -->
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input type="text"
                class="form-control"
                value="<?php echo $descripcion;?>"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder="Descripcion"/>
    </div>
<!-- Imagen -->
    <div class="mb-3">
        <label  for="imagen" class="form-label">Imagen:</label>
            <img    width="80" src="../../../assets/img/about/<?php echo $imagen;?>" />
            <input  type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    aria-describedby="fileHelpId"
                    placeholder="Imagen" />
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

