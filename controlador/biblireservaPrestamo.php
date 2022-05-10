
<!doctype html>
<html>
<head>
<title></title>
<meta charset="UTF-8">

</head>
<body>


<form action = "../modelo/bibliprestamoInsert.php" method="post" >


<input type="hidden" name="nombre" id="pasarprestamonom">
<input type="hidden" name="material" id="idprestamo">
<input type="hidden" name="ejemplar" id="ejemprestamo">



<div class="flex">
<div class="span-2 ajuste"><label for="frp">Devolucion</label></div>
<div class="ajuste w-2"><input id ="frp" type='date' name="fecha" class="index" required></div>
</div>


<div class="alignr"><button type="submit" class="indexbutton">Pasar</button></div>



</form>


<script>

mindate('frp',premindate);
</script>
</body>


</html>