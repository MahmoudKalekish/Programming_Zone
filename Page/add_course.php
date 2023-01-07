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

if(isset($_POST["register"]) && $_POST["course_name"] != "" && $_POST["course_description"] != "") {
    $course_name = $_POST["course_name"];
    $course_description = $_POST["course_description"];

    $query = "INSERT INTO courses (name, description) VALUES ('$course_name', '$course_description')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "New course added successfully";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;    
    }
}

$conn->close();

?>
