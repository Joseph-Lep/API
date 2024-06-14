<?php

if ($uri_endpoint === '/planet' and $http_method === 'PUT') { // PATCH Fusionne les infos au lieu de les détruire

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

    $stmt = $bdd->prepare('UPDATE astronomical_object SET name = :name, type_corps = :type_corps, diameter = :diameter, mass = :mass WHERE id = :id');

    $result = $stmt->execute([
        'name' => $arrayContent['name'],
        'type_corps' => $arrayContent['type_corps'],
        'diameter' => $arrayContent['diameter'],
        'mass' => $arrayContent['mass']
    ]);

    if ($result === false) {
        http_response_code(500);
        echo json_encode(['Erreur' => 'Une erreur est survenue']);
        exit;
    }

    http_response_code(201); // CREATED

    $id = $bdd->lastInsertId();
    echo json_encode([
        'uri' => 'addbdd.php?id=' . '$id', // Uniform ressource identifier
        'id' => $id,
        'name' => $arrayContent['name'],
        'type_corps' => $arrayContent['type_corps'],
        'diameter' => $arrayContent['diameter'],
        'mass' => $arrayContent['mass']
    ]);
}