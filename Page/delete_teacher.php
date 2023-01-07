<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete_Teacher</title>
</head>
<body>
<form action="delete_teacher.php" method="post">
  <label for="teacher_id">Teacher ID:</label><br>
  <input type="text" id="teacher_id" name="teacher_id"><br><br>
  <input type="submit" value="Delete Teacher" name="delete">
</form> 
</body>
</html>





<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_learning";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["delete"]) && $_POST["teacher_id"] != "") {
    $teacher_id = $_POST["teacher_id"];

    $query = "DELETE FROM teacher WHERE id=$teacher_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "teacher deleted successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();

?>