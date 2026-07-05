<?php 

	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("navbar");

	// carga la vista
	$tpl->loadTPL();

	// Reemplaza las variables de la vista
	// $tpl->setVarsTPL(["USER_NAME" => $usuario->apellido],
	// ["USER_LAST_NAME"=> $usuario->nombre]);

	// imprime en la vista en la página
	$tpl->printTPL();

	
 ?>