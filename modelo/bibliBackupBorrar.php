<?php
/*borrar un backup del servidor*/
//inicio secion
if(!isset($_SESSION))session_start();


unlink($_POST['dir']);

	//header('location:../vista/backup.php');	
echo '<script>window.location="../vista/backup.php"</script>';
?>