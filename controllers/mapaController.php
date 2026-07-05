<?php 
	// se muestra el contenido de SESSION (para debug)
	$usuario = $_SESSION["morphyx"]["user"];

	// crea el objeto con la vista
	$tpl = new Kiwi("mapa");

	$idUser = $usuario->IDUSUARIO;

	if(isset($_POST['boton'])){
		
		// crea un usuario
		$usuario = new User();

		// quitamos del array de post el boton
		unset($_POST['boton']);

		// asignamos los datos a sus respectivas variables
		$nombre_institucion = $_POST['nombre_institucion'];
		$pais = $_POST['pais'];
		$provincia = $_POST['provincia'];
		$imagen = $_POST['img'];
		


		// TRAER EL ID DEL PAIS INGRESADO
		$id_pais = $usuario->id_pais($pais);
		$id_provincia = $usuario->id_provincia($provincia);

		$nroPais = $id_pais[0]["IDPAIS"];
		$nroProvincia = $id_provincia[0]["IDPROVINCIA"];

		// procede a intentar el registro
		$usuario->registrar_institucion($nombre_institucion, $imagen, $nroPais, $nroProvincia, $idUser);

		header("Location: landing");

	}
	// crea el array con variables a reemplazar en la vista
	$vars = ["PROJECT_SECTION" => "Mapa"];

	// carga la vista
	$tpl->loadTPL();

	// imprime en pantalla la página
	$tpl->printTPL();
	
 ?>