<?php 
/*form de la vista nuevo
 *
 */
$revedit= autostring("revistas", "reveditorial");
$revcol= autostring("revistas", "coleccion");
$ridioma=autostring("material","idioma");
?>


<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>




<div class="input-group m-div">
<label class="input-group-text w-label" for="rtitulo">T&iacutetulo*</label>
<div><input  type='text' id="rtitulo" name="titulo" class="form-control w-input ml-n"  maxlength="300" placeholder="" required></div>

<label class="input-group-text w-label" for="rportada">Portada</label>
<div><input type='file' id="rportada" name="portada" class="form-control w-input ml-n" placeholder=""> </div>


<label class="input-group-text w-label" for="issn">ISSN</label>
<div><input type='text' id="issn" name="issn" class="form-control w-input"  maxlength="150" placeholder=""></div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-label" for="rcoleccion">Coleccion</label>
<div class="autocomplete"><input type='text' id="revcol" name="coleccion" class="form-control w-input ml-n"  maxlength="30" placeholder=""></div>

<label class="input-group-text w-label" for="rnum">&#8470</label>
<div><input type='number' id="rnum" name="num" class="form-control w-input ml-n"  maxlength="30" min="0" max="9999999999" placeholder=""></div>


<label class="input-group-text w-label" for="reveditorial">Editorial</label>
<div class="autocomplete"><input type='text' id="revedit" name="reveditorial" class="form-control w-input"  maxlength="30"  placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="rmes">Mes</label>
<select id="rmes" name= "mes" class="form-select w-input ml-n">
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

<label class="input-group-text w-label" for="ranio">A&ntildeo</label>
<div><input type='text' id="ranio" name="anio" class="form-control w-input ml-n" maxlength="4"> </div>

<label class="input-group-text w-label" for="ridioma">Idioma</label>
<div class="autocomplete"><input type='text' id="ridioma" name="idioma" class="form-control w-input" > </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="rvolumen">Volumen</label>
<div><input type='number' id="rvolumen" name="volumen" class="form-control w-input ml-n"  maxlength="50" min="0" max="99999999" placeholder=""></div>

<label class="input-group-text w-label" for="rejemplar">Ejemplar</label>
<div><input type='number' id="rejemplar" name="ejemplar" class="form-control w-input ml-n"  maxlength="50" min="0" max="99999999" placeholder=""></div>

<label class="input-group-text w-label" for="rdesc">Descripci&oacuten</label>
<div><input type='text' id="rdesc" name="descripcion" class="form-control w-input" maxlength="300" placeholder=""></div>
</div>




<input type='hidden' name ='tipo'value='Revista'>



<script>
autocomplete(document.getElementById("revedit"), <?php echo $revedit;?>);
autocomplete(document.getElementById("revcol"), <?php echo $revcol;?>);
autocomplete(document.getElementById("ridioma"), <?php echo $ridioma;?>);

</script>

</body>


</html>
