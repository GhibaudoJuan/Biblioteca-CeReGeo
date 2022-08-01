<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
require("../accesos/conectserver.php");
require("../accesos/conf.php");
validaracceso(0);



if(isset($_POST['backup'])){
putenv("PGPASSWORD=".$contra);
$backup = 'pg_dump -U '.$usuario.' -w -h '.$server.'  -p 5432  -F c -d '.$basedatos.' > '.$dir.'backup/'.$_POST['backup'].'.sql  2>&1';
//hay un archivo .pgpass para introducir contraseña automatica
$maul= exec($backup, $cmdout, $cmdresult);
putenv("PGPASSWORD");

$insert="insert into backup (id, nombre, fecha) values ((select case when max(id)>0 then max (id)+1 else 1 end from backup),'".$_POST['backup']."',current_date);";
if($cmdresult==0){
    select($insert);
}
}
if(isset($_POST['restore'])){//no anda
    
    $backup = 'pg_restore -d biblioteca /var/www/html/Biblioteca-CeReGeo/backup/'.$_POST['restore'].'.sql';
    //hay un archivo .pgpass para introducir contraseña automatica
    //$maul= exec($backup, $cmdout, $cmdresult);
    echo $backup;
}
header('location:../vista/backup.php');


?>