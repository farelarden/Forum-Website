<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Matrix</title>
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link href="google.com">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         /* Hide vertical scrollbar */
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-color: black;
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover; 
         color:white;
         }
         li{
         display:inline-block;
         margin-left: 20px;
         padding-top: 43px;
         padding-right: 25px;
         position: relative;
         }
         #Title{
         color:white;
         margin-top:40px;
         font-size:35px;
         padding-right:860px;
         float:left;
         text-transform: uppercase;
         font-family: 'Josefin Sans', sans-serif;
         }
         #Title1{
         font-size:40px;
         color:white;
         margin-top: 60px;
         margin-left:50px;
         }
         #aboutmediv p{
         font-family: 'Josefin Sans', sans-serif;
         color:white;
         font-size:25px;
         margin-left:40px;
         margin-right:40px;
         }
         #aboutmediv h3{
         font-family: 'Josefin Sans', sans-serif;
         color:#FFF474;
         font-size:25px;
         margin-left:40px;
         margin-right:40px;
         } 
         #aboutmediv{
         background-color: rgba(24,24, 24, 0.9);
         width:40%;
         margin-left:40px;
         height: 470px;
         margin-top:65px;
         float:left;
         }
         #image{
         width:50%;
         float:left;
         height:470px;
         margin-top:65px;
         margin-left:70px;
         }
         #footer{
         margin-top:20px;
         background-color:#232531;
         padding-top: 20px;
         padding-bottom: 20px;
         margin-left: -20px;
         margin-right: -20px;
         margin-top:600px;
         }
         #footer h1{
         margin-top: -3px;
         margin-left:0px;
         text-align: center;
         color:white;
         font-size: 15px;
         }
         input[type=submit] {
         background-color: #6ACFF6; 
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin-top:60px;
         margin-bottom:20px;
         cursor: pointer;
         width: 50%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
         }
         p{
         font-size: 30px;
         color: red;
         }
         #mat1,#mat{
         font-size: 40px;
         color: white;
         }
         #matrix{
         font-size:40px;
         background-color: black;
         padding: 30px 50px 30px 50px;
         color:white;
         width:41%
         }
         #matrices{
         margin-left: 35rem;
         margin-top: -50px;
         }
         #wat,#wat1{
         width: 40px;
         font-size: 20px;
         }
         h1{
         color:white;
         font-size:60px;
         margin-left:17rem;
         }
         a{
         color:white;
         font-size:20px;
         }
         #size{
         background-color:   black;
         width: 50%;
         height:170px;
         font-size: 30px;
         }
         button {
         background-color: #6ACFF6; 
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin-top:30px;
         margin-bottom:20px;
         cursor: pointer;
         margin-left: 0px;
         width: 97%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
         }
         h4{
         color:white;
        
         }
         #input[type='text']{
         }
          form{
              margin-top:150px;
          }
      </style>
   </head>
   <body>
      <div id="matrices">
         <?php
            if(isset($_GET['error'])){
              if($_GET['error']=="emptyspaces"){
                  echo '<p class="errors">Fill in all fields</p>';
              }
                if($_GET['error']=="no"){
                  echo '<p class="errors">First Column must be the same size with second row</p>';
              }
            }
            ?>
         <form id="size" method="post" action="Matri1.php">
            <h4>Matrix 1</h4>
            <a>Rows:</a>
            <input type="text" name="rows1" Placeholder="Rows"><br>
            <a>Columns:</a>
            <input type="text" name="Columns1" Placeholder="Columns">
            <h4>Matrix 2</h4>
            <a>Rows:</a>
            <input type="text" name="rows2" Placeholder="Rows"><br>
            <a>Columns:</a>
            <input type="text" name="Columns2" Placeholder="Columns">
            <button type="submit" name="size-submit">Submit</button>
         </form>
      </div>
   </body>
</html>