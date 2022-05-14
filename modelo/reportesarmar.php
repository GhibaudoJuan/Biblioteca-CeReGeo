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
    case '1':{ //prestamos realizados
        $from= " from prestamos inner join material on (idmat=material) ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Prestamos realizados";
        $nombrepdf="prestamos_realizados".mostrardia().".pdf";
        break;
    }
    case '2':{ //prestamos retrasados
        $from=" from prestamos inner join material on (idmat=material) where devuelto > hasta ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Prestamos retrasados";
        $nombrepdf="prestamos_retrasados".mostrardia().".pdf";
        break;
    }
    case '3':{ //prestamos no devueltos
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

$tabla="<table>
<thead>
<tr>";




//echo $sql;
$resultado = select($sql);


switch ($array['cantidad']){ 
    case '1':{ //todos
        $tabla.="<th>Material</th>
                  <th>Titulo</th>
                  <th>Nombre</th>
                  <th>Cantidad</th></tr></thead><tbody>";
        $total='<tr><td>Total</td><td></td><td></td><td>';
        $descri=$titulo." agrupado segun Todos ";
        break;
    }
    case '2':{ //segun usuario
        $tabla.="<th>Nombre</th>
                  <th>Cantidad</th></tr></thead><tbody>;";
        $total='<tr><td>Total</td><td>';
        $descri=$titulo." agrupado segun Usuario ";
        break;
    }
    case '3':{ //segun material
        $tabla.="<th>Material</th>
                  <th>Titulo</th>
                  <th>Cantidad</th></tr></thead><tbody>;";
        $total='<tr><td>Total</td><td></td><td>';
        $descri=$titulo." agrupado segun Material ";
        break;
    }
}



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
        $descri.=" desde el comienzo.";
        break;
}


$acum;
$tabla1;
while ($datos = pg_fetch_assoc($resultado)){
        $tabla1.='<tr>';
    
        
       
        
        switch ($array['cantidad']){
            case '1':{ //todos
                $tabla1.='<td>'.$datos['material'].'</td>';
                
                $tabla1.='<td>'.$datos['titulo'].'</td>';
                
                $tabla1.='<td>'.$datos['nombre'].'</td>';
                break;
            }
            case '2':{ //segun usuario
                $tabla1.='<td>'.$datos['nombre'].'</td>';
                break;
            }
            case '3':{ //segun material
                $tabla1.='<td>'.$datos['material'].'</td>';
                
                $tabla1.='<td>'.$datos['titulo'].'</td>';
                break;
            }
        }
        $tabla1.='<td>'.$datos['cantidad'].'</td>';
        
        $tabla1.="</tr>";
        $acum+=$datos['cantidad'];
    
}
$tabla1.=$total.$acum.'</td></tr>';

$tabla1.=" </tbody></table>";





?>
<!doctype html>
<html>
<head>

<style type="text/css">

table {
  border-collapse: collapse;
  width: 800px;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>

<!-- <img src="../imagenes/logoceregeo-horizontal.jpg" alt="Logo-GeReGeo" height="40px" width="100px">-->

<h3 style="text-align:center"><?=$titulo;?></h3>
<?=$tabla;?>
<?=$tabla1;?>


</body>


</html>