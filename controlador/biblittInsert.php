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
<label class="input-group-text w-label" for="ttitulo">Titulo</label>
<div><input  type='text' id="ttitulo" name="titulo" class="form-control w-input ml-n"  maxlength="100"  placeholder="" required></div>

<label class="input-group-text w-label" for="tportada">Portada</label>
<div><input type='file' id="tportada" name="portada" class="form-control w-input ml-n"  placeholder=""> </div>

<label class="input-group-text w-label" for="finalautor">Autor/es</label>
<div class="autocomplete"><input id="finalautor" type='text' name="autores" class="form-control w-input"   maxlength="300"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="finaldirector">Director/es</label>
<div class="autocomplete"><input id="finaldirector" type='text' name="directores" class="form-control w-input ml-n"  maxlength="300"  placeholder=""></div>

<label class="input-group-text w-label" for="finaluni">Universidad</label>
<div class="autocomplete"><input id="finaluni" type='text' name="universidad" class="form-control w-input ml-n"  maxlength="100"  placeholder=""></div>

<label class="input-group-text w-label" for="finallugar">Lugar</label>
<div class="autocomplete"><input id="finallugar" type='text' name="lugar" class="form-control w-input"  maxlength="100"  placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="tmes">Mes</label>
<select id="tmes" name= "mes" class="form-select w-input ml-n">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>

<label class="input-group-text w-label" for="tanio">A&ntildeo</label>
<div><input type='text' id="tanio" name="anio" class="form-control w-input ml-n" maxlength="4"> </div>

<label class="input-group-text w-label" for="tidioma">Idioma</label>
<div class="autocomplete"><input type='text' id="tidioma" name="idioma" class="form-control w-input" > </div>
</div>
 <div class="input-group m-div">
<label class="input-group-text w-label" for="numpag">Nro Paginas</label>
<div><input type='number' id="numpag" name="numpag" class="form-control w-input ml-n"  maxlength="30" min="0" max="9999999999999999" placeholder=""></div>

<label class="input-group-text w-label" for="tipott">Tipo</label>
<div class="autocomplete"><input id="tipott" type='text' name="tipott" class="form-control w-input ml-n"   maxlength="300"  placeholder=""></div>

<label class="input-group-text w-label" for="tdesc">Descripcion</label>
<div><input type='text' id="tdesc" name="descripcion"  class="form-control w-input" maxlength="300" placeholder=""></div>
</div>









<input type='hidden' name ='tipo'value='Final'>




<script>

autocomplete(document.getElementById("finalautor"), <?php echo $ttautor;?>);
autocomplete(document.getElementById("finaldirector"), <?php echo $ttdirector;?>);
autocomplete(document.getElementById("finaluni"), <?php echo $ttuni;?>);
autocomplete(document.getElementById("finallugar"), <?php echo $ttlugar;?>);
autocomplete(document.getElementById("tipott"), <?php echo $tttipo;?>);
autocomplete(document.getElementById("tidioma"), <?php echo $tidioma;?>);
</script>
</body>


</html>
