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



<div class="input-group m-div">
<label class="input-group-text w-label" for="ttcodigo">Codigo Material</label>
<div class="autocomplete"><input type='text' id="ttcodigo"name="idmat" autofocus class="form-control w-input"  maxlength="100"  placeholder="" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="ttitulo">Titulo</label>
<div><input  type='text' id="ttitulo" name="titulo" class="form-control w-input"  maxlength="100"  placeholder="" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tportada">Portada</label>
<div><input type='file' id="tportada" name="portada" class="form-control w-input"  placeholder=""> </div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tcatalogo">Catalogo</label>
<div><input type='text' id="tcatalogo" name="idcatalogo" class="form-control w-input" maxlength="100"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tanio">A&ntildeo</label>
<div><input type='text' id="tanio" name="anio" class="form-control w-input" maxlength="4"> </div>
</div>
 
<div class="input-group m-div">
<label class="input-group-text w-label" for="tidioma">Idioma</label>
<div class="autocomplete"><input type='text' id="tidioma" name="idioma" class="form-control w-input" > </div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tdesc">Descripcion</label>
<div><input type='text' id="tdesc" name="descripcion"  class="form-control w-input" maxlength="300" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tipott">Tipo</label>
<div class="autocomplete"><input id="tipott" type='text' name="tipott" class="form-control w-input"   maxlength="300"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="finalautor">Autores</label>
<div class="autocomplete"><input id="finalautor" type='text' name="autores" class="form-control w-input"   maxlength="300"  placeholder=""></div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-label" for="finaldirector">Directores</label>
<div class="autocomplete"><input id="finaldirector" type='text' name="directores" class="form-control w-input"  maxlength="300"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="finaluni">Universidad</label>
<div class="autocomplete"><input id="finaluni" type='text' name="universidad" class="form-control w-input"  maxlength="100"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="finallugar">Lugar</label>
<div class="autocomplete"><input id="finallugar" type='text' name="lugar" class="form-control w-input"  maxlength="100"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="numpag">Nro Paginas</label>
<div><input type='number' id="numpag" name="numpag" class="form-control w-input"  maxlength="30" min="0" max="1000" placeholder=""></div>
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
