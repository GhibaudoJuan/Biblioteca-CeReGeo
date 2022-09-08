<?php
/* actualizar datos de una cuenta por parte del administrador*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable


$email=$_POST['email'];
$nueva=$_POST['contranueva'];
$conf=$_POST['conf'];
$nombreuser=$_POST['nombreuser'];
require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos


$nueva=filtrar($nueva);
$nombreuser=filtrar($nombreuser);
$email=filtrar($email);
$conf=filtrar($conf);


$sql2="update cuenta set ";

if(($nombreuser!=$_POST['cnombre'])&&($nombreuser!="")){
    $sql2.=" nombreuser='".$nombreuser."'";
    $vacio=1;
}

if(($email!=$_POST['cemail'])&&($email!="")){
    $sql2.=" email='".$email."'";
    $vacio=1;
}

if(($nueva!="")&&($conf!="")){
    	$opciones = [
    	  'cost' => 12,
    	];
    	//encripto la contraseña
    	
   
    	if($nueva!=$conf){
    	    
    	    $_SESSION['res']=1;
    	    $_SESSION['error']="Contraseñas no coinsiden";
    	    header('location:../vista/bibliCuenta.php');	
    	   
    	}
    	else{
    	if($vacio==1)
    	    $sql2.=", ";
    	$contra= password_hash($nueva, PASSWORD_BCRYPT, $opciones);
    	$sql2.=" contrasenia ='".$contra."'";
    	$vacio=1;
    	$band=1;
}
}


$sql2.=" where idcuenta = '". $_POST['cid']."';";
    	
    	   
    	//echo $sql2;
    	
    //inserto
    if($vacio==1)
    	$res = select($sql2);
    //guardo el resultado
    	$_SESSION['res']=$res;
    	if($res){
    	    if($band==1){
    	        $subject='Nueva contraseña Biblioteca del CeReGeo';
    	        $message="Tu nueva contraseña es: ".$contra.".";
    	        $headers="";
    	        $mail=mail($email, $subject, $message, $headers);
    	        if($mail){
    	            $_SESSION['error']='Exito';
    	        }
    	        $_SESSION['error']='Perfil cambiado pero email no enviado';
    	    }
    	    $_SESSION['error']='Exito';
    	}
    	    	
    	//redirigo
    	header('location:../vista/bibliCuenta.php');	


?>