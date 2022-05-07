<?php 
/*
Update de la tabla prestamos.
El $_POST proviene de "--/controlador/bibliDevolucion.php"
*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;


if($array['idpre']!=''){
    

 $sql="update prestamos set devuelto=current_date where idpre='".$array['idpre']."' and nombre='".$array['nombre']."';";
 
 $res = select($sql);

 $_SESSION['res']=$res;
}
header('location:../vista/bibliPrestamos.php');
          

?>
