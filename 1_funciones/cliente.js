function conectar(){
	var xmlhttp;
	if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}
	else{xmlhttp=new ActibeXObject("Microsoft.XMLHTTP");}
	var n1=document.getElementById('n1').value;
	var n2=document.getElementById('n2').value;
	if(n1!="" && n2!=""){
		xmlhttp.open("GET","servidor.php?n1="+n1+"&n2="+n2,true);
		xmlhttp.send();
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById('resultado').value=xmlhttp.responseText;
			}
		}
	}
	else{
		alert("No deje espacios en blanco");
	}
}
