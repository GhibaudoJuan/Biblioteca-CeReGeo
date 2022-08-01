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
$fecha=mostrardia();

switch($array['datos']){
    case '1':{ //prestamos realizados
        $from= " from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar) inner join material m on (m.idmat=e.idmaterial) ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Cantidad de prestamos realizados";
        $nombrepdf="prestamos_realizados_".$fecha;
        break;
    }
    case '2':{ //prestamos retrasados
        $from=" from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar) inner join material m on (m.idmat=e.idmaterial) where devuelto > hasta ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Cantidad de prestamos retrasados";
        $nombrepdf="prestamos_retrasados_".$fecha;
        break;
    }
    case '3':{ //prestamos no devueltos
        $from=" from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar)inner join  material m on (m.idmat=e.idmaterial) where devuelto is null ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Cantidad de prestamos no devueltos";
        $nombrepdf="prestamos_no_devueltos_".$fecha;
        break;
    }
    case '4':{ //reservas realizados
        $from=" from reservas inner join material on (idmat=material) ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Cantidad de reservas realizadas";
        $nombrepdf="reservas_realizadas_".$fecha;
        break;
    }
    case '5':{ //Reservas no retiradas
        $from=" from reservas inner join material on (idmat=material) where activo='false' and retirado='false' ";
        $from.=reportes($array['datos'], $array['tiempo']);
        $titulo="Cantidad de reservas no retiradas";
        $nombrepdf="reservas_no_retiradas_".$fecha;
        break;
    }
}

$sql.=reportes2($array['cantidad'],$from);


$sql.=";";



$descri;

$tabla="<table style='width:800px'>
<thead>
<tr>";




//echo $sql;
$resultado = select($sql);


switch ($array['cantidad']){ 
    case '1':{ //todos
        $tabla.=" <th style='width:200px'>Titulo</th>
                  <th style='width:200px'>Nombre</th>
                  <th>Cantidad</th></tr></thead><tbody>";
        $total='<tr><td>Total</td><td></td><td>';
        $descri=$titulo." agrupado segun Todos ";
        break;
    }
    case '2':{ //segun usuario
        $tabla.="<th style='width:300px'>Nombre</th>
                  <th>Cantidad</th></tr></thead><tbody>";
        $total='<tr><td>Total</td><td>';
        $descri=$titulo." agrupado segun Usuario ";
        break;
    }
    case '3':{ //segun material
        $tabla.=" <th style='width:300px'>Titulo</th>
                  <th>Cantidad</th></tr></thead><tbody>";
        $total='<tr><td>Total</td><td>';
        $descri=$titulo." agrupado segun Titulo ";
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

while ($datos = pg_fetch_assoc($resultado)){
        $tabla.='<tr>';
    
        
       
        
        switch ($array['cantidad']){
            case '1':{ //todos
                                
                $tabla.='<td>'.$datos['titulo'].'</td>';
                
                $tabla.='<td>'.$datos['nombre'].'</td>';
                break;
            }
            case '2':{ //segun usuario
                $tabla.='<td>'.$datos['nombre'].'</td>';
                break;
            }
            case '3':{ //segun Titulo
                                
                $tabla.='<td>'.$datos['titulo'].'</td>';
                break;
            }
        }
        $tabla.='<td>'.$datos['cantidad'].'</td>';
        
        $tabla.="</tr>";
        $acum+=$datos['cantidad'];
    
}
$tabla.=$total.$acum.'</td></tr>';

$tabla.=" </tbody></table>";





?>
<!doctype html>
<html>
<head>

<style type="text/css">

table{
  border-collapse: collapse;
  
}

td, th {
  border: 1px solid #dddddd;
  padding:8px;
  
}

</style>
</head>
<body>

<img src="../imagenes/logoceregeo-horizontal.jpg" alt="Logo-GeReGeo" height="40" width="250">

<h3 style="text-align:center"><?=$descri;?></h3>

<?=$tabla;?>

</body>


</html>