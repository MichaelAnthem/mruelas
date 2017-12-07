<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Finder</title>
         <!-- Bootstrap: Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>
    <style>
        body {
            background-image:url("img/");
            background-size: 100%;
        }
        fieldset {
            background-color: white;
            box-shadow: 4px 4px 4px rgba(50, 50, 50, 0.75);
            margin-top:-10px;
            width:700px;
            height: 500px;
            padding: 10px;
        }
        h1 {
            font-family: times;
    }
        div {
            padding:10px;
        }
    </style>
    <body>
        <div class="col-sm-2"> 
            <form action="login.html" method="post" >
                <input type="submit" value="Login" />
            </form>
        </div>
        
        <fieldset>
             
       <form method="post">
           <center><h1>Hotel Finder</h1></center>
    Hotel Name:  <input type="text" name="title" id="title"/> 
    <span id="display"></span>
    <br>
    Type:<span id="type"></span>
        <br> 
    category: <span id="category"></span>
        <br>
    Category:<span id="categoryId"></span>

         <br>
        <br>
     <input type="submit" value="Enter" name="submit" id="submit" />
     </form> 

     </fieldset>
    </body>
</html>