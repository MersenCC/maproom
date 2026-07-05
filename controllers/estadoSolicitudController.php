<?php 

// Se muestra el contenido de SESSION (para debug)
$usuario = $_SESSION["morphyx"]["user"];

// Crea el objeto con la vista
$tpl = new Kiwi("estadoSolicitud");

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
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Debugging: Verifica qué contiene $data
    var_dump($data); 
	$institucionId=$data["institucionId"];
	$institucionValue=strtolower($data["institucionValue"]);
	$usuario -> returnInstitucion($institucionId, $institucionValue); 
    exit();
}



$solicitudesHtml = '';

$solicitudes = $usuario->getSolicitud();


foreach ($solicitudes as $solicitud) {
	// var_dump($solicitud);
	// exit();
	$solicitudesHtml .= '<article class="ins">';
	$solicitudesHtml .= '<div class="imagen_ins">';
	$solicitudesHtml .= '<img  src="'. htmlspecialchars($solicitud['imagen_institucion']) .'" alt="">';
	$solicitudesHtml .= '</div>';
	$solicitudesHtml .= '<div class="desc_ins">';
	$solicitudesHtml .= '<h3>'. htmlspecialchars($solicitud['nombre_institucion']) .'</h3>';
	$solicitudesHtml .= '<h5 class="gris_txt">';
	$solicitudesHtml .= '<p> Pais: '. htmlspecialchars($solicitud['pais_institucion']) .'</p>';
	$solicitudesHtml .= '<p> Provincia: '. htmlspecialchars($solicitud['provincia_institucion']) .'</p>';
	$solicitudesHtml .= '<p> Director: '. htmlspecialchars($solicitud['usuario_institucion']) .'</p>';
	$solicitudesHtml .= '</h5>';
	$solicitudesHtml .= '<div class="botones">';
	$solicitudesHtml .= '<div class="btn_aceptar">';
	$solicitudesHtml .= '<button onclick="hola(this)" value = "Aceptado" id=("'.$solicitud["id_institucion"].'")>ACEPTAR</button>';
	$solicitudesHtml .= '</div>';
	$solicitudesHtml .= '<div class="btn_denegar">';
	$solicitudesHtml .= '<button onclick="hola(this)" value = "Rechazado" id=("'.$solicitud["id_institucion"].'")>RECHAZAR</button>';
	$solicitudesHtml .= '</div>';
	$solicitudesHtml .= '</div>';
	$solicitudesHtml .= '</div>';
	$solicitudesHtml .= '</article>';
}


// Reemplaza las variables de la vista
$vars = [
    "AVATAR" => $usuario->avatar,
    "NOMBRE" => $usuario->nombre,
    "APELLIDO" => $usuario->apellido,
	"SOLICITUD" => $solicitudesHtml,
	"SIDEBAR" => $sidebarHtml,
	"PROJECT_SECTION" => "Estado Solicitud"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>
