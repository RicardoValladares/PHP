function conectar(){
	var xmlhttp;
	if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActibeXObject("Microsoft.XMLHTTP");}
	var nombre=document.getElementById('nombre').value;
	var pais=document.getElementById('pais').value;
	var genero="";
	for(i=0;i<(document.getElementsByName("genero[]")).length;i++){
		if((document.getElementsByName("genero[]"))[i].checked){
			genero = (document.getElementsByName("genero[]"))[i].value;
		}
	}
	var intereses = "";
	for(i=0;i<(document.getElementsByName("intereses[]")).length;i++){
		if((document.getElementsByName("intereses[]"))[i].checked){
			intereses = intereses + (document.getElementsByName("intereses[]"))[i].value + "&intereses[]=";
		}
	}
	xmlhttp.open("GET","servidor.php?nombre="+nombre+"&pais="+pais+"&genero="+genero+"&intereses[]="+intereses,true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('datos').value=xmlhttp.responseText;
		}
	}
}
