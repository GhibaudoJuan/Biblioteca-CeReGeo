<?php

if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');


$array=$_POST;


$validar=select("select count(*) as filas from ejemplares where idmaterial='".$array['idmaterial']."';");


if( pg_fetch_result($validar,0,0)==0){

switch($array['tipo']){
    case 'Libro':{
        $tipo='libros';
        $id="idlibro";
        break;
    }
    case 'Revista':{
        $tipo='revistas';
        $id="idrevista"; 
        break;
    }
    case 'Mapa':{
        $tipo='mapas';
        $id="idmapa";
        break;
    }
    case 'Final':{
        $tipo='tt';
        $id="idtt";
        break;
    }
}

//armo el select del tipo
$sql2="delete from ".$tipo." where ".$id."='".$array['idmaterial']."';";

//armo el select del material
$sql = "delete from material where idmat='" .$array['idmaterial']."';";
//ejecuto funcion
	echo $sql2;
	echo $sql;
$res = select($sql2);
	if($res)
	    $res=select($sql);
	
	    //guardo el resultado
	    $_SESSION['res']=$res;
	    //redirigo
	    header('location:../vista/biblimaterial.php?pag=1');	
}
else {
    //si no se pude borrar porque hay conflictor de relacion con otras tablas
    $_SESSION['res']=false;
    $_SESSION['error']="No se elimino debido ha que hay Ejemplares asociados.";
    $g="location:../vista/bibliEjemplares.php?cod=".$array['idmaterial']."&tipo=".$array['tipo'];
    header($g);
}
   
	
	
?>