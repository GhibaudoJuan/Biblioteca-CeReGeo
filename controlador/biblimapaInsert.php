<?php 

$mapaloc= autostring("mapas", "localidad");
$mapaprov= autostring("mapas", "provincia");
$mapapais= autostring("mapas", "pais");
$mapaescala= autostring("mapas", "escala");
$mapatipo= autostring("mapas", "tipom");
$midioma=autostring("material","idioma");

?>




<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>



<div class="flex">
<div class="span-2 ajuste"><label for="mapacodigo">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="mapacodigo"name="idmat" autofocus class="index"  maxlength="100" placeholder="" required></div>
</div>



<div class="flex">
<div class="span-2 ajuste"><label for="mtitulo">Titulo</label></div>
<div class="ajuste w-2"><input  type='text' id="mtitulo" name="titulo" class="index"  maxlength="100"  placeholder="" required></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="mportada">Portada</label></div>
<div class="ajuste w-2"><input type='file' id="mportada" name="portada" class="index" placeholder=""> </div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="mcatalogo">Catalogo</label></div>
<div class="ajuste w-2"><input type='text' id="mcatalogo" name="idcatalogo" class="index" maxlength="100"  placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="manio">A&ntildeo</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="manio" name="anio" class="index" maxlength="4"> </div>
 </div>
 
<div class="flex">
<div class="span-2 ajuste"><label for="midioma">Idioma</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="midioma" name="idioma" class="index" > </div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="mdesc">Descripcion</label></div>
<div class="ajuste w-2"><input type='text' id="mdesc" name="descripcion" class="index" maxlength="300"  placeholder=""></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="hoja">Hoja</label></div>
<div class="ajuste w-2"><input type='text' id="hoja" name="hoja" class="index"  maxlength="50"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="mapaescala">Escala</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="mapaescala" name="escala" class="index" placeholder="1:1000" maxlength="50"  ></div>
</div>



<div class="flex">
<div class="span-2 ajuste"><label for="mapaloc">Localidad</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="mapaloc" name="localidad" class="index"  maxlength="50" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="mapaprov">Provincias</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="mapaprov" name="provincia" class="index"  maxlength="50" placeholder=""></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="mapapais">Paises</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="mapapais" name="pais" class="index"  maxlength="50"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="mapatipo">Tipo Mapa</label></div>
<div class="ajuste w-2 autocomplete">
<input type='text' id="mapatipo" name="tipom" class="index"  maxlength="50"  placeholder=""></div>
</div>





<input type='hidden' name ='tipo'value='Mapa'>




<script>
autocomplete(document.getElementById("mapacodigo"), <?php echo $material;?>);
autocomplete(document.getElementById("mapaloc"), <?php echo $mapaloc;?>);
autocomplete(document.getElementById("mapaprov"), <?php echo $mapaprov;?>);
autocomplete(document.getElementById("mapapais"), <?php echo $mapapais;?>);
autocomplete(document.getElementById("mapaescala"), <?php echo $mapaescala;?>);
autocomplete(document.getElementById("mapatipo"), <?php echo $mapatipo;?>);
autocomplete(document.getElementById("midioma"), <?php echo $midioma;?>);
</script>
</body>


</html>