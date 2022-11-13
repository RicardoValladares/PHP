<?php
	
	header('Content-Type: application/json');
	$header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
	$id = rand(100,999);
	$payload = json_encode(['user_id' => $id]);
	$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
	$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
	//Client ID: 1024512
	if( strpos($_SERVER['HTTP_AUTHORIZATION'],"MTAyNDUxMjo") ){

		/*if($id<500){*/
			echo '{"access_token":"'.$base64UrlHeader.'.'.$base64UrlPayload.'.fiBNaWdyYWNpb24gKEVsIFNhbHZhZG9yKSB+"}';
		/*}
		else{
			echo '{"access_token":"'.$base64UrlHeader.'.'.$base64UrlPayload.'.fiBFbCBTYWx2YWRvciAoTWlncmFjaW9uKSB+"}';
		}*/
	}
	 
?>
