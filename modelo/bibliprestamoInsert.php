<?php
/*agregar un nuevo prestamo*/
//inicio secion
if(!isset($_SESSION))session_start();



//copio _POST a otras variable

$fecha=$_POST['fecha'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos


$nombre=$_POST['nombre'];
$nombre=filtrar($nombre);
$ejemplar=$_POST['ejemplar'];
$ejemplar=filtrar($ejemplar);

$conf ="select count(*) as c from prestamos where activo ='true' and ejemplar='".$ejemplar."';";
$conf = pg_fetch_assoc(select($conf));
if($conf['c']==0){
    
    //armo el select
    
    $sql= "insert into prestamos (idpre,nombre, ejemplar, desde, hasta, activo) values
((select case when max(idpre)>0 then max (idpre)+1 else 1 end from prestamos where nombre = '".$nombre. "'),'".$nombre."','".$ejemplar."',current_date,'".$fecha."',true); " ;
    
    //inserto
    
    $res= select($sql);
    
}
else{
    $_SESSION['error']="Ejemplar ya prestado.";
    $res =1;
    
}


   //guardo el resultado
	$_SESSION['res']=$res;
	if($res){
	    $_SESSION['error']='Exito';
	}
	//redirigo
	
        header('location:../vista/bibliPrestamos.php');	


?>