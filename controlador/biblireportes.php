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
<select id="datos" name="datos" class="form-select" onchange="mostrardivicion()">
  <option value="6">Ejemplares</option>
  <option value="1">Prestamos realizados</option>
  <option value="2">Prestamos retrasados</option>
  <option value="3">Prestamos no devueltos</option>
  <option value="4">Reservas realizadas</option>
  <option value="5">Reservas no retiradas en fecha</option>
  
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

<div id="dagrupar" class="input-group m-div">
<label class="input-group-text">Agrupar seg&uacuten</label>
<div class="ajuste" >
<select id="cantidad" name="cantidad" class="form-select">
  <option value="1">Todos</option>
  <option value="2">Personas</option>
  <option value="3">Material</option>
</select>
</div>
</div>


<div id="dmostrar" class="input-group m-div">

<!-- <input type='hidden' name='cantidad' value='4'> -->

<div class="ajuste" style="max-width:7rem;margin-right:2rem;">
<label class="input-group-text">Mostrar</label>
</div>
<div class="ajuste">
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mtodos" name="mtodos" value="True" onclick="mostrarSelect()" checked>
<label class="form-check-label" for="mtodos">Todos</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mcodi" name="mcodi" value="True" checked disabled>
<label class="form-check-label" for="mcodi">Cod. Interno</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mcode" name="mcode" value="True" checked disabled>
<label class="form-check-label" for="mcode">Cod. Externo</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mprop" name="mprop" value="True" checked disabled>
<label class="form-check-label" for="mprop">Propietario</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mdis" name="mdis" value="True" checked disabled>
<label class="form-check-label" for="mdis">Disponibilidad</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mest" name="mest" value="True" checked disabled>
<label class="form-check-label" for="mest">Estado</label>
</div>
<div class="ajuste form-check form-switch">
<input type="checkbox" class="form-check-input" id="mcon" name="mcon" value="True" checked disabled>
<label class="form-check-label" for="mcon">Condici&oacuten</label>
</div>
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
<script type="text/javascript">
mostrardivicion();
</script>



</html>