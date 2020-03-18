<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "weatherapp";

$key = $_POST["delete"];

if (isset($key)) {
    try {
        $conn = new PDO('mysql:host=$servername;dbname=$dbname;charset=utf8', $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM Météo WHERE id = $key";

        print_r($sql);
        exit();

        $conn->exec($sql);

        header('Location: index.php');
    } catch (PDOException $e) {

        echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;
