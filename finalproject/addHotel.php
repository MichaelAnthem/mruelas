<?php
session_start();

if(!isset($_SESSION['username'])){
    header("Location: final.html");
    exit;
}

if(isset($_POST['submit'])){
  include "../dbConnection.php";
  $conn = getDatabaseConnection();
  addHotel();
}

function addHotel(){
    global $conn;
    $sql = "INSERT INTO hotels ///hotel sql//////
            (title, type, category, categoryId) 
            VALUES (:title, :type, :category, :categoryId)";
            $namedParameters = array();
            $namedParameters[":title"] = $_POST['title'];
            $namedParameters[":type"] = $_POST['type'];
            $namedParameters[":category"] = $_POST['category'];
            $namedParameters[":categoryId"] = $_POST['categoryId'];

    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    echo "Hotel type was added!";

}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section </title>
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
        background-color: #4ABDAC;
        color:black;
        box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
        margin-top:-10px;
        width:100%;
    }
    body {
        background-image:url("img/flower.jpg");
        background-size: 100%;
    }
    
    </style>
    <body>
        <section>
        <h1> Adding New Hotel Choices </h1>
         <nav>
  <form action="admin.php">
         <input type="submit" value="Home" />
     </form>
</nav> 
<form method="post">
   Hotel Cost:  <input type="text" name="title"/><br>
   Hotel Type:  <input type="text" name="type"/><br>
       Level:
    <select name="category">
        <option value="Standard">Standard</option>
        <option value="Executive">Executive</option>
        <option value="Suite">Suite</option>
        <option value="Presidential">Presidential</option>
    </select>
    <br>
         Hotel Name:
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
     <input type="submit" value="Add Hotel" name="submit" />
     </form>
     </section>
    </body>
</html>