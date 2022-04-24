<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/bibliPerfilUsuario.php" method="post" >





<div class="flex">
<div class="span-2 ajuste"><label for="email">E-mail</label></div>
<div class="ajuste w-2"><input type='email' id="email" name="email" class="index" maxlength="150"  required 
value="<?php $a ="select email from cuenta where nombreuser = '". $_SESSION["user"]."';";
$a=pg_fetch_assoc(select($a));
echo $a['email'];?>"></div>
</div>


<span class="span-2" style="margin-left:30px;">Cambiar Contraseña</span>
<br>

<div class="flex">
<div class="span-2 ajuste"><label for="contact">Contraseña actual</label></div>
<div class="ajuste w-2"><input type='password' id="contact" name="contraactual" class="index" maxlength="150"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="newpass">Contraseña nueva</label></div>
<div class="ajuste w-2"><input type='password' name="contranueva" class="index" id="newpass" maxlength="150" onfocusout="contraconfir()"></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="canfpass">Confirmar</label></div>
<div class="ajuste w-2"><input type='password' name="conf" class="index" id="confpass" maxlength="150" onfocusout="contraconfir()"></div>
</div>
<span class="span error" id="mostrarerror"></span>
<br>
<div class="alignr"><button type="submit" class="indexbutton">Guardar</button></div>




</form>


</body>


</html>