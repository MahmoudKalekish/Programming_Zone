<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./Login-CSS.css">

</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" method ="post">
      <input id="email" name="email" type="text" class="input" type="text" placeholder="Email address" required/>
      <input d="password" name="password" type="password" class="input" type="password" placeholder="Password" required/>
      <a href="./AdminPanel-HTML.php"><button type="submit" name="login" id="login" >Signin</button></a>
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

	if(isset($_POST["login"]) && $_POST["email"] != "" && $_POST["password"] != "") {
		session_start();
		$_SESSION['name'] = $_POST["email"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$usersSelect="SELECT * from admin where admin_username='$email' and admin_password='$password'";
		$usersResult = mysqli_query($con,$usersSelect);
		$finalData = mysqli_fetch_assoc($usersResult);
		if(mysqli_num_rows($usersResult)) {
			
			?>
				<script> document.location.href="./AdminPanel-HTML.php" </script>
			<?php
		} else {
			?>
			<script> 
				alert("Incorrect password or username!");
				document.location.href="./AdminLogin-HTML.php";
			</script>
			<?php
		}
	}

?>