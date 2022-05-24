
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


<div class="flex">
<div class="span-2 ajuste"><label for="cresdesde">Retiro</label></div>
<div class="ajuste w-2"><input type='date' id="cresdesde" name="fecha" class="index"></div>
</div>

<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<='1')): ?>
<div class="flex">
<div class="ajuste w-2">
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