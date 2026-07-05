<?php
include_once 'User.php'; // Asegúrate de que la ruta sea correcta

header('Content-Type: application/json');

try {
    // Crear una instancia de la clase User
    $user = new User();

    // Verifica el tipo de solicitud
    $method = $_SERVER['REQUEST_METHOD'];

    if ($method == 'GET') {
        // Maneja la solicitud GET para obtener los dispositivos
        $idUsuario = 1; // Cambia esto por el ID del usuario real si es necesario

        // Obtén los dispositivos
        $dispositivos = $user->getDispositivos($idUsuario);

        // Prepara la respuesta
        $response = array();
        foreach ($dispositivos as $dispositivo) {
            $response[] = array(
                'id' => $dispositivo['IDDISPOSITIVO'],
                'nombre' => $dispositivo['nombreDispositivo'],
                'estado' => $dispositivo['estadoDispositivo']
            );
        }

        // Enviar la respuesta en formato JSON
        echo json_encode($response);

    } elseif ($method == 'POST') {
        // Maneja la solicitud POST para actualizar el estado del dispositivo
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['deviceId']) && isset($data['estadoDispositivo'])) {
            $deviceId = $data['deviceId'];
            $estadoDispositivo = $data['estadoDispositivo'];

            // Actualiza el estado del dispositivo
            $updateSuccess = $user->cambiarDispositivo($deviceId, $estadoDispositivo);

            if ($updateSuccess) {
                // Envía una respuesta de éxito
                echo json_encode(array('status' => 'success', 'message' => 'Estado del dispositivo actualizado'));
            } else {
                // Envía una respuesta de error
                echo json_encode(array('status' => 'error', 'message' => 'Error al actualizar el estado'));
            }
        } else {
            // Datos incompletos
            echo json_encode(array('status' => 'error', 'message' => 'Datos incompletos'));
        }
    } else {
        // Método no permitido
        header("HTTP/1.1 405 Method Not Allowed");
        echo json_encode(array('status' => 'error', 'message' => 'Método no permitido'));
    }
} catch (Exception $e) {
    // Captura cualquier excepción y devuelve un mensaje de error
    echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
}

?>
