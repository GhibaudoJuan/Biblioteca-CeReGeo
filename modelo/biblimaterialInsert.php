<?php 
if(!isset($_SESSION))session_start();
$id=$_POST['idmat'];
$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];
$idcatalogo=$_POST['idcatalogo'];
$anio=$_POST['anio'];
$idioma=$_POST['idioma'];
$portada=$_FILES['portada']['name'];
$descripcion=$_POST['descripcion'];
require_once('../accesos/biblifiltrar.php');
$id=filtrar($id);
$titulo=filtrar($titulo);
$idcatalogo=filtrar($idcatalogo);
$anio=filtrar($anio);
$idioma=filtrar($idioma);
$descripcion=filtrar($descripcion);




$compr = "select idmat from material where idmat ='".$id."';";
$compr2 = select($compr);

$a = pg_affected_rows($compr2);




if( $a == 0){
    
    subirimagen('portada');
    
    $sql= array (
    'idmat'=>$id,
    'titulo'=>$titulo,
    'tipo'=>$tipo,
    'idcatalogo'=>$idcatalogo,
    'anio'=>$anio,
    'idioma'=>$idioma,
    'portada'=>$portada,
    'descripcion'=>$descripcion,
    );
$res = insertar('material',$sql);
$_SESSION['res']=$res;
}
else {
    $_SESSION['res']=false;
    $_SESSION['error']="Ya existe ese codigo, no se puede insertar.";
    header('location:../vista/bibliNuevo.php');
}
    
?>