<?php
    require_once "lib/nusoap.php";

    $server = new soap_server();
    $namespace = 'http://localhost/ws/service.php?WSDL';
    $server->configureWSDL('GetPersonaService', $namespace);
    $server->wsdl->addComplexType('arreglos','complexType','array','','SOAP-ENC:Array',array(),
        array(
            array('ref' => 'SOAP-ENC:arrayType','wsdl:arrayType' => 'tns:arreglo[]')
        )
    );
    $server->register("getPersonas", array('nombre' => 'xsd:string'), array('return' => 'tns:arreglos'));

    function getPersonas($nombre){
        error_reporting(E_ALL & ~E_NOTICE);
        $arraypersonas = array();
        if($nombre=="Ricardo"){
    	    $persona1 = array();
    	    $persona1['ID'] = 1;
    	    $persona1['NOMBRE'] = "Ricardo";
    	    $persona1['APELLIDO'] = "Valladares";
    	    array_push($arraypersonas,$persona1);

    	    $persona2 = array();
    	    $persona2['ID'] = 2;
    	    $persona2['NOMBRE'] = "Ricardo";
    	    $persona2['APELLIDO'] = "Renderos";
    	    array_push($arraypersonas,$persona2);
        }
        else{
    	    $persona1 = array();
    	    $persona1['ID'] = 1;
    	    $persona1['NOMBRE'] = $nombre;
    	    $persona1['APELLIDO'] = "Desconocido";
    	    array_push($arraypersonas,$persona1);
        }
        return $arraypersonas;
    }

    if ( !isset( $HTTP_RAW_POST_DATA ) )
        $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
    $server->service($HTTP_RAW_POST_DATA);

?>