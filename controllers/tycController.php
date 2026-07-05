<?php
// crea un usuario
$users = new User();

// crea el objeto con la vista
$tpl = new Kiwi("tyc");

// carga la vista
$tpl->loadTPL();

// leer el archivo CSV y generar contenido dinámico
$terms_conditions = '';
$index = '';

if (($file = fopen('views/static/files/t&d.csv', 'r')) !== FALSE) {
    $x = 1;
    while (($line = fgets($file)) !== FALSE) {
        $row = explode('-', $line);

        // Asegurarse de que $row tenga al menos 3 elementos
        if (count($row) >= 3) {
            $terms_conditions .= "<p id='$row[0]'><b>$row[1]</b><hr>$row[2]</p>\n";
            $index .= "<a href='#$row[0]'>$x. $row[1]</a>\n";
            $x++;
        }
    }
    fclose($file);
}

// array para pasar variables a la vista
$vars = [
    "LAST_MOD" => "30/05/2024",
    "TERMS_CONDITIONS" => $terms_conditions,
    "INDEX" => $index,
    "PROJECT_SECTION" => "TyC"
];

// reemplaza las variables en la vista
$tpl->setVarsTPL($vars);

// imprime en la página la vista
$tpl->printTPL();

?>
