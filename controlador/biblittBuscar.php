<?php 
/*form de la vista material
 * parte de la busqueda avanzada
 */
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

<div class="input-group m-div">
<label class="input-group-text w-av" for="tipott">Tipo</label>
<div class="ajuste autocomplete"><input type='text' id="tipott" name="tipott"  class="form-control"  maxlength="50"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-av" for="rautores">Autores</label>
<div class="ajuste autocomplete"><input type='text' name="autores" id="tautores" class="form-control"   maxlength="300"  placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av" for="rdirec">Directores</label>
<div class="ajuste autocomplete"><input type='text' name="directores"  id="tdirec" class="form-control"  maxlength="300"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-av" for="runiv">Universidad</label>
<div class="ajuste autocomplete"><input type='text' name="universidad"  id="tuniv" class="form-control"  maxlength="100"  placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av" for="tlugar">Lugar</label>
<div class="ajuste autocomplete"><input type='text' name="lugar" id="tlugar" class="form-control"  maxlength="100" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-av" for="tnum">Paginas</label>
<div class="ajuste"><input type='number' name="numpag"  id="tnum" class="form-control"  maxlength="30" min="0" max="1000" placeholder=""></div>
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