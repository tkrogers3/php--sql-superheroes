<!-- <?php

require "connection.php";


$deleteProfile = "DELETE FROM heroes WHERE id=".$test;
if ($conn->query($deleteProfile) === TRUE) {
    echo "Record deleted successfully";
    header("Location: /index.php?id=");
} else {
    echo "Error deleting record: " . $conn->error;
    header("Location: /index.php?id=");
}
    $conn->close();
?> -->
