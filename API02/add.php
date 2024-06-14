<?php

set_exception_handler(function (Throwable $exception) {
    http_response_code(500); // Internal server error
    echo json_encode([
        'Error' => 'Une erreur est survenue'
    ]);
});

// require_once ('connectDB.php');
header('Content-Type: application/json; charset=utf-8');
header("Acces-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Les données POST ont plusieurs formats. Celui par défaut est 'form-data' et l'on veux récuperer le format 'raw' -> On utilise donc 'php://input' pour lire les données brutes du corps la requete. Il nous faut ensuite pouvoir lire le format JSON, pour cela on utilise 'json_decode' suivi de 'file_get_contents'
$requestRawContent = json_decode(file_get_contents('php://input'), true);
var_dump($requestRawContent);



// $bdd = ConnectDB();
// configPdo($bdd);

// if (isset($_POST['id'])) {
//     json_decode($id = $_POST['id']);

//     if (!empty($id)) {
//         echo json_encode(['Succes' => 'OK']);
//         $reponse = $bdd->query('INSERT INTO astronomical_object(id, name, ');
//         $astronomical_object = $reponse->fetchAll();
//     }
// }