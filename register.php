<?php session_start();
if (isset($_POST['register'])){
	$_SESSION['errorFlag'] = "";
}
?>
<!DOCTYPE html>
<html lang=en>
	<head>
		<link rel="stylesheet" href="main.css" type="text/css" charset="utf-8">
		<title>BillSplitter - Register</title>
	</head>
	<body>
		<h1>Register an Account!</h1>
		<div id="onceReg">Once registered you will be sent back to login page.</div><br><br>
		<?php
		if($_SESSION['errorFlag'] == "email_in_use"){
			echo "<div id='error'><b>Email is already in use!</b></div>";
			echo "<br>";
		}elseif($_SESSION['errorFlag'] == "pwd_not_match"){
			echo "<div id='error'><b>Passwords don't match!</b></div>";
			echo "<br>";
		}
		?>
		<div id="form2"><form method="POST" action="savereg.php">
            <label for="email">Email:</label><br>
			<input type="email" placeholder="Enter Email" id="email" name="email" required><br><br>
			<label for="password">Password:</label><br>
			<input type="password" placeholder="Enter Password" id="password" name="pwd" required><br><br>
			<label for="confirm_password">Confirm Password:</label><br>
            <input type="password" placeholder="Enter Same Password" id="confirm_password" name="confirm" required><br><br>
            <label for="name">Name:</label><br>
			<input type="text" placeholder="Enter Name" id="name" name="username" required><br><br>
			<input type="submit" value="Finish Register">
		</form></div>
	</body>
</html> 