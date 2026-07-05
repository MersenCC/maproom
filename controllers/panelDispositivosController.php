<?php 

// Se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];

// Crea el objeto con la vista
$tpl = new Kiwi("panelDispositivos");

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si 'checkboxData' está en $_POST
    
    if (isset($_POST['checkboxData'])) {
        // Obtener los datos JSON de los checkboxes
        $checkboxDataJson = $_POST['checkboxData'];
        
        // Decodificar el JSON a un array asociativo
        $checkboxData = json_decode($checkboxDataJson, true);
        
        // Verificar si la decodificación fue exitosa
        if (json_last_error() === JSON_ERROR_NONE) {
            // Recorrer los datos decodificados
            foreach ($checkboxData as $key => $data) {
                // Solo procesar si el nombre empieza con 'estado_'
                if (strpos($key, 'estado_') === 0) {
                    // Obtener el ID del dispositivo
                    $idDispositivo = str_replace('estado_', '', $key);
                    
                    // Obtener el estado ('ON' o 'OFF') y convertir a '1' o '0'
                    $estado = $data['estado'] == 'ON' ? '1' : '0';
                    
                    // Obtener la fecha y hora específica del checkbox
                    $fechaHoraActual = $data['fechaHora'];

                    // Aquí puedes llamar a tu método para actualizar el estado
                    $usuario->estado_dispositivo($estado, $fechaHoraActual, $idDispositivo);
                }
            }
        } else {
            // Manejar errores de decodificación JSON
            echo "Error al decodificar JSON: " . json_last_error_msg();
        }
    } else {
        echo "No se recibió 'checkboxData'";
    }
}

// Guarda el ID del usuario actual
$idUser = $usuario->IDUSUARIO;

$dispositivosHtml = '';

$dispositivos = $usuario->getDispositivos($idUser);

foreach ($dispositivos as $dispositivo) {
    $estadoTexto = $dispositivo['estadoDispositivo'] ? 'ON' : 'OFF';
    $botonClase = $dispositivo['estadoDispositivo'] ? 'btnON' : 'btnOFF';
    $dispositivosHtml .= '<tr data-status="' . ($dispositivo['estadoDispositivo'] ? 'active' : 'inactive') . '">';
    $dispositivosHtml .= '<td> <span class="material-symbols-outlined">browse_activity</span></td>';
    $dispositivosHtml .= '<td>' . htmlspecialchars($dispositivo['nombreDispositivo']) . '</td>';
    $dispositivosHtml .= '<td>' . htmlspecialchars(date('jS M Y H:i:s', strtotime($dispositivo['actualizado']))) . '</td>';
    $dispositivosHtml .= '<td><input name="estado_'.htmlspecialchars($dispositivo['IDDISPOSITIVO']).'" value="'. htmlspecialchars($estadoTexto).'" onclick="handleCheckboxClick(this)" type="checkbox" class="get-button-status ' . $botonClase . '" id="device'. htmlspecialchars($dispositivo['IDDISPOSITIVO']) .'" data-device-id="'. htmlspecialchars($dispositivo['IDDISPOSITIVO']) .'" ' . ($dispositivo['estadoDispositivo'] ? 'checked' : '') . '> <label id="checkboxLabel" for="device'.htmlspecialchars($dispositivo['IDDISPOSITIVO']).'">' . $estadoTexto . '</label></td>';
    $dispositivosHtml .= '</tr>';
}

// Reemplaza las variables de la vista
$vars = [
    "AVATAR" => $usuario->avatar,
    "NOMBRE" => $usuario->nombre,
    "APELLIDO" => $usuario->apellido,
    "DISPOSITIVO" => $dispositivosHtml, // Insertar el HTML generado en la variable DISPOSITIVO
    "SIDEBAR" => $sidebarHtml,
    "PROJECT_SECTION" => "Panel dispositivos"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>
