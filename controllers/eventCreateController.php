<?php 

// Se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];

// Crea el objeto con la vista
$tpl = new Kiwi("eventCreate");

	// SIDEBAR
	$sidebarHtml = '';

	foreach ($vars['vistas_permitidas'] as $vista) {
		$sidebarHtml .= '<a href="' . htmlspecialchars($vista) . '">';
		$sidebarHtml .= '<i class="fas fa-' . $vista . '"></i>'; // Obtén el ícono según la vista
		$sidebarHtml .= '<span>' . ucfirst($vista) . '</span>'; // Usa ucfirst para capitalizar la primera letra
		$sidebarHtml .= '</a>';
	}

// Carga la vista
$tpl->loadTPL();

// Guarda el ID del usuario actual
$idUser = $usuario->IDUSUARIO;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if(isset($_POST['guardar_horario'])){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $agregado = date('Y-m-d H:i:s');
        // Asignamos los valores a sus variables
        $diaEjecutar = $_POST['horario'];
        $dispositivo = $_POST['dispositivo'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $borrado = date('Y-m-d H:m:s');
        // Obtener el ID del dispositivo
        $idDispositivo = preg_replace('/\D/', '', $dispositivo);

        $institucion = $usuario -> id_institucion($idUser);
        $FK_IDINSTITUCION = $institucion[0]["IDINSTITUCION"];

        if ($_POST["idEvento"] === "null") {
            $usuario -> agregar_evento($nombre, $descripcion, $idUser, $FK_IDINSTITUCION, $idDispositivo, $agregado, $diaEjecutar, NULL);
        }else{
            $idEvento = $_POST['idEvento'];
            $usuario -> modificar_evento($idEvento, $nombre, $descripcion, $idUser, $FK_IDINSTITUCION, $idDispositivo, $agregado, $diaEjecutar);
        }
        $queryString = $_SERVER['REDIRECT_QUERY_STRING'];

        parse_str($queryString, $queryArray);
        // Ahora puedes acceder al valor de 'slug'
        $slug = isset($queryArray['slug']) ? $queryArray['slug'] : null;

        header("Location: " . $slug);
    }
}

// MOSTRAR DISPOSITIVOS QUE TIENEN EVENTOS ASIGNADOS
$eventosHtml = '';

$FK_IDINSTITUCION = $usuario -> id_institucion($idUser);

$FK_IDINSTITUCION = $FK_IDINSTITUCION[0]["IDINSTITUCION"];

$eventos = $usuario->evento_dispositivo($FK_IDINSTITUCION);

foreach ($eventos as $evento) {
    $eventosHtml .= '<tr>';
    $eventosHtml .= '<td> <span class="material-symbols-outlined">browse_activity</span></td>';
    $eventosHtml .= '<td>' . htmlspecialchars($evento['nombreDispositivo']) . '</td>';
    $eventosHtml .= '<td>' . htmlspecialchars($evento['nombre']) . '</td>';
    $eventosHtml .= '<td>' . htmlspecialchars($evento['descripcion']) . '</td>';
    $eventosHtml .= '<td>' . $evento['eventoAgregado'] . '</td>';
    $eventosHtml .= '<td>' . $evento['diaEjecutar'] . '</td>';
    $eventosHtml .= '<td ><button name="'.htmlspecialchars($evento['nombreDispositivo']).'" dataEventoId = "'.htmlspecialchars($evento["IDEVENTO"]).'" onclick="assign_event(this)" id="device_'.htmlspecialchars($evento["FK_IDDISPOSITIVO"]).'">Cambiar Evento</button></td>';
    $eventosHtml .= '</tr>';
}


// MOSTRAR TODOS LOS DISPOSITIVOS PARA ASIGNAR EVENTOSs
$all_devices = '';

$dispositivos = $usuario -> all_dispositivo($idUser);

foreach ($dispositivos as $dispositivo) {
    $all_devices .= '<tr>';
    $all_devices .= '<td> <span class="material-symbols-outlined">browse_activity</span></td>';
    $all_devices .= '<td>' . htmlspecialchars($dispositivo['nombreDispositivo']) . '</td>';
    $all_devices .= '<td><button name="'.htmlspecialchars($dispositivo['nombreDispositivo']).'" onclick="assign_event(this)" id="device_'.htmlspecialchars($dispositivo["IDDISPOSITIVO"]).'">Asignar Evento</button></td>';
    $all_devices .= '</tr>';
}

// Reemplaza las variables de la vista
$vars = [
    "AVATAR" => $usuario->avatar,
    "NOMBRE" => $usuario->nombre,
    "APELLIDO" => $usuario->apellido,
    "EVENTO" => $eventosHtml,
    "SIDEBAR" => $sidebarHtml,
    "ALL_DEVICES" => $all_devices, // Insertar el HTML generado en la variable DISPOSITIVO
    "PROJECT_SECTION" => "Crear evento"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>