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
    $sth = $connect->prepare("DELETE FROM hiking WHERE id");
    $sth->execute();
}
catch (PDOExeption $exeption){
    echo "Erreur" . $exeption->getMessage();
}