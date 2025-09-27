<?php 
 include("../../bd.php"); //* Conexion a la BD
// intruccion de Borrar registros
if(isset($_GET['txtID'])){ //* borrar registro ID
    $txtID = (isset ($_GET['txtID']))? $_GET['txtID']:"";
    
     //* borrar registro ID
    $sentencia=$conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id"); //* Borrado el registro de la BD
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute(); //* Ejecuta sentencia
}
    //Selecciona registros
    $sentencia=$conexion->prepare("SELECT * FROM tbl_servicios"); 
    $sentencia->execute(); // Ejecutamos la sentencia preparada
    $lista_servicios= $sentencia->fetchAll(PDO::FETCH_ASSOC); //seleciona  los datos que se van a mostrar en cada fila del datatable
    
include("../../template/header.php");
?>
Servicios
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
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- //consulta la informacion en lista -->
                    <?php foreach($lista_servicios as $registros){?>
                    <tr class="">
                        <td><?php echo $registros['ID' ]; ?></td>
                        <td><?php echo $registros['icono' ]; ?></td></td>
                        <td><?php echo $registros['titulo' ]; ?></td></td>
                        <td><?php echo $registros['descripcion' ]; ?></td></td>
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