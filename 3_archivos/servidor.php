<?php
function AJAX($texto){
	session_start();
	if($texto!=""){
		$_SESSION['TEXTO']=$texto;
	}
	return ($_SESSION['TEXTO']);
}
if(isset($_REQUEST["texto"])){
	$texto = $_REQUEST["texto"];
	$retorno = AJAX($texto);
	echo ($retorno);
}
else{
	echo("Solo Personal Autorizado");
}
?>
