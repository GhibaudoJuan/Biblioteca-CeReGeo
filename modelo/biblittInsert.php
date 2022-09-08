<?php
/*insertar un nuevo final*/
if(!isset($_SESSION))session_start();
//copio _POST a otras variable

require_once('../accesos/biblifiltrar.php');
include("../modelo/biblimaterialInsert.php"); 

$tipos=$_POST['tipott'];
$autores=$_POST['autores'];
$directores=$_POST['directores'];
$universidad=$_POST['universidad'];
$lugar=$_POST['lugar'];
$numpag=$_POST['numpag'];



//llamo a una funcion para limbiar datos




$directores=filtrar($directores);
$tipos=filtrar($tipos);
$universidad=filtrar($universidad);
$lugar=filtrar($lugar);
$numpag=filtrar($numpag);
$autores=filtrar($autores);




//armo un array para insertar


$seg= array(
    'idtt'=>$id['case'],
    'tipott'=>$tipos,
    'autores'=>$autores,
    'directores'=>$directores,
    'universidad'=>$universidad,
    'lugar'=>$lugar,
    'numpag'=>$numpag

    
    
);



//inserto

$res = insertar('tt',$seg);


//guardo el resultado
$_SESSION['res']=$res;
if($res){
    $_SESSION['error']='Exito';
}
//redirigo
$link='location:../vista/bibliEjemplares.php?cod='.$id['case'].'&tipo=Final';
header($link);

?>