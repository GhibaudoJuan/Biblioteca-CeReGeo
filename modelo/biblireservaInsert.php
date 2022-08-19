<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable



require_once('../accesos/biblifiltrar.php');
//llamo a una funcion para limbiar datos


if(isset($_POST['nuevo'])){
    $a=pg_fetch_assoc(select("select idmat from material where titulo='".$_POST['material']."';"));
    $material=$a['idmat'];

}
else{
    $material=$_POST['material'];

}


$sql="insert into reservas (idres,nombre,material,fecha,activo,retirado)
values((select case when max(idres)>0 then max (idres)+1 else 1 end from reservas where nombre = '";





if ($_SESSION['tipouser']<'2'){
    $nombre=$_POST['nombre'];
    $nombre=filtrar($nombre);
//armo sql para insertar
    $sql .=$nombre. "'),'".$nombre."','";

}

else 
    $sql .=$_SESSION['nombre']."'),'".$_SESSION['nombre']."','";
    
    $sql.= $material."',TO_DATE('".$_POST['fecha']."','YYYY-MM-DD'),'".$_POST['activo']."','false');";
    
    
   

//inserto
$res = select($sql);

//guardo el resultado
$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
//echo $sql;

//redirigo
header('location:../vista/bibliReserva.php');

?>