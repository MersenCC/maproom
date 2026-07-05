<?php

	// crea un usuario
	$users = new User();

	// crea el objeto con la vista
	$tpl = new Kiwi("newPassword");

	$vars = ["PROJECT_SECTION" => "Nueva contraseña",
	"MSG_NEWPASSWORD_ERROR" => ""];

	// carga la vista
	$tpl->loadTPL();

	if (isset($_GET['token'])) {
		$token = $_GET['token'];
	} else {
		die("Token no proporcionado.");
	}
	
	if(isset($_POST['btn_password'])){

		// Quitamos del POST el boton
		unset($_POST['btn_password']);
		
		$result = $users->verificar_token_password($token);

		if (!(empty($result))) {
			$email = $result[0]["email"];
		}else{
		}
		
		// Guardamos los datos en sus variables
		$password1 = $_POST['password'];
		$password2 = $_POST['password2'];

		// Verificamos las 2 contraseñas
		$comprobation = $users->verificar_password($password1, $password2);

		if($comprobation){
			$password_codificado = $users->codificar_password($password1);
			$resultado = $users->cambiar_password($password_codificado, $email);
			header("Location: login");	
		}else{
			$vars["MSG_NEWPASSWORD_ERROR"] = 'Acceso Invalido';
		}
	}

	// reemplaza las variables en la vista
	$tpl->setVarsTPL($vars);

	// imprime en la página la vista
	$tpl->printTPL();

	
 ?>
