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

<div class="flex">
<div class="span-2 ajuste "><label for="autor1">Autor</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="autor1" name="autor"  class="index"   maxlength="150" placeholder=""> </div>
</div>


<div class="flex">
<div class="span-2 ajuste "><label for="edi1">Editorial</label></div>
<div class="ajuste w-1 autocomplete"><input type='text' id="edi1" name="editorial"  class="index"  maxlength="30"  placeholder=""></div>
</div>



<div class="flex">
<div class="span-2 ajuste"><label for="edicion1">Edicion</label></div>
<div class="ajuste w-1"><input type='number' id="edicion1" name="edicion"  class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="isbn">ISBN</label></div>
<div class="ajuste w-1"><input type='text' id="isbn" name="isbn"  class="index"  maxlength="50" placeholder=""></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="tomo">Tomo</label></div>
<div class="ajuste w-1"><input type='number' id="tomo" name="tomo"  class="index"  maxlength="50" min="0" max="50" placeholder=""></div>
</div>



<script>
autocomplete(document.getElementById("autor1"), <?php echo $libroautor;?>);
autocomplete(document.getElementById("edi1"), <?php echo $libroedit;?>);

</script>
</body>


</html>