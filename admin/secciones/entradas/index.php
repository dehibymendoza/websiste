<?php     
include("../../bd.php"); //* Conexion a la BD
//  intruccion de Borrar registros
if(isset($_GET['txtID'])){ //* borrar registro ID
    $txtID = (isset ($_GET['txtID']))? $_GET['txtID']:"";
    //* Sentencia de borrado de datos
    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute();//* Ejecuta sentencia
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);//* Devuelve   los resultados

        if(isset($registro_imagen['imagen'])){
            if(file_exists("../../../assets/img/about/".$registro_imagen['imagen'])){
            unlink("../../../assets/img/about/".$registro_imagen['imagen']);
            } 
        }
    
    //* Borrar registro ID de la BD
    $sentencia=$conexion->prepare("DELETE FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute();//* Ejecuta sentencia    
}
    //Selecciona registros
    $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas");
    $sentencia->execute(); // Ejecutamos la sentencia preparada
    $lista_entradas = $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona  los datos que se van a mostrar en cada fila del datatable
include("../../template/header.php");
?>
Entradas
    <div class="card">
        <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive sm">
            <table class="table">
                <tdead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </tdead>
<!-- //consulta lista entradas -->
    <tbody>
    <?php foreach($lista_entradas as $registros){?>
        <tr class="">
            <td scope="col"><?php echo $registros['ID' ];?></td>
            <td scope="col"><?php echo $registros['fecha' ];?></td>
            <td scope="col">
                <h6><?php echo $registros['titulo']; ?></h6>
                    <?php echo $registros['descripcion'];?>
            </td> 
<!-- Semuestra  imagen -->                                           
                        <td scope="col">
                            <img width="50" 
                                src="../../../assets/img/about/<?php echo $registros['imagen']; ?>"/>
                        </td>
<!-- Botones -->
                        <td>   
                           <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $registros['ID'];?>"role="button">Editar</a>
                           |
                           <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID'];?>"role="button">Borrar</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody> 
            </table>
        </div>
    </div>
</div>

<?php include("../../template/footer.php");?>