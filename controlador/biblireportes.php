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


<div class="input-group m-div">
<label class="input-group-text">Datos sobre</label>
<div class="ajuste" >
<select id="datos" name="datos" class="form-select">
  <option value="6">Ejemplares</option>
  <option value="1">Prestamos realizados</option>
  <option value="2">Prestamos retrasados</option>
  <option value="3">Prestamos no devueltos</option>
  <option value="4">Reservas realizadas</option>
  <option value="5">Reservas no retiradas</option>
  
</select>
</div>
</div>



<div class="input-group m-div">
<label class="input-group-text">Intervalo de tiempo</label>
<div class="ajuste" >
<select id="tiempo" name="tiempo" class="form-select">
  <option value="">Todos</option>
  <option value=" >= current_date - interval '3 month' ">&Uacuteltimos 3 meses</option>
  <option value=" >= current_date - interval '1 month' ">&Uacuteltimo mes</option>
  <option value=" >= current_date - interval '24 hours' ">&Uacuteltimas 24 horas</option>
  
</select>
</div>
</div>

<div class="input-group m-div">
<label class="input-group-text">Agrupar seg&uacuten</label>
<div class="ajuste" >
<select id="cantidad" name="cantidad" class="form-select">
  <option value="1">Todos</option>
  <option value="2">Seg&uacuten usuario</option>
  <option value="3">Seg&uacuten material</option>
</select>
</div>
</div>
<div class="input-group m-div">
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="guardar" name="guardar" value="True" checked>
<label class="form-check-label" for="guardar">Guardar en servidor</label>
</div>
</div>
<input type="hidden"  id="sel1" name="select" value=" count(*) as cant ">




<div class="alignr"><button type="submit" class="indexbutton">Registrar</button></div>
</form>
</div>




</body>


</html>