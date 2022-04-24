<?php 

require_once('../accesos/biblifiltrar.php');


$nomcuenta= autostringn("select nombre from reservas where nombre not in (select nombre from cuenta) union select nombre from prestamos where nombre not in (select nombre from cuenta);");
$nomuser=autostring('cuenta','nombreuser');
$nombre=autostring('cuenta','nombre');
?>
<!doctype html>
<html>
<head>

</head>
<body>


<form action = "../modelo/biblicuentaInsert.php" method="post">

<div class="flex">
<div class="span-2 ajuste"><label for="bcinu">Nombre Usuario</label></div>
<div class="ajuste w-2"><input type='text' id="bcinu"name="user" autofocus class="index"  maxlength="50" onfocusout="estaenlalista('bcinu',<?php echo $nomuser;?>)" placeholder="Nombre usuario" required></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="nom">Nombre Completo</label></div>
<div class="ajuste w-2 autocomplete"><input id="nom" type='text' name="nom"  class="index"  placeholder="Nombre completo" onfocusout="estaenlalista('nom',<?php echo $nombre;?>)" maxlength="100" required></div>
</div>


<div class="flex">
<div class="span-2 ajuste"><label for="newpass">Contraseña</label></div>
<div class="ajuste w-2"><input type='password' name="contra" class="index" id="newpass" maxlength="150" onfocusout="contraconfir()" required></div>
</div>
<div class="flex">
<div class="span-2 ajuste"><label for="confpass">Confirmar</label></div>
<div class="ajuste w-2"><input type='password' name="confir" class="index" id="confpass" maxlength="150" onfocusout ="contraconfir()" required></div>
</div>

<div class="flex">
<div class="span-2 ajuste"><label for="bciem">E-mail</label></div>
<div class="ajuste w-2"><input type='email' id="bciem" name="email"  class="index"  placeholder="e-mail" maxlength="150" required></div>
</div>





<div class="flex">
<div class="span-2 ajuste"><label for="bcitc">Tipo usuario</label></div>


<div class="ajuste w-2"><select name= "tipo" id="bcitc" class="index">
  <option value="0">Administrador</option>
  <option value="1">Bibliotecario</option>
  <option value="2">Docente</option>
  <option value="3">Estudiante</option>
 
</select></div>
</div>


<br>
<span class="span error" id="mostrarerror"></span>
<br>



<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>




</form>

<script>

autocomplete(document.getElementById("nom"), <?php echo $nomcuenta;?>);
</script>
</body>


</html>
