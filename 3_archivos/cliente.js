function abrir(){
	var file = document.getElementById("file").files[0];
	var reader = new FileReader();
	reader.onload = function(event){
		document.getElementById("texto").value = reader.result;
		AJAX("?texto="+document.getElementById("texto").value);
	};
	reader.readAsText(file);
}
function guardar(){
	AJAX("?texto="+document.getElementById("texto").value);
}
function descargar(){
	AJAX("?texto="+document.getElementById("texto").value);
	var element = document.createElement('a');
	element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(document.getElementById("texto").value));
	element.setAttribute('download', 'texto.txt');
	element.style.display = 'none';
	document.body.appendChild(element);
	element.click();
	document.body.removeChild(element);
}

function AJAX(texto){
	var xmlhttp;
	if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActibeXObject("Microsoft.XMLHTTP");}
	xmlhttp.open("GET","servidor.php"+texto,true);
	xmlhttp.send();
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById('texto').value=xmlhttp.responseText;
		}
	}
}
