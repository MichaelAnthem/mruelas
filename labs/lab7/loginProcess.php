<?php
session_start(); //starts or resumes an existing session


//print_r($_POST); //displays values passed from login form

//validates the username and password
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$username = $_POST['username'];
$password = sha1($_POST['password']);

//echo $password;


//Following SQL works but it allows SQL Injection!!
// $sql = "SELECT *
//         FROM q_admin
//         WHERE username = '$username' 
//         AND   password = '$password'";
        
$sql = "SELECT *
        FROM q_admin
        WHERE username = :username 
        AND   password = :password";   

$namedParameters  = array();
$namedParameters[':username']  = $username;
$namedParameters[':password']  = $password;

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

if (empty($record)) {
    
  echo "Wrong credentials!";  
  
} else {
    
    $_SESSION['username'] = $record['username'];
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
   // echo $_SESSION['adminFullName'];
   //echo "Successful login!";
   header('Location: admin.php'); //redirects users to admin page
   
}





?>