<?php 

	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("panelMaproom");

	// carga la vista
	$tpl->loadTPL();

	// Obtiene el ID del usuario actual
	$idUser = $usuario->IDUSUARIO;

	// Reemplaza las variables de la vista
	$vars = ["AVATAR" => $usuario->avatar, 
			"NOMBRE" => $usuario->nombre, 
			"APELLIDO" => $usuario->apellido, 
			"PROJECT_SECTION" => "Panel Admin"];

	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);

	// imprime en pantalla la página
	$tpl->printTPL();
	
 ?>