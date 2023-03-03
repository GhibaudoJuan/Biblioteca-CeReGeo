<?php 
/*form de la vista nuevo
 *
 */
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







<div class="input-group m-div">
<label class="input-group-text w-label" for="mtitulo">T&iacutetulo*</label>
<div ><input  type='text' id="mtitulo" name="titulo" class="form-control w-input ml-n"  maxlength="300"  placeholder="" required></div>

<label class="input-group-text w-label" for="mportada">Portada</label>
<div ><input type='file' id="mportada" name="portada" class="form-control w-input ml-n" placeholder=""> </div>

<label class="input-group-text w-label" for="hoja">Hoja</label>
<div><input type='text' id="hoja" name="hoja" class="form-control w-input"  maxlength="50"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="mapaloc">Localidad</label>
<div class="autocomplete" ><input type='text' id="mapaloc" name="localidad" class="form-control w-input ml-n"  maxlength="50" placeholder=""></div>

<label class="input-group-text w-label" for="mapaprov">Provincias</label>
<div class="autocomplete" ><input type='text' id="mapaprov" name="provincia" class="form-control w-input ml-n"  maxlength="50" placeholder=""></div>

<label class="input-group-text w-label" for="mapapais">Paises</label>
<div class="autocomplete"><input type='text' id="mapapais" name="pais" class="form-control w-input"  maxlength="50"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="mmes">Mes</label>
<select id="mmes" name= "mes" class="form-select w-input ml-n">
  <option value=""></option>
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

<label class="input-group-text w-label" for="manio">A&ntildeo</label>
<div class=" autocomplete"><input type='text' id="manio" name="anio" class="form-control w-input ml-n" maxlength="4" onkeydown="isnumero()"> </div>

<label class="input-group-text w-label" for="midioma">Idioma</label>
<div class="autocomplete"><input type='text' id="midioma" name="idioma" class="form-control w-input" > </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="mapatipo">Tipo Mapa*</label>
<div class="autocomplete"><input type='text' id="mapatipo" name="tipom" class="form-control w-input ml-n"  maxlength="50"  placeholder="" required></div>

<label class="input-group-text w-label" for="mapaescala">Escala</label>
<div class="autocomplete" ><input type='text' id="mapaescala" name="escala" class="form-control w-input ml-n" placeholder="1:1000" maxlength="50"  ></div>

<label class="input-group-text w-label" for="mdesc">Descripci&oacuten</label>
<div><input type='text' id="mdesc" name="descripcion" class="form-control w-input" maxlength="300"  placeholder=""></div>
</div>


<input type='hidden' name ='tipo'value='Mapa'>




<script>

autocomplete(document.getElementById("mapaloc"), <?php echo $mapaloc;?>);
autocomplete(document.getElementById("mapaprov"), <?php echo $mapaprov;?>);
autocomplete(document.getElementById("mapapais"), <?php echo $mapapais;?>);
autocomplete(document.getElementById("mapaescala"), <?php echo $mapaescala;?>);
autocomplete(document.getElementById("mapatipo"), <?php echo $mapatipo;?>);
autocomplete(document.getElementById("midioma"), <?php echo $midioma;?>);
</script>
</body>


</html>