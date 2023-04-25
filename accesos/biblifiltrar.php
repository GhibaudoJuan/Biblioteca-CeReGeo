<?php
/*todas las funciones de php*/ 
//para limpiar datos
function filtrar($algo): string{
return (filter_var($algo, FILTER_SANITIZE_STRING));
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
//funcion para agregar los dias en letras
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
//armado de las tablas 
function tabladata($sql,$array){
    $tabla="";
    
    while ($mifila = pg_fetch_assoc($sql))
    {
        $tabla.="<tr>";
        
        foreach ($array as $columna){
            $mifila[$columna] = filtrar($mifila[$columna]);
            $tabla.="<td>".$mifila[$columna]."</td>";
        }
        $tabla.=" </tr>";
        
    }
    return $tabla;
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
                <div class="ajuste"><span><b>Autor/es:</b> '.$mifila['autor'].'</span></div>
                <div class="ajuste"><span><b>Editorial:</b> '.$mifila['editorial'].'</span></div>
                <div class="ajuste"><span><b>ISBN:</b> '.$mifila['isbn'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span><b>Edicion:</b> '.$mifila['edicion'].'</span></div>
                <div class="ajuste"><span><b>Tomo:</b> '.$mifila['tomo'].'</span></div>
                </div>';
                break;
            case 2:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span><b>Volumen:</b> '.$mifila['volumen'].'</span></div>
                <div class="ajuste"><span><b>Editorial:</b> '.$mifila['reveditorial'].'</span></div>
                <div class="ajuste"><span><b>Ejemplar:</b> '.$mifila['ejemplar'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span><b>Coleccion:</b> '.$mifila['coleccion'].' <b>&#8470</b> '.$mifila['num'].'</span></div>
                <div class="ajuste"><span><b>ISSN:</b> '.$mifila['issn'].'</span></div>
                </div>';
                break;
            case 3:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span><b>Tipo:</b> '.$mifila['tipom'].'</span></div>
                <div class="ajuste"><span><b>Hoja:</b> '.$mifila['hoja'].'</span></div>
                <div class="ajuste"><span><b>Escala:</b> '.$mifila['escala'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span><b>Pais:</b> '.$mifila['pais'].'</span></div>
                <div class="ajuste"><span><b>Provincia:</b> '.$mifila['provincia'].'</span></div>
                <div class="ajuste"><span><b>Localidad:</b> '.$mifila['localidad'].'</span></div>
                </div>';
                break;
            case 4:
                $galeria.='
                <div class="flex">
                <div class="ajuste"><span><b>Tipo:</b> '.$mifila['tipott'].'</span></div>
                <div class="ajuste"><span><b>Autor/es:</b> '.$mifila['autores'].'</span></div>
                <div class="ajuste"><span><b>Director/es:</b> '.$mifila['directores'].'</span></div>
                </div>
                <div class="flex">
                <div class="ajuste"><span><b>Universidad:</b> '.$mifila['universidad'].'</span></div>
                <div class="ajuste"><span><b>Lugar:</b> '.$mifila['lugar'].'</span></div>
                <div class="ajuste"><span><b>Paginas:</b> '.$mifila['numpag'].'</span></div>
                </div>';
                break;
                
        }
        $galeria.='<div class="flex"><div class="ajuste"><span><b>Fecha:</b> '.$mifila['mes'].'/'.$mifila['anio'].'</span></div><div class="ajuste"><b>Idioma:</b> '.$mifila['idioma'].'</span></div></div>';
         
        //descripcion
        $galeria.='<div class="ajuste"><span><b>Descripci&oacuten:</b> '.$mifila['descripcion'].'</span></div>';
        
        //palabras claves
        $galeria.='<div class="rela"><span><b>Palabras claves:</b> </span>';
        
        $c=0;
        while($valor=pg_fetch_assoc($keyword)){
            if($valor['descri']!=""){
            if($c==1){
                $galeria.='<span class="keyword">|</span>';
            }
            $galeria.='<span class="keyword">'.$valor['descri'].'</span>';
            
           $c=1;
            }
            $sqlkeywords="delete from keywords where mat_id='".$mifila['idmat']."' and descri=''";
            select($sqlkeywords);
        }
        if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')){
            $galeria.='<a type="button" data-bs-toggle="modal" data-bs-target="#miModal" onclick="valuekeyword('."'modalkeyword','".$mifila['idmat']."'".')">
                       <img src="../imagenes/editar.png" alt="Editar">
                       </a>';
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
            $galeria.='<button type="buttom" data-bs-toggle="modal" data-bs-target="#miModal" class="indexbutton" onclick="mostrar('."'borrar','"."'".')">Borrar</button>';
            $galeria.='</div>';
        }
        //imagen
        /*
            if($mifila['portada']=='')
                $galeria.=' <img src="../imagenes/noimage.jpg" alt="Sin imagen" ></div>';
                else
                    $galeria.=' <img src="../imagenes/'.$mifila['portada'].'" alt="'.$mifila['titulo'].'" ></div>';
            */
                
    $galeria.='<div class="div-imagen-portada"><div class="imagen-portada" style="background-image:';
                    
    if($mifila['portada']=='')
        switch ($tipo){
            case "1": //libro
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "2": //revista
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "3": //mapa
                $galeria.=" url('../imagenes/noimage.jpg');";
                break;
            case "4": //final
                $galeria.=" url('../imagenes/descarga.png');";
                break;
                
    }
       
    else
        $galeria.="url('../imagenes/".$mifila['portada']."');";
        
    $galeria.='"></div></div></div>';
    
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
//solo usado en la vista de material
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
//arma el string que se usa en el autocompletar con una columna de una tabla
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
//armar el string que se usa en el autocompletar pero con una consulta
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

//armado del select de reportes segun la fecha
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
        case '4':{
            $c.=" where fecha ".$b;
            break;
        }
        case '5':{
            $c.=" fecha ".$b;
            break;
        }
        case '6':{
            $c.="e.fecha_creacion ".$b;
            break;
        }
    }
    return $c;
    
    
}
//armado del select, columnas y agrupaciones
function reportes2($a,$b){
    $c="";
    switch ($a){
        case '1':{
            $c.=" titulo, tipo, nombre, count(*) as cantidad ".$b."group by  titulo, tipo, nombre ";
            break;
        }
        case '2':{
            $c.= " nombre, count(*) as cantidad ".$b." group by nombre ";
            break;
        }
        case '3':{
            $c.=" titulo, tipo, count(*) as cantidad ".$b." group by  titulo, tipo ";
            break;
        }
                   
    }
    return $c;
}



?>


