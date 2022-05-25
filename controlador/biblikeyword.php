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

<div class="input-group m-div">
<label class="input-group-text" for="mat_id">Codido Material</label>
<div class="ajuste autocomplete"><input type='text' id="mat_id" name="mat_id" class="form-control" required></div>
</div>


<?php for($i=1;$i<6;$i++):?>
<div class="input-group m-div">
<label class="input-group-text" for="word<?php echo $i;?>">Palabra clave <?php echo $i;?></label>
<div class="ajuste autocomplete"><input type='text' id="word<?php echo $i;?>" name="word<?php echo $i;?>"  class="form-control" value=""  <?php if($i==1) echo required; ?>></div>
</div>

<?php endfor;?>

<input type="hidden" value="insert" name="keyword">

<div class="alignr"><button type="submit" class="indexbutton">Agregar</button></div>




</form>

<script>
autocomplete(document.getElementById("mat_id"), <?php echo $material;?>);
<?php for($i=1;$i<6;$i++):?>
autocomplete(document.getElementById("word<?php echo $i;?>"), <?php echo $keywords;?>);
<?php endfor;?>
</script>
</body>


</html>
