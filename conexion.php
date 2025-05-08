<?php
$host = "localhost";
$usuario = "admin";
$contrasena = "1234";
$base_de_datos = "TiendaBD";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error){
	die("Conexion fallida: " . $conexion->connect_error);
}
?>
