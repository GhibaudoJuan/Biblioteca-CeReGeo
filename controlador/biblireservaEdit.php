
<!doctype html>
<html>
<head>
</head>
<body>


<form action = "../modelo/biblireservaEdit.php" method="post" >
<div class="modal-body">
<input type='hidden' id="resid" name ='idres' >
<input type='hidden' id="resnom" name ='resnom' >
<input type='hidden' id="resdesde" name ='resdesde' >
<input type='hidden' id="resact" name ='resact' >

<div class="input-group m-div">
<label class="input-group-text" for="cresejem">Ejemplar</label>
<div class="ajuste"><input type='text' id="cresejem" name="ejemplar" class="form-control"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="cresdesde">Retiro</label>
<div class="ajuste"><input type='date' id="cresdesde" name="fecha" class="form-control"></div>
</div>

<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<='1')): ?>
<div class="input-group m-div">
<div class="ajuste">
<input type="radio" style="width: auto" id="resce" name="activo" value="False">
<label class="span" for="activo">Cerrado</label>

<input type="radio" style="width: auto" id="resac" name="activo" value="True">
<label class="span" for="activo">Activo</label>
</div>
</div>
<?php endif; ?>
</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>

<script type="text/javascript">
mindate('cresdesde',resmindate);

</script>
</body>


</html>