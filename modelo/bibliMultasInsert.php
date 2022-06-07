<?php 
if(!isset($_SESSION))session_start();
$array=$_POST;

require_once('../accesos/biblifiltrar.php');
$array['nombre']=filtrar($array['nombre']);





$compr = "select idcuenta from cuenta where nombre ='".$array['nombre']."';";
$compr2 = select($compr);

$a = pg_fetch_assoc($compr2);


$sql="insert into multas (idmulta, idcuenta, desmultado, multa_estado) 
         values ((select case when max(idmulta)>0 then max(idmulta)+1 else 1 end from multas),'".$a['idcuenta']."','".$array['desmultado']."','true');";

$res=select($sql);

    $_SESSION['res']=$res;

    header('location:../vista/bibliMultas.php');









?>