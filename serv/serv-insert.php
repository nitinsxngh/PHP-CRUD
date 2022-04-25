<?php
include'../connection/connection.php';
?>

<?php
// Generate Random 10 character string
 function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  $table_id = generateRandomString();


    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $created_on = date("Y-m-d H:i:s");
 
    // Run a Query to insert all the collected data 
    $query = "INSERT INTO data (table_id, title, description, created_on) VALUES ('$table_id', '$title', '$description', '$created_on')";
 
    if (mysqli_query($conn, $query)) {
       // On success redirect it to index page.
       header('Location: ../index.php');
     } else {
    echo("Error description: " . mysqli_error($conn));

     }
?>