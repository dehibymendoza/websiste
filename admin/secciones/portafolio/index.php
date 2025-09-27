<?php     
include("../../bd.php"); //* Conexion BD

// Seleciona el ID a editar
if(isset($_GET['txtID'])){ 
    $txtID = (isset ($_GET['txtID']) )?$_GET['txtID']:"";
    
    //* Selecciona el registro ID en la BD
    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute();//* Ejecuta sentencia
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);//* Devuelve los resultados
    
        if(isset($registro_imagen['imagen'])){
            if(file_exists("../../../assets/img/portfolio/".$registro_imagen['imagen'])){
            unlink("../../../assets/img/portfolio/".$registro_imagen['imagen']);
            } 
        }
    
    //* Borrar registro ID de la BD
    $sentencia=$conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute();//* Ejecuta sentencia
}
    //Selecciona registros
    $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio");
    $sentencia->execute(); // Ejecutamos la sentencia preparada
    $lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona  los datos que se van a mostrar en cada fila del datatable

include("../../template/header.php");
?>
Portafolios
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
<!-- //consulta lista portafolio desde la BD-->
                <tbody>
                <?php foreach($lista_portafolio as $registros){ ?>
                    <tr class="">
                        <td scope="col"><?php echo $registros['ID']; ?></td>
                        <td scope="col">
                            <h6><?php echo $registros['titulo']; ?></h6>
                            <?php echo $registros['subtitulo']; ?>
                            <?php echo $registros['url']; ?>
                        </td>
<!-- Semuestra  imagen -->
                        <td scope="col">
                            <img width="50" src="../../../assets/img/portfolio/<?php echo $registros['imagen'];?>" />
                        </td>
                        <!-- //Muestra descripcion -->
                        <td scope="col"><?php echo $registros['descripcion']; ?></td>
                        <td scope="col">
                            <?php echo $registros['cliente']; ?> 
                            <?php echo $registros['categoria']; ?>
                        </td>
<!-- Botones -->
                        <td>
                            <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $registros['ID']; ?>"role="button">Editar</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>"role="button">Borrar</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody> 
            </table>
        </div>
    </div>
</div>

<?php include("../../template/footer.php");?>