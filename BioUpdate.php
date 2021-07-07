<div class ="container bg-danger">
<div class="jumbotron m-5">
    <div class ="row">
        <h1 class= "bg-danger"> Update your Biography</h1>
    <?php
require "connection.php";
require "header.php";

    
    $sql = "SELECT * FROM heroes WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bio = $row['biography'];
    $output = "
 

    <form action='update.php?method=updateBio&&id=$id' method='post'>
Biography:
<br> <textarea cols=80 rows='3' type='text bg-success' name='biography'>$bio</textarea><br>
<input type='submit'>
<a class='btn bg-success' href='./hero.php?id=$id . $hero_id .'>Back</a>
</form>";
    echo $output;

    require "footer.php";
    ?>
</div>
</div>
</div>