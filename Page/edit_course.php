<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_learning";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["edit"]) && !empty($_POST["course_id"]) && !empty($_POST["new_course_name"]) && !empty($_POST["new_course_description"])) {
    $course_id = mysqli_real_escape_string($conn, $_POST["course_id"]);
    $new_course_name = mysqli_real_escape_string($conn, $_POST["new_course_name"]);
    $new_course_description = mysqli_real_escape_string($conn, $_POST["new_course_description"]);

    $query = "UPDATE courses SET name='$new_course_name', description='$new_course_description' WHERE id='$course_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Course updated successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>
