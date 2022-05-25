<?php 

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
<label class="input-group-text w-label" for="librocodigo">Codigo Material</label>
<div class="autocomplete"><input type='text' id="librocodigo" name="idmat" class="form-control w-input"  maxlength="100" placeholder="" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="ltitulo">Titulo</label>
<div><input  type='text' id="ltitulo" name="titulo" class="form-control w-input"  maxlength="100" placeholder="" required></div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-label" for="lportada">Portada</label>
<div><input type='file' id="lportada" name="portada" class="form-control w-input" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="lcatalogo">Catalogo</label>
<div><input type='text' id="lcatalogo" name="idcatalogo" class="form-control w-input" maxlength="100"placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="lanio">A&ntildeo</label>
<div class="autocomplete"><input type='text' id="lanio" name="anio" class="form-control w-input" maxlength="4"> </div>
 </div>
 
<div class="input-group m-div">
<label class="input-group-text w-label" for="lidioma">Idioma</label>
<div class="autocomplete"><input type='text' id="lidioma" name="idioma" class="form-control w-input" > </div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="ldesc">Descripcion</label>
<div><input type='text' id="ldesc" name="descripcion" class="form-control w-input" maxlength="300" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="libroautor">Autores</label>
<div class=" autocomplete" ><input type='text' id="libroautor" name="autor"  class="form-control w-input"   maxlength="150" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="libroedit">Editorial</label>
<div class=" autocomplete" ><input type='text' id="libroedit" name="editorial"  class="form-control w-input"  maxlength="30" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="isbn">ISBN</label>
<div><input type='text' id="isbn" name="isbn"  class="form-control w-input"  maxlength="50" placeholder=""></div>
</div>

 
<div class="input-group m-div">
<label class="input-group-text w-label" for="edicion">Edicion</label>
<div><input type='number' id="ledicion" name="edicion"  class="form-control w-input"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="tomo">Tomo</label>
<div><input type='number' id="ltomo" name="tomo"  class="form-control w-input"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<input type='hidden' name ='tipo'value='Libro'>




<script>
autocomplete(document.getElementById("libroautor"), <?php echo $libroautores;?>);
autocomplete(document.getElementById("libroedit"), <?php echo $libroeditorial;?>);
autocomplete(document.getElementById("lidioma"), <?php echo $libroidioma;?>);
autocomplete(document.getElementById("librocodigo"), <?php echo $material;?>);
</script>
</body>


</html>
