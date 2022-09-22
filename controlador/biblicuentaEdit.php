<?php 
/*form de la vista cuenta
 * continuacion de un modal para editar los datos de una cuenta
 */
require_once('../accesos/biblifiltrar.php');


$nomuser=autostring('cuenta','nombreuser');

?>

<!doctype html>
<html>
<head>

</head>
<body>

<form action = "../modelo/biblicuentaEdit.php" method="post" >

<div class="modal-body">

<input type="hidden" id="cid" name="cid">
<input type="hidden" id="cnombre" name="cnombre">
<input type="hidden" id="cemail" name="cemail">


<div class="input-group m-div">
<label class="input-group-text" for="enombreuser">Usuario</label>
<div class="ajuste"><input type='text' id="enombreuser" name="nombreuser" autofocus class="form-control" maxlength="50" onfocusout="estaenlalista('enombreuser',<?php echo $nomuser;?>,'emostrarerror')" required></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="email">E-mail</label>
<div class="ajuste"><input type='email' id="eemail" name="email" class="form-control" maxlength="150"  required></div>
</div>



<span class="span-2">Cambiar Contraseña</span>
<br>

<div class="input-group m-div">
<label class="input-group-text" for="newpass">Contraseña nueva</label>
<div class="ajuste"><input type='password' name="contranueva" class="form-control" id="enewpass" minlength="8" maxlength="150" onfocusout="contraconfir2('econfpass','enewpass','emostrarerror','eguardar')"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="canfpass">Confirmar</label>
<div class="ajuste"><input type='password' name="conf" class="form-control" id="econfpass" minlength="8" maxlength="150" onfocusout="contraconfir2('econfpass','enewpass','emostrarerror','eguardar')"></div>
</div>
<span class="span error" id="emostrarerror"></span>
<br>
</div>

 <div class="modal-footer"><button type="submit" class="indexbutton" id="eguardar">Registrar</button></div>




</form>

</body>


</html>
