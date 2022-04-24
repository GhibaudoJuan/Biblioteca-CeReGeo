<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
validaracceso(0);
$backup = 'pg_dump --user=juan --host=127.0.0.1 --dbname=biblioteca > /var/www/html/backup/a.sql';


shell_exec($backup);


//header('location:../vista/backup.php');

?>


necesito nombre de backup


pg_dump -U juan -W -h 127.0.0.1 biblioteca > /var/www/html/backup/nombre.sql


