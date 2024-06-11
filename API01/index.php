<?php
header('Content-Type: application/json; charset=UTF-8');
// Type MIME (permet d'appeler un contenu de fichier)
// Par ex: par défaut sur un navigateur c'est text/HTML qui est appelé
// Ici on appelle application/json
header('Access-Control-Allow-Origin: http://127.0.0.1:5500');
// J'autorise l'accès aux requetes venant de 5500 sinon le navigateur bloque le renvoi des infos
// car leur origine n'est pas autorisée coté serveur
require_once 'users.php';

// Je veux pouvoir obtenir mes données sous un format plus brut. Le format JSON
// Tt format Json est une string
echo json_encode($users);
