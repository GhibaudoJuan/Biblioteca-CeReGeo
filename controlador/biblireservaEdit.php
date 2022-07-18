
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
<label class="input-group-text" for="cresdesde">Retiro</label>
<div class="ajuste"><input type='date' id="cresdesde" name="fecha" class="form-control"></div>
</div>


</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Actualizar</button></div>


</form>

<script type="text/javascript">
mindate('cresdesde',resmindate);

</script>
</body>


</html>