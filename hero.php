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
        $output.= 
        "<h2>$row[name]</h2></a> 
        <p class='card-text'>$row[biography]</p>
       </div>
    </div>";
    }
echo $output; 
 } else{ echo "0 results";
  }
?>
</div>
<div>


<div class="container">
<div class="jumbotron">
<h1> Friends </h1>


<?php
$sql = "SELECT * FROM relationships 
Inner Join heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 1);";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output ="";
 while ($row = $result->fetch_assoc()) {
     $output.= "<li> $row[name]</li>
    ";
     
 }
echo $output;
} else {
    echo "<p> lol, I'm a bad guy</p>";
}
?>
 </div>
     </div>



<div class="container">
<div class="jumbotron">  
<h1>Enemies</h1>

<?php 
$sql = "SELECT * FROM relationships 
Inner Join heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 2);";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output= "";
 while ($row = $result->fetch_assoc()) {
     $output .="<li> $row[name]</li>
    ";}
    
echo $output;
} else {
    echo "<p> Those who stand in the way of truth and justice! </p>
    ";
}
?>
</div>
  </div>

<div class="container">
<div class="jumbotron">
    <h1>Abilities</h1

    <?php
 $sql= "SELECT * FROM ability_hero
INNER JOIN abilities on abilities.id=ability_hero.ability_id
INNER JOIN heroes on heroes.id=ability_hero.hero_id
WHERE (ability_hero.hero_id = $id)";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    $output= "";
 while ($row = $result->fetch_assoc()) {
    $output .= "<h3> $row[ability]</h3>";}
echo $output;
} else {
    echo "<p>I'm powerless</p>";
}
?>
</div>
</div>

<?php
$conn->close();

?>


