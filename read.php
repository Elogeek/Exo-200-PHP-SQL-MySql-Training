<?php
require_once 'include.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/basics.css">
    <title>Document</title>
</head>
<body>

<?php
if (isset($_GET['post']) && $_GET['post'] == "ok") {
    echo "<div class='succes'>Base de données mise à jour</div>";
} elseif (isset($_GET['post']) && $_GET['post'] == "notOk") {
    echo "<div class='error'>Echec de la mise à jour</div>";
}

$search = $db->prepare("SELECT * FROM hiking");

$state = $search->execute();

if ($state) {
    $randos = [];
    foreach ($search->fetchAll() as $item) {
        $randos[] = new Rando($item['id'], $item['name'], $item['difficulty'], $item['distance'], $item['duration'], $item['height_difference'], $item['available']);
    }
}
echo "<table><tr><th>Id</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height difference</th><th>Available</th></tr>";
foreach ($randos as $rando) {

    echo "<tr><td>" . $rando->getId() . "</td><td>" . $rando->getName() . "</td><td>" . $rando->getDifficulty() .
        "</td><td>" . $rando->getDistance() . " Km</td><td>" . $rando->getDuration() . "</td><td>" . $rando->getHeightDifference() .
        " m</td><td>" . $rando->getAvailable() . "</td><td><a href='update.php?hiking=$modif'>Modifier</a></td><td><a href='delete.php?hiking=$modif'>Supprimer</a></td></tr>";
}
echo "</table>";
?>
</body>
</html>