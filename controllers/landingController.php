<?php

	// crea un usuario
	$users = new User();

	// crea el objeto con la vista
	$tpl = new Kiwi("landing");

	// carga la vista
	$tpl->loadTPL();

	// array para pasar variables a la vista
	// $vars = ["CANT_USERS" => $users->getCantUsers()];
	$vars = ["CANT_USERS" => "+150",
			"PROJECT_SECTION" => "Landing"];

	// reemplaza las variables en la vista
	$tpl->setVarsTPL($vars);

	// imprime en la página la vista
	$tpl->printTPL();

	
 ?>