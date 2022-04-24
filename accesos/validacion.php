<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
header('location:../index.php');
}
if((isset($_SESSION['val']))&&($_SESSION['val']==false)){
header('location:../index.php');
}

function validaracceso($tipo){
    
    if($_SESSION['tipouser']>$tipo){
        header('location:../index.php');
    }
    
}



?>