<?php
/*eliminacion de todo el contenido de una tabla*/
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
        //header('location:../vista/bibliPrestamos.php');	  
        echo '<script>window.location="../vista/bibliPrestamos.php"</script>';
    case 'reserva':
        //header('location:../vista/bibliReserva.php');	
        echo '<script>window.location="../vista/bibliReserva.php"</script>';
    default:
        //header('location:../vista/biblimaterial.php?pag=1');	
        echo '<script>window.location="../vista/biblimaterial.php?pag=1"</script>';
}



?>