<?php 
/* codigo del modelo del back up 
 * se hace backup de toda la base de datos y las imagenes, todo se guarda en un archivo .zip
 * se hace el restore, se abre el archivo .zip y se restaura la base de datos
 * 
 * 
 * 
 * 
 * 
 * */
if(!isset($_SESSION))session_start();
require_once("../accesos/biblifiltrar.php");
require_once("../accesos/validacion.php");
require("../accesos/conectserver.php");
require("../accesos/conf.php");
validaracceso(0);


//backup-------------------------------------------------------------
if(isset($_POST['backup'])){
    $insert="insert into backup (id, nombre, fecha) values ((select case when max(id)>0 then max (id)+1 else 1 end from backup),'".$_POST['backup']."',current_date);";
    select($insert);
putenv("PGPASSWORD=".$contra);
$backup = 'pg_dump -U '.$usuario.' -w -h '.$server.'  -p 5432  -F c -d '.$basedatos.' > '.$dir.'/'.$_POST['backup'].'.sql  2>&1';
//hay un archivo .pgpass para introducir contraseña automatica
$maul= exec($backup, $cmdout, $cmdresult);
putenv("PGPASSWORD");


if($cmdresult!=0){
    $_SESSION['res']=1;
    $_SESSION['error']="No se pudo hacer el Back up.";
    header('location:../vista/backup.php');
}
$a = new ZipArchive;
$c = '../imagenes/';
$b = $a->open('../backup/'.$_POST['backup'].'.zip',ZipArchive::CREATE);

if($b){
    $d=opendir($c);
    while($e=readdir($d)){
        if(is_file($c.$e)){
            $a->addFile($c.$e);
        }
    }
    
    $a->addFile($dir.'/'.$_POST['backup'].'.sql',$_POST['backup'].'.sql');
    
    $a->close();
}
else{
    $_SESSION['res']=1;
    $_SESSION['error']='falló, código:' . $res;
    header('location:../vista/backup.php');
}
unlink($dir.'/'.$_POST['backup'].'.sql');
}


//restore-----------------------------------------------------------------------
if(isset($_POST['restore'])){
    $za= new ZipArchive;
    $zb=$za->open('../backup/'.$_POST['restore'].'.zip');
    if($zb){
         $za->extractTo('../');
         
    }
    else{
        
        $_SESSION['res']=1;
        $_SESSION['error']='falló, código:' . $zb;
        header('location:../vista/backup.php');
    }
    $za->close();
    
    
    putenv("PGPASSWORD=".$contra);
    $backup = 'pg_restore -U '.$usuario.' -w -h '.$server.'  -p 5432 -c -d '.$basedatos.' '.$dir.'/'.$_POST['restore'].'.sql';
    //hay un archivo .pgpass para introducir contraseña automatica
    $maul= exec($backup, $cmdout, $cmdresult);
    putenv("PGPASSWORD");
   //echo $backup;
    if($cmdresult!=0){
        $_SESSION['res']=1;
        $_SESSION['error']="No se pudo hacer el Restore.";
    }
    
    unlink($dir.'/'.$_POST['restore'].'.sql');
}
$_SESSION['res']=0;
header('location:../vista/backup.php');


?>