<?php 

	// incluye la libreria para conectar con la db
	include_once 'DBAbstract.php';
	include_once './mp-mailer-master/libsendmail.php';

	// se crea la clase User que hereda de DBAbstract
	class User extends DBAbstract{

		private $nameOfFields = array();

		/**
		 * 
		 * @brief Es el constructor de la clase User
		 * 
		 * Al momento de instanciar User se llama al padre para que ejecute su constructor
		 * 
		 * */
		function __construct(){
		
			// quiero salir de la clase actual e invocar al constructor
			parent::__construct();

			/**< Obtiene la estructura de la tabla */
			$result = $this->query('DESCRIBE usuario');

			foreach ($result as $key => $row) {
				$buff =$row["Field"];
				
				/**< Almacena los nombres de los campos*/
				$this->nameOfFields[] = $buff;

				/**< Autocarga de atributos a la clase */
				$this->$buff=NULL;
			}
		}

		/**
		 * 
		 * Hace soft delete del registro
		 * @return bool siempre verdadero
		 * 
		 * */
		function leaveOut(){

			$id = $this->id;
			$fecha_hora = date("Y-m-d H:i:s");

			$ssql = "UPDATE usuario SET borrado='$fecha_hora' WHERE IDUSUARIO=$id";

			$this->query($ssql);

			return true;
		}

		/**
		 * 
		 * Finaliza la sesión
		 * @return bool true
		 * 
		 * */
		function logout(){
			return true;
		}

		/**
		 * 
		 * Intenta loguear al usuario mediante email y contraseña
		 * @param array $form indexado de forma asociativa
		 * @return array que posee códigos de error especiales
		 * 
		 * */
		
			

		function login($form){

			// Guardamos los datos en sus variables 
			$email = $form["email"];
			$password = md5($form['txt_pass'].'maproom');
			
			$vector_logueo = $this->query("CALL loguear('$email', '$password');"); // Llamamos a la Stored Procedure y lo guardamos en la variable 'vector_logueo'

			if (!empty($vector_logueo)) {
				$login = $vector_logueo[0]['result']; // Guardar el dato de result en una variable
			
				unset($vector_logueo[0]['result']); // Eliminar el dato de result del vector 

				$vector = $vector_logueo[0]; // Guardar la matriz como un vector
				
				if ($login) {
					foreach ($this->nameOfFields as $key => $value) {
							$this->$value = $vector[$value];
						}
						$this->avatar = str_replace("set5", "set4", $this->avatar);
						return ["error" => "Acceso valido", "errno" => 200];
				}else{
					return ["error" => "Acceso Invalido", "errno" => 405];
				}
			}else{
				return ["error" => "Acceso Invalido", "errno" => 405];
			}
		}


		/**
		 * 
		 * Agrega un nuevo usuario si no existe el correo electronico en la tabla users
		 * @param array $form es un arreglo assoc con los datos del formulario
		 * @return array que posee códigos de error especiales 
		 * 
		 * */
		function register($nombre, $apellido, $telefono, $dni, $nacimiento, $email, $password, $tyc, $token_registro) {
		
			if ($tyc == 'on') {
				$tyc = 1;
			}else{
				$tyc = 0;
			}

			$avatar = 'https://cdn-icons-png.flaticon.com/512/6073/6073873.png';
			$fk_rango = '4';

			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$agregado = date('Y-m-d H:i:s');

			$email_disponible = $this->query("CALL emailDisponible('$email');");

			$email_disponible = $email_disponible[0]["COUNT(*)"];
		
			if (!$email_disponible) {
				$result = $this->query("INSERT INTO usuario (nombre, apellido, avatar, telefono, dni, nacimiento, FK_RANGO, tyc, email, password, agregado, token_registro)
				VALUES ('$nombre', '$apellido', '$avatar', '$telefono','$dni','$nacimiento', '$fk_rango', '$tyc','$email','$password', '$agregado', '$token_registro');");
				
				return ["error" => "Acceso valido", "errno" => 200];
	
			}else{
				return ["error" => "Error al registrar el usuario.", "errno" => 500];
			}
		}

		function buscarEmail($email){
			$result = $this->query("SELECT COUNT(*) FROM usuario WHERE email = '$email'");
			return $result;
		}

		function buscarPassword($password){
			$result = $this->query("SELECT COUNT(*) FROM usuario WHERE password = '$password'");
			return $result;
		}


		function enviarMailRegistro($email, $token){
			$motivo = "REGISTRO DE VERIFICACION";
			$contenido = "Por favor, haz clic en el siguiente enlace continuar el registro a Maproom:<a href='http://localhost/maproom/index.php?slug=register&email=". urlencode($email) ."&token=". urlencode($token) ."'>Registrarse</a>";
			sendmail($email, $motivo, $contenido);
			return true;
		}

		function verificar_token_registro($token) {
			$ssql = "SELECT * FROM usuario WHERE token_registro = '$token'";
			$result = $this->query($ssql);
			
			return $result;

		}

		function usuario_verificado($email){
			$ssql = "UPDATE usuario SET token_registro_verificado = 1 WHERE email = '$email'";
			$result = $this->query($ssql);
		}

		// GENERATE TOKEN
		function generar_token(){
			return bin2hex(random_bytes(16));
		}

		// STORE TOKEN
		function almacenar_token($email, $token){
			$ssql = "UPDATE usuario 
			SET token_password = '$token' 
			WHERE email = '$email'";
			$result = $this->query($ssql);
			$this->id = $this->db->insert_id;
		}

		// ENCODE PASSWORD
		function codificar_password($password){
			return md5($password.'maproom');
		}

		// SEND PASSWORD EMAIL
		function enviar_correo_password($email, $token) {
			$motivo = "COMPROBACION DE CUENTA";
			$contenido = "Por favor, haz clic en el siguiente enlace para cambiar tu contraseña: <a href='http://localhost/maproom/index.php?slug=newPassword&token=" . urlencode($token) . "'>Cambiar Contraseña</a>";
			sendmail($email, $motivo, $contenido);
			return true;
		}

		function password_disponible($password){
			$result = $this->query("SELECT COUNT(*) FROM usuario WHERE password = '$password'");
			$contador = $result[0]["COUNT(*)"];	
			if ($contador > 0) {
				return ["error" => "Acceso Invalido", "errno" => 405];
			}else{
				return ["error" => "Acceso valido", "errno" => 200];
			}
		}

		// VERIFY PASSWORD TOKEN
		function verificar_token_password($token) {
			$ssql = "SELECT email FROM usuario WHERE token_password = '$token'";
			$result = $this->query($ssql);			
			return ($result);		
		}

		// VERIFY PASSWORD
		function verificar_password($password1, $password2){
			if ($password1 == $password2) {
				return true;
			}else{
				return false;
			}
		}

		// CHANGE PASSWORD
		function cambiar_password($password, $email){
			$ssql = "UPDATE usuario 
			SET password = '$password'
			WHERE email = '$email'";
			$result = $this->query($ssql);
		}

		// ALMACENA TOKEN DE RANGO
		function almacenar_token_rango($email, $token){
			$ssql = "UPDATE usuario 
			SET token_rango = '$token' 
			WHERE email = '$email'";
			$result = $this->query($ssql);
			$this->id = $this->db->insert_id;
		}

		// CHANGE RANK
		function cambiar_rango($email, $rango){
			$ssql = "UPDATE usuario 
			SET FK_RANGO = '$rango' 
			WHERE email = '$email'";
			$this -> query($ssql);
		}

		// SEND ASSIGNMENT EMAIL
		function enviar_correo_asignacion($email, $token, $rango){
			$motivo = "ASIGNACION DE CUENTA";
			$contenido = "Hola $email, le queremos informar que la institucion 'nombre de insitucion' le invita a ser de rango $rango en dicha institucion, si desea aceptar este nuevo rango presionar el boton <a href='http://localhost/maproom/index.php?slug=newRange&token=" . urlencode($token) . "&rango=". urlencode($rango) ."'>ACEPTAR RANGO</a>";	
			sendmail($email, $motivo, $contenido);
			return true;
		}
	
		// VERIFY RANGE TOKEN
		function verificar_token_rango($token) {
			$ssql = "SELECT email FROM usuario WHERE token_rango = '$token'";
			$result = $this->query($ssql);
			return ($result);		
		}

		// SEND VERIFICATION EMAIL
		function enviar_correo_verificacion($email, $token){
			$motivo = "COMPROBACION DE CUENTA";
			$contenido = "Por favor, haz clic en el siguiente enlace para verificar tu correo electrónico:\n<a href='http:/localhost/maproom/controllers/registerController.php?token='".urlencode($token).'">Continuar Registro</a>';
			sendmail($email, $motivo, $mensaje);
		}

		// EXTRACT INSTITUTION DATA
		function extraer_datos_institucion(){
			$ssql = "SELECT 
    		solicitudes.nombre AS Nombre_Institucion,
    		solicitudes.imagen AS Imagen_Institucion,
    		pais.nombre AS Pais_Institucion,
    		provincia.nombre AS Provincia_Institucion,
			usuario.nombre AS Usuario_Institucion
			FROM solicitudes
			INNER JOIN pais ON solicitudes.FK_IDPAIS = pais.IDPAIS
			INNER JOIN provincia ON solicitudes.FK_IDPROVINCIA = provincia.IDPROVINCIA
			INNER JOIN usuario ON solicitudes.FK_IDUSUARIO = usuario.IDUSUARIO
			WHERE  ID_SOLICITUD = 1
			";
			$result = $this->query($ssql);
			return $result;
		}


		/**
		 * 
		 * Actualiza los datos del usuario con los datos de un formulario
		 * @param array $form es un arregle asociativo con los datos a actualizar
		 * @return array arreglo con el código de error y descripción
		 * 
		 * */

		 
		function update($form){
			
			$nombre = $form["txt_first_name"];
			$apellido = $form["txt_last_name"];
			$id = $this->IDUSUARIO;
			

			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$contrasenia = md5($form["txt_pass"]."maproom");
			$ssql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', WHERE IDUSUARIO=$id";

			$result = $this->query($ssql);

			return ["error" => "Se actualizo correctamente", "errno" => 200];
		}

		/**
		 * 
		 * Cantidad de usuarios registrados
		 * @return int cantidad de usuarios registrados
		 * 
		 * */
		function getCantUsers(){

			$result = $this->query("SELECT * FROM usuario");

			return $this->db->affected_rows;
		}

		/**
		 * 
		 * Ver institucion del usuario actual
		 * @return string nombre de institucion
		 * 
		 * */
		function verInstitucion($id){

			$result = $this->query ("SELECT nombre FROM institucion 
									INNER JOIN solicitudes ON solicitudes.ID_SOLICITUD = institucion.FK_IDSOLICITUD 
									WHERE FK_USUARIO = '$id'");
			
			return $result[0]["nombre"];
		}

		function getDispositivos($id){

			// Realizamos la consulta
			$ssql = "SELECT IDDISPOSITIVO, nombreDispositivo, estadoDispositivo, agregado, actualizado, borrado  
                           FROM dispositivo 
                           INNER JOIN institucion ON institucion.IDINSTITUCION = dispositivo.FK_INSTITUCION 
                           WHERE FK_USUARIO = '$id'";

			// Ejecutamos la consulta
			$result = $this->query($ssql);

			return $result; // Devuelve un array con los dispositivos y sus datos asociados
		}


		// trae todos los dispositivos 
		function all_dispositivo($id){
			$ssql = "SELECT dispositivo.*
			FROM dispositivo
			INNER JOIN institucion
			ON institucion.IDINSTITUCION = dispositivo.FK_INSTITUCION
			WHERE FK_USUARIO = '$id' ";
			
			$result = $this->query($ssql);
			return $result;
		}

		// Modifica el estado del dispositivo y el actualizado
		// function estado_dispositivo($estado, $actualizado, $id){
		// 	$ssql = "UPDATE dispositivo 
		// 	SET estadoDispositivo = '$estado', actualizado = '$actualizado' 
		// 	WHERE IDDISPOSITIVO = '$id' ";
		// 	$result = $this->query($ssql);
		// }

		function estado_dispositivo($estado, $actualizado, $id) {
			// Actualizar el estado del dispositivo
			$ssql = "UPDATE dispositivo 
					 SET estadoDispositivo = '$estado', actualizado = '$actualizado' 
					 WHERE IDDISPOSITIVO = '$id'";
			$result = $this->query($ssql);
			
			if ($result) {
				$idUsuario = $_SESSION["morphyx"]["user"]->IDUSUARIO; 
				$fkInstitucion = 2/* aquí deberías obtener el ID de la institución */;
				$nombreDispositivoQuery = "SELECT nombreDispositivo FROM dispositivo WHERE IDDISPOSITIVO = '$id'";
				$nombreDispositivoResult = $this->query($nombreDispositivoQuery);
				
				if ($nombreDispositivoResult && count($nombreDispositivoResult) > 0) {
					$nombreDispositivo = $nombreDispositivoResult[0]['nombreDispositivo'];
				} else {
					$nombreDispositivo = 'Desconocido';
				}
		
				$titulo = "Actualizar dispositivo";
				$descripcion = "El dispositivo '$nombreDispositivo' (ID: $id) ha sido actualizado a estado: $estado, desde el Panel Dispositivos";
				$titulo = $this->db->real_escape_string($titulo);
				$descripcion = $this->db->real_escape_string($descripcion);
				$agregado = $this->db->real_escape_string($actualizado);
				
				$logSql = "INSERT INTO actividad (FK_INSTITUCION, FK_USUARIO, FK_IDDISPOSITIVO, titulo, descripcion, agregado) 
						   VALUES ('$fkInstitucion', '$idUsuario', '$id', '$titulo', '$descripcion', '$agregado')";
		
				if (!$this->query($logSql)) {
					return ["success" => false, "message" => $this->db->error];
				} else {
					return ["success" => true, "message" => "Log guardado correctamente."];
				}
			} else {
				return ["success" => false, "message" => $this->db->error];
			}
		}

		
		// Modificar el Horario de Evento y cuando de modifico
		function agregar_evento($nombre, $descripcion, $FK_IDUSUARIO, $FK_IDINSTITUCION, $FK_IDDISPOSITIVO, $agregado, $diaEjecutar, $borrado){
			$ssql = "INSERT INTO evento (nombre, descripcion, FK_IDUSUARIO, FK_IDINSTITUCION, FK_IDDISPOSITIVO, eventoAgregado, diaEjecutar, borrado)
			VALUES ('$nombre', '$descripcion', '$FK_IDUSUARIO', '$FK_IDINSTITUCION', '$FK_IDDISPOSITIVO', '$agregado', '$diaEjecutar', '$borrado')	";
			$result = $this -> query($ssql);
		}

		function id_pais($pais){
			$ssql = "SELECT IDPAIS FROM pais WHERE pais.nombre = '$pais'";
			$result = $this->query($ssql);
			return $result;
		}

		function id_provincia($provincia){
			$ssql = "SELECT provincia.IDPROVINCIA FROM provincia WHERE provincia.nombre = '$provincia'";
			$result = $this->query($ssql);
			return $result;
		}

		function registrar_institucion($nombre_institucion, $imagen, $pais, $provincia, $user){
			$ssql = "INSERT INTO solicitudes (nombre, imagen, FK_IDPAIS, FK_IDPROVINCIA, FK_IDUSUARIO)
			VALUES ('$nombre_institucion', '$imagen','$pais','$provincia', '$user')";
			$result = $this -> query($ssql);
		}

		// Extraccion de datos de la tabla solicitudess
		function getSolicitud(){
			$ssql = "SELECT solicitudes.nombre AS nombre_institucion,
			solicitudes.imagen AS imagen_institucion,
			pais.nombre AS pais_institucion,
			provincia.nombre AS provincia_institucion,
			usuario.nombre AS usuario_institucion,
			solicitudes.FK_IDUSUARIO AS id_institucion,
			solicitudes.estadoSolicitud AS estado_institucion
			FROM solicitudes
			INNER JOIN pais ON solicitudes.FK_IDPAIS = pais.IDPAIS
			INNER JOIN provincia ON solicitudes.FK_IDPROVINCIA = provincia.IDPROVINCIA
			INNER JOIN usuario ON solicitudes.FK_IDUSUARIO = usuario.IDUSUARIO
			WHERE estadoSolicitud='pendiente'";

			$result = $this -> query($ssql);
			return $result;
		} 

		function evento_dispositivo($IDINSTITUCION){
			$ssql = "SELECT evento.IDEVENTO, evento.nombre, evento.descripcion, dispositivo.nombreDispositivo, evento.eventoAgregado, evento.diaEjecutar, FK_IDDISPOSITIVO
			FROM evento
			INNER JOIN dispositivo ON dispositivo.IDDISPOSITIVO = evento.FK_IDDISPOSITIVO
			WHERE FK_IDINSTITUCION = '$IDINSTITUCION'";
			$result = $this->query($ssql);			
			return $result;
		}

		function returnInstitucion($id, $respuesta){
			$ssql = "UPDATE solicitudes
			SET estadoSolicitud = '$respuesta' 
			WHERE FK_IDUSUARIO = $id";
			$result = $this -> query($ssql);
			return $result;
		}

		function id_institucion($id_usuario){
			$ssql = "SELECT institucion.IDINSTITUCION
			FROM institucion
			WHERE FK_USUARIO = '$id_usuario'";
			$result = $this -> query($ssql);
			return $result;
		}

		function modificar_evento($idEvento, $nombre, $descripcion, $idUser, $FK_IDINSTITUCION, $idDispositivo, $agregado, $diaEjecutar){
			$ssql = "UPDATE evento 
			SET nombre = '$nombre', descripcion = '$descripcion', FK_IDUSUARIO = '$idUser', FK_IDINSTITUCION = '$FK_IDINSTITUCION', FK_IDDISPOSITIVO = '$idDispositivo', eventoAgregado = '$agregado', diaEjecutar = '$diaEjecutar'
			WHERE IDEVENTO = '$idEvento'";
			$result = $this -> query($ssql);
			return $result;
		}

	}

	
	

 ?>