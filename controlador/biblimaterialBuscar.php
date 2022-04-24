<?php 

require_once('../accesos/biblifiltrar.php');

$titulos= autostring("material", "titulo");


?>
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../vista/biblimaterial.php?pag=1" method="post" >

<div class="autocomplete">
<input type='text' id="titulo"name="titulo" class="index" style="width:21rem;" placeholder="Titulo" maxlength="100" size="20" >
</div>

<input type='hidden' name ='w'value=' where '>

<button type="submit" class="indexbutton" >Buscar</button>

</form>

<script>

autocomplete(document.getElementById("titulo"), <?php echo $titulos;?>);
</script>
</body>


</html>