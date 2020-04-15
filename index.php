<?php

require "connection.php";
require "header.php";

echo '<div class = "text-center"> <h1> Super Friends! </h1></div>';

$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container bg-secondary">';
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        $hero = "hero.php?id=" . $row["id"];
        $output .= '
        <div class="col-4" >
            <div class="card mt-2 mb-3" style="height:60vh">
                <img class= "card-img-top" alt="hero image" src= "./Images/hero'. $row["id"] .'.jpg" />
                    <div class="card-body bg-info">
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

$conn->close();
require "footer.php";
?>

