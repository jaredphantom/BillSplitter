<?php 
session_start();
if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== TRUE){
    header('location:main.php');
}
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang=en>
	<head>
        <link rel="stylesheet" href="main.css" type="text/css" charset="utf-8">
		<title>BillSplitter - Manage</title>
		<script>
		function newBill() {
  			var div = document.getElementById("addBill");
			if (div.style.display !== "none") {
        		div.style.display = "none";
    		}
    		else {
        		div.style.display = "block";
    		}
		}
		function newEmail1() {
			document.getElementById("newEmailButton1").style.display = "none";
			document.getElementById("showEmail4").style.display = "block";
		}
		function newEmail2() {
			document.getElementById("newEmailButton2").style.display = "none";
			document.getElementById("showEmail5").style.display = "block";
		}
		function newEmail3() {
			document.getElementById("newEmailButton3").style.display = "none";
			document.getElementById("showEmail6").style.display = "block";
		}
		</script>
	</head>
	<body>
        <h1>Manage your Bills!</h1>	
		<div id="billWelcome">Welcome to your bill management page.</div>
		<div id="logoutButton"><form action="logout.php">
			<input type="submit" value="Log Out">
        </form></div>
		<div id="newBillButton"><input type="button" value="Input New Bill" onclick="newBill()"/></div>
		<div id="addBill" style="display:none;">
		<div id="form3"><form method="POST" action="addBill.php">
			<label for="billname">Bill Name:</label><br>
			<input type="text" placeholder="Enter Bill Name" id="billname" name="billname" required><br><br>
			<label for="amount">Amount to Pay:</label><br>
			<input type="number" placeholder="Enter Amount (GBP)" min="0" step="0.01" id="amount" name="amount" required><br><br>
			<label for="email1">Email of Person 1:</label><br>
			<input type="email" value="<?php echo $email; ?>" id="email1" name="email1" required><br><br>
			<label for="email2">Email of Person 2:</label><br>
			<input type="email" placeholder="2nd Email Address" id="email2" name="email2"><br><br>
			<label for="email3">Email of Person 3:</label><br>
			<input type="email" placeholder="3rd Email Address" id="email3" name="email3"><br><br>
			<div id="newEmailButton1"><input type="button" value="Add Person" onclick="newEmail1()"/></div>
			<div id="showEmail4" style="display:none;">
			<label for="email4">Email of Person 4:</label><br>
			<input type="email" placeholder="4th Email Address" id="email4" name="email4"><br><br>
			<div id="newEmailButton2"><input type="button" value="Add Person" onclick="newEmail2()"/></div>
			</div>
			<div id="showEmail5" style="display:none;">
			<label for="email5">Email of Person 5:</label><br>
			<input type="email" placeholder="5th Email Address" id="email5" name="email5"><br><br>
			<div id="newEmailButton3"><input type="button" value="Add Person" onclick="newEmail3()"/></div>
			</div>
			<div id="showEmail6" style="display:none;">
			<label for="email6">Email of Person 6:</label><br>
			<input type="email" placeholder="6th Email Address" id="email6" name="email6"><br><br>
			</div>
			<input type="submit" value="Finish Bill">
		</form></div><br><br>
		</div>
		<?php include("findBills.php") ?>
	</body>
</html>