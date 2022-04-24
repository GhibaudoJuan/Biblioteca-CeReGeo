<?php 

$ttautor= autostring("tt", "autores");
$ttdirector= autostring("tt", "directores");
$ttuni= autostring("tt", "universidad");
$ttlugar= autostring("tt", "lugar");
$tttipo= autostring("tt", "tipott");
$tidioma=autostring("material","idioma");
?>




<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">


</head>
<body>



<div class="flex">
<div class="span-2 ajuste"><label for="ttcodigo">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="ttcodigo"name="idmat" autofocus class="index"  maxlength="100"  placeholder="" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="ttitulo">Titulo</label></div>
<div class="ajuste w-2"><input  type='text' id="ttitulo" name="titulo" class="index"  maxlength="100"  placeholder="" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="tportada">Portada</label></div>
 <div class="ajuste w-2"><input type='file' id="tportada" name="portada" class="index"  placeholder=""> </div>
 </div>

<div class="flex">
<div class="span-2 ajuste"><label for="tcatalogo">Catalogo</label></div>
<div class="ajuste w-2"><input type='text' id="tcatalogo" name="idcatalogo" class="index" maxlength="100"  placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="tanio">A&ntildeo</label></div>
<div class="ajuste w-2"><input type='text' id="tanio" name="anio" class="index" maxlength="4"> </div>
 </div>
 
<div class="flex">
<div class="span-2 ajuste"><label for="tidioma">Idioma</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="tidioma" name="idioma" class="index" > </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="tdesc">Descripcion</label></div>
<div class="ajuste w-2"><input type='text' id="tdesc" name="descripcion"  class="index" maxlength="300" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="tipott">Tipo</label></div>
<div class="ajuste w-2 autocomplete">
<input id="tipott" type='text' name="tipott" class="index"   maxlength="300"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="finalautor">Autores</label></div>
<div class="ajuste w-2 autocomplete" >
<input id="finalautor" type='text' name="autores" class="index"   maxlength="300"  placeholder=""></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="finaldirector">Directores</label></div>
<div class="ajuste w-2 autocomplete" >
<input id="finaldirector" type='text' name="directores" class="index"  maxlength="300"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="finaluni">Universidad</label></div>
<div class="ajuste w-2 autocomplete" >
<input id="finaluni" type='text' name="universidad" class="index"  maxlength="100"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="finallugar">Lugar</label></div>
<div class="ajuste w-2 autocomplete">
<input id="finallugar" type='text' name="lugar" class="index"  maxlength="100"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="numpag">Nro Paginas</label></div>
<div class="ajuste w-2"><input type='number' id="numpag" name="numpag" class="index"  maxlength="30" min="0" max="1000" placeholder=""></div>
</div>


<input type='hidden' name ='tipo'value='Final'>




<script>
autocomplete(document.getElementById("ttcodigo"), <?php echo $material;?>);
autocomplete(document.getElementById("finalautor"), <?php echo $ttautor;?>);
autocomplete(document.getElementById("finaldirector"), <?php echo $ttdirector;?>);
autocomplete(document.getElementById("finaluni"), <?php echo $ttuni;?>);
autocomplete(document.getElementById("finallugar"), <?php echo $ttlugar;?>);
autocomplete(document.getElementById("tipott"), <?php echo $tttipo;?>);
autocomplete(document.getElementById("tidioma"), <?php echo $tidioma;?>);
</script>
</body>


</html>
