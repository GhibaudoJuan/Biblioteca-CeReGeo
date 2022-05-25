<?php 

require_once('../accesos/biblifiltrar.php');

$keyword= autostring("keywords", "descri");


?>
<!doctype html>
<html>
<head>
<style type="text/css">
.index{
width:100%;
}
</style>
</head>
<body>


<form action = "../vista/biblimaterial.php?pag=1" method="post" >

<?php include("../controlador/selecttipo.php");?><!-- El select de tipos de material -->

<!-- Libro -->
<div id="libroB"  style="display:none;">
<?php include("../controlador/biblilibroBuscar.php");?><!-- Los input de Libro -->
</div>
<!-- Libro -->

<!-- Revista -->
<div id="revistaB" style="display:none;" >
<?php include("../controlador/biblirevistaBuscar.php");?><!-- Los input de Revista -->
</div>
<!-- Revista -->

<!-- Mapa -->
<div id="mapaB"  style="display:none;" >
<?php include("../controlador/biblimapaBuscar.php");?><!-- Los input de Mapa -->
</div>
<!-- Mapa -->

<!-- Final -->
<div id="finalB" style="display:none;" >
<?php include("../controlador/biblittBuscar.php");?><!-- Los input de Finales -->
</div>
<!-- Final -->


<!-- Palabras claves -->
<div class="input-group m-div">
<label class="input-group-text w-av" >Palabras claves</label>
<div class="ajuste autocomplete" >
<input type='text' id="pala" name="descri" class="form-control"  maxlength="100" placeholder="---">
</div>
</div>





<input type='hidden' name ='w'value=' where '>
<div style="text-align:center;">
<button type="submit" class="indexbutton" >Filtrar</button>
</div>
</form>

<script>

autocomplete(document.getElementById("pala"), <?php echo $keyword;?>);
</script>
</body>


</html>