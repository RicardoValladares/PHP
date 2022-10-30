<?php
	require_once "lib/nusoap.php";

	$client = new nusoap_client("http://localhost/ws/servicio.php?wsdl",'wsdl');
	$error  = $client->getError();
	 
	if ($error) {
	    echo "<h2>Error de Constructor</h2><pre>" . $error . "</pre>";
	}

	$param = array('n1' => '2','n2' => '3');
	$result = $client->call('suma', $param);
	 
	if ($client->fault) {
	    echo "<h2>Fallo</h2><pre>";
	    print_r($result);
	    echo "</pre>";
	} 
	else {
	    $error = $client->getError();
	    if ($error) {
	        echo "<h2>Error</h2><pre>" . $error . "</pre>";
	    } else {
	        echo "<h2>Ejecucion</h2>";
	        echo $result;
	    }
	}

	echo "<h2>XML SEND</h2>";
	echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
	echo "<h2>XML RESPONSE</h2>";
	echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
?>