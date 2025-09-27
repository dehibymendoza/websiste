<?php

$servidor="localhost";
$basededatos="websiste";
$usuarios="root";
$contrasenia="";

try{
    //Conexion BD Mysql
    $conexion=new PDO("mysql:host=$servidor;dbname=$basededatos",$usuarios,$contrasenia); 
    /* echo "Bienvenido al WEBSYSTEM DE <br/> PROGRESCOL BIC S.A.S."; */

}catch(Exception $error){
    echo $error->getMessage();
}
?>