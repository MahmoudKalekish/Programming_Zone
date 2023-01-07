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

if(isset($_POST["delete"]) && $_POST["course_id"] != "") {
    $course_id = $_POST["course_id"];

    $query = "DELETE FROM courses WHERE id=$course_id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Course deleted successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();

?>
