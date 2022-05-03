<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable



require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos


$sql="insert into reservas (idres,nombre,material,ejemplar,fecha,activo,retirado)
values((select case when max(idres)>0 then max (idres)+1 else 1 end from reservas where nombre = '";





if ($_SESSION['tipouser']<'2'){
    $nombre=$_POST['nombre'];
    $nombre=filtrar($nombre);
//armo sql para insertar
    $sql .=$nombre. "'),'".$nombre."','";

}

else 
    $sql .=$_SESSION['nombre']."'),'".$_SESSION['nombre']."','";
    
    $sql.= $_POST['material']."','".$_POST['ejemplar']."',TO_DATE('".$_POST['fecha']."','YYYY-MM-DD'),'".$_POST['activo']."','false');";
    
    
   

//inserto
$res = select($sql);

//guardo el resultado
$_SESSION['res']=$res;
//redirigo
header('location:../vista/bibliReserva.php');

?>