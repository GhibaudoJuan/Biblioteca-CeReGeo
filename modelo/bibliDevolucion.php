<?php 
/*
Update de la tabla prestamos.
El $_POST proviene de "--/controlador/bibliDevolucion.php"
*/

if(!isset($_SESSION))session_start();

require_once('../accesos/biblifiltrar.php');
$array=$_POST; //copio _POST a otras variable
if($array['idpre']!=''){ //compruebo que el prestamo no esta vacio
    $sql="update prestamos set devuelto=current_date where idpre='".$array['idpre']."' and nombre='".$array['nombre']."';"; //escribo el codigo SQL 
    $res = select($sql); //ejecuto el codigo SQL
    $_SESSION['res']=$res; //guardo el resultado
    if($res){
        $_SESSION['error']='Exito';
    }
}
header('location:../vista/bibliPrestamos.php'); //redirijo


?>
