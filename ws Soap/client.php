<?php
    require_once ('lib/nusoap.php');
    $cliente = new nusoap_client("http://localhost/ws/service.php?wsdl",'wsdl');
    $param = array('nombre' => 'Ricardo');
    $arreglo2 = $cliente->call('getPersonas', $param);
    $error = $cliente->getError();
    if($error){
        echo "<p> '.$error.' </p>";
        echo '<p style="color:red;'>htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</p>';
        die();
    }
    else{
        echo "<br/>";
        for( $i=0; $i<count($arreglo2); $i++ ){
            print_r( $arreglo2[$i]['ID'] );
            echo "<br/>"; 
            print_r( $arreglo2[$i]['NOMBRE'] );
            echo "<br/>"; 
            print_r( $arreglo2[$i]['APELLIDO'] );
            echo "<br/>"; echo "<br/>"; 
        }
    }
?>