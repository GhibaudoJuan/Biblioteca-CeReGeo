<?php 
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
require("../accesos/conectserver.php");
require("../accesos/conf.php");
validaracceso(0);



if(isset($_POST['backup'])){
    $insert="insert into backup (id, nombre, fecha) values ((select case when max(id)>0 then max (id)+1 else 1 end from backup),'".$_POST['backup']."',current_date);";
    select($insert);
putenv("PGPASSWORD=".$contra);
$backup = 'pg_dump -U '.$usuario.' -w -h '.$server.'  -p 5432  -F c -d '.$basedatos.' > '.$dir.'backup/'.$_POST['backup'].'.sql  2>&1';
//hay un archivo .pgpass para introducir contraseña automatica
$maul= exec($backup, $cmdout, $cmdresult);
putenv("PGPASSWORD");


if($cmdresult!=0){
    $_SESSION['res']=1;
    $_SESSION['error']="No se pudo hacer el Back up.";
}

}
if(isset($_POST['restore'])){
    putenv("PGPASSWORD=".$contra);
    $backup = 'pg_restore -U '.$usuario.' -w -h '.$server.'  -p 5432 -c -d '.$basedatos.' '.$dir.'backup/'.$_POST['restore'].'.sql';
    //hay un archivo .pgpass para introducir contraseña automatica
    $maul= exec($backup, $cmdout, $cmdresult);
    putenv("PGPASSWORD");
   //echo $backup;
    if($cmdresult!=0){
        $_SESSION['res']=1;
        $_SESSION['error']="No se pudo hacer el Restore.";
    }
}
header('location:../vista/backup.php');


?>