<?php 

// Se muestra el contenido de SESSION (para debug)
$tpl = new Kiwi("choque");

// Crea el objeto con la vista
$tpl = new Kiwi("avisoEmail");

// Carga la vista
$tpl->loadTPL();

// Reemplaza las variables de la vista
$vars = [
	"PROJECT_SECTION" => "Aviso Email"
];

// Se pasan las variables a la vista
$tpl->setVarsTPL($vars);

// Imprime en pantalla la página
$tpl->printTPL();

?>