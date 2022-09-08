<?php
/* edicion del perfil por parte del usuario*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable


$email=$_POST['email'];
$actual=$_POST['contraactual'];
$nueva=$_POST['contranueva'];
$conf=$_POST['conf'];
$nombreuser=$_POST['nombreuser'];
require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos

$actual=filtrar($actual);
$nueva=filtrar($nueva);
$nombreuser=filtrar($nombreuser);
$email=filtrar($email);
$conf=filtrar($conf);

$sql = "select contrasenia, email from cuenta where nombreuser = '". $_SESSION['user']."'";
$vacio=0;
$res=pg_fetch_assoc(select($sql));

$sql2="update cuenta set ";

if(($nombreuser!=$_SESSION['user'])&&($nombreuser!="")){
    $sql2.=" nombreuser='".$nombreuser."'";
    $vacio=1;
}

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
    	    
    	    $_SESSION['res']='1';
    	    $_SESSION['error']="La contrase&ntildea actual es incorrecta.";
    	    header('location:../vista/bibliPerfilUsuario.php');	
    	   
    	}
    	if($nueva!=$conf){
    	    $_SESSION['res']=1;
    	    $_SESSION['error']="Las contrase&ntildeas nuevas no coinsiden.";
    	    header('location:../vista/bibliPerfilUsuario.php');	
    	   
    	}
    	
    	if($vacio==1)
    	    $sql2.=", ";
    	$contra= password_hash($nueva, PASSWORD_BCRYPT, $opciones);
    	$sql2.=" contrasenia ='".$contra."'";
    	$vacio=1;
    	$band=1;
}
else 
    echo "algo es vacio";


$sql2.=" where nombreuser = '". $_SESSION['user']."';";
    	
    	   
    	echo $sql2;
    	
    //inserto
    if($vacio==1)
    	$res = select($sql2);
    //guardo el resultado
    	$_SESSION['res']=$res;
    	
    	if($res){
    	    $_SESSION['user']=$nombreuser;
    	    if($band=1){
    	    $subject='Nueva contraseña Biblioteca del CeReGeo';
    	    $message="Tu nueva contraseña es: ".$nueva.".";
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
    	header('location:../vista/bibliPerfilUsuario.php');	 


?>
