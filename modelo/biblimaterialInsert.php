<?php 
/*agregar un nuevo contenido*/
if(!isset($_SESSION))session_start();

$titulo=$_POST['titulo'];
$tipo=$_POST['tipo'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$idioma=$_POST['idioma'];
$portada=$_FILES['portada']['name'];
$descripcion=$_POST['descripcion'];
require_once('../accesos/biblifiltrar.php');

$titulo=filtrar($titulo);

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
    'mes'=>$mes,
    'anio'=>$anio,
    'idioma'=>$idioma,
    'portada'=>$portada,
    'descripcion'=>$descripcion,
    );
$res = insertar('material',$sql);
$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}

    
?>