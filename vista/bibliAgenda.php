<?php
if(!isset($_SESSION))session_start();
require_once("../accesos/validacion.php");
require_once("../accesos/biblifiltrar.php");


if($_GET['pag']==1){
    //select de bibliotecario
    $sql = "select idres, nombre, material, titulo, ejemplar,fecha, date_part('day',fecha) as dia,
            date_part('month',fecha) as mes,(CASE WHEN activo ='True' THEN 'Activo' ELSE 'Cerrado' END ) as activo  
            from reservas re inner join material ma on (ma.idmat= re.material) ";
    if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')){
        
        
        
        if(isset($_POST)){
            
            $array= $_POST;
            //concatenacion
            
         
                $where=armarWherereserva($array, true);
             
        }
    }
    else{
//select de estudiante
    $where= " where nombre = '". $_SESSION['nombre'] ."'";


    if(isset($_POST)){
    
    $array= $_POST;
    //concatenacion
    
    
     $where.=armarWherereserva($array, false);
    }
   }
    $sql.=$where;
    $sql.=" order by fecha asc limit 15 offset ";

    $mul = ($_GET['pag']-1) * 15;

    $sql.=$mul;
    $sql.=";";
}
else{
    $s=$_SESSION['sql'];
    $array=explode('offset',$s); 
    $array[0].=" offset ";
    $mul = ($_GET['pag']-1) * 15;
    $array[0].=$mul.";";
    $sql=$array[0];
    
}

$_SESSION['sql'] = $sql;
$delete = 'delete from reservas '.$where.';';
$retorno='reserva';
?>











<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Agenda</title>

<!-- cargamos los estilos -->
<?php include("style/biblicss.html"); ?>

</head>
<body >



	 <header class="titulo" ><h2>Agenda</h2></header>
	<main>
	
	<!-- Tabla -->
	<div  class="tabladiv" style=" background-color: #ffffff;">
	<?php 




$resultado = select($sql);
$count=pg_affected_rows($resultado);
if($count!=0){

$sql=$resultado;
$i=0;
$val=['0','0','0','0','0'];

$tabla="";
while ($mifila = pg_fetch_assoc($sql)){     
    $dia=date('Y-m-d');
    $semana=date('W');//semana actual
    $mes=date('m');//mes actual
    $fecha=$mifila['fecha'];
    $sem=date('W',strtotime($mifila['fecha']));
    
    switch ($fecha){
        case ($sem<$semana): //atrasados
            if($val[0]==0){
                $tabla.= '
                <div class="flex agenda2 border1 cp" onclick="agendamenu(atrasados)">
                <div class=" ajuste"><span>Atrasados:</span></div>
                <div class="ajuste r-1"><span id="atrasados1">+</span></div>
                </div>
                <div class="agenda1" id="atrasados">';
                $val[0]=1;
            }
            break;
        case ($sem==$semana): //semana actual
            if($val[1]==0){
                if($val[0]==1)
                    $tabla.='</div>';
                $tabla.= '
                <div class="flex agenda2 border1 cp" onclick="agendamenu(semana)">
                <div class=" ajuste"><span>Esta semana:</span></div>
                <div class="ajuste r-1"><span id="semana1">+</span></div>
                </div>
                <div class="agenda1" id="semana">';
                $val[1]=1;
            }
            break;
        case ($sem==($semana+1)): //semana actual
            if($val[2]==0){
                if(($val[0]==1)||($val[1]==1))
                    $tabla.='</div>';
                    $tabla.= '
                <div class="flex agenda2 border1 cp" onclick="agendamenu(semanasig)">
                <div class=" ajuste"><span>Siguiente semana:</span></div>
                <div class="ajuste r-1"><span id="semana1sig">+</span></div>
                </div>
                <div class="agenda1" id="semanasig">';
                    $val[2]=1;
            }
            break;
        case($mifila['mes']==$mes):
            if($val[3]==0){
                if((($val[0]==1)||$val[1]==1)||($val[2]==1))
                    $tabla.='</div>';
                $tabla.= '
                <div class="flex agenda2 border1 cp" onclick="agendamenu(mes)">
                <div class=" ajuste"><span>Este mes:</span></div>
                <div class="ajuste r-1"><span id="mes1">+</span></div>
                </div>
                <div class="agenda1" id="mes">';
                $val[3]=1;
            }
            break;
        case ($mifila['mes']>$mes):
            if($val[4]==0){
                if((($val[0]==1)||$val[1]==1)||($val[2]==1)||($val[3]==1))
                    $tabla.='</div>';
                $tabla.='
                <div class="flex agenda2 border1 cp" onclick="agendamenu(sigmes)">
                <div class=" ajuste"><span>Siguiente mes:</span></div>
                <div class="ajuste r-1"><span id="sigmes1">+</span></div>
                </div>
                <div class="agenda1" id="sigmes">';
                $val[4]=1;
            }
            break;
    }
    
    
    
    
    
    $dia=date(w, strtotime($mifila['fecha']));
    $dia=diasemana($dia);
    
    $tabla.="<div id='id".$i."' class='flex border1 cp' onclick='idtabla(";
    
    $tabla.='"id'.$i.'","'.$mifila['idres'].'","'.$mifila['nombre'].'","'.
    $mifila['material'].'","'.$mifila['titulo'].'","'.$mifila['ejemplar'].'","'.$mifila['fecha'].'","'.$mifila['activo'].'")';
   
    $tabla.="'><div class='ajuste filas r-1 '><span>".$mifila['dia']."</span></div>

    <div class='ajuste filas r-1'><span>".$dia."</span></div>
    <div class='ajuste filas r-2'><span>".$mifila['mes']."</span></div>
    <div class='ajuste filas najuste f-1' ><span>".$mifila['nombre']."</span></div>
    <div class='ajuste filas' style='min-width:20rem;'>
        <span>".$mifila['titulo']." (".$mifila['material']."-".$mifila['ejemplar'].")</span>
    </div>
    <div class='ajuste filas r-2'><span>".$mifila['activo']."</span></div>
    
    </div>";
    $i++;
}
$tabla.="</div></table>";





echo $tabla;
}
else{
    include("../controlador/pagsinnum.php");
}

	?>
	<!-- -------------paginacion---------------- -->
	
	
	<ul class="paginacion">
  		<li><a id='ant' href="../vista/bibliAgenda.php?pag=<?php echo $_GET['pag']-1;?>">Anterior</a></li>
   		<li><a id='sig' href="../vista/bibliAgenda.php?pag=<?php echo $_GET['pag']+1;?>">Siguiente</a></li>
  	</ul>
	
	
	<!-- -------------paginacion---------------- -->
	</div>
	
	<div class="abso beb">
	<!-- Buscar -->
		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('buscar')">Buscar</button> </a>
	<!-- Buscar -->	
	<!-- Editar -->	
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('actualizar')">Editar</button> </a>
	<!-- Editar -->	
	<!-- Borrar -->		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('borrar')">Borrar</button> </a>
		
	<!-- Borrar -->		
		<!-- Borrar Todo -->		
		<a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('borrartodo')">Borrar Todo</button> </a>
		
	<!-- Borrar Todo-->	
	 <!-- Pasar a Prestamo -->	
		<?php if(isset($_SESSION['tipouser'])&&($_SESSION['tipouser']<'2')):?>
		
		 <a href="#miModal" class="sindec"><button type="submit" class="indexbutton" onclick="mostrar('prestamo')">Prestamo</button> </a>
		 
		<?php endif;?>
	 <!-- Pasar a Prestamo -->	
     </div>
    

	
    </main>
	<!-- Menu -->
	<div class="fondo">  
	<?php include("../controlador/biblimenu.php");?>
	</div>
	
	
	<footer style="">
	<?php include("../controlador/footer.php");?>
	</footer>
	<?php include("../controlador/vent_error.php");?>


<div id="miModal" class="modal">
  <div class="modal-contenido modal-buscar" id="buscar" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Buscar</h2>
    <?php include("../controlador/biblireservaBuscar.php"); ?>
  </div>
  <div class="modal-contenido modal-buscar" id="actualizar" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Editar</h2>
    <?php include("../controlador/biblireservaEdit.php") ?>
  </div>  
  <div class="modal-contenido modal-buscar" id="prestamo" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Prestamo</h2>
    <?php include("../controlador/biblireservaPrestamo.php"); ?>
  </div>  

  <div class="modal-contenido modal-borrar" id="borrar" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Borrar</h2>
    <?php include("../controlador/biblireservaBorrar.php"); ?>
  </div> 
  <div class="modal-contenido modal-borrar" id="borrartodo" style="display:none;">
    <a href="#" class="sindec negro"  onclick="ocultar()">X</a>
    <h2>Borrar Todo</h2>
    <?php include("../controlador/borrarTodo.php") ?>
  </div> 
</div>
<script type="text/javascript">
pagant('ant','<?php echo $_GET['pag'];?>');
pagsig('sig','<?php echo $count;?>');

</script>
</body>


</html>



