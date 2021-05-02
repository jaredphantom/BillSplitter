<?php
	include("database.php");
	$database = new Database;

	$query = "SELECT * FROM Bill WHERE Email1 = :email1 OR Email2 = :email2 OR Email3 = :email3 OR Email4 = :email4 OR Email5 = :email5 OR Email6 = :email6";
	$value = $database->prepare($query);
	$value->bindParam(':email1', $email);
	$value->bindParam(':email2', $email);
	$value->bindParam(':email3', $email);
	$value->bindParam(':email4', $email);
	$value->bindParam(':email5', $email);
	$value->bindParam(':email6', $email);
	$value = $value->execute();
	$total = 0;
	while ($row = $value->fetchArray(SQLITE3_ASSOC)){
		$billID = $row['BillID'];
		$billname = $row['Billname'];
		$amount = $row['Amount'];
		$split = $row['NumSplit'];
		$splitamount = round(($amount/$split), 2);

		if($row['Email1'] == $email){
			$status = $row['Status1'];
			$which = 1;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($row['Email2'] == $email){
			$status = $row['Status2'];
			$which = 2;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($row['Email3'] == $email){
			$status = $row['Status3'];
			$which = 3;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($row['Email4'] == $email){
			$status = $row['Status4'];
			$which = 4;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($row['Email5'] == $email){
			$status = $row['Status5'];
			$which = 5;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($row['Email6'] == $email){
			$status = $row['Status6'];
			$which = 6;
			if($status == 0){
				$total = $total + $splitamount;
			}
		}
		if($status == 0){
			$status = "Unpaid";
			echo "<div id='billListing'>";
			echo "<div id='echoBreakdown'>Bill for $billname of amount &pound;$splitamount is: <div id='unpaid'><b>$status</b></div></div><br>";
			echo "<form method='POST' action='pay.php'>";
			echo "<input type='hidden' id='billID' name='billID' value=$billID>";
			echo "<input type='hidden' id='which' name='which' value=$which>";
			echo "<div id='billButtonPay'><input type='submit' value='Pay Bill' id='payButton'></div>";
			echo "</form>";
			echo "</div>";
		}else{
			$status = "Paid";
			echo "<div id='billListing'>";
			echo "<div id='echoBreakdown'>Bill for $billname of amount &pound;$splitamount is: <div id='paid'><b>$status</b></div></div><br>";
			echo "<form method='POST' action='unpay.php'>";
			echo "<input type='hidden' id='billID' name='billID' value=$billID>";
			echo "<input type='hidden' id='which' name='which' value=$which>";
			echo "<div id='billButtonCancel'><input type='submit' value='Cancel' id='cancelButton'></div>";
			echo "</form>";
			echo "</div>";
		}
	}
	echo "<div id='echoTotal'>Total Amount to Pay is: <b>&pound;$total</b></div><br><br>";
?>