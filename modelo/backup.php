<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
require("../accesos/conectserver.php");
validaracceso(0);
$backup = 'pg_dump -U juan -w -h 127.0.0.1 -p 5432 -d biblioteca  2>&1';
//hay un archivo .pgpass para introducir contraseña automatica


echo exec($backup); 
echo "<br>";

//header('location:../vista/backup.php');
/*
?>


necesito nombre de backup

/usr/lib/postgresql/12/bin/
> /var/www/html/Biblioteca-CeReGeo/backup/aaas.sql






*/?>