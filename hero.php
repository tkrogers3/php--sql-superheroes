<?php

require "connection.php";
require "header.php";
require "footer.php";

$id = $_GET["id"];
?>

<div class="container">
<div class="jumbotron">
 <?php
$sql = "SELECT * FROM heroes WHERE id = " . $id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
 while ($row = $result->fetch_assoc()) {

        // $hero = "hero.php?id=" . $row["id"];
        $output.= 
        "<div class ='container bg-success p-2 m-2'>
        
     
        <h3 class ='bg-info text-right'>Hero</h3>
        <br>
        <h2>$row[name]</h2></a> 
        <div class= 'card justify-content-end' style='width: 18rem; <div class='card-body'>
        <h5 class='card-title text-center'>Biography</h5>
        <p class='card-text'>$row[biography]</p>
        <a href='#' class='card-link'>Friends</a>
        <a href='#' class='card-link'>Attributes</a>
      </div>
    </div>";
    }
echo $output; 
 } else{ echo "0 results";
  }
?>

     
<h1> Friends </h1>
<?php
$sql = "SELECT * FROM relationships 
Inner Join heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 1);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output ="";
 while ($row = $result->fetch_assoc()) {
     $output.= "<li> $row[name]</li>";
 }
echo $output;
} else {
    echo "<p> lol, I'm a bad guy</p>";
}

echo"<h1> Enemies</h1>";
$sql = "SELECT * FROM relationships 
Inner Join heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 2);";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $output= "";
 while ($row = $result->fetch_assoc()) {
     $output .="<li> $row[name]</li>";
 }
echo $output;
} else {
    echo "<p> Those who stand in the way of truth and justice! </p>";
}

$conn->close();

?>


