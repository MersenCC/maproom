<?php
require 'conexion.php';
session_start();


if (isset($_COOKIE['Maproom'])) {
    $email = $_COOKIE['Maproom'];
} else {
    die("No se encontró la cookie 'email'.");
}

$contraseña = $_GET['password'] ?? '';
$nueva_contraseña = md5(filter_input(INPUT_GET, $contraseña)."Maproom");
// Validar y sanear los datos   
if (empty($nueva_contraseña)) {
    die('Todos los campos son requeridos.');
}

// Consulta SQL para actualizar la contraseña
$sql = "UPDATE usuario SET contrasenia = :nueva_contrasenia WHERE email = :email";

try {
    // Preparar la declaración
    $consulta = $conexion->prepare($sql);

    // Ejecutar la declaración con los parámetros
    $consulta->execute([
        ':nueva_contrasenia' => $nueva_contraseña,
        ':email' => $email
    ]);
    header('Location: ./index.php?accion=home');
    
} catch (\PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
