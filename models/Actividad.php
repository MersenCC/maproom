<?php 

	// incluye la libreria para conectar con la db
	include_once 'DBAbstract.php';

	// se crea la clase User que hereda de DBAbstract
	class Actividad extends DBAbstract{

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
			$result = $this->query('DESCRIBE actividad');

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
		function getAllActivity() {
            $ssql = "SELECT 
                u.avatar, 
                u.nombre, 
                u.apellido, 
                a.titulo, 
                a.descripcion, 
                a.agregado, 
                i.IDINSTITUCION 
            FROM 
                actividad a 
            INNER JOIN 
                institucion i ON i.IDINSTITUCION = a.FK_INSTITUCION 
            INNER JOIN 
                usuario u ON u.IDUSUARIO = a.FK_USUARIO 
            WHERE 
                i.IDINSTITUCION = 2";
        
            // Ejecutamos la consulta
            $result = $this->query($ssql);
        
            // Formateamos los resultados como un string
            $activities = '';
            foreach ($result as $row) {
                // Dividir la descripción en líneas
                $lineas = explode("\n", $row['descripcion']);
                
                // Construir la lista de elementos <li>
                $descripcionList = '';
                foreach ($lineas as $linea) {
                    // Solo agregamos líneas no vacías
                    if (trim($linea) !== '') {
                        $descripcionList .= "<li>" . htmlspecialchars($linea) . "</li>";
                    }
                }
        
                $activities .= "<div class='log-entry'>
                    <div class='log-header' onclick='toggleDetails(this)'>
                        <span class='user-icon'><img src='{$row['avatar']}' class='user-icon'></span>
                        <div class='log-info'>

                            <span class='username'>" . htmlspecialchars($row['nombre']) . " " . htmlspecialchars($row['apellido']) . "</span> ha realizado la acción 
                            <span class='invite-code' style='color: " . 
                                ($row['titulo'] === "Actualizar dispositivo" ? "var(--Verde)" : 
                                ($row['titulo'] === "Creo evento" ? "var(--Amarillo)" : 
                                ($row['titulo'] === "Eliminar miembro" ? "var(--Rojo)" : "inherit"))) . ";'> 
                                " . htmlspecialchars($row['titulo']) . "
                            </span>
                            
                            <div class='date'>{$row['agregado']}</div>
                        </div>
                        <span class='toggle-icon material-symbols-outlined'>
                            arrow_forward_ios
                        </span>
                    </div>
                    <div class='log-details'>
                        <ol>
                            $descripcionList
                        </ol>
                    </div>
                </div>";

            }
        
            return $activities; // Devuelve todos los registros formateados
        }
    }
       
    
 ?>