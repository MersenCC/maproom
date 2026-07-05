<?php

	// crea un usuario
	$users = new User();

	// crea el objeto con la vista
	$tpl = new Kiwi("nosotros");

	// carga la vista
	$tpl->loadTPL();

	// array para pasar variables a la vista
	// $vars = ["CANT_USERS" => $users->getCantUsers()];
	$vars = ["PROJECT_SECTION" => "Nosotros"];

	// reemplaza las variables en la vista
	$tpl->setVarsTPL($vars);

	// imprime en la página la vista
	$tpl->printTPL();

	
 ?>