<!doctype html>
<html>
<head>

</head>
<body>

<form action = "../modelo/bibliPerfilUsuario.php" method="post" >





<div class="input-group m-div">
<label class="input-group-text" for="email">E-mail</label>
<div class="ajuste"><input type='email' id="email" name="email" class="form-control" maxlength="150"  required 
value="<?php $a ="select email from cuenta where nombreuser = '". $_SESSION["user"]."';";
$a=pg_fetch_assoc(select($a));
echo $a['email'];?>"></div>
</div>


<span class="span-2">Cambiar Contraseña</span>
<br>

<div class="input-group m-div">
<label class="input-group-text" for="contact">Contraseña actual</label>
<div class="ajuste"><input type='password' id="contact" name="contraactual" class="form-control" maxlength="150"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="newpass">Contraseña nueva</label>
<div class="ajuste"><input type='password' name="contranueva" class="form-control" id="newpass" maxlength="150" onfocusout="contraconfir()"></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="canfpass">Confirmar</label>
<div class="ajuste"><input type='password' name="conf" class="form-control" id="confpass" maxlength="150" onfocusout="contraconfir()"></div>
</div>
<span class="span error" id="mostrarerror"></span>
<br>
<div class="alignr"><button type="submit" class="indexbutton">Guardar</button></div>




</form>

</body>


</html>