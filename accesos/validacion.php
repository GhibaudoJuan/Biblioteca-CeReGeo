<?php 
/*funciones para validar el acceso de un usuario*/
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user'])){
//header('location:../index.php');
echo '<script>window.location="location:../index.php"</script>';
}
if((isset($_SESSION['val']))&&($_SESSION['val']==false)){
    //header('location:../index.php');
    echo '<script>window.location="location:../index.php"</script>';
}

function validaracceso($tipo){
    
    if($_SESSION['tipouser']>$tipo){
        //header('location:../index.php');
        echo '<script>window.location="location:../index.php"</script>';
    }
    
}



?>
