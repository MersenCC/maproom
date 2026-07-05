<?php 

	$act = new Actividad();
	
	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// $users = new User();
	$tpl = new Kiwi("actividad");

	// SIDEBAR
	$sidebarHtml = '';

	foreach ($vars['vistas_permitidas'] as $vista) {
		$sidebarHtml .= '<a href="' . htmlspecialchars($vista) . '">';
		$sidebarHtml .= '<i class="fas fa-' . $vista . '"></i>'; // Obtén el ícono según la vista
		$sidebarHtml .= '<span>' . ucfirst($vista) . '</span>'; // Usa ucfirst para capitalizar la primera letra
		$sidebarHtml .= '</a>';
	}


	// carga la vista
	$tpl->loadTPL();
	
	// Obtiene el ID del usuario actual
	$idUser = $usuario->IDUSUARIO;

	$vars = [
		"AVATAR" => $usuario->avatar, 
		"NOMBRE" => $usuario->nombre, 
		"APELLIDO" => $usuario->apellido,
		"INSTITUCION" => $usuario->verInstitucion($idUser),
		"ACTIVIDAD" => $act->getAllActivity(), // Ahora contiene todos los registros formateados
		"SIDEBAR" => $sidebarHtml,
		"PROJECT_SECTION" => "Actividad"
	];
	
	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);
	
	// imprime en la vista en la página
	$tpl->printTPL();

	
 ?>