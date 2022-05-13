<!doctype html>
<html>
<head>
<style>
.espacio{
padding-bottom:1rem;
}


</style>
</head>
<body>




<div class="sticky top-0">
<form action="../modelo/reportes.php" method="post">












<div class="flex">
<div class="span-2 ajuste"><span>Datos sobre: </span></div>
<div class="ajuste" >
<select id="datos" name= "datos" class="index" style="width:12rem;">
  <option value="1">Prestamos realizados</option>
  <option value="2">Prestamos retrasados</option>
  <option value="3">Prestamos no devueltos</option>
</select>
</div>
</div>



<div class="flex">
<div class="span-2 ajuste"><span>Intervalo de tiempo</span></div>
<div class="ajuste" >
<select id="tiempo" name= "tiempo" class="index" style="width:12rem;">
  <option value=" >= current_date - interval '24 hours' ">&Uacuteltimas 24 horas</option>
  <option value=" >= current_date - interval '1 month' ">&Uacuteltimo mes</option>
  <option value=" >= current_date - interval '3 month' ">&Uacuteltimos 3 meses</option>
  <option value="">Todos</option>
</select>
</div>
</div>

<div class="flex">
<div class="span-2 ajuste"><span>Agrupar segun:</span></div>
<div class="ajuste" >
<select id="cantidad" name= "cantidad" class="index" style="width:12rem;">
  <option value="1">Todos</option>
  <option value="2">Segun usuario</option>
  <option value="3">Segun material</option>
</select>
</div>
</div>

<input type="hidden"  id="sel1" name="select" value=" count(*) as cant ">


<?php /*

<div class="flex espacio">
<div class="ajuste" >
<label class="span-2"  for="sel1">Cantidad
</label></div>
<div class="ajuste">
<input type="radio"  id="sel1" name="select" value=" count(*) as cant " checked>
</div>
</div>

<div class="flex espacio">
<div class="ajuste" >
<label class="span-2"  for="sel2">Atributos
</label></div>
<div class="ajuste">
<input type="radio"  id="sel2" name="select" value="atri" >
</div>
</div>



<div class="flex" id="atri">
<div class="ajuste "></div>
<div class="ajuste ">
<input type="checkbox" id="user" name="usuario" value=" nombre" >
<label class="span-2" for="user">Usuario</label>
</div>
</div>

*/?>


<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
</form>
</div>




</body>


</html>