<!DOCTYPE html>
<html>
    <head>
    <title>Dream Home</title>
    <!-- Bootstrap: Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    </head>
    
<style>
            body {
            background-image:url("img/home.jpg");
            background-size: 100%;

        }
</style>
    <body>
<?php

?>
<br>
<?php

 if (!empty($_POST['firstname'])
    && !empty($_POST['lastname'])) {
     echo "<center>" . $_POST['firstname'] . " " . $_POST['lastname']  . "</center>";
     
 }
     if ($_POST["option"]=="Yes"){
        echo "<center>" ."Currently " . $_POST['firstname'] . " does own a house." . "</center>";
    }
    if ($_POST["option"]=="No"){
        echo "<center>" ."Currently " . $_POST['firstname'] . " does not own a house." . "</center>";
    }
    
     if (!empty($_POST['firstname'])
    && !empty($_POST['year'])
    && !empty($_POST['color'])
    && !empty($_POST['manufacturer'])
    && !empty($_POST['model'])){
        echo "<center>" . $_POST['firstname'] . "'s dream home is a " .$_POST['year']." ". $_POST['color']." ". $_POST['manufacturer']." ". $_POST['model'] . "</center>";
    }
    
    if (!empty($_POST['message'])) {
        echo "<center>" ."With: " . $_POST['message'] . "</center>";
    }
?>

<div class="col-sm-8">
<form method="post">
    <fieldset>
    <legend>House form</legend>
    First name:<br>
    <input type="text" name="firstname" required><br>
    <label for="lastname">Last name:</label><br/>
    <input type="text" name="lastname" required>
    
    <br>
        
    Gender:<br>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>
<br>

        Do you currently own a home?<br>
<input type="radio" name="option" value="Yes"> Yes<br>
<input type="radio" name="option" value="No"> No<br>

        How old can the house be?:<br>
<input type="text" name="year" required><br>
        
        House color:<br>
<input type="text" name="color"><br>

        House architect:<br>
<input type="text" name="manufacturer" required><br>

        House style:<br>
<input type="text" name="model" required><br>
        
        House options:<br>
<textarea name="message" rows="5" cols="17"></textarea>
<br>

<input type="submit" value="Submit"><br>
<br>
    </fieldset>
</form>
</div>

    </body>

</html>