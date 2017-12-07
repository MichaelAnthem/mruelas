<?php
session_start();
include '../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']); 

$sql = "SELECT *
        FROM users
        WHERE username = :username 
          AND password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$statement = $conn->prepare($sql);
$statement->execute($namedParameters);  
$record = $statement->fetch(PDO::FETCH_ASSOC);

 if (empty($record)) {
     echo "Wrong username or password";
     echo "<a href='final.html'> Try again </a>";
     $_SESSION['authenticated'] = false;
     
 } else {
     $_SESSION['username'] = $record['username'];
     $_SESSION['adminFullName'] = $record['firstName'] . " " .  $record['lastName'];
     $_SESSION['authenticated'] = true;
     $_SESSION['adminId'] = $record['adminId'];
     header("Location: admin.php"); 
 }
?>