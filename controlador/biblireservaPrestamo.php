
<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >
<div class="modal-body">

<input type="hidden" name="nombre" id="pasarprestamonom">
<input type="hidden" name="material" id="idprestamo">
<input type="hidden" name="ejemplar" id="ejemprestamo">



<div class="input-group m-div">
<label class="input-group-text" for="frp">Devolucion</label>
<div class="ajuste"><input id ="frp" type='date' name="fecha" class="form-control" required></div>
</div>

</div>
<div class="modal-footer"><button type="submit" class="indexbutton">Pasar</button></div>



</form>


<script>

mindate('frp',premindate);
</script>
</body>


</html>