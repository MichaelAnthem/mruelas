<?php

/*
$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we'll be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
*/

include '../../dbConnection.php';
$dbConn = getDatabaseConnection();

//This works but it's very time consuming. Not efficient.
function getRandomQuote_NotEfficient() {
    
    global $dbConn;
    
    $sql = "SELECT quote FROM q_quote ";
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    shuffle($records);
    
    echo $records[0]['quote'];
    //print_r($records);

}


function getRandomQuote() {
    
    global $dbConn;
    
    
    //Retrieve all quote Ids
    //Select one quoteId randomly
    //Get the quote for that quoteId
    
    //Step 1: Generating a random quoteId

    $sql = "SELECT quoteId FROM q_quote";  //retrieves all quoteIds
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    //$records = array (1, 5, 7, 10,  15);
    
    //$randomIndex = rand(0, count($records)-1 );
    $randomIndex = array_rand($records);
    
    //echo($records[$randomIndex]['quoteId']);
    $quoteId = $records[$randomIndex]['quoteId'];
    
    //Step 2: Retreiving quote based on Random Quote Id
    $sql = "SELECT quote, firstName, lastName, authorId 
            FROM q_quote 
            NATURAL JOIN q_author
            WHERE quoteId = $quoteId";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch(); //using "fetch()" because it's expected to get ONLY ONE record        
    
    echo  "<em>" . $record['quote']  . "</em><br />";
    echo "<a target='authorInfo' href='getAuthorInfo.php?authorId=".$record['authorId']."'>-" . $record['firstName'] . " " . $record['lastName'] . "</a>";
    
    //print_r($records);

}

//print_r($records);

// while ($row = $stmt -> fetch())  {
//     echo  $row['firstName'] . ", " . $row['lastName'] .  " " . $row['gender'] . "<br />";
// }


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
    </head>
    <body>


    <?=getRandomQuote()?>        

<br />
    <iframe name="authorInfo" width="500" height="300"></iframe>

    </body>
</html>