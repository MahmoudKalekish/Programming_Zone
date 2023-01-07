<html>
    
    <head>
        <link rel="stylesheet" href="./Admin-CSS.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>


<body>
<div class="container">
<div class="txt1">
        
<form action="add_course.php" method="POST" enctype="multipart/form-data">
  Course name:<br>
  <input type="text" name="course_name" required><br>
  Course description:<br>
  <textarea name="course_description" rows="5" cols="40" required></textarea><br>
  PDF file:<br>
  <input type="file" name="pdf_file" accept="application/pdf" required><br><br>
  <input type="submit" value="Add Course" name="register">
</form> 

<br>
<br>
<br>
<form action="edit_course.php" method="POST">
  Course ID:<br>
  <input type="number" name="course_id" required><br>
  New course name:<br>
  <input type="text" name="new_course_name" required><br>
  New course description:<br>
  <textarea name="new_course_description" rows="5" cols="40" required></textarea><br><br>
  <input type="submit" value="Edit Course" name="edit">
</form> 
<br> 
<br>
<br>

<form action="delete_course.php" method="POST">
  Course ID:<br>
  <input type="number" name="course_id" required><br><br>
  <input type="submit" value="Delete Course" name="delete">
</form> 


</div>
   <div class="img"> <img  src="admin.png" alt="admin"/></div>
    </div>
</body>
</html>
