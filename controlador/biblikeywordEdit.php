<?php 
require_once('../accesos/biblifiltrar.php');
$palabras= autostring("keywords", "descri");

$keys="select descri from keywords where mat_id='".$idej."' order by word_id asc;";


$palabrasclave=select($keys);
$keyselect="";
while($valor=pg_fetch_assoc($palabrasclave)){
    $keyselect.="<option value='".$valor['descri']."'>".$valor['descri']."</option>";
    
}
?>
<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblikeyword.php" method="post">
<div class="modal-body">
<input type='hidden' id="mat_id" name="mat_id">


<div class="input-group m-div">
<label class="input-group-text" for="word">Cambiar: </label>
<div class="ajuste">
<select id="word" name= "word" class="form-control">
<option value='---'>---</option>
<?php echo $keyselect;?>
</select>
</div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="wordnew">Por: </label>
<div class="ajuste autocomplete"><input type='text' id="wordnew" name="wordnew"  class="form-control" placeholder="Palabra nueva" maxlength="100"></div>
</div>


<input type="hidden" value="update" name="keyword">
</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Agregar</button></div>




</form>

<script>
autocomplete(document.getElementById("wordnew"), <?php echo $palabras;?>);
</script>
</body>


</html>