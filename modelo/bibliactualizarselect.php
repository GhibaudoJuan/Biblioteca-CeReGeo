<?php 

if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
validaracceso(1);

$array= $_POST;



switch ($array['tipo']){
    case 'Libro':
        $sql = "select idmat, titulo, descripcion,mes,anio,idioma,
autor, edicion, tomo, editorial,isbn,portada,tipo
from material left join libros on (idmat=idlibro) where idmat='".$array['id']."';";
        break;
    case 'Mapa':
        $sql = "select idmat, titulo, descripcion,mes,anio,idioma,
hoja, escala, localidad, provincia, pais, tipom,portada,tipo
from material left join mapas on (idmat=idmapa) where idmat='".$array['id']."';";
        break;
    case 'Revista':
        $sql = "select idmat, titulo,  descripcion,mes,anio,idioma,
issn, volumen, ejemplar, reveditorial, coleccion, num ,portada,tipo
from material left join revistas on (idmat=idrevista) where idmat='".$array['id']."';";
        break;
    case 'Final':
        $sql = "select idmat, titulo, descripcion,mes,anio,idioma,
tipott, autores, directores, universidad, lugar, numpag ,portada,tipo
from material mat left join tt on (mat.idmat=tt.idtt) where idmat='".$array['id']."';";
        break;
}

$resultado=select($sql);
$mifila = pg_fetch_assoc($resultado);
$_SESSION['listaactualizar']=$mifila;







?>