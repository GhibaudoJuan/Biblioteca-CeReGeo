<?php 

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





<div class="flex">
<div class="span-2 ajuste"><label for="revcodigo">Codigo Material</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="revcodigo"name="idmat" autofocus class="index"  maxlength="100"placeholder="" required></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="rtitulo">Titulo</label></div>
<div class="ajuste w-2"><input  type='text' id="rtitulo" name="titulo" class="index"  maxlength="100" placeholder="" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rportada">Portada</label></div>
<div class="ajuste w-2"><input type='file' id="rportada" name="portada" class="index" placeholder=""> </div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="rcatalogo">Catalogo</label></div>
<div class="ajuste w-2"><input type='text' id="rcatalogo" name="idcatalogo" class="index" maxlength="100" placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="ranio">A&ntildeo</label></div>
<div class="ajuste w-2"><input type='text' id="ranio" name="anio" class="index" maxlength="4"> </div>
 </div>
 
<div class="flex">
<div class="span-2 ajuste"><label for="ridioma">Idioma</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="ridioma" name="idioma" class="index" > </div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="rdesc">Descripcion</label></div>
<div class="ajuste w-2"><input type='text' id="rdesc" name="descripcion" class="index" maxlength="300" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="reveditorial">Editorial</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="revedit" name="reveditorial" class="index"  maxlength="30"  placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rvolumen">Volumen</label></div>
<div class="ajuste w-2"><input type='number' id="rvolumen" name="volumen" class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rejemplar">Ejemplar</label></div>
<div class="ajuste w-2"><input type='number' id="rejemplar" name="ejemplar" class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rcoleccion">Coleccion</label></div>
<div class="ajuste w-2 autocomplete" >
<input type='text' id="revcol" name="rcoleccion" class="index"  maxlength="30" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="rnum">Nro</label></div>
<div class="ajuste w-2"><input type='number' id="rnum" name="num" class="index"  maxlength="30" min="0" max="50" placeholder=""></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="issn">ISSN</label></div>
<div class="ajuste w-2"><input type='text' id="issn" name="issn" class="index"  maxlength="150" placeholder=""></div>
</div>

<input type='hidden' name ='tipo'value='Revista'>



<script>
autocomplete(document.getElementById("revedit"), <?php echo $revedit;?>);
autocomplete(document.getElementById("revcol"), <?php echo $revcol;?>);
autocomplete(document.getElementById("ridioma"), <?php echo $ridioma;?>);
autocomplete(document.getElementById("revcodigo"), <?php echo $material;?>);
</script>

</body>


</html>
