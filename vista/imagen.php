<?php 

// este codigo no se usa





require_once('../accesos/biblifiltrar.php');
print_r($_FILES);
echo "<br>";
print_r("_FILES['fichero_usuario']['name']".$_FILES['fichero_usuario']['name']. "<br>");
print_r("_FILES['fichero_usuario']['tmp_name']".$_FILES['fichero_usuario']['tmp_name']. "<br>");


//$res = select("insert into imagen(imagen) value ('".$ .");");


echo subirimagen('fichero_usuario');



?>










<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Trabajos Finales</title>

</head>
<body>



<form action="imagen.php" enctype="multipart/form-data" method="POST">
  <label for="myfile">Select a file:</label>
  <input type="file" id="myfile" name="fichero_usuario"><br><br>
  <input type="submit" value="Submit">
</form>
	
	
</body>


</html>


