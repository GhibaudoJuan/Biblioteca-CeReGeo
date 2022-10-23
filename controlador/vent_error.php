<?php 
/*ventana usada para mostrar los errores*/
if(!isset($_SESSION))session_start();
$error="'";
$error.=$_SESSION['error'];
$error.="'";

?>

<!doctype html>
<html>
<head>
</head>
<body>

<div id="error" style="position:absolute;top:2rem;left:30%;height:100%;display:none;">
<div class="alert-danger sticky vent_error" >

<div class="flex">

<div class="ajuste_error text_error">
<p id="mens">Error: La acci&oacuten ejecutada no se pud&oacute completar, pruebe ejecutarla de vuelta.</p>
</div>


<div class="ajuste_error close_error">
<a href="#" class="sindec negro"  onclick="ocultar_error()">
<div style="padding:1rem;"><span>Cerrar</span></div>

</a>
</div>


</div>
</div>
</div>
<div id="exito" style="position:absolute;top:2rem;left:30%;height:100%;display:none;">
<div class="alert-success sticky vent_error" >

<div class="flex">

<div class="ajuste_error text_error">
<p id='mensexito'></p>
</div>


<div class="ajuste_error close_error">
<a href="#" class="sindec negro"  onclick="ocultar_exito()">
<div style="padding:1rem;"><span>Cerrar</span></div>

</a>
</div>


</div>
</div>
</div>
<script type="text/javascript">
mostrar_error(<?php echo $error;?>,<?php echo $_SESSION['res'];?>)
console.log(<?php echo $_SESSION['res'];?>)
</script>
<?php $_SESSION['res']=0;
      unset($_SESSION['error']);
?>
</body>

</html>

