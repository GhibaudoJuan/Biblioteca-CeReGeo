<?php
/*
Se controla el inicio de sesion
Hay un control de un Token para que solo probenga de "../vista/iniciosesion.php"
Aqui se cargar en $_SESSION el usuario, su nombre y su tipo

*/
session_start();
$user =$_POST['user']; 
$pass =$_POST['password'];
$cod=$_POST['codigo'];

require_once('../accesos/biblifiltrar.php');

if(vtoken($cod)){
    $user=filtrar($user);
    $pass=filtrar($pass);

    if((!is_string($user))&&(!is_string($pass))){
        $_SESSION['val']=false;
        //header('location:../vista/iniciosesion.php');
        echo '<script>window.location="../vista/iniciosesion.php"</script>';
      
    }

    else{
            $sql = "select contrasenia, tipo, nombre from cuenta where nombreuser = '". $user."'";
            $dbconn=conexionPostgresql2();
            $res = pg_query($dbconn,$sql);
            pg_close($dbconn);
            
    
			
			
			if($res){

			    $hash = pg_fetch_assoc($res);
				
			    if(password_verify($pass, $hash['contrasenia'])){
			         	$_SESSION['val']=true;
						$_SESSION['user']=$user;
						$_SESSION['nombre']=$hash['nombre'];
						$_SESSION['tipouser']=$hash['tipo'];
						//header('location:../vista/biblimaterial.php?pag=1');
						echo '<script>window.location="../vista/biblimaterial.php?pag=1"</script>';
					}
					else{
					$_SESSION['val']=false;
					//header('location:../vista/iniciosesion.php');	
					echo '<script>window.location="../vista/iniciosesion.php"</script>';
				
					}
				}
				else{
					$_SESSION['val']=false;
					//header('location:../vista/iniciosesion.php');
					echo '<script>window.location="../vista/iniciosesion.php"</script>';
				
				}
			}
		}
		else{
		    //header('location:../vista/iniciosesion.php');
		    echo '<script>window.location="../vista/iniciosesion.php"</script>';
		   
		}
	
	


?>





