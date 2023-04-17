<?php 
//datos de portada
switch($tipo)
{
    Case 'Libro':
        $sql2 = "select idmat, titulo,tipo, descripcion, mes, anio, idioma, portada, autor, edicion, tomo, editorial,isbn
                from material inner join libros on (idmat=idlibro) where idmat='".$idej."';";
        $i=1;
        break;
    case 'Revista':
        $sql2 = "select idmat, titulo,tipo, descripcion, mes,anio, idioma, portada, issn, volumen, ejemplar, reveditorial, coleccion, num
                from material inner join revistas on (idmat=idrevista) where idmat='".$idej."';";
        $i=2;
        break;
    case 'Mapa':
        $sql2 = "select idmat, titulo,tipo, descripcion, mes, anio, idioma, portada, hoja, escala, localidad, provincia, pais, tipom
                from material inner join mapas on (idmat=idmapa) where idmat='".$idej."';";
        $i=3;
        break;
    case 'Final':
        $sql2 = "select idmat, titulo, tipo, descripcion, mes, anio, idioma, portada, tipott, autores, directores, universidad, lugar, numpag 
                from material mat inner join tt on (mat.idmat=tt.idtt) where idmat='".$idej."';";
        $i=4;
        break;
}

$portada=pg_fetch_assoc(select($sql2));
//palabras claves
$sql3="select descri from keywords where mat_id='".$idej."' order by word_id asc;";

$keyword=select($sql3);

//fecha proxima reserva
/*
$sql4= "select min(fecha) as proxima         
        from ejemplares e inner join reservas r on (r.material=e.idmaterial) and(r.ejemplar=e.idejemplar) 
        where idmaterial = '".$idej."' and activo='true';";

$proximo=select($sql4);

$array = array();
while ($datos = pg_fetch_assoc($proximo))
{
   $array[$datos['ejemplar']]=$datos['proxima'];
    
}
*/
?>