<?php
require_once 'include.php';
$server ='localhost';
$db = 'exo_200';
$user = 'root';
$pass ='dev';

try {
    $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $stmt = $connect->prepare("SELECT * FROM hiking");
    $result = $stmt->execute();
    if($result) {
        echo "<pre>";
        print_r($stmt->fetchAll());
        echo "</pre>";
    }
}

catch(PDOException $exception) {
    echo $exception->getMessage();
}
