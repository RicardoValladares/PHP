<?php
function AJAX($n1, $n2){
	if(($n1!="")&&($n2!="")){
		$resultado = floatval($n1) + floatval($n2);
		echo(strval($resultado));
	}
}
if(isset($_REQUEST["n1"])&&isset($_REQUEST["n2"])){
	$n1 = $_REQUEST["n1"];
	$n2 = $_REQUEST["n2"];
	AJAX($n1, $n2);
}
else{
	echo("Solo Personal Autorizado");
}
?>
