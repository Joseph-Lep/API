<?php

function ConnectDB()
{
    try {

        $host = "localhost";
        $databasename = "space";
        $user = "root";
        $password = "";

        return new PDO('mysql:host=' . $host . ';dbname=' . $databasename . ';charset=utf8', $user, $password);
    } catch (Exception $e) {
        echo ("EXPLOSION !" . $e->getMessage());
        exit();
    }
}

function configPdo(PDO $bdd)
{
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}
