<?php 

	// crea el objeto con la vista
	$tpl = new Kiwi("register");

	// carga la vista
	$tpl->loadTPL();

	// crea el array con variables a reemplazar en la vista
	$vars = ["MSG_REGISTER_ERROR" => "",
	"PROJECT_SECTION" => "Registro"];

	// crea un usuario
	$usuario = new User();

	if (isset($_GET['token'])) {
		$token = $_GET['token'];
		$email = $_GET['email'];

		$result = $usuario->verificar_token_registro($token);
		$result= $result[0];
		if($result && count($result) > 0){
			
			$response = $usuario->usuario_verificado($email);

			// redirecciona al perfil
			header("Location: login");

			// Si hubo cualquier error se carga el mensaje de error de la vista
			$vars = ["MSG_REGISTER_ERROR" => $response["error"]];
		}else{
			echo "ERROR DE VERIFICACION";
		}
		
	}

	// si se presiono el botón del formulario
	if(isset($_POST['btn_register'])){

		// GUARDAR LOS DATOS EN LAS VARIABLES CORRESPONDIENTES
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$dni = $_POST['dni'];
		$nacimiento = $_POST['nacimiento'];
		$email = $_POST['email'];
		$password = $_POST['txt_pass'];
		$tyc = $_POST['tyc'];

		$password_codificado = $usuario->codificar_password($password);

		$token = $usuario -> generar_token();
		$usuario->enviarMailRegistro($email, $token);

		// REGISTRAR USUARIO EN LA BASE DE DATOS
		$response = $usuario->register($nombre, $apellido, $telefono, $dni, $nacimiento, $email, $password_codificado, $tyc, $token);
		
		$response["errno"] == 200 ? header("Location: avisoEmail") : $vars["MSG_REGISTER_ERROR"] = $response["error"];
	}
	// se pasan las variables a la vista
	$tpl->setVarsTPL($vars);

	// imprime en pantalla la página
	$tpl->printTPL();

	
 ?>