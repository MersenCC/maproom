<?php 

	// crea el objeto con la vista
	$tpl = new Kiwi("login");

	// crea un usuario
	$usuario = new User();

	// carga la vista
	$tpl->loadTPL();

	// crea el array con variables a reemplazar en la vista
	$vars = ["MSG_LOGIN_ERROR" => "",
	"PROJECT_SECTION" => "Login"];

	// si se presiono el botón del formulario
	if(isset($_POST['btn_login'])){

		// quitamos del array de post el boton
		unset($_POST['btn_login']);

		// procede a intentar el logueo del usuario
		$response = $usuario->login($_POST);

		// El usuario y contraseña son validos
		if($response["errno"]==200){

			// se pasa el objeto de usuario a Session
			$_SESSION["morphyx"]['user'] = $usuario;

			// redirecciona al panel
			header("Location: perfil");
		}else{
			// Si hubo cualquier error se carga el mensaje de error de la vista
			$vars["MSG_LOGIN_ERROR"] = $response["error"];
		}
	}

	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);

	// imprime en pantalla la página
	$tpl->printTPL();

	
 ?>