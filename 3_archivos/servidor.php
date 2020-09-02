<?php
function AJAX($texto){
	session_start();
	if($texto!=""){
		$_SESSION['TEXTO']=$texto;
		echo($_SESSION['TEXTO']);
	}
	else{
		echo($_SESSION['TEXTO']);
	}
}
if(isset($_REQUEST["texto"])){
	$texto = $_REQUEST["texto"];
	AJAX($texto);
}
else{
	echo("Solo Personal Autorizado");
}
?>
