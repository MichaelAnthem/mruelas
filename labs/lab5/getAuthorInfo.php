<?php

include '../../dbConnection.php';

$conn = getDatabaseConnection();

$sql = "SELECT * FROM `q_author` WHERE authorId=" . $_GET['authorId'];
$stmt = $conn -> prepare ($sql);
$stmt -> execute();
$record = $stmt -> fetch();

echo"<h1> Author Info </h1>";
echo "<span id='authorNameIFrame'>".$record['firstName'] . "</span> <span id='authorBiographyIFrame'> :" . $record['biography'] . "</span> <br> <img src='". $record['picture']."''></img> ";

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