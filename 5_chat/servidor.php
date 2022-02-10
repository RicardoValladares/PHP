<?php
/*conexion a la base de dato*/
function conectar(){
	$servidor = "127.0.0.1";
	$usuario = "root";
	$password = "minino";
	$database = "chat";
	$conexion = new mysqli($servidor, $usuario, $password, $database);
	return $conexion;
}
/*funcion para ejecutar*/
function ejecutar($sql){
	$conexion = conectar();
	mysqli_query($conexion, $sql);
}
/*funcion para consultar*/
function consultar($sql,$cols_num){
	$conexion = conectar();
	$query = $conexion->query($sql);
	$matriz = array();
	$f = 0;
	while($celda = $query->fetch_assoc()){
		$keys = array_keys($celda);
		for($c=0;$c<$cols_num;$c++){$matriz[$f][$c]=$celda[$keys[$c]];}
		$f++;
	}
	return $matriz;
}
/*funcion de retorno de datos AJAX*/
function AJAX($nombre, $mensaje){
	if(($nombre!="")&&($mensaje!="")){
		ejecutar("CALL insertar('".$nombre."','".$mensaje."');");
	}
	$chat = consultar("CALL mostrar();",2);
	header("Content-Type: text/plain");
	foreach ($chat as $dato){
		echo($dato[0].": ".$dato[1]."\n\n");
	}
}
/*solo si recive variable nombre y mensaje sabemos es el AJAX*/
if(isset($_REQUEST["nombre"])&&isset($_REQUEST["mensaje"])){
	$nombre = $_REQUEST["nombre"];
	$mensaje = $_REQUEST["mensaje"];
	AJAX($nombre, $mensaje);
}
/*si intenta ingresar sin autorizacion*/
else{
	echo("Solo Personal Autorizado");
}
?>
