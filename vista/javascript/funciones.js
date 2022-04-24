function conftabla(){
	$(document).ready( function () {
    $('#tabla').DataTable( {
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
        }
	
    } 

);
var table = $('#tabla').DataTable();
 //seleccion y deseleccion
    $('#tabla tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
	//borrar
	$('#botonborrar').click( function () {
		var data = table.row('.selected').data();
        borrar(data[0],data[1]);
    } );
	$('#botoneditar').click( function () {
		var data = table.row('.selected').data();
        editar(data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7]);
    } );





} );
}
function borrar(a,b){
	if (document.getElementById("borrar1"))
		document.getElementById("borrar1").value =a;
	if(document.getElementById("nombre1"))
		document.getElementById("nombre1").value =b;
}
function editar(a,b,c,d,f,g,h,i){
	if(document.getElementById("pid"))
		document.getElementById("pid").value =a;
	if(document.getElementById("pnom"))		
		document.getElementById("pnom").value =b;
		
	if(document.getElementById("pdesde")){
		document.getElementById("pdesde").value =f;
		document.getElementById("cdesde").value =f;
	}
	if(document.getElementById("phasta")){
		document.getElementById("phasta").value =g;
		document.getElementById("chasta").value =g;
	}
	if(document.getElementById("pdevuelto")){
		document.getElementById("pdevuelto").value =h;
		document.getElementById("cdevuelto").value =h;
	}

		
	if((document.getElementById("pce"))&&(document.getElementById("pac"))){
		if(i=="Activo"){
			document.getElementById("pac").checked = true;
			document.getElementById("cact").value = 'True';
		}
		if(i=="Cerrado"){
			document.getElementById("pce").checked = true;
			document.getElementById("cact").value = 'False';
		}
	
	}
	
	
	//actualizar reserva


	if(document.getElementById("resid"))
		document.getElementById("resid").value =a;
	if(document.getElementById("resnom"))
		document.getElementById("resnom").value =b;	
	if(document.getElementById("resdesde")){
		document.getElementById("resdesde").value =g;
		document.getElementById("cresdesde").value =g;
	}
	
	if((document.getElementById("resce"))&&(document.getElementById("resac"))){
		if(h=="Activo"){
			document.getElementById("resac").checked = true;
			document.getElementById("resact").value = 'True';
		}
		if(h=="Cerrado"){
			document.getElementById("resce").checked = true;
			document.getElementById("resact").value = 'False';
		}
	
	}	
}
//funcion para intercalar entre mostrar y ocultar
function mostrarocultar(a){
	if(document.getElementById( a.id  ).style.display=="block")
	document.getElementById(a.id).style.display="none"
	else
	document.getElementById(a.id).style.display="block"
}
function agendamenu(a){
	if(document.getElementById( a.id  ).style.display=="block"){
	document.getElementById(a.id).style.display="none";
	document.getElementById(a.id+'1').innerText='+';
	}
	else{
	document.getElementById(a.id).style.display="block";
	document.getElementById(a.id+'1').innerText='-';
	}
}
function ocultar_error(){
	if(document.getElementById('error'))
		document.getElementById('error').style.display="none"
}
function mostrar_error(a,b){
	if(document.getElementById('error')){
	
	if((b==0)){
		ocultar_error();
	}
	else{
		document.getElementById('error').style.display="block";
		if(a!='')
			document.getElementById('mens').innerHTML=a;
	}

	}
}

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
	
	
	
	document.getElementById(b.id).style.display="block"
	
	document.getElementById(a.id).style.backgroundColor=" #2957ba";
	document.getElementById(a.id).style.color=" #fff";
}

//funciones para mostrar el modal especifica con parametros
function valuereserva(a, b, c){
		mostrar(a)
		if(document.getElementById("resmaterial"))
		document.getElementById("resmaterial").value =b;
		if(document.getElementById("resejemplar"))
		document.getElementById("resejemplar").value =c;
}
function valueprestamo(a, b,c,d){
		mostrar(a)
		if(document.getElementById("presmaterial"))
		document.getElementById("presmaterial").value =b;
		if(document.getElementById("resejemplar"))
		document.getElementById("presejemplar").value =c;
		if(document.getElementById("reservaprox"))
		document.getElementById("reservaprox").value =d;
}
function reportes(a,b){
	mostrar(a)
	document.getElementById('pdf').src="../reportes/"+b;
}

function valuekeyword(a,b){
	mostrar(a)
	if(document.getElementById("mat_id"))
		document.getElementById("mat_id").value =b;
}
//funcion para mostrar el modal general
function mostrar(a){
	document.body.style.overflow="hidden";  
	if(document.getElementById(a))
		document.getElementById(a).style.display ="block";
}

//funcion de la pagina ejemplares
function ocultar(){
	document.body.style.overflow="visible";
	if(document.getElementById("reserva"))
		document.getElementById("reserva").style.display ="none";
	if(document.getElementById("prestamo"))
		document.getElementById("prestamo").style.display ="none";
	if(document.getElementById("buscar"))
		document.getElementById("buscar").style.display ="none";
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




//funcion de autocompletar form , cuando se selecciona una fila en una tabla se ejecuta
function idtabla(a, b, c, d, e, f, g, h ,i){
	deseleccion()
	selection(a)
	if(document.getElementById("prest"))
		document.getElementById("prest").value =b;
	if(document.getElementById("pasarprestamoid"))
		document.getElementById("pasarprestamoid").value =b; //no se usa m�s
	if(document.getElementById("pasarprestamonom"))
			document.getElementById("pasarprestamonom").value =c;
   
	//borrar
	if (document.getElementById("borrar1"))
		document.getElementById("borrar1").value =b;
	if(document.getElementById("nombre1"))
		document.getElementById("nombre1").value =c;
	//reserva y prestamo en ejemplares
	if(document.getElementById("reservar1"))
		document.getElementById("reservar1").value =b;
	if(document.getElementById("idprestamo"))
		document.getElementById("idprestamo").value =d;
	if(document.getElementById("ejemprestamo"))
		document.getElementById("ejemprestamo").value =f;
	if(document.getElementById("insertidpre"))
		document.getElementById("insertidpre").value =b;
		
		
	//actualizar prestamos
	if(document.getElementById("pid"))
		document.getElementById("pid").value =b;
	if(document.getElementById("pnom"))		
		document.getElementById("pnom").value =c;
		
	if(document.getElementById("pdesde")){
		document.getElementById("pdesde").value =f;
		document.getElementById("cdesde").value =f;
	}
	if(document.getElementById("phasta")){
		document.getElementById("phasta").value =g;
		document.getElementById("chasta").value =g;
	}
	if(document.getElementById("pdevuelto")){
		document.getElementById("pdevuelto").value =h;
		document.getElementById("cdevuelto").value =h;
	}

		
	if((document.getElementById("pce"))&&(document.getElementById("pac"))){
		if(i=="Activo"){
			document.getElementById("pac").checked = true;
			document.getElementById("cact").value = 'True';
		}
		if(i=="Cerrado"){
			document.getElementById("pce").checked = true;
			document.getElementById("cact").value = 'False';
		}
	
	}
	
	
	//actualizar reserva


	if(document.getElementById("resid"))
		document.getElementById("resid").value =b;
	if(document.getElementById("resnom"))
		document.getElementById("resnom").value =c;	
	if(document.getElementById("resdesde")){
		document.getElementById("resdesde").value =g;
		document.getElementById("cresdesde").value =g;
	}
	
	if((document.getElementById("resce"))&&(document.getElementById("resac"))){
		if(h=="Activo"){
			document.getElementById("resac").checked = true;
			document.getElementById("resact").value = 'True';
		}
		if(h=="Cerrado"){
			document.getElementById("resce").checked = true;
			document.getElementById("resact").value = 'False';
		}
	
	}	
}

function mindate(a, b){
	
	if(document.getElementById(a)){
		var fecha = new Date();
		fecha.setDate(fecha.getDate()+b);
		var day =fecha.getDate();
		var month=fecha.getMonth()+1;
		var year=fecha.getFullYear();
		var con = year+"-";
		if(fecha.getMonth()<10)
			con=con+"0"+month+"-";
		else
			con=con+month+"-";
		if(fecha.getDate()<10)
			con=con+"0"+day;
		else
			con=con+day;
		document.getElementById(a).min =con;
		//console.log(con);
	}
}



function idejemplar(a,b,c,d,e,f){
	deseleccion()
	selection(a)
	
	
	//borrar
	if(document.getElementById("bejempplar"))
		document.getElementById("bejempplar").value =b; 
	
	//editar
	if(document.getElementById("pidejem")){
		document.getElementById("pidejem").value =b;
		document.getElementById("cidejem").value =b;
	}
	if(document.getElementById("pce")){
		document.getElementById("pce").value =c;
		document.getElementById("cce").value =c;
	}
	if(document.getElementById("ces")){
		switch(e){
			case 'Libre':
				document.getElementById("l").selected =true;
				document.getElementById("ces").value ='l';
				break;
			case 'Reservado':
				document.getElementById("r").selected =true;
				document.getElementById("ces").value ='r';
				break;
			case 'Prestado':
				document.getElementById("p").selected =true;
				document.getElementById("ces").value ='p';
				break;
			case 'Obsoleto':
				document.getElementById("o").selected =true;
				document.getElementById("ces").value ='o';
				break;
		}
	}
	if(document.getElementById("pprop")){
		document.getElementById("pprop").value =d;
		document.getElementById("cprop").value =d;
	}
	if(document.getElementById("dis"))
		if(f=="SI")
			document.getElementById("dis").checked = true;	 //revisar
			
	if((document.getElementById("pdis1"))&&(document.getElementById("pdis2"))){
		if(f=="SI"){
			document.getElementById("pdis1").checked = true;
			document.getElementById("cdis").value = 'True';
		}
		if(f=="NO"){
			document.getElementById("pdis2").checked = true;
			document.getElementById("cdis").value = 'False';
		}
	
	}

}


function selection(a){
	document.getElementById(a).style.backgroundColor="#CCCCCC";
}
function deseleccion(){
	let x =0;
	let y ;
		
	do{
		y ="id";
		z=y+x
		//console.log(z)
		if(document.getElementById(z))
		document.getElementById(z).style.backgroundColor="";
		x++;
		
	}
	while(document.getElementById(z));
}

//funcion llamada al pulsar el boton actualizar
function actualizar(a){
	
		/*id material */
		
		console.log(a.tipo);
		switch (a.tipo){
		case 'Libro':{
		/*id libros */
		if(document.getElementById("librocodigo")){
		document.getElementById("librocodigo").value =a.idmat;
		}
		if(document.getElementById("ltitulo"))
		document.getElementById("ltitulo").value =a.titulo;
		
		if(document.getElementById("lcatalogo"))
		document.getElementById("lcatalogo").value =a.idcatalogo;
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
		
		if(document.getElementById("mcatalogo"))
		document.getElementById("mcatalogo").value =a.idcatalogo;
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
		if(document.getElementById("ttitulo"))
		document.getElementById("ttitulo").value =a.titulo;
		
		if(document.getElementById("tcatalogo"))
		document.getElementById("tcatalogo").value =a.idcatalogo;
		if(document.getElementById("tanio"))
		document.getElementById("tanio").value =a.anio;

		if(document.getElementById("tdesc"))
		document.getElementById("tdesc").value =a.descripcion;
		if(document.getElementById("ridioma"))
		document.getElementById("ridioma").value =a.idioma;
		if(document.getElementById("revedit"))
		document.getElementById("revedit").value =a.reveditorial;
		
		if(document.getElementById("volumen"))
		document.getElementById("volumen").value =a.volumen;
		
		if(document.getElementById("ejemplar"))
		document.getElementById("ejemplar").value =a.ejemplar;
		
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
		
		if(document.getElementById("tcatalogo"))
		document.getElementById("tcatalogo").value =a.idcatalogo;
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

function contraconfir(){
	if(document.getElementById("confpass").value!="")
		if(document.getElementById("newpass").value!=document.getElementById("confpass").value){
			document.getElementById("mostrarerror").innerHTML =" * Las contraseñas no coinciden * ";
		}else{
			document.getElementById("mostrarerror").innerHTML ="";
			}
	if((document.getElementById("newpass").value=="")&&(document.getElementById("confpass").value==""))
		document.getElementById("mostrarerror").innerHTML ="";
		
}
function estaenlalista(a,b){
	let x=document.getElementById(a).value;
	let si=b.includes(x);
	if(si)
		document.getElementById('mostrarerror').innerHTML="* Ya existe. *";
	else
		document.getElementById('mostrarerror').innerHTML="";
	
	console.log(a);
	console.log(document.getElementById('bcinu').value);
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