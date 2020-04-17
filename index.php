<?php

require "connection.php";
require "header.php";


// Trying to create a global variable-- $ID = $_row["id"];


// while ($row = $result->fetch_assoc()) {
//     $hero = "hero.php?id=" . $GLOBALS["$id"];
echo "<div class='jumbotron m-2 p-2'>
<img src='./Images/sups.jpg'>
</div>";



$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container bg-secondary p-4">';
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $heroId= $row["id"];
        $hero = "hero.php?id=" . $heroId;
        $output .= '
 
      <div class="col-sm-4">
     <div class="card m-2" style="height:20rem">
                <img class= "card-img-top" alt="hero image" style="height:42%" src= ' . $row["image_url"] . '/>
                    <div class="card-body bg-danger">
                        <h5 class="card-title text-white">' . $row["name"] . '</h5>
                        <p class="card-text">' . $row["about_me"] . '</p>
                        <a href=' . $hero . ' class="btn btn-secondary">Profile</a>
                    </div>
                    </div>
                </div>';
    }

    echo $output;
    echo '</div>';
} else {
    echo "0 results";
}
?>
</div>
<hr>
<div class="container p-4 bg-secondary">
<div class="container p-4 ">
    <div class="row ">
        <div class="col-sm-5 bg-white p-2"> 
  <div class ="form">
      
    <h1 class="question"> Join the League of Superheros! </h1>
    <form action = "newHero.php" method="post">
    <div class="form-group">
       <hr>
    <h3 class="question">Enter your Hero Name</h3>
    <input type="text" class="form-control" name="heroName" id="heroName" placeholder="Please Enter Your Name">
  </div>

  <h3 class="question">Enter a short About Me statement.</label>
    <input type="text" class="form-control" name="aboutMe" id="aboutMe" placeholder="Enter an about me statement">
  </div>

    <h3 class="question">What is your Superpower?</label>
    <select multiple class="form-control mb-2" name="ability" id="ability">
    <?php
    $sql = "SELECT * FROM abilities";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
   echo "<option>$row[ability]</option>";
  } 
}
?> </select>
 
  <div class="form-group">
    <h3 class="question">How did you get your Superpowers?</label>
    <textarea class="form-control" id="biography" name="biography" rows="3"></textarea>
  </div>
  <div class="form-group ">
    <h3 class="question">Select Profile Picture</label>
    <input type="file" class="form-control-file bg-white p-1" name="image" id="image">
    <button type ="file" class= "btn btn-info mt-2">Submit</button>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
$conn->close();
require "footer.php";
?>

