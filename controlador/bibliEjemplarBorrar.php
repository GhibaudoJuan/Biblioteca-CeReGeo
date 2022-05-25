
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliEjemplarBorrar.php" method="post" >
<div class="modal-body">
<input type='hidden' id="bejempplar" name ='idejemplar' >

<label for="bejempplar" style="font-size: 25px;">&#191Esta seguro de que quiere eliminarlo? </label>
<br><br>
<?php include("getejemplar.php");?>
<div class="input-group m-div">
<label class="input-group-text">Ejemplar</label>
<div class="ajuste"><input type='text' id="nombreborrar" class="form-control" disabled></div>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="indexbutton">Borrar</button>
</div>



</form>


</body>


</html>