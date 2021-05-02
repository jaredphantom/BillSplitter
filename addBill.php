<?php
include("database.php");
$database = new Database;

session_start();

$billname = $_POST['billname'];
$amount = $_POST['amount'];
$email1 = $_POST['email1'];
$email2 = $_POST['email2'];
$email3 = $_POST['email3'];
$email4 = $_POST['email4'];
$email5 = $_POST['email5'];
$email6 = $_POST['email6'];
$nullcount = 0;
$emails = array($_POST['email1'], $_POST['email2'], $_POST['email3'], $_POST['email4'], $_POST['email5'], $_POST['email6']);

foreach ($emails as $val){
    if($val == null){
        $nullcount++;
    }
}
$maxppl = 6;
$split = $maxppl - $nullcount;

$query = "SELECT Email FROM User";
$value = $database->prepare($query);
$value = $value->execute();

foreach($emails as $val){
    $flag = false;
    while($row = $value->fetchArray(SQLITE3_ASSOC)){
        if($val == null){
            break;
        }
        if($val == $row['Email']){
            $flag = true;
            $recipient = "$val";
            $subject = "New Bill Added";
            $splitpay = round($amount/$split, 2);
            $text = "A new bill called '$billname' has been added to your dashboard. You are required to pay £$splitpay for this bill.";
            $from = "From: jaredschoel@billsplit.com";
            mail($recipient, $subject, $text, $from);
            break;
        }
    }
    if($flag == false && $val != null){
        $recipient = "$val";
        $subject = "Invitation to BillSplitter";
        $text = "You have been invited to split a bill with BillSplitter! Please register with this link:

        http://cs139.dcs.warwick.ac.uk/~u1909996/cs139/BillSplitter/main.php";
        $from = "From: jaredschoel@billsplit.com";
        mail($recipient, $subject, $text, $from);
    }
    $value->reset();
}


$query = "INSERT INTO Bill (BillID, Billname, Amount, NumSplit, Email1, Email2, Email3, Email4, Email5, Email6) VALUES(NULL, :billname, :amount, :split, :email1, :email2, :email3, :email4, :email5, :email6)";
$value = $database->prepare($query);
$value->bindParam(':billname', $billname);
$value->bindParam(':amount', $amount);
$value->bindParam(':split', $split);
$value->bindParam(':email1', $email1);
$value->bindParam(':email2', $email2);
$value->bindParam(':email3', $email3);
$value->bindParam(':email4', $email4);
$value->bindParam(':email5', $email5);
$value->bindParam(':email6', $email6);

if($value->execute()){
    header('location: bills.php');
}
?>