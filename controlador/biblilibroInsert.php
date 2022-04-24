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



<div class="flex">
<div class="span-2 ajuste"><label for="librocodigo">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="librocodigo"name="idmat" class="index"  maxlength="100" placeholder="" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="ltitulo">Titulo</label></div>
<div class="ajuste w-2"><input  type='text' id="ltitulo" name="titulo" class="index"  maxlength="100" placeholder="" required></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="lportada">Portada</label></div>
<div class="ajuste w-2"><input type='file' id="lportada" name="portada" class="index"placeholder=""> </div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="lcatalogo">Catalogo</label></div>
<div class="ajuste w-2"><input type='text' id="lcatalogo" name="idcatalogo" class="index" maxlength="100"placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="lanio">A&ntildeo</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="lanio" name="anio" class="index" maxlength="4"> </div>
 </div>
 
<div class="flex">
<div class="span-2 ajuste"><label for="lidioma">Idioma</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="lidioma" name="idioma" class="index" > </div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="ldesc">Descripcion</label></div>
<div class="ajuste w-2"><input type='text' id="ldesc" name="descripcion" class="index" maxlength="300" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="libroautor">Autores</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="libroautor" name="autor"  class="index"   maxlength="150" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="libroedit">Editorial</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="libroedit" name="editorial"  class="index"  maxlength="30" placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="isbn">ISBN</label></div>
<div class="ajuste w-2" >
<input type='text' id="isbn" name="isbn"  class="index"  maxlength="50" placeholder=""></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="edicion">Edicion</label></div>
<div class="ajuste w-2"><input type='number' id="ledicion" name="edicion"  class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="tomo">Tomo</label></div>
<div class="ajuste w-2"><input type='number' id="ltomo" name="tomo"  class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
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
