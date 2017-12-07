<?php
session_start();

// if(!isset($_SESSION['username'])){
//     header("Location: final.html");
//     exit();
// }

include "../dbConnection.php";
$conn = getDatabaseConnection();

function findHotel($title){
    global $conn;
    $sql = "SELECT *
            FROM hotels AS m
            JOIN category AS c ON m.categoryId = c.categoryId
            WHERE m.title LIKE '%$title%'
            ";
    // $namedParameters = array();
    // $namedParameters[":title"] = $title;
    $statement = $conn->prepare($sql);
    // $statement->execute($namedParameters);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

    // foreach ($hotels as $hotel) {
    //     echo ($hotel['title']);
    // }
    return $hotels[0];
}

$movie = findHotels($_GET['title']);
echo (json_encode($hotel));

?>


