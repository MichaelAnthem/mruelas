<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

$sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch();

echo $record['firstName'] . "  " . $record['biography'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Author Info </title>
    </head>
    <body>

<h1> Author Info </h1>



    </body>
</html>