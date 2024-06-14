<?php

if ($uri_endpoint === '/planet/{id}' and $http_method === 'DELETE') {

    $stmt = $bdd->prepare('DELETE FROM WHERE $id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $astronomical_object = $reponse->fetchAll();
    echo json_encode('Effacé avec succès');
}