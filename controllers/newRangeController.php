<?php 

// Se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];

// Crea el objeto con la vista
$tpl = new Kiwi("newRange");

// Carga la vista
$tpl->loadTPL();

echo "<h1>CAMBIANDO RANGO</h1>";

// NOS ASEGURAMOS DE SI RECIBIMOS EL TOKEN
if (isset($_GET['token']) && isset($_GET['rango'])) {

	// EXTRAEMOS EL TOKEN
	$token = $_GET['token'];
	$rango = $_GET['rango'];

	// COMPARAMOS LOS TOKENS
	$result = $usuario->verificar_token_rango($token);

	if($result){
		switch ($rango) {
			case "selecto":
				$rango = 3;
				break;
			case "administrador":
				$rango = 2;
				break;
			default:
				echo "Rango no válido.";
				break;
		}
	}
} else {
	die("Token no proporcionado.");
}

$email = $result[0]["email"];

if($result){
    $usuario->cambiar_rango($email, $rango);
	header('location:login');
}else{
	echo "no hay resultado";
}

// Reemplaza las variables de la vista
$vars = ["PROJECT_SECTION" => "Nuevo rango"];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>