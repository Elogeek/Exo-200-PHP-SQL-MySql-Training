<?php
require_once "include.php";


$search = $db->prepare("DELETE FROM hiking WHERE id = $rando");

$state = $search->execute();

if($state) {
    header("location: read.php?post=ok");
}
else {
    header("location: read.php?post=notOk");
}

