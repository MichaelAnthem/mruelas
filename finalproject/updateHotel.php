<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: final.html");
    exit;
}

include "../dbConnection.php";
$conn = getDatabaseConnection();

function getHotelInfo($hotelId) {
  global $conn;
  
  $sql = "SELECT * 
          FROM hotels
          WHERE hotelId = :hotelId";
  $namedParameters = array();
  $namedParameters[":hotelId"] = $hotelId;
  $statement = $conn->prepare($sql);
  $statement->execute($namedParameters);
  $record = $statement->fetch(PDO::FETCH_ASSOC);
 
  return $record;
}

if (isset($_GET['hotelId'])){
    $hotel = getHotelInfo($_GET['hotelId']);
}

if(isset($_POST['submit'])){
  updateHotel();
  $movie = getHotelInfo($_POST['hotelId']);
  echo "Hotel Updated!";
}

function selectRated($rate){
    global $hotel;
    if ($hotel['rated'] == $rate) {
        
        return "selected";
    }
}

function selectCategory($cat){
    global $hotel;
    if ($hotel['categoryId'] == $cat) {
        
        return "selected";
    }
}

function updateHotel(){
    global $conn;
    $sql = "UPDATE hotels
            SET title = :title,
                type  = :type,
                rated  = :rated,
                categoryId  = :categoryId
            WHERE hotelId = :hotelId";
            $namedParameters = array();
            $namedParameters[":title"] = $_POST['title'];
            $namedParameters[":type"] = $_POST['type'];
            $namedParameters[":rated"] = $_POST['rated'];
            $namedParameters[":categoryId"] = $_POST['categoryId'];
            $namedParameters[":hotelId"] = $_POST['hotelId'];

    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Hotels </title>
        <meta charset="utg-8" />
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <style>
    section {
        padding: 5px;
        background-color: white;
        box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
        margin-top:-10px;
        width:500px;
    }
    body {
        background-image:url("img/");
        background-size: 100%;
    }
    </style>
    <body>
        <section>
        <h1>Update Hotel</h1>
<nav>
  <form action="admin.php">
         <input type="submit" value="Home" />
     </form>
</nav> 
<br>
<form method="post">
   Hotel Name:  <input type="text" name="title" value="<?=$hotel['title']?>" />
   <br>
   Type:  <input type="text" name="type" value="<?=$hotel['type']?>" />
   <br>
       Rated:
   <select name="category">
        <option value="Standard">Standard</option>
        <option value="Executive">Executive</option>
        <option value="Suite">Suite</option>
        <option value="Presidential">Presidential</option>
    </select>
    <br>
         Category Genre:
    <select name="categoryId">
        <option value="1001">Holiday Inn</option>
        <option value="1002">Best Western</option>
        <option value="1003">Hilton</option>
        <option value="1004">Motel six</option>
        <option value="1005">Hyatt Place</option>
        <option value="1006">Embassy suites</option>
        <option value="1007">AC Hotels</option>
        <option value="1008">JW Marriott</option>
    </select>
    <br>
    <br>
     <input type="hidden" name="hotelId"  value="<?=$_GET['hotelId']?>"  />
     <input type="submit" value="Update Hotel" name="submit" />
     </form>
     </section>
    </body>
</html>