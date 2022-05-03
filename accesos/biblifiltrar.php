<?php

//para limpiar datos
function filtrar($algo): string{
$a = filter_var($algo, FILTER_SANITIZE_STRING);
return $a; 
}
//comprobacion de seguridad
function vtoken($algo):bool{
return ($algo==$_SESSION['cod']);
}
//genera un codigo
function token(){
    $valor = '0123456789abcdefghijklmnopqrstuvwxyz';
    $cod=substr(str_shuffle($valor), 0, 6);
    return $cod;
}
// Conectando y seleccionado la base de datos
function conexionPostgresql(){
    include("conectserver.php");
    $dbconn = pg_connect($conect)
    or die(header('location:../vista/bibliErrorServer.php'));
    
    return $dbconn;
    
    
}

function conexionPostgresql2(){
    include("conectserver.php");
    $dbconn = pg_connect($conect)
    or die(header('location:vista/bibliErrorServer.php'));
    
    return $dbconn;
    
    
}

//para insertan en base de datos
function insertar($tabla, $array){
    $dbconn=conexionPostgresql();
    $res = pg_insert($dbconn,$tabla,$array);
    pg_close($dbconn);
    return $res;
}

//para realizar una consulta
function select($sql){
    $dbconn=conexionPostgresql();
    $res = pg_query($dbconn,$sql);
    pg_close($dbconn);
    return $res;
}

function diasemana($dia){
    switch($dia){
        case 0:
            $dia='Dom';
            break;
        case 1:
            $dia='Lun';
            break;
        case 2:
            $dia='Mar';
            break;
        case 3:
            $dia='Mie';
            break;
        case 4:
            $dia='Jue';
            break;
        case 5:
            $dia='Vie';
            break;
        case 6:
            $dia='S&aacuteb';
            break;
    }
    return $dia;
}

function tabladata($sql,$array){
    $tabla="";
    
    while ($mifila = pg_fetch_assoc($sql))
    {
        $tabla.="<tr>";
        
        foreach ($array as $columna){
            $mifila[$columna] = filtrar($mifila[$columna]);
            if($columna=='activo')
                if($mifila[$columna]=="Cerrado")
                    $tabla.="<td style='color:red'>".$mifila[$columna]."</td>";
                else 
                    $tabla.="<td style='color:blue'>".$mifila[$columna]."</td>";
            else
                $tabla.="<td>".$mifila[$columna]."</td>";
        }
        $tabla.=" </tr>";
        
    }
    return $tabla;
}
//para armar una tabla
function armarTabla($sql, $array){
    
    $tabla="";
    $i=0;
    while ($mifila = pg_fetch_assoc($sql))
    {
        $tabla.="<tr id='id".$i."' ";
        $tabla.=" onclick='idtabla(" ;
        $tabla.= '"id'.$i.  '"';
        
        $size=count($array)+1;
        for($g=1;$g<$size;$g++){
            $tabla.= ', "'.$mifila[$array[$g]].'"';
        }
        $tabla.=")'>";
      
        foreach ($array as $columna){
        $mifila[$columna] = filtrar($mifila[$columna]);
        $tabla.="<td>".$mifila[$columna]."</td>";
                 }
        $tabla.=" </tr>";
        $i+=1;
    }
    return $tabla;
    
}
//para armar una tabla con imagenes, no se usa
function armarGaleria($sql,$tipo){
//$tipo = 0: material, =1:libro,=2:revista,=3:mapa,=4:final     
    $galeria="";
    
    while ($mifila = pg_fetch_assoc($sql))
    {
        
        $galeria.='<div class="galeria">
        <div class="desc">
        <span>Codigo:'.$mifila['idmat'].  ' Tipo:'.$mifila['tipo'].'</span><br>
        <span>Titulo:'.$mifila['titulo'].' </span>     
        <br>';
        switch ($tipo){
            case 1:
                $galeria.='<span>Autores:'.$mifila['autores'].' Editorial:'.$mifila['editorial'].
                ' Edicion:'.$mifila['edicion'].' Tomo:'.$mifila['tomo'].'</span></br>';
                break;
            case 2:
                $galeria.='<span>Volumen:'.$mifila['volumen'].' Editorial:'.$mifila['editorial'].
                ' Ejemplar:'.$mifila['ejemplar'].' Coleccion:'.$mifila['coleccion'].' Num:'.$mifila['num'].' ISSN:'.$mifila['issn'].'</span></br>';
                break;
            case 3:
                $galeria.='<span>Tipo:'.$mifila['tipom'].' Hoja:'.$mifila['hoja'].' Escala:'.$mifila['escala'].
                '</span></br><span> Pais:'.$mifila['pais'].' Provincia:'.$mifila['provincia'].' Localidad:'.$mifila['localidad'].'</span></br>';
                break;
            case 4:
                $galeria.='<span>Tipo:'.$mifila['tipott'].' Autores:'.$mifila['autores'].' Directores:'.$mifila['directores'].
                '</span></br><span> Universidad:'.$mifila['universidad'].' Lugar:'.$mifila['lugar'].' Paginas:'.$mifila['numpag'].'</span></br>';
                break;
            
        }
       
        $galeria.='<span>Descripcion: '.$mifila['descripcion'].'</span>
                    </div>';
        
        $galeria.= '<div style="position:absolute;right:10px; ">
            <form action = "../vista/bibliEjemplares.php" method="post" >
            <input type="hidden" name ="id" value='.$mifila['idmat'].'>
            <button type="submit" class="button">Ver</button>
            </form>';
        if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2'))
        $galeria.='<form action = "../vista/bibliActualizar.php" method="post" >
                   <input type="hidden" name ="id" value='.$mifila['idmat'].'>
                   <input type="hidden" name ="tipo" value='.$mifila['tipo'].'>
                   <button type="submit" class="button">Actualizar</button></form>';
        $galeria.='<a href="#miModal"><button type="submit" class="button" onclick="valueborrar('."'borrar','".$mifila['idmat']."'".')">Borrar</button> </a>';
        $galeria.='</div>';
    
        if($mifila['portada']=='')
            $galeria.=' <img src="../imagenes/noimage.jpg" alt="Sin imagen" width="160px" height="auto"></div>';
        else 
            $galeria.=' <img src="../imagenes/'.$mifila['portada'].'" alt="Sin imagen" width="160px" height="auto"></div>';
        
    }
    return $galeria;
   
}


//para armar la portadoen ejemplares
function armarPortada($mifila,$tipo,$keyword){
    //$tipo = 0: material, =1:libro,=2:revista,=3:mapa,=4:final
    $galeria="";
    
   
    
        //titulo y tipo
        $galeria.='<div class="galeria ima-ejemplar">
        <div class="desc">
        <span class="span-3">'.$mifila['titulo'].'</span> <span class="span-3" style="margin-left:1rem;opacity:0.5;">('.$mifila['tipo'].')</span>
        <br>';
       //datos de los tipos
        switch ($tipo){
            case 1:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span>Autores:'.$mifila['autor'].'</span></div>
                <div class="ajuste"><span>Editorial:'.$mifila['editorial'].'</span></div>
                <div class="ajuste"><span>ISBN:'.$mifila['isbn'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span>Edicion:'.$mifila['edicion'].'</span></div>
                <div class="ajuste"><span>Tomo:'.$mifila['tomo'].'</span></div>
                </div>';
                break;
            case 2:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span>Volumen:'.$mifila['volumen'].'</span></div>
                <div class="ajuste"><span>Editorial:'.$mifila['reveditorial'].'</span></div>
                <div class="ajuste"><span>Ejemplar:'.$mifila['ejemplar'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span>Coleccion:'.$mifila['coleccion'].'</span></div>
                <div class="ajuste"><span>Num:'.$mifila['num'].'</span></div>
                <div class="ajuste"><span>ISSN:'.$mifila['issn'].'</span></div>
                </div>';
                break;
            case 3:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span>Tipo:'.$mifila['tipom'].'</span></div>
                <div class="ajuste"><span>Hoja:'.$mifila['hoja'].'</span></div>
                <div class="ajuste"><span>Escala:'.$mifila['escala'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span> Pais:'.$mifila['pais'].'</span></div>
                <div class="ajuste"><span>Provincia:'.$mifila['provincia'].'</span></div>
                <div class="ajuste"><span>Localidad:'.$mifila['localidad'].'</span></div>
                </div>';
                break;
            case 4:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span>Tipo:'.$mifila['tipott'].'</span></div>
                <div class="ajuste"><span>Autores:'.$mifila['autores'].'</span></div>
                <div class="ajuste"><span>Directores:'.$mifila['directores'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span> Universidad:'.$mifila['universidad'].'</span></div>
                <div class="ajuste"><span>Lugar:'.$mifila['lugar'].'</span></div>
                <div class="ajuste"><span>Paginas:'.$mifila['numpag'].'</span></div>
                </div>';
                break;
                
        }
        $galeria.='<div class="flex"><div class="ajuste"><span>A&ntildeo: '.$mifila['anio'].'</span></div><div class="ajuste"> Idioma: '.$mifila['idioma'].'</span></div></div>';
         
        //descripcion
        $galeria.='<div class="ajuste"><span>Descripcion: '.$mifila['descripcion'].'</span></div>';
        
        //palabras claves
        $galeria.='<div class="rela"><span>Palabras claves: </span>';
        
        
        while($valor=pg_fetch_assoc($keyword)){
           $galeria.='<span class="keyword">'.$valor['descri'].'</span>';
          
        }
        if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')){
        $galeria.='<a class="sindec" href="#miModal">
                   <button type="submit" class="button" 
                    onclick="valuekeyword('."'modalkeyword','".$mifila['idmat']."'".')">Editar</button></a>';
        }
        $galeria.='</div>';
        $galeria.='</div>';
        
        //botones de actualizar y borrar
        if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')){
            $galeria.= '<div style="position:absolute;right:10px;">';
            $galeria.='<form action = "../vista/bibliActualizar.php" method="post" >
                   <input type="hidden" name ="id" value='.$mifila['idmat'].'>
                   <input type="hidden" name ="tipo" value='.$mifila['tipo'].'>
                   <button type="submit" class="indexbutton">Actualizar</button></form>';
            $galeria.='<a class="sindec" href="#miModal"><button type="submit" class="indexbutton" onclick="mostrar('."'borrar','"."'".')">Borrar</button> </a>';
            $galeria.='</div>';
        }
        //imagen
            if($mifila['portada']=='')
                $galeria.=' <img src="../imagenes/noimage.jpg" alt="Sin imagen" ></div>';
                else
                    $galeria.=' <img src="../imagenes/'.$mifila['portada'].'" alt="'.$mifila['titulo'].'" ></div>';
                    
    
    return $galeria;
    
}

//funcion de join en el select
function armarJoin($a){
   
    $b="";
    switch($a){
        case 'Libro':
            $b.=" left join libros l on (m.idmat=l.idlibro) ";
            break;
        case 'Mapa':
            $b.=" left join mapas ma on (m.idmat=ma.idmapa) ";
            break;
        case 'Revista':
            $b.=" left join revistas r on (m.idmat=r.idrevista) ";
            break;
        case 'Final':
            $b.=" left join tt on (m.idmat=tt.idtt) ";
            break;
            

    }
    return $b;
}



//para armar el where de una consulta con un where delante
function armarWhere ($array){
    
    $a =0;
    if(!empty($array['w'])){
        $h = ' where ';

      
        foreach ($array as $clave=>$valor){
            if ($clave!='w'){
                
                if(!empty($valor)){
                    if($a==1)
                        $h.=" and ";
                    
                   
                    $valor=filtrar($valor);
                    if( is_numeric($valor))
                        $h .= $clave. "= '".$valor."' ";
                    else
                        $h .= $clave. " like '%".$valor."%' ";
                  
                    $a =1;
                }
            }
        }
        
        if ($a==0)
        
        return ' ';
        
   
        return $h;
    }
    
    
    
    return '';
}

//para armar el where de una consulta sin el where delante
function armarsinWhere ($array){
    $h ='';
   
        foreach ($array as $clave=>$valor){
            if ($clave!='w'){
                if(!empty($valor)){
                        $h.=" and ";
                        
                        $valor=filtrar($valor);
                        
                        if( is_numeric($valor))
                            $h .= $clave. "= '".$valor."' ";
                        else
                            $h .= $clave. " like '%".$valor."%' ";
                                
                             
                
            }
            }
        }
            
  return $h;
   
    
}
//para armar el where en reserva
function armarWherereserva ($array, $where){
    $h= '';
    $a=0;
    if($where)
        $h.= ' where ';
    else 
        $a=1;
    
      
        if(!empty ($array['nombre'])){
            if($a==1)
                $h.=' and ';
            $h.= " nombre like '%". $array['nombre']."%' "   ;
            $a=1;
        }
       if(!empty($array['material'])){
            if($a==1)
                $h.=' and ';
            $h.=" material like '%".$array['material']."%' " ;
            $a=1;
        }
        if(!empty ($array['fecha'])){
            if($a==1)
                $h.=' and ';
                $h.= 'fecha'.$array['signo']."'". $array['fecha']."' "   ;
                $a=1;
        }
        if(!empty ($array['activo'])){
            if($a==1)
                $h.=' and ';
            $h.= " activo ='". $array['activo']."' "   ;
            $a=1;
        }
        if($a==0)
            return '';
        else
            return $h;
}
//para armar el where en reserva
function armarWhereprestamo ($array, $where){
    $h= '';
    $a=0;
    if($where)
        $h.= ' where ';
        else
            $a=1;
            
            
            if(!empty ($array['nombre'])){
                if($a==1)
                    $h.=' and ';
                    $h.= " nombre like '%". $array['nombre']."%' "   ;
                    $a=1;
            }
           if(!empty($array['titulo'])){
                if($a==1)
                    $h.=' and ';
                    $h.=" titulo like '%".$array['titulo']."%' " ;
                    $a=1;
            }
            if(!empty ($array['fecha'])){
                if($a==1)
                    $h.=' and ';
                    $h.= $array['tipo'].$array['signo']."'". $array['fecha']."' "   ;
                    $a=1;
            }
            if(!empty ($array['activo'])){
                if($a==1)
                    $h.=' and ';
                    $h.= " activo ='". $array['activo']."' "   ;
                    $a=1;
            }
            if($a==0)
                return '';
                else
                    return $h;
}


function comprobar($algo){
    if($algo!=0){
      print "<span style="."color:red;".">*Sentencia no ejecutada*</span>" ;
    }
    
}

function mostrardia(){
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha=date('Y-m-d-H-i-s');
    return $fecha;
}


//para subir una imagen 
function subirimagen($file){
    
    $target_path = "../imagenes/";
    $target_path = $target_path . basename( $_FILES[$file]['name']);
    if(move_uploaded_file($_FILES[$file]['tmp_name'], $target_path)) {
        return true;
    } else{
       return false;
    }
}

//armar tipo en busqueda
function armartipo ($algo){
    
    $sql = select($algo);
       
    $tabla="<option value=''>---</option>";
    
    while ($mifila = pg_fetch_assoc($sql))
    {
        $tabla.='<option value="'.$mifila[nombre].'">'.$mifila[nombre].'</option>' ;
    }
    return $tabla;

}

//armar tipo en insertar
function armartipo2 ($algo){
    
    $sql = select($algo);
    
    $tabla="";
    
    while ($mifila = pg_fetch_assoc($sql))
    {
        $tabla.='<option value="'.$mifila[nombre].'">'.$mifila[nombre].'</option>' ;
    }
    return $tabla;
    
}
//arma el string que se usa en el autocompletar
function autostring ($tabla, $columna){
    $a="select distinct ".$columna." from ".$tabla.";";
    
    $res=select($a);
    $i=0;
    $lista='[';
    while ($mifila = pg_fetch_assoc($res))
    {
        if($i==1)
            $lista.=' , ';
        else 
            $i=1;
        $lista.="'".$mifila[$columna]."'" ;
        
    }
    $lista.="]";
    return $lista;
}
function autostringn ($tabla){
       
    $res=select($tabla);
    $i=0;
    $lista='[';
    while ($mifila = pg_fetch_assoc($res))
    {
        if($i==1)
            $lista.=" , ";
            else
                $i=1;
                $lista.="'".$mifila['nombre']."'" ;
                
    }
    $lista.="]";
    return $lista;
}

function paginacion($pagina){ 
   return $pagina *5;
        
}
function reportes($a, $b){
    $c="";
    
    if($b==""){
        return $c;
    }
    switch ($a){
        case '1':{
            $c.=" where desde ".$b;
            break;
        }
        case '2':
        case '3':{
            $c.=" and hasta ".$b;
            break;
        }
    }
    return $c;
    
    
}
function reportes2($a,$b){
    $c="";
    switch ($a){
        case '1':{
            $c.=" 'Todos' as todos, count(*) as cantidad ".$b;
            break;
        }
        case '2':{
            $c.= " nombre, count(*) as cantidad ".$b." group by nombre ";
            break;
        }
        case '3':{
            $c.=" material,titulo, count(*) as cantidad ".$b." group by material , titulo ";
            break;
        }
            
    }
    return $c;
}


?>


