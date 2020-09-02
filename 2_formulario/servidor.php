<?php
function AJAX($nombre, $pais, $genero, $intereses){
	$retorno = "\n\n";
	if($nombre!=""){ $retorno = $retorno."Nombre: ".$nombre."\n"; }
	if($pais!=""){ $retorno = $retorno."País: ".$pais."\n"; }
	if($genero!=""){ $retorno = $retorno."Genero: ".$genero."\n"; }
	foreach($intereses as $interes){
		if($interes!=""){ $retorno = $retorno."Interes: ".$interes."\n"; }
	}
	echo($retorno);
}
if(isset($_REQUEST["nombre"])&&isset($_REQUEST["pais"])&&isset($_REQUEST["genero"])&&isset($_REQUEST["intereses"])){
	$nombre = $_REQUEST["nombre"];
	$pais = $_REQUEST["pais"];
	$genero = $_REQUEST["genero"];
	$intereses = $_REQUEST["intereses"];
	AJAX($nombre, $pais, $genero, $intereses);
}
else{
	echo("Solo Personal Autorizado");
}
?>
