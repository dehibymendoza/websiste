<?php 
include("../../bd.php"); //Conexion BD
if($_POST){ 
//* Se recepcionan todos los datos del formulario
    $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:'';
        $nombre_completo=(isset($_POST['nombrecompleto']))? $_POST['nombrecompleto']:'';
            $cargo=(isset($_POST['cargo']))? $_POST['cargo']:'';
                $twitter=(isset($_POST['twitter']))? $_POST['twitter']:'';
                    $facebook=(isset($_POST['facebook']))? $_POST['facebook']:'';
                        $linkedin=(isset($_POST['linkedin']))? $_POST['linkedin']:'';
                           
//*Adjuntado imagen
    $fecha_imagen=new DateTime();
    $nombre_archivo_imagen=($imagen!="")?$fecha_imagen->getTimestamp()."_".$imagen:"";

    // Variable temporal archivo img
    $tmp_imagen=$_FILES['imagen']['tmp_name'];
    if($tmp_imagen!=""){

    //carpeta destino archivo imagen
    move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen); 
    }        

//* Sentencia de insercion de valores
    $sentencia=$conexion->prepare("INSERT INTO `tbl_equipo`(`ID`, `imagen`, `nombrecompleto`, `cargo`, `twitter`, `facebook`, `linkedin`)VALUES (NULL,:imagen,:nombrecompleto,:cargo,:twitter,:facebook,:linkedin);"); 

//* Coloca los valores en las variables del formulario
    $sentencia->bindParam(':imagen', $imagen);    
        $sentencia->bindParam(':nombrecompleto', $nombre_completo);
            $sentencia->bindParam(':cargo', $cargo);
                $sentencia->bindParam(':twitter', $twitter);
                    $sentencia->bindParam(':facebook', $facebook);
                        $sentencia->bindParam(':linkedin', $linkedin);
                        //Ejecuta la sentencia de insercion de valores
                        $sentencia->execute();
                        $mensaje="Registro ha agregado  correctamente"; header("Location:index.php?mensaje=".$mensaje);
}
include("../../template/header.php");
?>
<!-- Crear equipo -->
    <div class="card">
        <div  class="card-header">Crear Equipo</div>
        <div class="card-body"> 
            <!-- Formulario -->
            <form action ="" enctype="multipart/form-data" method="post">
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
                <!-- Nombrescompletos -->
                    <div class="mb-3">
                        <label  for="nombrecompleto" class="form-label">Nombre Completo:</label>
                        <input  type="text"
                                class="form-control"
                                name="nombrecompleto"
                                id="nombrecompleto"
                                aria-describedby="helpId"
                                placeholder="nombrecompleto"/>
                    </div>
                <!-- cargo -->
                    <div class="mb-3">
                        <label  for="cargo" class="form-label">Cargo:</label>
                        <input  type="text"
                                class="form-control form-control-sm"
                                name="cargo"
                                id="cargo"
                                aria-describedby="helpId"
                                placeholder="cargo"/>
                    </div>
                <!-- Twitter (X)-->
                    <div class="mb-3">
                        <label  for="twitter" class="form-label">Twitter</label>
                        <input  type="text"
                                class="form-control"
                                name="twitter"
                                id="twitter"
                                aria-describedby="helpId"
                                placeholder="twitter"/>
                    </div>
                <!-- Facebook -->
                    <div class="mb-3">
                        <label  for="facebook" class="form-label">facebook:</label>
                        <input  type="text"
                                class="form-control"
                                name="facebook"
                                id="facebook"
                                aria-describedby="helpId"
                                placeholder="facebook"/>
                    </div>
                <!-- Linkedin -->
                    <div class="mb-3">
                        <label  for="linkedin" class="form-label">Linkedin:</label>
                        <input  type="text"
                                class="form-control"
                                name="linkedin"
                                id="linkedin"
                                aria-describedby="helpId"
                                placeholder="Linkedin"/>
                    </div>
                <!-- Botones -->
                    <button type="submit" 
                            class="btn btn-primary">AGREGAR</button>
                            |
                    <a name="" id="" class="btn btn-danger" href="index.php" role="button">CANCELAR</a>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted"></div>
<?php include("../../template/footer.php");?>