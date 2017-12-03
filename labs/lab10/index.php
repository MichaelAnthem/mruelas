<?php

function saveAndDisplayUploadedImages(){
    if (isset($_POST['submitForm'])){
        echo "File size: " . $_FILES["myFile"]["size"]; 
        
        if ($_FILES["myFile"]["size"] > "1000000"){
            echo"<div id='error'>Error Your Image is larger than 1MB, please submit another!></div>";
        } else{
            //   print_r($_FILES);  
            move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
            echo "<img src='gallery/" . $_FILES['myFile']['name'] . "'>";
        }
         //TO DISPLAY ALL THE IMAGES
              $files = scandir("gallery/", 1);//counts amount of files in folder and stores them in array
            //   print_r($files);//shows amount of files in array from folder
              
              for ($i =0; $i<count($files)-2;$i++){
                  echo "<br/><img class ='image' src='gallery/" . $files[$i] . "'> <br/>";
              }
    }//end If
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10: Upload file </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <h1>Photo Gallery</h1>
        
        <!--TO UPLOAD FILE USE POST METHOD SO ITS NOT DISPLAYED IN URL-->
        <form method="POST" enctype="multipart/form-data"> 
        
            <label for="myFile">Upload File</label>
            <input type="file" name="myFile"/>
            <input type="submit" name="submitForm" value="UploadFile!"/>
       
        </form>
        <?=saveAndDisplayUploadedImages();?>
    </body>
    <script type="text/javascript">
            $('.image').click(function() {
                $(this).toggleClass('enlarged');
            });
    </script>
</html>




<!DOCTYPE html>
<html>
    <head>
        <title>Lab 10: File Upload </title>
         <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
<h1>Photo Gallery</h1>

<form method="POST" enctype="multipart/form-data">
    
    Upload file: 
    
    <input type="file" name="myFile"/>
    
    <input type="submit" name="submitForm"  value="Upload!"/>
    
</form>

    <br />

<?=displayImages()?>

    </body>
</html>