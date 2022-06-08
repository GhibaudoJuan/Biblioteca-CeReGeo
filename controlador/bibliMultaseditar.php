
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/bibliMultaseditar.php" method="post" >
 <div class="modal-body">
<input type='hidden' id="cidmulta" name ='idmulta' >
<input type='hidden' id="cdesmultado" name ='cdesmultado' >
<input type='hidden' id="cest" name ='cest' >


<div class="input-group m-div">
<label class="input-group-text" for="desmultado">Desmultado</label>
<div class="ajuste"><input type='date' id="desmultado" name="desmultado" class="form-control"></div>
</div>
<div class="input-group m-div">
<div class="ajuste">
<input type="radio" style="width: auto" id="fest" name="activo" value="False">
<label class="span" for="activo">Cerrado</label>

<input type="radio" style="width: auto" id="test" name="activo" value="True">
<label class="span" for="activo">Activo</label>
</div>
</div>
</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>


</body>


</html>