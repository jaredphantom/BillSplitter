<?php
include("database.php");
$database = new Database;

session_start();

$billID = $_POST['billID'];
$which = $_POST['which'];

switch($which){
    case 1:
        $query = "UPDATE Bill SET Status1 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 2:
        $query = "UPDATE Bill SET Status2 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 3:
        $query = "UPDATE Bill SET Status3 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 4:
        $query = "UPDATE Bill SET Status4 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 5:
        $query = "UPDATE Bill SET Status5 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 6:
        $query = "UPDATE Bill SET Status6 = 1 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
}

$value->execute();

$query = "SELECT * FROM Bill WHERE BillID = :billID";
$value = $database->prepare($query);
$value->bindParam(':billID', $billID);
$value = $value->execute();
$row = $value->fetchArray(SQLITE3_ASSOC);
$paidCount = 0;

if($row['Status1'] == 1){
    $paidCount++;
}
if($row['Status2'] == 1){
    $paidCount++;
}
if($row['Status3'] == 1){
    $paidCount++;
}
if($row['Status4'] == 1){
    $paidCount++;
}
if($row['Status5'] == 1){
    $paidCount++;
}
if($row['Status6'] == 1){
    $paidCount++;
}

if($paidCount == $row['NumSplit']){
    $query = "DELETE FROM Bill WHERE BillID = :billID";
    $value = $database->prepare($query);
    $value->bindParam(':billID', $billID);
    $value->execute();
}

header('location: bills.php');
?>