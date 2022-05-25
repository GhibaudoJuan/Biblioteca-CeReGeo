<?php 

require_once('../accesos/biblifiltrar.php');

$libroautor= autostring("libros", "autor");
$libroedit= autostring("libros", "editorial");

?>
<!doctype html>
<html>
<head>
</head>
<body>

<div class="input-group m-div">
<label class="input-group-text w-av" for="autor1">Autor</label>
<div class="ajuste autocomplete"><input type='text' id="autor1" name="autor"  class="form-control"   maxlength="150" placeholder=""> </div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-av" for="edi1">Editorial</label>
<div class="ajuste autocomplete"><input type='text' id="edi1" name="editorial"  class="form-control"  maxlength="30"  placeholder=""></div>
</div>



<div class="input-group m-div">
<label class="input-group-text w-av" for="edicion1">Edicion</label>
<div class="ajuste"><input type='number' id="edicion1" name="edicion"  class="form-control"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>
<div class="input-group m-div">
<label class="input-group-text w-av" for="isbn">ISBN</label>
<div class="ajuste"><input type='text' id="isbn" name="isbn"  class="form-control"  maxlength="50" placeholder=""></div>
</div>


<div class="input-group m-div">
<label class="input-group-text w-av" for="tomo">Tomo</label>
<div class="ajuste"><input type='number' id="tomo" name="tomo"  class="form-control"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>



<script>
autocomplete(document.getElementById("autor1"), <?php echo $libroautor;?>);
autocomplete(document.getElementById("edi1"), <?php echo $libroedit;?>);

</script>
</body>


</html>