<?php 
/*form de la vista ejemplar
 * contunuacion de un modal para el tratamiento de las palabras claves
 */
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


<button type="button" class="btn-secondary ayuda" id="ayuda">?</button>

<div id="dayuda" style="margin:0px 1rem 0px 1rem;text-align:justify;text-justify: inter-word;display:none;">
<p>-Si "Cambiar" tiene el valor "---" se agregara el valor de "Por" como nueva palabra clave.</p>
<p>-Si "Cambiar" tiene el valor de una palabra clave &eacutesta se reemplazar&aacute por el valor de "Por".</p>
<p>-Si "Cambiar" tiene el valor de una palabra clave y "Por" esta vac&iacutea, se eliminara la palabra clave de "Cambiar".</p>
</div>
</form>

<script>
autocomplete(document.getElementById("wordnew"), <?php echo $palabras;?>);

$('#ayuda').click(function(){
if($('#dayuda').is(':visible'))
	$('#dayuda').hide()
else
	$('#dayuda').show()
	
});
</script>
</body>


</html>
