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

<input type='hidden' id="mat_id" name="mat_id">


<div class="flex">
<div class="span-2 ajuste"><label for="word">Cambiar: </label></div>
<div class="ajuste w-3 ">
<select id="word" name= "word" class="index">
<option value='---'>---</option>
<?php echo $keyselect;?>
</select>
</div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="wordnew">Por: </label></div>
<div class="ajuste w-3 autocomplete"><input type='text' id="wordnew" name="wordnew"  class="index" placeholder="Palabra nueva" maxlength="100"></div>
</div>


<input type="hidden" value="update" name="keyword">

<div class="alingr"><button type="submit" class="indexbutton">Agregar</button></div>




</form>

<script>
autocomplete(document.getElementById("wordnew"), <?php echo $palabras;?>);
</script>
</body>


</html>