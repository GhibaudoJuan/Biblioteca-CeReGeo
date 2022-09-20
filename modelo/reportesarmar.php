<?php 
/*armado del reporte*/
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
$fecha=mostrardia();//fecha en que se hace el reporte
//se harma el from deacuerdo al tipo de reporte 
switch($array['datos']){
    case '1':{ //prestamos realizados
        $from= " from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar) inner join material m on (m.idmat=e.idmaterial) ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Cantidad de prestamos realizados"; //titulo del reporte
        $nombrepdf="prestamos_realizados_".$fecha; //una parte del nombre del pdf
        break;
    }
    case '2':{ //prestamos retrasados
        $from=" from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar) inner join material m on (m.idmat=e.idmaterial) where devuelto > hasta ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Cantidad de prestamos retrasados";//titulo del reporte
        $nombrepdf="prestamos_retrasados_".$fecha;//una parte del nombre del pdf
        break;
    }
    case '3':{ //prestamos no devueltos
        $from=" from prestamos p inner join ejemplares e on (e.idejemplar=p.ejemplar)inner join  material m on (m.idmat=e.idmaterial) where devuelto is null ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Cantidad de prestamos no devueltos";//titulo del reporte
        $nombrepdf="prestamos_no_devueltos_".$fecha;//una parte del nombre del pdf
        break;
    }
    case '4':{ //reservas realizados
        $from=" from reservas inner join material on (idmat=material) ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Cantidad de reservas realizadas";//titulo del reporte
        $nombrepdf="reservas_realizadas_".$fecha;//una parte del nombre del pdf
        break;
    }
    case '5':{ //Reservas no retiradas
        $from=" from reservas inner join material on (idmat=material) where activo='false' and retirado='false' ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Cantidad de reservas no retiradas en fecha";//titulo del reporte
        $nombrepdf="reservas_no_retiradas_".$fecha;//una parte del nombre del pdf
        break;
    }
    case '6':{
        $from=" from ejemplares e inner join material on (idmat=e.idmaterial) ";
        $from.=reportes($array['datos'], $array['tiempo']);//agrego el factor tiempo a sql
        $titulo="Ejemplares";//titulo del reporte
        $nombrepdf="ejemplares_".$fecha;//una parte del nombre del pdf
        break;
    }
}

//principio del html de la tabla
$tabla="<table style='width:100%'>
<thead>
<tr>";

$acum;

switch ($array['datos']){//si no es un reporte de ejemplares
    case '1':
    case '2':
    case '3':
    case '4':
    case '5':{
$sql.=reportes2($array['cantidad'],$from); //agrego las columnas y la agrupacion al sql

        //armo las columnas que tendra la tabla
        switch ($array['cantidad']){
            case '1':{ //todos
                $tabla.=" <th>Titulo</th>
                          <th>Tipo</th>  
                          <th>Nombre</th>
                          <th>Cantidad</th></tr></thead><tbody>";
                $total='<tr><td>Total</td><td></td><td></td><td>';
                $descri=$titulo." ";
                break;
            }
            case '2':{ //segun usuario
                $tabla.="<th>Nombre</th>
                          <th>Cantidad</th></tr></thead><tbody>";
                $total='<tr><td>Total</td><td>';
                $descri=$titulo." agrupado por personas ";
                break;
            }
            case '3':{ //segun material
                $tabla.=" <th>Titulo</th>
                          <th>Tipo</th> 
                          <th>Cantidad</th></tr></thead><tbody>";
                $total='<tr><td>Total</td><td></td><td>';
                $descri=$titulo." agrupado por titulos ";
                break;
            }
        }
        $sql.=";";
        
        
        //echo $sql;
        $resultado = select($sql);
        while ($datos = pg_fetch_assoc($resultado)){
            $tabla.='<tr>';
            
            
            
            
            switch ($array['cantidad']){
                case '1':{ //todos
                    
                    $tabla.='<td style="width:350px;">'.$datos['titulo'].'</td>';
                    $tabla.='<td style="width:100px;">'.$datos['tipo'].'</td>';
                    $tabla.='<td style="width:350px;">'.$datos['nombre'].'</td>';
                    break;
                }
                case '2':{ //segun usuario
                    $tabla.='<td style="width:500px">'.$datos['nombre'].'</td>';
                    break;
                }
                case '3':{ //segun Titulo
                    
                    $tabla.='<td style="width:500px">'.$datos['titulo'].'</td>';
                    $tabla.='<td style="width:70px">'.$datos['tipo'].'</td>';
                    break;
                }
            }
            $tabla.='<td>'.$datos['cantidad'].'</td>';
            
            $tabla.="</tr>";
            $acum+=$datos['cantidad'];
            
        }
        $tabla.=$total.$acum.'</td></tr>';
        break;
} 
    case '6': { //si es un reporte de ejemplares
    if($array['mtodos']){//si son todas las columnas
        $sql.='idejemplar, titulo, mes, anio, idioma, tipo, codigo_externo, propietario, disponibilidad, estado, condicion ';
        $tabla.='<th>Cod. Interno</th><th>Titulo</th><th>Fecha</th><th>Idioma</th><th>Tipo</th><th>Cod. Externo</th><th>Propietario</th><th>Disponibilidad</th><th>Estado</th><th>Condicion</th>';
    
    }
    else{//si son algunas columnas
        
        $sql.=' idejemplar';
        $tabla.='<th>Cod. Interno</th>';
        
        if($array['mdm']){   
            $sql.=', titulo, mes, anio, idioma, tipo';
            $tabla.='<th>Titulo</th><th>Fecha</th><th>Idioma</th><th>Tipo</th>';
        }
        if($array['mcode']){ 
            $sql.=', codigo_externo';
            $tabla.='<th>Cod. Externo</th>';
           
        }
        if($array['mprop']){   
            $sql.=', propietario';
            $tabla.='<th>Propietario</th>';
            
        }
        if($array['mdis']){   
            $sql.=', disponibilidad';
            $tabla.='<th>Disponibilidad</th>';
            
        }
        if($array['mest']){ 
            $sql.=', estado';
            $tabla.='<th>Estado</th>';
           
        }
        if($array['mcon']){
            $sql.=', condicion';
            $tabla.='<th>Condicion</th>';
        }
        
    }
    $sql.=$from;
    $sql.=";";
    $tabla.='</tr></thead><tbody>';
    
    //echo $sql;
    $resultado = select($sql);
    while ($datos = pg_fetch_assoc($resultado)){
        $tabla.='<tr>';
        
        if($datos['disponibilidad'])
            $datos['disponibilidad']='Si';
        else
            $datos['disponibilidad']='No';
        
        if($datos['estado']=='l')
            $datos['estado']='Libre';
        else 
            $datos['estado']='Prestado';
        
        if($array['mtodos']){ //si son todos
            $tabla.='<td>'.$datos['idejemplar'].'</td>
                     <td style="width:150px;">'.$datos['titulo'].'</td><td>'.$datos['mes'].'/'.$datos['anio'].'</td>
                     <td>'.$datos['idioma'].'</td><td>'.$datos['tipo'].'</td>';
            $tabla.='<td>'.$datos['codigo_externo'].'</td>
                     <td>'.$datos['propietario'].'</td><td>'.$datos['disponibilidad'].'</td>
                     <td>'.$datos['estado'].'</td><td style="width:100px;">'.$datos['condicion'].'</td>';
        }
        else{ //si faltan campos
            $tabla.='<td>'.$datos['idejemplar'].'</td>';
            if($array['mdm'])
                $tabla.='<td style="width:150px;">'.$datos['titulo'].'</td><td>'.$datos['mes'].'/'.$datos['anio'].'</td>
                <td>'.$datos['idioma'].'</td><td>'.$datos['tipo'].'</td>';
            
                
            if($array['mcode'])
                $tabla.='<td>'.$datos['codigo_externo'].'</td>';
            if($array['mprop'])
                $tabla.='<td>'.$datos['propietario'].'</td>';
            if($array['mdis'])
                $tabla.='<td>'.$datos['disponibilidad'].'</td>';
            if($array['mest'])
                $tabla.='<td>'.$datos['estado'].'</td>';
            if($array['mcon'])
                $tabla.='<td style="width:100px;">'.$datos['condicion'].'</td>';
        }
        
        
        $tabla.="</tr>";
       
        
    }
   $descri.=$titulo;
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






$tabla.=" </tbody></table>";





?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
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