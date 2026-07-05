<?php 
// se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];
$inst = new Institucion();
// crea el objeto con la vista
$tpl = new Kiwi("panelTeam");

// SIDEBAR
$sidebarHtml = '';

foreach ($vars['vistas_permitidas'] as $vista) {
	$sidebarHtml .= '<a href="' . htmlspecialchars($vista) . '">';
	$sidebarHtml .= '<i class="fas fa-' . $vista . '"></i>'; // Obtén el ícono según la vista
	$sidebarHtml .= '<span>' . ucfirst($vista) . '</span>'; // Usa ucfirst para capitalizar la primera letra
	$sidebarHtml .= '</a>';
}

// carga la vista
$tpl->loadTPL();

// Guarda el ID del usuario actual
$idUser = $usuario->IDUSUARIO;

$dispositivosHtml = '';

$dispositivos = $inst->allTeam(2);

foreach ($dispositivos as $dispositivo) {
    $dispositivosHtml .= '<tr>';
    $dispositivosHtml .= '<td> <span class="material-symbols-outlined">admin_panel_settings</span></td>';
    $dispositivosHtml .= '<td>' . htmlspecialchars($dispositivo['rango_name']) . '</td>';
    $dispositivosHtml .= '<td>' . htmlspecialchars($dispositivo['nombre_user']) . ' ' . htmlspecialchars($dispositivo['apellido']) . '</td>';

    // Crear un formulario para enviar el ID del grupo
    $dispositivosHtml .= '<td>';
    $dispositivosHtml .= '<form method="POST" action="">';
    $dispositivosHtml .= '<input type="hidden" name="id_grupo" value="' . htmlspecialchars($dispositivo['IDGRUPO']) . '">';
    $dispositivosHtml .= '<button type="submit" class="delete-button">';
    $dispositivosHtml .= '<svg class="delete-svgIcon" viewBox="0 0 448 512">';
    $dispositivosHtml .= '<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>';
    $dispositivosHtml .= '</svg>';
    $dispositivosHtml .= '</button>';
    $dispositivosHtml .= '</form>';
    $dispositivosHtml .= '</td>';

    $dispositivosHtml .= '</tr>';
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_grupo'])) {
    $idGrupo = $_POST['id_grupo'];

    // Llamar a la función PHP que elimina el equipo
    $inst->deleteTeam($idGrupo);

    // Redirigir a la misma página después de la eliminación para evitar el reenvío del formulario
    header("Location: panelTeam");
    exit();
}


// Reemplaza las variables de la vista
$vars = [
    "AVATAR" => $usuario->avatar,
    "NOMBRE" => $usuario->nombre,
    "APELLIDO" => $usuario->apellido,
    "TEAM" => $dispositivosHtml, // Insertar el HTML generado en la variable DISPOSITIVO
    "SIDEBAR" => $sidebarHtml,
    "PROJECT_SECTION" => "Panel equipo"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

 ?>