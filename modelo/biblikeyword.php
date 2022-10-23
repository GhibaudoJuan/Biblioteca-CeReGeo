<?php
/* tratamiento de las palabras claves del contenido de la vista de Ejemplares*/
ob_start();
if(!isset($_SESSION))session_start();
//copio _POST a otras variable
require_once('../accesos/biblifiltrar.php');



$array=$_POST;

    	//traigo el numero maximo de palabras que tiene ese codigo
$sql=pg_fetch_assoc(select("select max(word_id) from keywords where mat_id='".$array['mat_id']."';"));
if($sql['max']!=''){
    //si ya hay una cantidad
    $max=$sql['max'];
}
else {
    //si no hay una cantidad
    $max=0;
}
switch ($array['keyword']){
    case 'insert':
        //armo el insert de las 5 palabras clave que vienen de la vista Nuevo
        $insert="insert into keywords (mat_id, word_id, descri) values ";
        for($i=1;$i<6;$i++){
            if($array['word'.$i]!=""){
                //aumento el maximo de palabras clave en 1
                $max++;
                $insert.="('".$array['mat_id']."','".$max."','".$array['word'.$i]."'),";
            }
            
        }
        //cambio la ultima coma por un punto y como
        $insert=trim($insert,",").";";
        //ejecuto el select
        select($insert);
        //redirigo
        header('location:../vista/bibliNuevo.php');
        //echo '<script>window.location="../vista/bibliNuevo.php"</script>';
        break;
    case 'update':
        //pregunto si hay que remplazar palabra o es nueva
        if($array['word']!='---'){
            //escribo el update de la palabra
        $update="update keywords set descri='".$array['wordnew']."' where mat_id='".$array['mat_id']."' and descri='".$array['word']."';";
        //ejecuto el select
        select($update);     
        
        }
        else{
            if($array['wordnew']==''){ //pregunto su la nueva palabla es vacia
                //si es vacio elimino la palabra
                $delete="delete from keywords where mat_id='".$array['mat_id']."' and descri='".$array['word']."';";
                select($delete);
            }
            else{//si no lo es inserto nueva palabla
            $nuevo=$max+1;
            //se inserta una nueva palabra desde el update
            $insert2="insert into keywords (mat_id, word_id, descri) values('".$array['mat_id']."','".$nuevo."','".$array['wordnew']."');";
            //ejecuto el select
            select($insert2); 
            }
        }
        //redirigo
        header('location:'.$_SESSION['atrasejemplar']);
        //echo '<script>window.location="'.$_SESSION['atrasejemplar'].'"</script>';
        break;
    case 'delete':
        //esta en el update
        
        break;
    
    
    
    
}

 	
    //guardo el resultado
    	
    	
	

?>