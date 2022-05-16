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


<div class="flex">
<div class="span-2 ajuste"><label for="hoja">Hoja</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="hoja" name="hoja"  class="index"  maxlength="50"  placeholder=""> </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="escala">Escala</label></div>
<div class="ajuste w-1"><input type='text' name="escala"  id="escala" class="index"  maxlength="50"  placeholder="1:1000"> </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="localidad">Localidad</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="localidad" name="localidad"  class="index"  maxlength="50"  placeholder=""> </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="provincia">Provincias</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="provincia" name="provincia"  class="index"  maxlength="50"  placeholder=""> </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="paises">Paises</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="paises" name="pais"  class="index"  maxlength="50"  placeholder=""> </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="tipomapa">Tipo Mapa</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' name="tipom"  id="tipom" class="index"  maxlength="50"  placeholder=""> </div>
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