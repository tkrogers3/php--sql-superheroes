


<?php
require "connection.php";
require "header.php";

$id = $_GET["id"];
$name = "name"; //
?>

<div class="container">
    <div class="jumbotron">
        <a class="btn btn-primary" href="/index.php" role="button"> Back</a>
        <?php
        $sql = "SELECT * FROM heroes WHERE id = " . $id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $output = "";
            $row = $result->fetch_assoc();
            $output .=
                "<h1>$row[name]</h1></a> 
        <p class='card-text'>$row[biography]</p> 
      ";
            $name = $row["name"];

            echo $output;
        } else {
            echo "0 results";
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
                    $output = "";
                    while ($row = $result->fetch_assoc()) {
                        $output .= "<li> $row[name] </li>
    ";
                    }
                    echo $output;
                } else {
                    echo "<p> $name has no friends</p>";
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
WHERE (hero1_id = " . $id . ") AND (type_id = 2)";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $output = "";
                    while ($row = $result->fetch_assoc()) {
                        $output .= "<li> $row[name]</li>";
                    }
                  echo $output;
                } else {
                    echo "<p> $name has no enemies.</p>
    ";
                }
                ?>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron">
                <h1>Abilities</h1>
                <?php

                $sql = "SELECT * FROM ability_hero
INNER JOIN abilities on abilities.id=ability_hero.ability_id
INNER JOIN heroes on heroes.id=ability_hero.hero_id
WHERE (ability_hero.hero_id = $id)";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $output = "";
                    while ($row = $result->fetch_assoc()) {
                        $output .= "<li> $row[ability]</li>";
                    }
                    echo $output;
                } else {
                    echo "<p>$name is powerless</p>";
                }
                ?>
            </div>
        </div>
        <?php
        require "footer.php";

        $conn->close();

        ?>