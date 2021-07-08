<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>About Us</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link href="google.com">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         overflow-y: hidden; /* Hide vertical scrollbar */
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image:url("Image/New%20Adventure.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;    
         }
         li{
         display:inline-block;
         margin-left: 20px;
         padding-top: 43px;
         padding-right:7px;
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
      </style>
   </head>
   <body>
      <header>
         <nav clas="navbar">
            <div class="nav-div">
               
            </div>
            <div id=aboutmediv>
               <h1 id="Title1">
                  About Us -
               </h1>
                 <p >
                   PRIME is a forum for designers, arranging from 2D illustrator to 3D artists. We are exist to welcome, promote, and support designers. Everything is possible here. After all, what is a designer without communities and inspirations?<br>
                   Lastly, Welcome to PRIME.
               </p>
            </div>
            <div >
               <img id="image" src="Image/Ngopi_1.jpg">
            </div>
           
         </nav>
      </header>
   </body>
</html>