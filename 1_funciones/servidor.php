<?php
function AJAX($n1, $n2){
	if(($n1!="")&&($n2!="")){
		$resultado = floatval($n1) + floatval($n2);
		return (strval($resultado));
	}
	else{
		return ("Solo Personal Autorizado");
	}
}
if(isset($_REQUEST["n1"])&&isset($_REQUEST["n2"])){
	$n1 = $_REQUEST["n1"];
	$n2 = $_REQUEST["n2"];
	$retorno = AJAX($n1, $n2);
	echo($retorno);
}
else{
	echo("Solo Personal Autorizado");
}
?>
