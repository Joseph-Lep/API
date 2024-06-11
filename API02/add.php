<?php

set_exception_handler(function (Throwable $exception) {
    http_response_code(500); // Internal server error
    echo json_encode([
        'Error' => 'Une erreur est survenue'
    ]);
});

require_once ('connectDB.php');
header('Content-Type: application/json; charset=utf-8');
header("Acces-Control-Allow-Origin: *");

$bdd = ConnectDB();
configPdo($bdd);

if (isset($_POST['id'])) {
    json_decode($id = $_POST['id']);

    if (!empty($id)) {
        echo json_encode(['Succes' => 'OK']);
        $reponse = $bdd->query('INSERT INTO astronomical_object(id, name, ');
        $astronomical_object = $reponse->fetchAll();
    }
}

