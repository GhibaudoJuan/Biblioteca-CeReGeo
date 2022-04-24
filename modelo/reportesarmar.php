<?php 

require_once("../accesos/biblifiltrar.php");

$array=$_POST;

$sql="select ";

//select
/*
if($array['select']=="atri"){
    $sql.=$array['usuario'];
}
else{
    $sql.=$array['select'];
}
*/

//from


switch($array['datos']){
    case '1':{
        $from= " from prestamos inner join material on (idmat=material) ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Prestamos realizados";
        $nombrepdf="prestamos_realizados".mostrardia().".pdf";
        break;
    }
    case '2':{
        $from=" from prestamos inner join material on (idmat=material) where devuelto > hasta ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Prestamos retrasados";
        $nombrepdf="prestamos_retrasados".mostrardia().".pdf";
        break;
    }
    case '3':{
        $from=" from prestamos inner join material on (idmat=material) where devuelto is null ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Prestamos no devueltos";
        $nombrepdf="prestamos_no_devueltos".mostrardia().".pdf";
        break;
    }
        
}

$sql.=reportes2($array['cantidad'],$from);


$sql.=";";




$descri;




$resultado = select($sql);

$tabla="<div class='auto border1'>";

$c="";
switch ($array['cantidad']){
    case '1':{
        $c.="<div class='largo1 linea'> </div>";
        $descri=$titulo." agrupado por Todos ";
        break;
    }
    case '2':{
        $c.= "<div class='largo1 linea'>Nombre completo</div>";
        $descri=$titulo." agrupado por Usuario ";
        break;
    }
    case '3':{
        $c.="<div class='largo2 linea'>Material</div>
                 <div class='largo1 linea'>Titulo</div>";
        $descri=$titulo." agrupado por Material ";
        break;
    }
}
$tabla.=$c;


$tabla.="<div class='largo3 linea'>Total</div>
         </div>";



switch($array['tiempo']){
    case " >= current_date - interval '24 hours' ":
        $descri.=" en 24 horas.";
        break;
    case " >= current_date - interval '1 month' ":
        $descri.=" en un mes.";
        break;
    case " >= current_date - interval '3 month' ":
        $descri.=" en tres meses.";
        break;
    default:
        $descri.=" todos.";
        break;
}




while ($mifila = pg_fetch_assoc($resultado))
{
    $tabla.="<div class='auto border1'>";
    
    if(isset($mifila['todos'])){
        $tabla.="<div class='largo1 linea'>Todos</div>";
    }
    if(isset($mifila['material'])){
        $tabla.="<div class='largo2 linea'>".$mifila['material']."</div>";
    }
    if(isset($mifila['titulo'])){
        $tabla.="<div class='largo1 linea'>".$mifila['titulo']."</div>";
    }
    if(isset($mifila['nombre'])){
        $tabla.="<div class='largo1 linea'>".$mifila['nombre']."</div>";
    }
    $tabla.="<div class='largo3 linea'>".$mifila['cantidad']."</div>";

    $tabla.=" </div>";
   
}








?>
<!doctype html>
<html>
<head>

<style type="text/css">
.colorperfil{
	background-color: #1C43B9;
	padding:7px 7px;
}
.border1{
	border:1px solid #c6c6c6;
}
.border2{
	border:1px solid #c6c6c6;
	border-top-style:none;
}
.auto{
width:auto;
}
.linea{
padding:7px;
display:inline;
}
.largo1{
width:200px;
}
.largo2{
width:100px;
}
.largo3{
width:50px;
}
</style>
</head>
<body>

<!-- <img src="../imagenes/logoceregeo-horizontal.jpg" alt="Logo-GeReGeo" height="40px" width="100px">-->

<h3><?=$titulo;?></h3>


<?php echo $tabla;?>

</body>


</html>