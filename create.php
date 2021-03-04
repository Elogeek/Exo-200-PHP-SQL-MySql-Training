<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/basics.css">
    <title>Randonnées, ajout</title>
</head>
<body>
    <form action="read.php">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance" placeholder="km">
        <input type="number" name="time" placeholder="temps de la rando">
        <input type="number" name="height_difference" placeholder="dénivelé">
        <button type="button" id="deleteRando">supprimer</button>
    </form>
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

        $name = "La forêt de Mare Longue";
        $difficulty = "facile";
        $distance= "1.9";
        $duration = "00:01:30";
        $height_difference = "110";

        $sth = $connect->prepare("INSERT INTO hiking(name,difficulty,distance,duration,height_difference)
                                           VALUES(:name,:difficulty,:distance,:duration,:height_difference) ");
        $sth->execute([
             ':name'=> $name,
             ':difficulty'=> $difficulty,
             ':distance' => $distance,
             ':duration' => $duration,
             ':height_difference' => $height_difference
        ]);
        echo '<div id="succes">' ."La randonnée a été ajoutée avec succès." .'</div>';
                                                                                       
    }
    catch (PDOExeption $exeption){
        echo "Erreur" . $exeption->getMessage();
     }
?>
</body>
</html>