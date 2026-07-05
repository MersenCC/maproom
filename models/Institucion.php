<?php 

	// incluye la libreria para conectar con la db
	include_once 'DBAbstract.php';
	include_once './mp-mailer-master/libsendmail.php';

	// se crea la clase User que hereda de DBAbstract
	class Institucion extends DBAbstract{

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
			$result = $this->query('DESCRIBE institucion');

			foreach ($result as $key => $row) {
				$buff =$row["Field"];
				
				/**< Almacena los nombres de los campos*/
				$this->nameOfFields[] = $buff;

				/**< Autocarga de atributos a la clase */
				$this->$buff=NULL;
			}
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

		function evento_dispositivo($id){
			
			$ssql = "SELECT IDDISPOSITIVO, nombreDispositivo, fecha_evento_asignado, hora_evento
			FROM dispositivo
			INNER JOIN institucion
			ON institucion.IDINSTITUCION = dispositivo.FK_INSTITUCION
			WHERE FK_USUARIO = '$id'
			AND (fecha_evento_asignado != '0000-00-00 00:00:00' OR fecha_evento_asignado IS NOT NULL)
			AND (hora_evento != '0000-00-00 00:00:00' OR hora_evento IS NOT NULL) ";

			$result = $this->query($ssql);
			return $result;
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
		function estado_dispositivo($estado, $actualizado, $id){
			$ssql = "UPDATE dispositivo 
			SET estadoDispositivo = '$estado', actualizado = '$actualizado' 
			WHERE IDDISPOSITIVO = '$id' ";
			$result = $this->query($ssql);
		}

		// Modificar el Horario de Evento y cuando de modifico
		function event_devices($id, $horario, $actualizado){
			$ssql = "UPDATE dispositivo
			SET fecha_evento_asignado = '$actualizado', hora_evento = '$horario'
			WHERE IDDISPOSITIVO = '$id' ";
			$result = $this -> query($ssql);
		}

		// trae todo el equipo de una institucion 
		function allTeam($id){
			$ssql = "SELECT grupoinstitucion.FK_ID_USUARIO, grupoinstitucion.IDGRUPO, grupoinstitucion.FK_ID_INSTITUCION, usuario.nombre AS nombre_user, usuario.apellido, usuario.FK_RANGO, rango.nombre AS rango_name FROM grupoinstitucion
			INNER JOIN usuario
			ON usuario.IDUSUARIO = grupoinstitucion.FK_ID_USUARIO
			INNER JOIN rango
			ON rango.IDRANGO = usuario.FK_RANGO
			WHERE FK_ID_INSTITUCION = '$id' ";
			
			$result = $this->query($ssql);
			return $result;
		}

		function deleteTeam($id){
			$ssql = "DELETE FROM grupoinstitucion WHERE IDGRUPO = '$id'";
			$result = $this->query($ssql);
			return $result;
		}

	}

	
	

 ?>