<?php 
/*form de la vista backup 
 * 
 */?>
<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/backup.php" method="post" >





<div class="input-group m-div">
<label class="input-group-text">Nombre</label>
<input type='text' name="backup" class="form-control" maxlength="100" required>
</div>
<div class="alignr"><button type="submit" class="indexbutton">Respaldar</button></div>







</form>


</body>


</html>