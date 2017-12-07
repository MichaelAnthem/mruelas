<?php
session_start();

if (!isset($_SESSION['username'])) { 
    header("Location: login.html"); 
    exit;
}

include '../dbConnection.php';
$conn = getDatabaseConnection();

function getAllHotels(){
    global $conn;
    $sql = "SELECT * FROM hotels ORDER BY title";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $hotels;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Main Admin Page</title>
        <meta charset="utg-8" />
        <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
            function confirmDelete(title){
                return confirm("Are you sure you wanna delete " + title + "? ");
            }
        </script>

    </head>
    <style>
    td {
        padding: 5px;
    }
    section{
        background-color: white;
        box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
        margin-top:-10px;
        width:500px;
        padding:10px;
    }
    body {
            background-image:url("img/");
            background-size: 100%;
        }
    </style>
    <body>
    <section>
 
     <form action="logout.php">
         <input type="submit" value="Logout" />
     </form>
   
    <h2> Main Admin Page</h2>
    <h3> Welcome  <?=$_SESSION['adminFullName']?> </h3>
    <form action="addHotel.php">
         <input type="submit" value="Add New Hotel" />
     </form>
         <form action="status.php">
         <input type="submit" value="Report" />
     </form>

    <br />
    <table>
<?php
$movies = getAllHotels();
   
   foreach ($hotels as $hotel){
        echo "<tr>";
       echo "<td>".$hotel['title'] . "</td>";
       echo "<td> <strong><a href='updateHotel.php?hotelId=".$hotel['hotelId']."'> Edit </a> </strong> </td>";
       echo "<td> 
               <form action='deleteHotel.php'  onsubmit='return confirmDelete(\"".$hotel['title']."\")' >
                  <input type='hidden' name='hotelId' value='".$hotel['hotelId']."'>
                  <input type='submit' value='Delete'>
               </form>
             </td>";
       echo "</tr>";
   }
?>
    </table>
    </section>
    </body>
</html>