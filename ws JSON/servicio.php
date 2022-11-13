<?php
	if(getAuthorizationHeader() != 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjo2MTl9.fiBNaWdyYWNpb24gKEVsIFNhbHZhZG9yKSB+') {
	    echo 'Crendenciales no validas';
	    exit;
	}
	/*if (!isset($_SERVER['PHP_AUTH_USER'])) {
	    header('WWW-Authenticate: Basic realm="WS con autenticacion basica"');
	    header('HTTP/1.0 401 Unauthorized');
	    echo 'No autenticado';
	    exit;
	} elseif($_SERVER['PHP_AUTH_USER'] != 'usuario' || $_SERVER['PHP_AUTH_PW'] != 'pass123') {
	    echo 'Crendenciales no validas';
	    exit;
	}*/
	
	$data = json_decode(file_get_contents('php://input'), true);
	if(!isset($data["dui"]) ){
		header("Content-type:application/json");
		echo("{\"Estado\":\"Estructura no Valida\"}");
		exit;
	}
	$DUI = $data["dui"];
	if ($DUI == '04566888-7') {
		$repuesta = array( "status"=>"ok", "observacion"=>"Numero de dui valido");
	} else {
		$repuesta = array( "status"=>"error", "observacion"=>"Numero de dui no valido");
	}
	header("Content-type:application/json");
	echo json_encode($repuesta);



function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) { $headers = trim($_SERVER["Authorization"]); }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { $headers = trim($_SERVER["HTTP_AUTHORIZATION"]); } 
    elseif (function_exists('apache_request_headers')) { $requestHeaders = apache_request_headers(); $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders)); if (isset($requestHeaders['Authorization'])) { $headers = trim($requestHeaders['Authorization']); } }
    return $headers;
}
function getBearerToken() {
    $headers = getAuthorizationHeader();
    if (!empty($headers)) { if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) { return $matches[1]; } }
    return null;
}	
?>
