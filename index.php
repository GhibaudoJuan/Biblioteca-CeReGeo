<?php 
/*inicio*/
ob_start();
session_start();
session_regenerate_id(true);
require_once("accesos/biblifiltrar.php");

$_SESSION['cod']=token();

if(!isset($_SESSION['res'])){
    $_SESSION['res']=0;
}


header("location:vista/biblimaterial.php?pag=1");
//echo '<script>window.location="vista/biblimaterial.php?pag=1"</script>';
?>


