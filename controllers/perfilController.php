<?php 

	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("perfil");

	// SIDEBAR
$sidebarHtml = '';

foreach ($vars['vistas_permitidas'] as $vista) {
    // Omite la vista "logout"
    if ($vista === 'logout' || $vista === 'configuracion' || $vista === 'perfil') {
        continue;
    }
         // Modifica el texto según la vista
    if ($vista === 'panelAdministrador') {
        $linkText = 'Panel';
    } elseif ($vista === 'panelSelecto') {
        $linkText = 'Panel';
	} elseif ($vista === 'panelDispositivos') {
        $linkText = 'Panel Dispositivos';
	} elseif ($vista === 'panelTeam') {
        $linkText = 'Panel Equipo';
    } elseif ($vista === 'eventCreate') {
        $linkText = 'Crear Evento';
    } elseif ($vista === 'asignarUser') {
        $linkText = 'Asignar Usuario';
    } elseif ($vista === 'mapa') {
        $linkText = 'Ver Mapa';
    } else {
        $linkText = ucfirst($vista); // Capitaliza la primera letra para otras vistas
    }
    
    $sidebarHtml .= '<a href="' . htmlspecialchars($vista) . '">';
    $sidebarHtml .= '<i class="fas fa-' . $vista . '"></i>'; // Obtén el ícono según la vista
    $sidebarHtml .= '<span>' . $linkText . '</span>'; // Usa el texto modificado
    $sidebarHtml .= '</a>';
}
   
	
	// carga la vista
	$tpl->loadTPL();

	// crea el array con variables a reemplazar en la vista
	$vars = ["MSG_REGISTER_ERROR" => "",
	"NOMBRE" => $usuario->nombre,
	"APELLIDO" => $usuario->apellido,
	"AVATAR" => $usuario->avatar,
	"SIDEBAR" => $sidebarHtml,
	"PROJECT_SECTION" => "Perfil"];



	// si se presiono el botón del formulario
	if(isset($_POST['btn_guardar'])){

		// quitamos del array de post el boton
		unset($_POST['btn_guardar']);

		// procede a intentar el registro
		$response = $usuario->update($_POST);

		// se actualizo correctamente
		if($response["errno"]==200){

			// redirecciona al panel
			header("Location: panel");
		}

		// Si hubo cualquier error se carga el mensaje de error de la vista
		$vars = ["MSG_REGISTER_ERROR" => $response["error"], "NOMBRE" => $usuario->nombre, "APELLIDO" => $usuario->apellido];
	}


	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);

	// imprime en pantalla la página
	$tpl->printTPL();


	
 ?>