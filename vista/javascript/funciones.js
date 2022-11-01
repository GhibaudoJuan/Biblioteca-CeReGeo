//funciones en javasscript
function conftabla(a,b=4){
	$(document).ready( function () {
	var nover;	
	var columna;
	
	switch(a){
			case 'reservas':				
				columna=5;
				if(b>2)
					nover=[1,2];
				if(b==1)
					nover=[2];
				break;
			case 'prestamos':
				columna=7;
				if(b>2)
					nover=[1];
				if(b==1)
					nover=[];
				break;
			case 'ejemplar':
				columna=0;
				if(b>2)
					nover=[0,1,2,3,6];
				if(b==1)
					nover=[0];
		
	}
	
    $('#'+a).DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ filas por pagina.",
			"search":"Buscar:",
			"paginate": {
        	"first":      "Primero",
        	"last":       "Ultimo",
        	"next":       "Siguiente",
        	"previous":   "Anterior"},
            "zeroRecords": "Sin resultados.",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Sin filas disponibles"
        },
		"columnDefs":[
			{	
				visible:false
				,targets: nover},
				{
					render: function (data) {
						let color;
						if(data=='Concretado'){
							color = 'red';
							return '<span style="color:' + color + '">' + data + '</span>';
						}
						else{
							
								return '<span>' + data + '</span>';
						}
                    
                },
                targets: columna,
					
				}
			
		],
		
	}
);
//console.log(a);
var table = $('#'+a).DataTable();
 //seleccion y deseleccion
    $('#'+a+' tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
			$('#botonborrar').attr("disabled","disabled")
			$('#botoneditar').attr("disabled","disabled")
			$('#botonreserva').attr("disabled","disabled")
			$('#botonprestamo').attr("disabled","disabled")
			$('#botonreservaejemplar').attr("disabled","disabled")
			$('#botonprestamoejemplar').attr("disabled","disabled")
			$('#botonrestore').attr("disabled","disabled")
        }
        else {
            table.$('tr.selected').removeClass('selected')
            $(this).addClass('selected')
			var data = table.row('.selected').data()
			$('#botonborrar').removeAttr("disabled")
			$('#botoneditar').removeAttr("disabled")
			$('#botonrestore').removeAttr("disabled")
			
			//para reserva y prestamos
			if((data[5]=="Concretado")||(data[7]=="Concretado")){ 
				$('#botonborrar').attr("disabled","disabled")
				$('#botoneditar').attr("disabled","disabled")
				$('#botonreserva').attr("disabled","disabled")
				$('#botonprestamo').attr("disabled","disabled")
			}
			else{
				
				$('#botonborrar').removeAttr("disabled")
				$('#botoneditar').removeAttr("disabled")
				$('#botonreserva').removeAttr("disabled")
				$('#botonprestamo').removeAttr("disabled")
			}
			//para ejemplar
			if((data[4]!="Obsoleto") && (data[5]=='SI')){
				$('#botonreservaejemplar').removeAttr("disabled")
					if(data[4]!='Prestado')
						$('#botonprestamoejemplar').removeAttr("disabled")
			}
			else{
				$('#botonreservaejemplar').attr("disabled","disabled")
				$('#botonprestamoejemplar').attr("disabled","disabled")
			}
				
			
        }
    } );
	$('#botonborrar').click( function () {
		var data = table.row('.selected').data();
        borrar(data[0],data[1]);
    } );
	$('#botoneditar').click( function () {
		var data = table.row('.selected').data();
        editar(data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7]);
    } );
	$('#botonreserva').click( function () {
		var data = table.row('.selected').data();
        pasarprestamo(data[1],data[2]);
    } );
	$('#botonprestamo').click( function () {
		var data = table.row('.selected').data();
        devolucion(data[0],data[1]);
    } );
	$('#botonreservaejemplar').click( function () {
		var data = table.row('.selected').data();
        valuereserva(data[0],data[1]);
    } );
	$('#botonprestamoejemplar').click( function () {
		var data = table.row('.selected').data();
        valueprestamo(data[1],data[6]);
    } );
	$('#descargar').click( function () {
		var data = table.row('.selected').data();
        descargar(data[0]);
    } );
	$('#botonrestore').click( function () {
		var data = table.row('.selected').data();
        $('#restaurar').attr('value',data[0]);
		
    } );
} );
}
function borrar(a,b){
	$('#borrar1').attr('value',a);
	$('#nombre1').attr('value',b);
	$('#bejempplar').attr('value',b);
	$('#borrarprimero').attr('value',a);
	$('#nombreborrar').attr('value',b);
}
function descargar(a){
	$('#descargar').attr('href','../backup/'+a+'.zip');
}
function valuereserva(a){
		$('#resmaterial').attr('value',a);
}
function valueprestamo(b,c){
	$('#presejemplar').attr('value',b);
	$('#reservaprox').attr('value',c);
}
function pasarprestamo(a,b){
	$('#pasarprestamonom').attr('value',a);
	$('#idprestamo').attr('value',b);
}
function devolucion(a,b){
	$('#bdid').attr('value',a);
	$('#bdnom').attr('value',b);
	$('#bdprestamo').attr('value',a);
	$('#bdnombre').attr('value',b);
}
function editar(a,b,c,d,e,f,g,h){
	//cuenta
	$('#cid').attr('value',a);
	$('#cnombre').attr('value',b);
	$('#enombreuser').attr('value',b);
	
	$('#cemail').attr('value',d);
	$('#eemail').attr('value',d);
	
	
	//actualizar prestamo
	
	$('#pid').attr('value',a);
	$('#pnom').attr('value',b);
			
	$('#pdesde').attr('value',e);
	$('#cdesde').attr('value',e);
	
	$('#phasta').attr('min',e);
	$('#phasta').attr('value',f);
	$('#chasta').attr('value',f);
	
	$('#pdevuelto').attr('min',e);
	$('#pdevuelto').attr('value',g);
	$('#cdevuelto').attr('value',g);
	
	//actualizar reserva

	$('#resid').attr('value',a);
	$('#resnom').attr('value',b);
		
	$('#resdesde').attr('value',e);
	$('#cresdesde').attr('value',e);
	
	//actualizar ejemplar
	
	$('#cidejem').attr('value',b);
	
	$('#pce').attr('value',c);
	$('#cce').attr('value',c);
	
	$('#pprop').attr('value',d);
	$('#cprop').attr('value',d);
	
		if(f=="SI"){
			//$('#pdis1').attr('checked','true');
			$('#cdis').attr('value','true');
			document.getElementById('pdis1').checked='true';
		}
		if(f=="NO"){
			//$('#pdis2').attr('checked','true');
			$('#cdis').attr('value','false');
			document.getElementById('pdis2').checked='true';
		}
	$('#ccon').attr('value',g);
	$('#pcon').attr('value',g);
	
	}	

//funcion mostrar de reportes
function mostrardivicion(){
	if($('#datos').val()=='6'){
		$('#dagrupar').hide()
		$('#dmostrar').show()
		}
	else{
		$('#dagrupar').show()
		$('#dmostrar').hide()
		}
	
}
//funcion seleccionar de reportes
function mostrarSelect(){
	if ($('#mtodos').is(':checked')){
		$('#mdm').attr("disabled","disabled")
		
		$('#mcode').attr("disabled","disabled")
		$('#mprop').attr("disabled","disabled")
		$('#mdis').attr("disabled","disabled")
		$('#mest').attr("disabled","disabled")
		$('#mcon').attr("disabled","disabled")
	}
	else{
		$('#mdm').removeAttr("disabled")
		
		$('#mcode').removeAttr("disabled")
		$('#mprop').removeAttr("disabled")
		$('#mdis').removeAttr("disabled")
		$('#mest').removeAttr("disabled")
		$('#mcon').removeAttr("disabled")
		}
}

//funcion para intercalar entre mostrar y ocultar
function mostrarocultar(a){
	if(document.getElementById( a.id  ).style.display=="block")
	document.getElementById(a.id).style.display="none"
	else
	document.getElementById(a.id).style.display="block"
}

function ocultar_error(){
	$('#error').hide()

}
function ocultar_exito(){
	$('#exito').hide()
	
}
function mostrar_error(a,b){
		
	if((b==0)){
		
		ocultar_error()
		if(a!=''){
		$('#exito').show()
		document.getElementById('mensexito').innerHTML=a;
		}
		
	}
	else{
		ocultar_exito()
		$('#error').show()
		if(a!='')
			document.getElementById('mens').innerHTML=a;
	}

	
}
//funcion que muestra el formulario de busqueda avanzada
function buscarAV(){
	
	
	document.getElementById("libroB").style.display="none";
	document.getElementById("mapaB").style.display="none";
	document.getElementById("revistaB").style.display="none";
	document.getElementById("finalB").style.display="none";
	
	
	var x = document.getElementById("tipoB").value;
	
	switch (x) {
		case 'Libro':
		document.getElementById("libroB").style.display="block";
		break;
		case 'Mapa':
		document.getElementById("mapaB").style.display="block";
		break;
		case 'Revista':
		document.getElementById("revistaB").style.display="block";
		break;
		case 'Final':
		document.getElementById("finalB").style.display="block";
		break;
	}
	
	
}

//funcion del menu de la pagina nuevo
function funcionnuevo(a, b){
	
	document.getElementById("li1").style.backgroundColor="#F6F6F6";
	document.getElementById("li2").style.backgroundColor="#F6F6F6";
	document.getElementById("li3").style.backgroundColor="#F6F6F6";
	document.getElementById("li4").style.backgroundColor="#F6F6F6";
	document.getElementById("li1").style.color="#2957ba";
	document.getElementById("li2").style.color="#2957ba";
	document.getElementById("li3").style.color="#2957ba";
	document.getElementById("li4").style.color="#2957ba";
	
	
	document.getElementById("div1").style.display="none"
	document.getElementById("div2").style.display="none"
	document.getElementById("div3").style.display="none"
	document.getElementById("div4").style.display="none"
	
	
	
	document.getElementById(b.id).style.display="flex"
	
	document.getElementById(a.id).style.backgroundColor=" #2957ba";
	document.getElementById(a.id).style.color=" #fff";
}

function valuekeyword(a,b){
	mostrar(a)
	if(document.getElementById("mat_id"))
		document.getElementById("mat_id").value =b;
}
//funcion para mostrar el modal general
function mostrar(a){
	//document.body.style.overflow="hidden";  
	if(document.getElementById(a))
		document.getElementById(a).style.display ="block";
}

//funcion de la pagina ejemplares
function ocultar(){
	//document.body.style.overflow="visible";
	if(document.getElementById("reserva"))
		document.getElementById("reserva").style.display ="none";
	if(document.getElementById("prestamo"))
		document.getElementById("prestamo").style.display ="none";
	if(document.getElementById("buscar"))
		document.getElementById("buscar").style.display ="none";
	if(document.getElementById("nuevo"))
		document.getElementById("nuevo").style.display ="none";
	if(document.getElementById("borrar"))
		document.getElementById("borrar").style.display ="none";
	if(document.getElementById("actualizar"))
		document.getElementById("actualizar").style.display ="none";
	if(document.getElementById("insert"))
		document.getElementById("insert").style.display ="none";	
	if(document.getElementById("modalkeyword"))
		document.getElementById("modalkeyword").style.display ="none";
	if(document.getElementById("borrartodo"))
		document.getElementById("borrartodo").style.display ="none";
	if(document.getElementById("borrar2"))
		document.getElementById("borrar2").style.display ="none";
}

function mindate(a, b){
	
	if(document.getElementById(a)){
		var fecha = new Date();
		fecha.setDate(fecha.getDate()+b);
		var day =fecha.getDate();
		var month=fecha.getMonth()+1;
		var year=fecha.getFullYear();
		var con = year+"-";
		if(month<10)
			con=con+"0"+month+"-";
		else
			con=con+month+"-";
		if(day<10)
			con=con+"0"+day;
		else
			con=con+day;
		document.getElementById(a).min =con;
		
	}
}

function setmindate(a,b){
	if(document.getElementById(a))
		document.getElementById(a).min=b;
}


//funcion llamada al pulsar el boton actualizar
function actualizar(a){
	
		/*id material */
		
		switch (a.tipo){
		case 'Libro':{
		/*id libros */
		if(document.getElementById("librocodigo")){
		document.getElementById("librocodigo").value =a.idmat;
		}
		if(document.getElementById("ltitulo"))
		document.getElementById("ltitulo").value =a.titulo;
		
		
		if(document.getElementById("lmes"))
		document.getElementById("lmes").value=a.mes;
		if(document.getElementById("lanio"))
		document.getElementById("lanio").value =a.anio;

		if(document.getElementById("ldesc"))
		document.getElementById("ldesc").value =a.descripcion;
		if(document.getElementById("lidioma"))
		document.getElementById("lidioma").value =a.idioma;
		if(document.getElementById("libroautor"))
		document.getElementById("libroautor").value =a.autor;
		if(document.getElementById("isbn"))
		document.getElementById("isbn").value =a.isbn;
		if(document.getElementById("libroedit"))
		document.getElementById("libroedit").value =a.editorial;
		
		if(document.getElementById("ledicion"))
		document.getElementById("ledicion").value =a.edicion;
		
		if(document.getElementById("ltomo"))
		document.getElementById("ltomo").value =a.tomo;
		break;
		}
		case 'Mapa':{
		/*id mapas*/
		if(document.getElementById("mapacodigo")){
		document.getElementById("mapacodigo").value =a.idmat;
		}
		if(document.getElementById("mtitulo"))
		document.getElementById("mtitulo").value =a.titulo;
		
		if(document.getElementById("mmes"))
		document.getElementById("mmes").value=a.mes;
		if(document.getElementById("manio"))
		document.getElementById("manio").value =a.anio;

		if(document.getElementById("mdesc"))
		document.getElementById("mdesc").value =a.descripcion;
		if(document.getElementById("midioma"))
		document.getElementById("midioma").value =a.idioma;
		if(document.getElementById("hoja"))
		document.getElementById("hoja").value =a.hoja;
		
		if(document.getElementById("mapaescala"))
		document.getElementById("mapaescala").value =a.escala;
		
		if(document.getElementById("mapaloc"))
		document.getElementById("mapaloc").value =a.localidad;
		
		if(document.getElementById("mapaprov"))
		document.getElementById("mapaprov").value =a.provincia;
		
		if(document.getElementById("mapapais"))
		document.getElementById("mapapais").value =a.pais;
		
		if(document.getElementById("mapatipo"))
		document.getElementById("mapatipo").value =a.tipom;
		break;
		}
		case 'Revista':{
		/*id revista*/
		if(document.getElementById("revcodigo")){
		document.getElementById("revcodigo").value =a.idmat;
		}
		if(document.getElementById("rtitulo"))
		document.getElementById("rtitulo").value =a.titulo;
		
		if(document.getElementById("rmes"))
		document.getElementById("rmes").value=a.mes;
		if(document.getElementById("ranio"))
		document.getElementById("ranio").value =a.anio;

		if(document.getElementById("rdesc"))
		document.getElementById("rdesc").value =a.descripcion;
		if(document.getElementById("ridioma"))
		document.getElementById("ridioma").value =a.idioma;
		if(document.getElementById("revedit"))
		document.getElementById("revedit").value =a.reveditorial;
		
		if(document.getElementById("rvolumen"))
		document.getElementById("rvolumen").value =a.volumen;
		
		if(document.getElementById("rejemplar"))
		document.getElementById("rejemplar").value =a.ejemplar;
		
		if(document.getElementById("revcol"))
		document.getElementById("revcol").value =a.coleccion;
		
		if(document.getElementById("num"))
		document.getElementById("num").value =a.num;
		
		if(document.getElementById("issn"))
		document.getElementById("issn").value =a.issn;
		break;
		}
		case 'Final':{
		/*id finales */
		if(document.getElementById("ttcodigo")){
		document.getElementById("ttcodigo").value =a.idmat;
		}
		if(document.getElementById("ttitulo"))
		document.getElementById("ttitulo").value =a.titulo;
		
		if(document.getElementById("tmes"))
		document.getElementById("tmes").value=a.mes;
		if(document.getElementById("tanio"))
		document.getElementById("tanio").value =a.anio;

		if(document.getElementById("tdesc"))
		document.getElementById("tdesc").value =a.descripcion;
		if(document.getElementById("tidioma"))
		document.getElementById("tidioma").value =a.idioma;
		if(document.getElementById("finalautor"))
		document.getElementById("finalautor").value =a.autores;
		
		if(document.getElementById("finaldirector"))
		document.getElementById("finaldirector").value =a.directores;
		
		if(document.getElementById("finaluni"))
		document.getElementById("finaluni").value =a.universidad;
		
		if(document.getElementById("finallugar"))
		document.getElementById("finallugar").value =a.lugar;
		
		if(document.getElementById("numpag"))
		document.getElementById("numpag").value =a.numpag;
		
		if(document.getElementById("tipott"))
		document.getElementById("tipott").value =a.tipott;
		break;
		}
	}
}
//funcion para comprobar que las contrasenias sean iguales
function contraconfir(){
	if(document.getElementById("confpass").value!="")
		if(document.getElementById("newpass").value!=document.getElementById("confpass").value){
			document.getElementById("mostrarerror").innerHTML =" * Las contrase&ntildeas no coinciden * ";	
			$('#guardar').attr("disabled","disabled");
		}else{
			document.getElementById("mostrarerror").innerHTML ="";
			$('#guardar').removeAttr("disabled");
			}
	if((document.getElementById("newpass").value=="")&&(document.getElementById("confpass").value=="")){
		document.getElementById("mostrarerror").innerHTML ="";
		$('#guardar').removeAttr("disabled");
		}
}
function contraconfir2(a,b,c,d){
	if(document.getElementById(a).value!="")
		if(document.getElementById(b).value!=document.getElementById(a).value){
			document.getElementById(c).innerHTML =" * Las contrase&ntildeas no coinciden * ";
			$('#'+d).attr("disabled","disabled");
		}else{
			document.getElementById(c).innerHTML ="";
			$('#'+d).removeAttr("disabled");
			}
	if((document.getElementById(b).value=="")&&(document.getElementById(a).value=="")){
		document.getElementById(c).innerHTML ="";
		$('#'+d).removeAttr("disabled");
		}
		
}
function estaenlalista(a,b,c="mostrarerror"){
	let x=document.getElementById(a).value;
	let si=b.includes(x);
	if(si)
		document.getElementById(c).innerHTML="* Ya existe. *";
	else
		document.getElementById(c).innerHTML="";
	
}

function pagant(a,b){
	if(document.getElementById(a))
		if(b=='1'){
		document.getElementById(a).style.pointerEvents="none";
		document.getElementById(a).style.color="#888888";
		}
}
function pagsig(a,b){
	if(document.getElementById(a))
		if(b=='0'){
		document.getElementById(a).style.pointerEvents="none";
		document.getElementById(a).style.color="#888888";
		}
}



/*funcion copiada de https://www.w3schools.com/howto/howto_js_autocomplete.asp*/
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

