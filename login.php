<?php
include("database.php");
$database = new Database;

session_start();

$pwd = $_POST['pwd'];
$email = $_POST['email'];
$_SESSION['email'] = $email;

$query = "SELECT COUNT(*) as count FROM User WHERE Pass = :pwd AND Email = :email";
$value = $database->prepare($query);
$crypt = crypt($pwd, $email);
$value->bindParam(':pwd', $crypt);
$value->bindParam(':email', $email);
$value = $value->execute();
$row = $value->fetchArray(SQLITE3_ASSOC);
$count = $row['count'];

if($count > 0){
    $_SESSION['auth'] = TRUE;
    $_SESSION['errorFlag'] = "";
    header('location:bills.php');
}else{
    $_SESSION['errorFlag'] = "wrong_account";
    header('location:main.php');
}
?>