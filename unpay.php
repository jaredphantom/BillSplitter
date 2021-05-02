<?php
include("database.php");
$database = new Database;

session_start();

$billID = $_POST['billID'];
$which = $_POST['which'];

switch($which){
    case 1:
        $query = "UPDATE Bill SET Status1 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 2:
        $query = "UPDATE Bill SET Status2 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 3:
        $query = "UPDATE Bill SET Status3 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 4:
        $query = "UPDATE Bill SET Status4 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 5:
        $query = "UPDATE Bill SET Status5 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
    case 6:
        $query = "UPDATE Bill SET Status6 = 0 Where BillID = :billID";
        $value = $database->prepare($query);
        $value->bindParam(':billID', $billID);
        break;
}

if($value->execute()){
    header('location: bills.php');
}
?>