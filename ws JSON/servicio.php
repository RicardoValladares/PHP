<?php
	define('DB_USER', "root");
	define('DB_PASSWORD', "123");
	define('DB_DATABASE', "base");
	define('DB_SERVER', "localhost");
	define('DB_PORT', "3306");


	/*if (!isset($_SERVER['PHP_AUTH_USER'])) {
	    header('WWW-Authenticate: Basic realm="WS con autenticacion basica"');
	    header('HTTP/1.0 401 Unauthorized');
	    echo 'No autenticado';
	    exit;
	} elseif($_SERVER['PHP_AUTH_USER'] != 'usuario' || $_SERVER['PHP_AUTH_PW'] != 'pass123') {
	    echo 'Crendenciales no validas';
	    exit;
	}*/

	if (!isset($_SERVER['Authorization'])) {
	    header('HTTP/1.0 401 Unauthorized');
	    echo 'No autenticado';
	    exit;
	} elseif($_SERVER['Authorization'] != 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo2MTl9.fiBNaWdyYWNpb24gKEVsIFNhbHZhZG9yKSB+') {
	    echo 'Crendenciales no validas';
	    exit;
	}
	

	$data = json_decode(file_get_contents('php://input'), true);

	if(!isset($data["dui"]) ){
		header("Content-type:application/json");
		echo("{\"Estado\":\"Estructura no Valida\"}");
		exit;
	}

	$DUI = $data["dui"];

	
	$cnx = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE, DB_PORT);
	$cnx->set_charset("utf8");

	$query = "CALL valido('".$DUI."');";

	$result = mysqli_query($cnx, $query);
	if (!$result) {
		echo mysqli_error($cnx);
	}
	if ($row = mysqli_fetch_array($result)) {

		if($row['contador']=="0"){
			$repuesta = array( "status"=>"error", "observacion"=>"Numero de dui agregado");
		} else {
			$repuesta = array( "status"=>"ok", "observacion"=>"Numero de dui repetido");
		}

	} else {
		$repuesta = array( "status"=>"error", "observacion"=>"No se logro ejecutar el proceso");
	}
	
	header("Content-type:application/json");
	echo json_encode($repuesta);
	
?>
