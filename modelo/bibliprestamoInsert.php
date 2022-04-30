<?php
//inicio secion
if(!isset($_SESSION))session_start();



//copio _POST a otras variable

$fecha=$_POST['fecha'];
$idpres=$_POST['prest'];
require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos




$nombre=$_POST['nombre'];
$nombre=filtrar($nombre);
$material=$_POST['material'];
$material=filtrar($material);
$ejemplar=$_POST['ejemplar'];
$ejemplar=filtrar($ejemplar);


//armo el select

$sql= "insert into prestamos (idpre,nombre, material, ejemplar, desde, hasta, activo) values
((select case when max(idpre)>0 then max (idpre)+1 else 1 end from prestamos where nombre = '".$nombre. "'),'".$nombre."','".$material."','".$ejemplar."',current_date,'".$fecha."',true); " ;

//inserto

$res= select($sql);
if(($res)&&(isset($_POST['prest']))){
    $update="update reservas set activo='false' and retirado='true' where idres='".$idpres."' and nombre ='".$nombre."';";
   $res=select($update);
   
}
if($res)
select("update ejemplares set estado='p' where idmaterial='".$material."' and idejemplar='".$ejemplar."';" );


   //guardo el resultado
	$_SESSION['res']=$res;
	//redirigo
header('location:../vista/bibliPrestamos.php');	

?>