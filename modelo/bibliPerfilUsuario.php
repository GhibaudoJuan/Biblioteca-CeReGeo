<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable


$email=$_POST['email'];
$actual=$_POST['contraactual'];
$nueva=$_POST['contranueva'];
$conf=$_POST['conf'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos

$actual=filtrar($actual);
$nueva=filtrar($nueva);

$email=filtrar($email);
$conf=filtrar($conf);

$sql = "select contrasenia, email from cuenta where nombreuser = '". $_SESSION['user']."'";
$vacio=0;
$res=pg_fetch_assoc(select($sql));

$sql2="update cuenta set ";

if(($email!=$res['email'])&&($email!="")){
    $sql2.=" email='".$email."'";
    $vacio=1;
}

if(($actual!="")&&($nueva!="")&&($conf!="")){
    	$opciones = [
    	  'cost' => 12,
    	];
    	//encripto la contraseña
    	
   
    	$res=pg_fetch_assoc(select($sql));
    	if(!password_verify($actual, $res['contrasenia'])){
    	    $_SESSION['confactual']=false;
    	    header('location:../vista/bibliPerfilUsuario.php');	
    	   
    	}
    	if($nueva!=$conf){
    	    $_SESSION['confnueva']=false;
    	    header('location:../vista/bibliPerfilUsuario.php');	
    	   
    	}
    	
    	if($vacio==1)
    	    $sql2.=", ";
    	$contra= password_hash($nueva, PASSWORD_BCRYPT, $opciones);
    	$sql2.=" contrasenia ='".$contra."'";
    	$vacio=1;
}


$sql2.=" where nombreuser = '". $_SESSION['user']."';";
    	
    	   
    	
    	
    //inserto
    if($vacio==1)
    	$res = select($sql2);
    //guardo el resultado
    	$_SESSION['res']=$res;
    	//redirigo
    	header('location:../vista/bibliPerfilUsuario.php');	 


?>