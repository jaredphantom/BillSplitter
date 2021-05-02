<?php
include("database.php");
$database = new Database;

session_start();

$username = $_POST['username'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$confirm = $_POST['confirm'];

if($pwd != $confirm){
    $_SESSION['errorFlag'] = "pwd_not_match";
    header('location: register.php');
    exit();
}

$query = "SELECT * FROM User";
$value = $database->prepare($query);
$value = $value->execute();
$flag = false;

while($row = $value->fetchArray(SQLITE3_ASSOC)){
    $storedEmail = $row['Email'];
    if($email == $storedEmail){
        $flag = true;
        break;
    }
}

if($flag == false){
    $query2 = "INSERT INTO User (UserID, Username, Pass, Email) VALUES(NULL, :username, :pwd, :email)";
    $value2 = $database->prepare($query2);
    $value2->bindParam(':username', $username);
    $crypt = crypt($pwd, $email);
    $value2->bindParam(':pwd', $crypt);
    $value2->bindParam(':email', $email);

    if($value2->execute()){
        $_SESSION['errorFlag'] = "";
        header('location: main.php');
    }
}else{
    $_SESSION['errorFlag'] = "email_in_use";
    header('location: register.php');
}
?>