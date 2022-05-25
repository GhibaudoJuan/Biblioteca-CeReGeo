<?php 

require_once('../accesos/biblifiltrar.php');

$mhoja= autostring("mapas", "hoja");
$mloc= autostring("mapas", "localidad");
$mprov= autostring("mapas", "provincia");
$mpais= autostring("mapas", "pais");
$mtipo= autostring("mapas", "tipom");

?>
<!doctype html>
<html>
<head>
</head>
<body>


<div class="input-group m-div">
<label class="input-group-text w-av"  for="hoja">Hoja</label>
<div class="ajuste autocomplete"><input type='text' id="hoja" name="hoja"  class="form-control"  maxlength="50"  placeholder=""> </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av"  for="escala">Escala</label>
<div class="ajuste"><input type='text' name="escala"  id="escala" class="form-control"  maxlength="50"  placeholder="1:1000"> </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av"  for="localidad">Localidad</label>
<div class="ajuste autocomplete"><input type='text' id="localidad" name="localidad"  class="form-control"  maxlength="50"  placeholder=""> </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av"  for="provincia">Provincias</label>
<div class="ajuste autocomplete"><input type='text' id="provincia" name="provincia"  class="form-control"  maxlength="50"  placeholder=""> </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av"  for="paises">Paises</label>
<div class="ajuste autocomplete"><input type='text' id="paises" name="pais"  class="form-control"  maxlength="50"  placeholder=""> </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av"  for="tipomapa">Tipo Mapa</label>
<div class="ajuste autocomplete"><input type='text' name="tipom"  id="tipom" class="form-control"  maxlength="50"  placeholder=""> </div>
</div>


<script>
autocomplete(document.getElementById("hoja"), <?php echo $mhoja;?>);
autocomplete(document.getElementById("localidad"), <?php echo $mloc;?>);
autocomplete(document.getElementById("provincia"), <?php echo $mprov;?>);
autocomplete(document.getElementById("paises"), <?php echo $mpais;?>);
autocomplete(document.getElementById("tipom"), <?php echo $mtipo;?>);

</script>
</body>


</html>