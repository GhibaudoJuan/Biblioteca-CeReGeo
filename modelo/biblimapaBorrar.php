<?php
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
$sql = "delete from material where idmat= '".$id."' and tipo ='Mapa';";
$seg = "delete from mapas where idmapa= '".$id."';";

//ejecuto funcion
$res = select($seg);
if($res)
	$res = select($sql);
	
   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo
	header('location:../vista/biblimaterial.php?pag=1');	
/*
}
else{
    //Guargo error
	$_SESSION['conf3']= false ;
	header('location:../vista/biblicuenta.php');
}*/
?>