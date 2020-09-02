<html>
<head>
<title>Archivos</title>
</head>
<body bgcolor="black" text="#80FF00">
<center>
<form action='' method='post'>
<table border='1'>
<tr>
	<th>URL de Archivos</th>
	<th>Opcion a Borrar</th>
</tr>
<?php
	$vector=Array(); 
	$directorio=opendir('archivos/.'); 
	/*recolectamos en un vector los nombres de los archivos*/
	while(false!==($archivo=readdir($directorio))){if(($archivo!=".")&&($archivo!="..")&&($archivo!=".DS_Store")){$vector[]=$archivo;}}
	closedir($directorio);sort($vector); 
	/*mostramos los URL de los archivos y BOTONES para borrar*/
	foreach($vector as $celda){ 
		echo "\n<tr>";
		echo "\n\t<td><a href='archivos/".$celda."'>$celda</a></td>";
		echo "\n\t<td><input type='submit' name='borrar' value='".$celda."'></td>";
		echo "\n</tr>";
	}
	/*al oprimir el boton borrar, borrara el archivo seleccionado*/
	if(isset($_POST['borrar'])){
		$borrador="archivos/".$_POST['borrar'];
		unlink($borrador);
		header('Location: archivos.php');
	}
?>
</table>
</form>
</center>
</body>
</html>
