/*variables globales para la conexion de envio y recepcion*/
var xmlhttp;
if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
else{xmlhttp=new ActibeXObject("Microsoft.XMLHTTP");}
/*funcion para mostrar*/
function mostrar(){
	xmlhttp.open("GET","servidor.php?nombre=&mensaje=",true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4){
			if(document.getElementById("chat").value != xmlhttp.responseText){
				document.getElementById("chat").value = xmlhttp.responseText;
			}
			setTimeout('mostrar()',1000); //actualizar cada segundo
		}
	}
}
/*funcion para insertar*/		
function insertar(){
	var nombre=document.getElementById("nombre").value;
	var mensaje=document.getElementById("mensaje").value;
	if(nombre!="" && mensaje!=""){
		xmlhttp.open("GET","servidor.php?nombre="+nombre+"&mensaje="+mensaje,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("chat").value=xmlhttp.responseText;
			}
		}
	}
}
