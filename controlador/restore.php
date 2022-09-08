<?php /*form de la vista backup, continuacion de un modal */?>
<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/backup.php" method="post" >

<div class="modal-body">

<input type="hidden" id="restaurar" name="restore">

<div class="input-group m-div">
<label>&#191Esta seguro de querer restaurar?</label>
</div>
</div>

 <div class="modal-footer">
<button type="submit" class="indexbutton">Si</button>
</div>







</form>


</body>


</html>