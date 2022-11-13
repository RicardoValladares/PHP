<?php
	require_once('lib/nusoap.php');

	$miURL = 'http://localhost/ws';
	$server = new soap_server();
	$server->configureWSDL('primerws', $miURL);
	$server->wsdl->schemaTargetNamespace=$miURL;

	$server->register('saludar', array('nombre' => 'xsd:string'), array('return' => 'xsd:string'), $miURL);
	$server->register('suma', array('n1' => 'xsd:int', 'n2' => 'xsd:int'), array('return' => 'xsd:string'), $miURL);

	function saludar($parametro){
		return new soapval('return', 'xsd:string', 'Hola: '.$parametro);
	}

	function suma($n1, $n2){
		$suma = $n1 + $n2;
		return new soapval('return', 'xsd:string', 'la suma es: '.$suma);
	}

	if ( !isset( $HTTP_RAW_POST_DATA ) )
		$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
	$server->service($HTTP_RAW_POST_DATA);

?>
