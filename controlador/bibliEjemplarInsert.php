<?php 

require_once('../accesos/biblifiltrar.php');

$ejempprop= autostring("ejemplares", "propietario");
?>

<!doctype html>
<html>
<head>
</head>
<body>




<form action = "../modelo/bibliEjemplarInsert.php" enctype="multipart/form-data" method="post" >

<?php include("getejemplar.php");?>
<div class="flex">
<div class="span-2 ajuste"><label for="beice">Codigo Ejemplar</label></div>
<div class="ajuste w-2"><input type='text' id="beice"name="idejemplar"  class="index"  maxlength="50" min="0" max="50" placeholder="Codigo Ejemplar" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="ce">Cod. Externo</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="ce" name="ce"  class="index"  maxlength="50" min="0" max="50" placeholder="Codigo Externo"></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="ejemprop">Propietario</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="ejemprop" name="propietario"  class="index"  maxlength="50" min="0" max="50" placeholder="Propietario"></div>
</div>

<div class="flex">
<div class="ajuste ">
<input type="checkbox" style="width: auto;" id="dis" name="disponibilidad" value="True" checked>
<label class="span" for="dis">Disponible</label>
</div>
</div>

<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
</form>
<script>
autocomplete(document.getElementById("ejemprop"), <?php echo $ejempprop;?>);
</script>
</body>


</html>