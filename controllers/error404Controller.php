<?php 
	
	// crea el objeto con la vista
	$tpl = new Kiwi("error404");

	// carga la vista
	$tpl->loadTPL();

	// array para pasar variables a la vista
	// $vars = ["CANT_USERS" => $users->getCantUsers()];
	$vars = ["PROJECT_SECTION" => "Error"];

	// reemplaza las variables en la vista
	$tpl->setVarsTPL($vars);

	// imprime en la página la vista
	$tpl->printTPL();

	
 ?>