<?php

include_once 'env.php';

// incluimos a User para poder hacer uso de la variable cargada en session
include_once 'models/User.php';
include_once 'models/Actividad.php';
include_once 'models/Institucion.php';

// motor de plantillas
include 'lib/kiwi/Kiwi.php';  

// Inicia la sesión
session_start();

// para pasar variables a las plantillas
$vars = [];

// por defecto se va a landing
$controlador = "landing";

// si pidieron una seccion lo llevamos a ella
if (!empty($_GET['slug'])) {
    $controlador = $_GET['slug'];    
}

// Verifica si hay un parámetro 'token'
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    // Aquí podrías almacenar el token en la sesión o pasarlo a la vista/controlador según sea necesario
}

// averiguamos si existe el controlador
if (!is_file('controllers/' . $controlador . 'Controller.php')) {
    $controlador = "error404";
}

// Arreglos de controladores por tipo de usuario
$controladores = [
    "visitante" => ["landing", "ingreso", "login","soporte", "register", "passOlvidada", "tyc", "nosotros", "choque", "aragon", "gonzalez", "ferraris", "dominguez", "mapa" ,"newPassword", "avisoEmail"],
    "anonimo" => ["landing", "soporte", "nosotros", "tyc", "registerInstitucion", "logout", "perfil", "abandonar", "avisoEmail", "panel", "configuracion"],
    "administrador" => ["logout", "perfil", "panelAdministrador", "panelDispositivos", "panelTeam", "mapa", "eventCreate", "actividad", "asignarUser", "configuracion"],
    "selecto" => ["logout", "perfil", "abandonar", "panelSelecto", "panelDispositivos", "mapa", "eventCreate", "configuracion"],
    "maproom" => ["logout", "estadoSolicitud", "panelMaproom", "perfil", "abandonar", "configuracion"]
];

// Función para incluir el controlador
function incluirControlador($controlador, $vars=[]) {
    include 'controllers/' . $controlador . 'Controller.php';
}

// Verifica la sesión del usuario
if (isset($_SESSION['morphyx'])) {
    $rango = $_SESSION['morphyx']['user']->FK_RANGO;
    $rango_controlador = [
        "4" => "anonimo",
        "3" => "selecto",
        "2" => "administrador",
        "1" => "maproom"
    ];

    if (array_key_exists($rango, $rango_controlador)) {
        $tipo_usuario = $rango_controlador[$rango];

        // Almacena las vistas permitidas en $vars como un array asociativo
        $vars['vistas_permitidas'] = [];
        foreach ($controladores[$tipo_usuario] as $vista) {
            $vars['vistas_permitidas'][$vista] = $vista; // Clave y valor iguales
        }

        // Verificar acceso al controlador
        if (in_array($controlador, $controladores[$tipo_usuario])) {
            incluirControlador($controlador, $vars);
        } else {
            incluirControlador("error404");
        }
    } else {
        echo "RANGO NO VÁLIDO";
    }
} else {
    // Usuario no logueado
    if (in_array($controlador, $controladores["visitante"])) {
        incluirControlador($controlador, $vars);
    } else {
        incluirControlador("error404");
    }
}

?>
