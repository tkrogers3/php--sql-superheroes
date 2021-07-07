<?php

require "connection.php";

$heroName = $_POST["heroName"];
$aboutMe= $_POST["aboutMe"];
$newAbility = $_POST["newAbility"];
$biography= $_POST["biography"];
$image = $_POST["image"];

$sql = "INSERT INTO heroes (name, about_me, biography, image_url) VALUES ('$heroName','$aboutMe','$biography', '$image')";
$result = $conn->query($sql);

if($result === true){
    
    $last_id = $conn->insert_id;
   
    foreach ($newAbility as $ability){
        $sql = "INSERT INTO ability_hero (hero_id, ability_id) VALUES ('$last_id', '$ability')";
        $conn->query($sql);
    }
}



    $conn->close();
header("Location: /hero.php?id=" .$last_id);
?>

//save the file and grab path from file

// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }