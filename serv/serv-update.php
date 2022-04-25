<?php
include'../connection/connection.php';
?>


<?php

$updateTitle = mysqli_real_escape_string($conn, $_POST['updateTitle']);
$table_id = $_POST["table_id"];

// Query to update the specific data from a table using it's table id.
$sql = "UPDATE data SET title='$updateTitle' WHERE table_id = '$table_id'";

if (mysqli_query($conn, $sql)) {
    // If Success
     header('Location: ../index.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

?>