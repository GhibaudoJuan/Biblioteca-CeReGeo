<?php 
require_once('../accesos/biblifiltrar.php');


$keywords= autostring("keywords", "descri");
?>
<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblikeyword.php" method="post">

<div class="flex">
<div class="span-2 ajuste"><label for="mat_id">Codido Material</label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="mat_id" name="mat_id" class="index"  maxlength="100" placeholder="Titulo" required></div>
</div>


<?php for($i=1;$i<6;$i++):?>
<div class="flex">
<div class="span-2 ajuste"><label for="word<?php echo $i;?>">Palabra clave <?php echo $i;?></label></div>
<div class="ajuste w-2 autocomplete"><input type='text' id="word<?php echo $i;?>" name="word<?php echo $i;?>"  class="index" value="" placeholder="Titulo" maxlength="100" <?php if($i==1) echo required; ?>></div>
</div>

<?php endfor;?>

<input type="hidden" value="insert" name="keyword">

<button type="submit" class="indexbutton">Agregar</button>




</form>

<script>
autocomplete(document.getElementById("mat_id"), <?php echo $material;?>);
<?php for($i=1;$i<6;$i++):?>
autocomplete(document.getElementById("word<?php echo $i;?>"), <?php echo $keywords;?>);
<?php endfor;?>
</script>
</body>


</html>
