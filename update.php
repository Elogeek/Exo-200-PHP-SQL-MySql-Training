<?php
require_once 'include.php';

$server ='localhost';
$db = 'exo_200';
$user = 'root';
$pass ='dev';
$id = '51';
$difficulty ='extrême';

try {

    $connect = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sth = $connect->prepare("UPDATE hiking SET difficulty = :difficulty WHERE id = :id");

    $sth->bindParam(':id', $id);
    $sth->bindParam(':difficulty', $difficulty);
    $sth->execute();
    if($sth->rowCount() < 51) {
        echo "La randonnée est bien modifiée!";
    }
    else {
       echo "Aucune randonnée modifiée!";
    }

}
catch (PDOExeption $exeption){
    echo "Erreur" . $exeption->getMessage();
}