<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add_Teacher</title>
</head>
<body>
<form action="add_teacher.php" method="post">
  <label for="teacher_firstname">First Name:</label><br>
  <input type="text" id="teacher_firstname" name="teacher_firstname"><br>
  <label for="teacher_lastname">Last Name:</label><br>
  <input type="text" id="teacher_lastname" name="teacher_lastname"><br>
  <label for="teacher_phonenumber">Phone Number:</label><br>
  <input type="text" id="teacher_phonenumber" name="teacher_phonenumber"><br>
  <label for="teacher_birthdate">Birthdate:</label><br>
  <input type="date" id="teacher_birthdate" name="teacher_birthdate"><br>
  <label for="teacher_email">Email:</label><br>
  <input type="email" id="teacher_email" name="teacher_email"><br>
  <label for="teacher_password">Password:</label><br>
  <input type="password" id="teacher_password" name="teacher_password"><br>
  <label for="teacher_graduation">Graduation:</label><br>
  <input type="text" id="teacher_graduation" name="teacher_graduation"><br><br>
  <input type="submit" value="Add Teacher" name="register">
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

// Check if form has been submitted
if(isset($_POST["register"])) {
  // Validate form data
  if ($_POST["teacher_firstname"] == "" || $_POST["teacher_lastname"] == "" || $_POST["teacher_phonenumber"] == "" || $_POST["teacher_birthdate"] == "" || $_POST["teacher_email"] == "" || $_POST["teacher_password"] == "" || $_POST["teacher_graduation"] == "") {
    echo "Error: All fields are required";
  } else {
    // Escape user input to prevent SQL injection
    $teacher_firstname = mysqli_real_escape_string($conn, $_POST["teacher_firstname"]);
    $teacher_lastname = mysqli_real_escape_string($conn, $_POST["teacher_lastname"]);
    $teacher_phonenumber = mysqli_real_escape_string($conn, $_POST["teacher_phonenumber"]);
    $teacher_birthdate = mysqli_real_escape_string($conn, $_POST["teacher_birthdate"]);
    $teacher_email = mysqli_real_escape_string($conn, $_POST["teacher_email"]);
    $teacher_password = mysqli_real_escape_string($conn, $_POST["teacher_password"]);
    $teacher_graduation = mysqli_real_escape_string($conn, $_POST["teacher_graduation"]);

    // Insert data into teacher table
    $query = "INSERT INTO teacher (Firstname, Lastname, Phonenumber, Birthdate, Email, Password, Graduation) VALUES ('$teacher_firstname', '$teacher_lastname','$teacher_phonenumber','$teacher_birthdate','$teacher_email','$teacher_password','$teacher_graduation')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "New teacher added successfully";
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }
}

$conn->close();

?>
