<?php
//*Conexxion a la bd
include("../../bd.php"); //*Consulta BD

//* Recupera los datos del ID selecionado
if(isset($_GET['txtID']))
{
    $txtID = (isset ($_GET['txtID']))? $_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio WHERE id=:id"); //* Realiza la consulta en la BD
        $sentencia->bindParam(':id', $txtID);    
            $sentencia->execute();/* Ejecuta la  sentencia preparada */  
                $registro=$sentencia->fetch(PDO::FETCH_ASSOC); //* Recupera la informacion registrada

                //* recepcion de valores del formulario
                $titulo=$registro['titulo']; 
                    $subtitulo=$registro['subtitulo'];
                        $imagen=$registro['imagen'];
                            $descripcion=$registro['descripcion'];
                                $cliente=$registro['cliente'];
                                    $categoria=$registro['categoria'];
                                        $url=$registro['url'];
}

//* recepcionamos valores del formulario
if($_POST)
{
    $txtID=(isset($_POST['txtID']))? $_POST['txtID']:'';
        $titulo=(isset($_POST['titulo']))? $_POST['titulo']:'';
            $subtitulo=(isset($_POST['subtitulo']))? $_POST['subtitulo']:'';
            
                $descripcion=(isset($_POST['descripcion']))? $_POST['descripcion']:'';
                    $cliente=(isset($_POST['cliente']))? $_POST['cliente']:'';
                        $categoria=(isset($_POST['categoria']))? $_POST['categoria']:'';
                            $url=(isset($_POST['url']))? $_POST['url']:'';

    //* Sentencia de insercion de valores
    $sentencia=$conexion->prepare("UPDATE tbl_portafolio 
    SET 
    titulo=:titulo,
    subtitulo=:subtitulo,
    descripcion=:descripcion,
    cliente=:cliente,
    categoria=:categoria,
    url=:url
    WHERE id=:id");

    //* Coloca los valores en las variables del formulario
    $sentencia->bindParam(':titulo', $titulo);    
        $sentencia->bindParam(':subtitulo', $subtitulo);
            $sentencia->bindParam(':descripcion', $descripcion);
                    
    $sentencia->bindParam(':cliente', $cliente);
        $sentencia->bindParam(':categoria', $categoria);
            $sentencia->bindParam(':url', $url);
                
    $sentencia->bindParam(':id', $txtID);
        $sentencia->execute(); /*  Ejecutamos la sentencia */
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
        
        move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen); //carpeta destino assets/img/portfolio/nombre_archivo_imagen

        //* Borrado img Selecciona el registro ID en la BD
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);    
        $sentencia->execute();//* Ejecuta sentencia
        
        //* Devuelve los resultados
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
        
            if(isset($registro_imagen['imagen'])){
                if(file_exists("../../../assets/img/portfolio/".$registro_imagen['imagen'])){
                unlink("../../../assets/img/portfolio/".$registro_imagen['imagen']);
                } 
            }

        /*Sentencia que actualiza la img */
        $sentencia=$conexion->prepare("UPDATE tbl_portafolio SET imagen=:imagen WHERE id=:id");
            $sentencia->bindParam(':imagen', $nombre_archivo_imagen);
                $sentencia->bindParam(':id', $txtID);
                    $sentencia->execute(); /*  Ejecutamos la sentencia */
        }   
        $mensaje="Registro editado con exito administrador.";
                    header("Location:index.php?mensaje=".$mensaje); 

}
include("../../template/header.php"); ?>
<!-- Editar portafolio -->
<div class="card">
    <div  class="card-header">Editar Protafolio</div>
        <div class="card-body">
        
<!-- Formulario -->
        <form action ="" enctype="multipart/form-data" method="post">

<!-- iD -->
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
<!-- Titulo -->
            <div class="mb-3">
                <label  for="titulo" class="form-label">Titulo:</label>
                <input  type="text"
                        class="form-control" 
                        value="<?php echo $titulo;?>" 
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
                        value="<?php echo $subtitulo;?>"
                        name="subtitulo"
                        id="subtitulo"
                        aria-describedby="helpId"
                        placeholder="Subtitulo"/>
            </div>
<!-- imagen -->
            <div class="mb-3">
                <label  for="imagen" class="form-label">Imagen:</label>
                <img    width="80" src="../../../assets/img/portfolio/<?php echo $imagen;?>" />
                <input  type="file"
                        class="form-control"
                        name="imagen"
                        id="imagen"
                        aria-describedby="fileHelpId"
                        placeholder="Imagen" />
            </div>
            
<!-- Descripcion -->
            <div class="mb-3">
                <label  for="descripcion" class="form-label">Descripcion:</label>
                <input  type="text"
                        class="form-control"
                        value="<?php echo $descripcion;?>"
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
                        value="<?php echo $cliente;?>"
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
                        value="<?php echo $categoria;?>"
                        name="categoria"
                        id="categoria"
                        aria-describedby="helpId"
                        placeholder="categoria"/>
            </div>

<!-- Url -->
            <div class="mb-3">
                <label  for="url" class="form-label">Url:</label>
                <input  type="text"
                        class="form-control"
                        value="<?php echo $url;?>"
                        name="url"
                        id="url"
                        aria-describedby="helpId"
                        placeholder="url"/>
            </div>
<!-- Botones -->
<button type="submit" 
        class="btn btn-success">ACTUALIZAR</button>
        |
<a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
        </form>
    </div>
    <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php");?>
