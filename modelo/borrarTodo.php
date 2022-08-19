<?php
//inicio secion
if(!isset($_SESSION))session_start();

require_once('../accesos/biblifiltrar.php');

//copio _POST a otras variable
$borrar=$_POST['delete'];
$retorno=$_POST['retorno'];

//ejecuto funcion
$res = select($borrar);
//guardo el resultado
$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
//redirigo

switch($retorno){
    case 'prestamo':
        header('location:../vista/bibliPrestamos.php?');	  
    case 'reserva':
        header('location:../vista/bibliReserva.php');	
    default:
        header('location:../vista/biblimaterial.php?pag=1');	
}



?>