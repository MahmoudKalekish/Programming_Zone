<html>
    
    <head>
        <link rel="stylesheet" href="./Admin-CSS.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


<body>
<div class="container">
<div class="txt1">
        
<form action="add_teacher.php" method="POST" enctype="multipart/form-data">
  First name:<br>
  <input type="text" name="teacher_firstname" required><br>
  Last name:<br>
  <input type="text" name="teacher_lastname" required><br>
  Phone number:<br>
  <input type="text" name="teacher_phonenumber" required><br>
  Birthdate:<br>
  <input type="date" name="teacher_birthdate" required><br>
  Email:<br>
  <input type="text" name="teacher_email" required><br>
  Password:<br>
  <input type="text" name="teacher_password" required><br>
  Graduation:<br>
  <input type="text" name="teacher_graduation" required><br><br>
  <input type="submit" value="Add teacher" name="register">
</form> 

<br>
<br>
<br>

<form action="delete_teacher.php" method="POST">
  Teacher ID:<br>
  <input type="number" name="teacher_id" required><br><br>
  <input type="submit" value="Delete teacher" name="delete">
</form> 


</div>
   <div class="img"> <img  src="admin.png" alt="admin"/></div>
    </div>
</body>
</body>
</html>