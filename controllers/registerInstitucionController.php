<?php 
	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("registerInstitucion");

		// carga la vista
		$tpl->loadTPL();

		// Obtiene el ID del usuario actual
		$idUser = $usuario->IDUSUARIO;
	
		// Reemplaza las variables de la vista
		$vars = ["PROJECT_SECTION" => "Registro institucion"];
	
		// se pasan las variables a la vista
		$tpl->setVarsTPL($vars);
	
		// imprime en pantalla la página
		$tpl->printTPL();
	
		
 ?>