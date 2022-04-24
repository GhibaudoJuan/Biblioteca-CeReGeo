<?php 

require_once('../accesos/biblifiltrar.php');

$ttipo= autostring("tt", "tipott");
$tautor= autostring("tt", "autores");
$tdir= autostring("tt", "directores");
$tuni= autostring("tt", "universidad");
$tlug= autostring("tt", "lugar");

?>
<!doctype html>
<html>
<head>
</head>
<body>

<div class="flex">
<div class="span-2 ajuste"><label for="tipott">Tipo</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="tipott" name="tipott"  class="index"  maxlength="50"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rautores">Autores</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' name="autores" id="tautores" class="index"   maxlength="300"  placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="rdirec">Directores</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' name="directores"  id="rdirec" class="index"  maxlength="300"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="runiv">Universidad</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' name="universidad"  id="tuniv" class="index"  maxlength="100"  placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="tlugar">Lugar</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' name="lugar" id="tlugar" class="index"  maxlength="100" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="tnum">Nro Paginas</label></div>
<div class="ajuste w-1"><input type='number' name="numpag"  id="tnum" class="index"  maxlength="30" min="0" max="1000" placeholder=""></div>
</div>

<script>
autocomplete(document.getElementById("tautores"), <?php echo $tautor;?>);
autocomplete(document.getElementById("tdirec"), <?php echo $tdir;?>);
autocomplete(document.getElementById("tlugar"), <?php echo $tlug;?>);
autocomplete(document.getElementById("tipott"), <?php echo $ttipo;?>);
autocomplete(document.getElementById("tuniv"), <?php echo $tuni;?>);


</script>
</body>


</html>