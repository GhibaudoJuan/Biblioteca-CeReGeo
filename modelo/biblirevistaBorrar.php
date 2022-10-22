<?php
/*eliminacion de una recista*/
//inicio secion
if(!isset($_SESSION))session_start();



//copio _POST a otras variable
$id=$_POST['id'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos
$id=filtrar($id);
/*
$sql="select nombreuser from cuenta where nombreuser ='".$user."'";

if(pg_num_rows(select($sql))=='1'){
    $_SESSION['conf3']= true;
    */
//armo el select
$sql = "delete from material where idmat='".$id."' and tipo='Revista'";
$seg = "delete from revistas where idrevista='".$id."'";
//ejecuto funcion
$res = select($seg);
if($res)
	$res = select($sql);

   //guardo el resultado
	$_SESSION['res']=$res;
	if($res){
	    $_SESSION['error']='Exito';
	}
	//redirigo
	//header('location:../vista/biblimaterial.php?pag=1');	
	echo '<script>window.location="../vista/biblimaterial.php?pag=1"</script>';
/*
}
else{
    //Guargo error
	$_SESSION['conf3']= false ;
	header('location:../vista/biblicuenta.php');
}*/
?>