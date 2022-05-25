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





<div class="input-group m-div">
<label class="input-group-text w-label" for="revcodigo">Codigo Material</label>
<div class="autocomplete" ><input type='text' id="revcodigo" name="idmat" autofocus class="form-control w-input"  maxlength="100"placeholder="" required></div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-label" for="rtitulo">Titulo</label>
<div><input  type='text' id="rtitulo" name="titulo" class="form-control w-input"  maxlength="100" placeholder="" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="rportada">Portada</label>
<div><input type='file' id="rportada" name="portada" class="form-control w-input" placeholder=""> </div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-label" for="rcatalogo">Catalogo</label>
<div><input type='text' id="rcatalogo" name="idcatalogo" class="form-control w-input" maxlength="100" placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="ranio">A&ntildeo</label>
<div><input type='text' id="ranio" name="anio" class="form-control w-input" maxlength="4"> </div>
 </div>
 
<div class="input-group m-div">
<label class="input-group-text w-label" for="ridioma">Idioma</label>
<div class="autocomplete"><input type='text' id="ridioma" name="idioma" class="form-control w-input" > </div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-label" for="rdesc">Descripcion</label>
<div><input type='text' id="rdesc" name="descripcion" class="form-control w-input" maxlength="300" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="reveditorial">Editorial</label>
<div class="autocomplete"><input type='text' id="revedit" name="reveditorial" class="form-control w-input"  maxlength="30"  placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="rvolumen">Volumen</label>
<div><input type='number' id="rvolumen" name="volumen" class="form-control w-input"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="rejemplar">Ejemplar</label>
<div><input type='number' id="rejemplar" name="ejemplar" class="form-control w-input"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="rcoleccion">Coleccion</label>
<div class="autocomplete"><input type='text' id="revcol" name="rcoleccion" class="form-control w-input"  maxlength="30" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="rnum">Nro</label>
<div><input type='number' id="rnum" name="num" class="form-control w-input"  maxlength="30" min="0" max="50" placeholder=""></div>
</div>

<div class="input-group m-div">
<label class="input-group-text w-label" for="issn">ISSN</label>
<div><input type='text' id="issn" name="issn" class="form-control w-input"  maxlength="150" placeholder=""></div>
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
