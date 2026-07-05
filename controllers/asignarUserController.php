<?php 

// Se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];

// Crea el objeto con la vista
$tpl = new Kiwi("asignarUser");

	// SIDEBAR
	$sidebarHtml = '';

	foreach ($vars['vistas_permitidas'] as $vista) {
		$sidebarHtml .= '<a href="' . htmlspecialchars($vista) . '">';
		$sidebarHtml .= '<i class="fas fa-' . $vista . '"></i>'; // Obtén el ícono según la vista
		$sidebarHtml .= '<span>' . ucfirst($vista) . '</span>'; // Usa ucfirst para capitalizar la primera letra
		$sidebarHtml .= '</a>';
	}

// Carga la vista
$tpl->loadTPL();

$idUser = $usuario->IDUSUARIO;

// VERIFICAR SI SE ENVIO UN FORMULARIO TIPO POST
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	// VERIFICAR SI SE PRESIONO EL BOTON 
	if (isset($_POST['button_solicitud'])) {

		$rango = $_POST['rango'];

		// GUARDAR EL EMAIL INGRESADO
		$email = $_POST['email'];

		// GENERAR TOKEN
		$token = $usuario -> generar_token();

		// ALMACENAR TOKEN EN LA BASE DE DATOS
		$usuario -> almacenar_token_rango($email, $token);

		// ENVIAR MAIL AL EMAIL INGRESADO
		$correo_email = $usuario -> enviar_correo_asignacion($email, $token, $rango);

		// VERIFICAR SI HAY CONTENIDO
		if ($correo_email) {

			// REDIRIGIR AL LOGIN
			header('location:login');
		}
	}
}
// En caso de descomentar eliminar el } de arriba
// }else{
// 	echo "no encontrado";
// }

// Guarda el ID del usuario actual
$idUser = $usuario->IDUSUARIO;

// Reemplaza las variables de la vista
$vars = [
    "AVATAR" => $usuario->avatar,
    "NOMBRE" => $usuario->nombre,
    "APELLIDO" => $usuario->apellido,
	"SIDEBAR" => $sidebarHtml,
	"PROJECT_SECTION" => "Asignacion"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>