<?php

set_exception_handler(function (Throwable $exception) {
    http_response_code(500); // Internal server error
    echo json_encode([
        'Error' => 'Une erreur est survenue'
    ]);
});

require_once ('connectDB.php');

$bdd = ConnectDB();
configPdo($bdd);
$http_method = $_SERVER['REQUEST_METHOD']; // Je récupère la méthode dans le head de la requette
$uri_endpoint = $_SERVER['REQUEST_URI']; // Je récupère l'URI et son get
// PATH_INFO -> clear les requetes get après l'uri
header("Acces-Control-Allow-Origin: *"); // Tout point d'entrée est autorisé
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // les méthodes suivantes sont autorisés.
header('Content-Type: application/json; charset=utf-8'); // Type de contenu retourné


require_once ('Get.php');
require_once ('Post.php');
require_once ('Put.php');
require_once ('Delete.php');

// todo factoriser les feedback en cas d'erreur ou de réussite 
// todo factoriser JSON décode + factoriser required fields
