<?php
include'../connection/connection.php';
?>

<?php 

$table_id = $_POST["table_id"];
// Query to delete the specific data from a table using it's table id.
$sql = "DELETE FROM data WHERE table_id='$table_id'";

if (mysqli_query($conn, $sql)) {
	   // If Success
       header('Location: ../index.php');
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>