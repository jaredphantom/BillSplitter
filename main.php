<?php session_start();
if (!isset($_SESSION['errorFlag'])){
	$_SESSION['errorFlag'] = "";
}
?>
<!DOCTYPE html>
<html lang=en>
	<head>
        <link rel="stylesheet" href="main.css" type="text/css" charset="utf-8">
		<title>BillSplitter - Home</title>
	</head>
	<body>
        <h1>Welcome to BillSplitter!</h1>	
		
		<?php
		if($_SESSION['errorFlag'] == "wrong_account"){
			echo "<div id='error'><b>Email or Password is incorrect!</b></div>";
			echo "<br>";
		}
		?>
        <div id="form"><form method="POST" action="login.php">
			<label for="email">Email:</label><br>
			<input type="email" placeholder="Enter Email" id="email" name="email" required><br><br>
			<label for="password">Password:</label><br>
			<input type="password" placeholder="Enter Password" id="password" name="pwd" required><br><br>
			<input type="submit" value="Login">
        </form></div><br><br>
        <div id="regBelow">If you do not already have an account please sign up below.<br><br>
        <form method="POST" action="register.php">
			<input type="submit" value="Register" name="register">
        </form></div><br><br>
	</body>
</html>