<?php
/*eliminacion de una reserva*/
//inicio secion
if(!isset($_SESSION))session_start();



//copio _POST a otras variable
$id=$_POST['id'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos
$id=filtrar($id);

if ($_SESSION['tipouser']<'2'){
$nombre=$_POST['nombre'];
$nombre=filtrar($nombre);
$sql = "delete from reservas where nombre = '". $nombre. "' and idres = ". $id . ";"; 
}


//armo el select

else
$sql = "delete from reservas where nombre = '". $_SESSION['nombre']. "' and idres = ". $id . ";"; 


//ejecuto funcion
	$res = select($sql);

   //guardo el resultado
	$_SESSION['res']=$res;
	if($res){
	    $_SESSION['error']='Exito';
	}
	//redirigo
header('location:../vista/bibliReserva.php');	

?>