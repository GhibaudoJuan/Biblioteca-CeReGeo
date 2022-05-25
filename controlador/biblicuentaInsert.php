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
<div class="modal-body">


<div class="input-group m-div">
<label class="input-group-text" for="bcinu">Nombre Usuario</label>
<div class="ajuste"><input type='text' id="bcinu"name="user" autofocus class="form-control"  maxlength="50" onfocusout="estaenlalista('bcinu',<?php echo $nomuser;?>)" placeholder="Nombre usuario" required></div>
</div>


<div class="input-group m-div">
<label class="input-group-text" for="nom">Nombre Completo</label>
<div class="ajuste autocomplete"><input id="nom" type='text' name="nom"  class="form-control"  placeholder="Nombre completo" onfocusout="estaenlalista('nom',<?php echo $nombre;?>)" maxlength="100" required></div>
</div>


<div class="input-group m-div">
<label class="input-group-text" for="newpass">Contraseña</label>
<div class="ajuste"><input type='password' name="contra" class="form-control" id="newpass" maxlength="150" onfocusout="contraconfir()" placeholder="Contraseña" required></div>
</div>
<div class="input-group m-div">
<label class="input-group-text" for="confpass">Confirmar</label>
<div class="ajuste"><input type='password' name="confir" class="form-control" id="confpass" maxlength="150" onfocusout ="contraconfir()" placeholder="Confirmar Contraseña" required></div>
</div>

<div class="input-group m-div">
<label class="input-group-text" for="bciem">E-mail</label>
<div class="ajuste"><input type='email' id="bciem" name="email"  class="form-control"  placeholder="e-mail" maxlength="150" required></div>
</div>





<div class="input-group m-div">
<label class="input-group-text" for="bcitc">Tipo usuario</label>


<div class="ajuste"><select name= "tipo" id="bcitc" class="form-control">
  <option value="0">Administrador</option>
  <option value="1">Bibliotecario</option>
  <option value="2">Docente</option>
  <option value="3">Estudiante</option>
 
</select></div>
</div>


<br>
<span class="span error" id="mostrarerror"></span>
<br>

</div>

 <div class="modal-footer"><button type="submit" class="indexbutton">Registrar</button></div>




</form>

<script>

autocomplete(document.getElementById("nom"), <?php echo $nomcuenta;?>);
</script>
</body>


</html>
