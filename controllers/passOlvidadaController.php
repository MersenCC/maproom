<?php

	// crea un usuario
	$users = new User();

	// crea el objeto con la vista
	$tpl = new Kiwi("passOlvidada");

	$vars = ["PROJECT_SECTION" => "Contraseña olvidada",
			"MSG_PASSOLVIDADA_ERROR" => ""];

	// carga la vista
	$tpl->loadTPL();

	if(isset($_POST['enviar'])){
		unset($_POST['enviar']);
		$email = filter_var($_POST['destinatario'], FILTER_VALIDATE_EMAIL);
		$emailComprobation = $users -> buscarEmail($email);
		$contador = $emailComprobation[0]['COUNT(*)'];

		if ($contador > 0) {
			if ($email) {
				$token = $users -> generar_token();
				$users -> almacenar_token($email, $token);
				$response = $users -> enviar_correo_password($email, $token);
	
				if($response == true){	
					header("Location: avisoEmail");
				}
			}
		}else{
			$vars["MSG_PASSOLVIDADA_ERROR"] = "EMAIL NO EXISTENTE";
		}
	}	

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();



 ?>