<?php
/* eliminacion de un libro*/
//inicio secion
if(!isset($_SESSION))session_start();



//copio _POST a otras variable
$id=$_POST['id'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos
$id=filtrar($id);

//armo el select
$sql = "delete from material where idmat= '".$id."' and tipo ='Libro';";
$seg = "delete from libros where idlibro= '".$id."';";

//ejecuto funcion
	$res = select($seg);
	if($res)
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo
	if($res){
	    $_SESSION['error']='Exito';
	}
	//header('location:../vista/biblimaterial.php?pag=1');	
    echo '<script>window.location="../vista/biblimaterial.php?pag=1"</script>';
?>