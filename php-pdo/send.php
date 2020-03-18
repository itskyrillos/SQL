<?php

$ville = $_POST["ville"];
$haut = $_POST["haut"];
$bas = $_POST["bas"];
$send = $_POST["send"];

if (
    isset($ville,
    $haut,
    $bas,
    $send)
) {
    try {

        $pdo = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'root');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $data = $pdo->prepare("INSERT INTO Météo (ville, haut, bas) VALUES (:ville, :haut, :bas)");

        $data->bindParam(":ville", $ville);
        $data->bindParam(":haut", $haut);
        $data->bindParam(":bas", $bas);

        $data->execute();

        // if ($pdo->query($data)) {
        //     echo "<script type='text/javascript'>alert('Nouvelles données correctement envoyées.');</script>";
        // } else {
        //     echo "<script type='text/javascript'>alert('Erreur');</script>";
        // }
        header('Location: index.php');
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }

    $pdo = null;
}
