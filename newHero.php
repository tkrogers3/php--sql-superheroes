<?php
require "connection.php";
$method = $_POST["method"];

$heroName = $_POST["heroName"];
$aboutMe= $_POST["aboutMe"];
$ability = $_POST["ability"];
$biography= $_POST["biography"];
$image = $_POST["image"];

$sql = "INSERT INTO heroes (name, about_me, biography, image_url) VALUES ('$heroName','$aboutMe','$biography', '$image_url')";
$result = $conn->query($sql);

if($result === true){
    $last_id = $conn->insert_id;
    echo $last_id;
    }

$sql = "INSERT INTO ability_hero (hero_id) VALUES ('$ability')";
$result = $conn->query($sql);

if($result === true){
    $last_id = $conn->insert_id;
    echo $last_id;
    }

    $conn->close();
    header("Location: /hero.php?id=" .$last_id);
?>

var_dump($biography);
