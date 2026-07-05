<?php 

	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("panelAdministrador");

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

	// Reemplaza las variables de la vista
	$vars = ["AVATAR" => $usuario->avatar, 
			"NOMBRE" => $usuario->nombre, 
			"APELLIDO" => $usuario->apellido, 
			"INSTITUCION" => $usuario->verInstitucion($idUser),
			"SIDEBAR" => $sidebarHtml,
			"PROJECT_SECTION" => "Panel Admin"];

	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);

	// imprime en pantalla la página
	$tpl->printTPL();
	
 ?>