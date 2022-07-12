<?php 
if(!isset($_SESSION))session_start();

$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];
$idcatalogo=$_POST['idcatalogo'];
$anio=$_POST['anio'];
$idioma=$_POST['idioma'];
$portada=$_FILES['portada']['name'];
$descripcion=$_POST['descripcion'];
require_once('../accesos/biblifiltrar.php');

$titulo=filtrar($titulo);
$idcatalogo=filtrar($idcatalogo);
$anio=filtrar($anio);
$idioma=filtrar($idioma);
$descripcion=filtrar($descripcion);




$compr = "select case when max(idmat)>0 then max(idmat)+1 else 1 end from material;";
$compr2 = select($compr);

$id = pg_fetch_assoc($compr2);




   
    subirimagen('portada');
    
    $sql= array (
    'idmat'=>$id['case'],
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

    
?>