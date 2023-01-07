<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./Login-CSS.css">

</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" method ="post">
      <input id="firstname" name="firstname" type="text" class="input" placeholder="First name" required/>
	  <input id="lastname" name="lastname" type="text" class="input" placeholder="Last name" required/>
	  <input id="phonenumber" name="phonenumber" type="text" class="input" placeholder="Phone number" required/>
	  <input id="birthdate" name="birthdate" type="date" class="input" placeholder="Birth date" required/>	  
      <input id="email" name="email" type="text" class="input" placeholder="E-mail address" required/>
      <input id="password" name="password" type="password" class="input" placeholder="Password" required/>
	  
	  
      <button type="submit" name="register" id="register" >Signup</button>
	  
      <p class="message">Already registered? <a href="#">Signin</a></p>
    </form>
    <form class="login-form" method ="post">
      <input id="email" name="email" type="text" class="input" type="text" placeholder="Email address" required/>
      <input d="password" name="password" type="password" class="input" type="password" placeholder="Password" required/>
      <a href="./Course-HTML.php">
		<button type="submit" name="login" id="login" >Signin</button>
	</a>
      <p class="message"> Not registered ? <a href="#"> Signup </a> </p>
    </form>
  </div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="Login-JS.js"></script>

</body>
</html>

<?php
	$con = mysqli_connect("localhost", "root", "");
		if (!$con) 
		{
			print "Error - Could not connect to MySQL";
			exit;
		}
	// Select my database
		$er = mysqli_select_db($con, "e_learning");
		if (!$er) 
		{
			print "Error - Could not select this database";
			exit;
		}

	if(isset($_POST["register"]) && $_POST["firstname"] != "" && $_POST["lastname"] != "" && $_POST["phonenumber"] != "" && $_POST["birthdate"] != "" && $_POST["email"] != "" && $_POST["password"] != "") 
	{
		session_start();
		$_SESSION['name'] = $_POST["firstname"];
		$firstname=$_POST["firstname"];
		$lastname=$_POST["lastname"];
		$phonenumber=$_POST["phonenumber"];
		$birthdate=$_POST["birthdate"];
		$email=$_POST["email"];
		$password=$_POST["password"];
	
		$number = preg_match('@[0-9]@', $password);
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		
		if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {?>
			<script>
				alert ("Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.");
				document.location.href="./Login-HTML.php" 
			</script>
			<?php
		} 
			else {
				$query="INSERT INTO `student` (`Firstname`,`Lastname`, `Phonenumber`,`Birthdate`,`Email`, `Password`) VALUES ('$firstname','$lastname','$phonenumber','$birthdate','$email','$password')";
				$res = mysqli_query($con,$query);
				$_POST["firstname"] = "";
				$_POST["lastname"] = "";
				$_POST["phonenumber"] = "";
				$_POST["birthdate"] = "";
				$_POST["email"] = "";
				$_POST["password"] = "";
				}
?>
			<script> document.location.href="./Course-HTML.php" </script>
		<?php
				}

	if(isset($_POST["login"]) && $_POST["email"] != "" && $_POST["password"] != "") {
		session_start();
		$_SESSION['name'] = $_POST["email"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$usersSelect="SELECT * from student where email='$email' and password='$password'";
		$usersResult = mysqli_query($con,$usersSelect);
		$finalData = mysqli_fetch_assoc($usersResult);
		if(mysqli_num_rows($usersResult)) {
			
			?>
				<script> document.location.href="./Course-HTML.php" </script>
			<?php
		} else {
			?>
			<script> 
				alert("Incorrect password or username!");
				document.location.href="./Login-HTML.php";
			</script>
			<?php
		}
	}

?>