<?php

	// crea un usuario
	$users = new User();

	// crea el objeto con la vista
	$tpl = new Kiwi("solicitud");

	

	// carga la vista
	$tpl->loadTPL();
	
	$vars = [$users -> extraer_datos_institucion(), "PROJECT_SECTION" => "Solicitud"];

	// reemplaza las variables en la vista
	$tpl->setVarsTPL($vars[0]);

	// imprime en la página la vista
	$tpl->printTPL();

	?>