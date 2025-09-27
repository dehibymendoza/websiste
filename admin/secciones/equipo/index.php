<?php 
include("../../bd.php"); //* Conexion BD


 //Selecciona registros
 $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo");
 $sentencia->execute();
 $lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

// intruccion de Borrar registros
/* if(isset($_GET['txtID']))
{ //* borrar registro ID
    $txtID = (isset ($_GET['txtID']))? $_GET['txtID']:"";
    //* Sentencia de borrado de datos
    $$sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
    $sentencia->bindParam(':id', $txtID);    
    $sentencia->execute();//* Ejecuta sentencia
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);//* Devuelve   los resultados
    

        if(isset($registro_imagen['imagen']))
        {
            if(file_exists("../../../assets/img/team/".$registro_imagen['imagen'])){
            unlink("../../../assets/img/team/".$registro_imagen['imagen']);
            } 
        }
    
        //* Borrar registro ID de la BD
        $sentencia=$conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id");
        $sentencia->bindParam(':id', $txtID);    
        $sentencia->execute();//* Ejecuta sentencia
}
        //Selecciona registros
        $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo");
        $sentencia->execute();
        $lista_equipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);//seleciona  los datos que se van a mostrar en cada fila del datatable */
    
include("../../template/header.php");
?>
Equipo
<div class="card">
    <div class="card-header">
            <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Crear Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive sm">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombres completos</br>
                                    Cargo</th>
                    <th scope="col">Redes scociales</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>

<!-- //Equipo -->
    <tbody>
    <?php foreach($lista_equipo as $registros){?>
        <tr class="">
            <td scope="col"><?php echo $registros['ID' ]; ?></td>
           <!-- Semuestra  imagen -->  
            <td scope="col"><img width="50" src="../../../assets/img/team/<?php echo $registros['imagen']; ?>"/></td>
            
            <td scope="col"><?php echo $registros['nombrecompleto' ];?><br>
                            <?php echo $registros['cargo' ]; ?></td>
            <td scope="col"><?php echo $registros['twitter' ]; ?><br>
                            <?php echo $registros['facebook' ]; ?><br>
                            <?php echo $registros['linkedin' ]; ?></td>
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