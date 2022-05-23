<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
require("../accesos/conectserver.php");
validaracceso(0);
$backup = 'pg_dump --user=juan --host=127.0.0.1 --port=5432 --dbname=biblioteca > /var/www/html/Biblioteca-CeReGeo/backup/aaas.sql';
//hay un archivo .pgpass para introducir contraseña automatica
$password='juan';

$nom=exec($backup);
echo $nom;
echo '<br>';

//header('location:../vista/backup.php');

?>


necesito nombre de backup


pg_dump -U juan -W -h 127.0.0.1 biblioteca > /var/www/html/backup/nombre.sql


