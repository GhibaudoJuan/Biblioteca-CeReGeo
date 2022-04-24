<?php  

    require_once('../vendor/autoload.php');
    
    use Spipu\Html2Pdf\Html2Pdf;
    
    
    ob_start();
    include_once('reportesarmar.php');
    $html=ob_get_clean();
    
    
  $nombrefile="/var/www/html/reportes/".$nombrepdf;
    
   
    $html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
    $html2pdf->writeHTML($html);
    $html2pdf->output($nombrefile,'f');
    //$html2pdf->output();
    
    
    
    $insert="insert into reportes (id,nombre,fecha,descripcion) 
                values((select case when max(id)>0 then max (id)+1 else 1 end from reportes),'".$nombrepdf."','".date('Y-m-d')."','".$descri."');";
    #echo $insert;
   
    
    $res=select($insert);
    $_SESSION['res']=$res;
    header('location:../vista/bibliReportes.php?pag=1');	



?>
