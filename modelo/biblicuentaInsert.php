<?php
/* insertar una nueva cuenta */
ob_start();
if(!isset($_SESSION))session_start();

require_once('../accesos/validacion.php');
validaracceso(0);
//copio _POST a otras variable
$user=$_POST['user'];
$contra=$_POST['contra'];
$confir=$_POST['confir'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$tipo=$_POST['tipo'];

require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos
$user=filtrar($user);
$contra=filtrar($contra);
$confir=filtrar($confir);
$nom=filtrar($nom);
$email=filtrar($email);
$tipo=filtrar($tipo);


    	$opciones = [
    	  'cost' => 12,
    	];
    	//encripto la contraseña
    	$hash= password_hash($contra, PASSWORD_BCRYPT, $opciones);
    	
    	//armo un array para insertar
    	$sql2="insert into cuenta(idcuenta,nombreuser,contrasenia,nombre,email,tipo) 
values((select case when max(idcuenta)>0 then max (idcuenta)+1 else 1 end from cuenta),'".$user."','".$hash."','".$nom."','".$email."','".$tipo."');";


   
    	
    //inserto
   $res=select($sql2);
    	
    //guardo el resultado
    	$_SESSION['res']=$res;
    	if($res){
    	    $subject='Usuario de Biblioteca del CeReGeo';
    	       $message="Tu nombre de usuario es: ".$user.". Tu contraseña es: ".$contra.". La puedes cambiar en Tu Perfil.";
    	       $headers="";
    	    $mail=mail($email, $subject, $message, $headers);
    	    if($mail){
    	        $_SESSION['error']='Exito, email enviado';
    	    }
    	        else{
    	        $_SESSION['error']='Usuario creado, pero email no enviado.';
    	       }
    	}
    	//redirigo
    	header('location:../vista/bibliCuenta.php');	 
    	//echo '<script>window.location="../vista/bibliCuenta.php"</script>';
?>