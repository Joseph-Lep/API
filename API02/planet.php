<?php

set_exception_handler(function (Throwable $exception) {
    http_response_code(500); // Internal server error
    echo json_encode([
        'Error' => 'Une erreur est survenue'
    ]);
});

require_once ('connectDB.php');
header('Content-Type: application/json; charset=utf-8');
// Je défini le type de données attendues
// todo content type xml
header("Acces-Control-Allow-Origin: *");
// Je défini l'autorisation d'accès à tte route

$bdd = ConnectDB();
configPdo($bdd);
$reponse = $bdd->query('SELECT * FROM astronomical_object');
$astronomical_object = $reponse->fetchAll();

// 4XX est un code erreur coté client

if (!isset($_GET['id'])) {
    http_response_code(400); // Bad request
    echo json_encode(['Error' => 'ID obligatoire']);
    exit;
}

$id = intval($_GET['id']);

if ($id === 0) {
    http_response_code(400);
    echo json_encode(['Error' => 'T\'est un Zero']);
    exit;
}

if (!isset($id)) {
    http_response_code(404);
    echo json_encode(['Error' => 'L\'ID n\'existe pas']);
    exit;
}
$name = $_GET['id'];
