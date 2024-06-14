<?php

require_once ('connectDB.php');

set_exception_handler(function (Throwable $exception) {
    http_response_code(500); // Internal server error
    echo json_encode([
        'Error' => 'Une erreur est survenue'
    ]);
});

$bdd = ConnectDB();
configPdo($bdd);

header('Content-Type: application/json; charset=utf-8');
header("Acces-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

$requestRawContent = file_get_contents('php://input');
$arrayContent = json_decode($requestRawContent, true);

$requirefields = ['name', 'type_corps', 'diameter', 'mass'];
$errors = [];
foreach ($requirefields as $requirefield) {
    if (!isset($arrayContent[$requirefield])) {
        $errors[] = [$requirefield => "Le Champ $requirefield est obligatoire"];
    }
}

if (count($errors) > 0) {
    http_response_code(422); // Unprocessable entity
    echo json_encode($errors);
    exit;
}

$stmt = $pdo->prepare('INSERT INTO astronomical_object (name, type_corps, diameter, mass) VALUES (:name, :type_corps, :diameter, :mass)');

$result = $stmt->execute([
    'name' => $arrayContent['$name'],
    'type_corps' => $arrayContent['$type_corps'],
    'diameter' => $arrayContent['$diameter'],
    'mass' => $arrayContent['$mass']
]);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['Erreur' => 'Une erreur est survenue']);
    exit;
}

http_response_code(201); // CREATED

$id = $pdo->lastInsertId([
    'uri' => 'addbdd.php?id=' . '$id', // Uniform ressource identifier
    'id' => $id,
    'name' => $arrayContent['$name'],
    'type_corps' => $arrayContent['$type_corps'],
    'diameter' => $arrayContent['$diameter'],
    'mass' => $arrayContent['$mass']
]);