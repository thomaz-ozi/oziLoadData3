<?php
// Define o tipo de conteúdo recebido
$contentType = $_SERVER["CONTENT_TYPE"] ?? '';

// Caso seja JSON
if (strpos($contentType, "application/json") !== false) {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
}
// Caso seja form-data ou x-www-form-urlencoded
else {
    $data = $_POST ?: $_GET;
}

// Agora $data contém os dados transmitidos de forma genérica
header("Content-Type: application/json; charset=utf-8");
echo json_encode([
    "status" => "ok",
    "recebido" => $data
]);
?>