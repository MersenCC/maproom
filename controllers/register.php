<?php
require 'conexion.php';
session_start();

$imagen = 'https://cdn-icons-png.flaticon.com/512/6073/6073873.png';
$FK_RANGO = 1;

$nombre = filter_input(INPUT_GET, "nombre");
$apellido = filter_input(INPUT_GET, "apellido");
$telefono = filter_input(INPUT_GET, "telefono");
$dni = filter_input(INPUT_GET, "dni");
$email = filter_input(INPUT_GET, "email");
$contrasenia = md5(filter_input(INPUT_GET, "contrasenia")."Maproom");
$fecha=filter_input(INPUT_GET, "fecha");
date_default_timezone_set('America/Argentina/Buenos_Aires');
$agregado = date('Y-m-d H:i:s');

$actualizado = 'Null';
$borrado =  'Null';

if ($nombre && $apellido && $telefono && $dni && $fecha && $email && $contrasenia) {
    $consulta = $conexion->prepare("INSERT INTO usuario (imagen, nombre, apellido, telefono, dni, anioNacimiento, FK_RANGO, email, contrasenia, agregado, actualizado, borrado) 
                                    VALUES (:imagen, :nombre, :apellido, :telefono, :dni, :anioNacimiento, :FK_RANGO, :email, :contrasenia, :agregado, :actualizado, :borrado)");

    $consulta->bindParam(':imagen', $imagen);
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellido', $apellido);
    $consulta->bindParam(':telefono', $telefono);
    $consulta->bindParam(':dni', $dni);
    $consulta->bindParam(':anioNacimiento', $fecha);
    $consulta->bindParam(':FK_RANGO', $FK_RANGO);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':contrasenia', $contrasenia);
    $consulta->bindParam(':agregado', $agregado);
    $consulta->bindParam(':actualizado', $actualizado);
    $consulta->bindParam(':borrado', $borrado);

    $consulta->execute();
    $usuario_id = $conexion->lastInsertId();
    header('Location: ./index.php?accion=home');
    exit;
} else {
    echo "Falta alguno de los datos requeridos.";
}


?>
