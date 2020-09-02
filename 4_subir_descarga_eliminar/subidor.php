<?php
	$fileName = $_FILES["archivo"]["name"]; // nombre del archivos
	$fileTmpLoc = $_FILES["archivo"]["tmp_name"]; // folder temporal de archivo
	$fileType = $_FILES["archivo"]["type"]; // tipo de archivo
	$fileSize = $_FILES["archivo"]["size"]; // tamaño del archivo
	$fileErrorMsg = $_FILES["archivo"]["error"]; // tiene valor de cero si no hay error
	if (!$fileTmpLoc) { //si no a seleccionado archivo
		echo "ERROR: Seleccione un archivo para subir.";
		exit();
	}
	if(move_uploaded_file($fileTmpLoc, "archivos/".$fileName)){
		echo $fileName." subido completamente";
	}
	else{
		echo "ERROR: al subir el archivo";
	}
?>
