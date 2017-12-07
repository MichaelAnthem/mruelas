<?php
if(isset($_GET['hotelId'])){
  include "../dbConnection.php";
  $conn = getDatabaseConnection();
  deleteHotel();
}

function deleteHotel(){
  global $conn;
  
  $sql = "DELETE FROM hotels
          WHERE hotelId = :hotelId";
  $namedParameters = array();
  $namedParameters[":hotelId"] = $_GET['hotelId'];
  $statement = $conn->prepare($sql);
 $statement->execute($namedParameters);
  
  header("Location: admin.php");    
  
}
?>