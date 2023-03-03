<?php 
/*form de la vista nuevo
 * 
 */
require_once('../accesos/biblifiltrar.php');

$libroautores= autostring("libros", "autor");
$libroeditorial= autostring("libros", "editorial");
$libroidioma=autostring("material","idioma");
?>

<!doctype html>
<html>
<head>

</head>
<body>




<div class="input-group m-div">
<label class="input-group-text w-label" for="ltitulo">T&iacutetulo*</label>
<div><input  type='text' id="ltitulo" name="titulo" class="form-control w-input ml-n"  maxlength="300" placeholder="" required></div>

<label class="input-group-text w-label" for="lportada">Portada</label>
<div><input type='file' id="lportada" name="portada" class="form-control w-input ml-n" placeholder=""></div>

<label class="input-group-text w-label" for="libroautor">Autor/es*</label>
<div class=" autocomplete" ><input type='text' id="libroautor" name="autor"  class="form-control w-input"   maxlength="150" placeholder="" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="edicion">Edicion</label>
<div><input type='number' id="ledicion" name="edicion"  class="form-control w-input ml-n" maxlength="50" min="0" max="50" placeholder=""></div>



<label class="input-group-text w-label" for="tomo">Tomo</label>
<div><input type='number' id="ltomo" name="tomo"  class="form-control w-input ml-n"  maxlength="50" min="0" max="50" placeholder=""></div>



<label class="input-group-text w-label" for="isbn">ISBN</label>
<div><input type='text' id="isbn" name="isbn"  class="form-control w-input"  maxlength="50" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="lmes">Mes</label>
<select id="lmes" name= "mes" class="form-select w-input ml-n">
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

<label class="input-group-text w-label" for="lanio">A&ntildeo*</label>
<div class="autocomplete"><input type='text' id="lanio" name="anio" class="form-control w-input ml-n" maxlength="4" required onkeydown="isnumero()"> </div>

<label class="input-group-text w-label" for="lidioma">Idioma</label>
<div class="autocomplete"><input type='text' id="lidioma" name="idioma" class="form-control w-input" > </div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="libroedit">Editorial</label>
<div class=" autocomplete" ><input type='text' id="libroedit" name="editorial"  class="form-control w-input ml-n"  maxlength="30" placeholder=""></div>



<label class="input-group-text w-label" for="ldesc">Descripci&oacuten</label>
<div><input type='text' id="ldesc" name="descripcion" class="form-control w-input" maxlength="300" placeholder=""></div>
</div>


<input type='hidden' name ='tipo'value='Libro'>




<script>
autocomplete(document.getElementById("libroautor"), <?php echo $libroautores;?>);
autocomplete(document.getElementById("libroedit"), <?php echo $libroeditorial;?>);
autocomplete(document.getElementById("lidioma"), <?php echo $libroidioma;?>);
</script>
</body>


</html>
