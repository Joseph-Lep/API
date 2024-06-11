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
// var_dump($astronomical_object);

echo json_encode($astronomical_object);
// Le serveur doit echo les données qu'il veux envoyer



