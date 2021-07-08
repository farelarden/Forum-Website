<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
       <style>
           #logged{
            justify-content: center;
               text-align: center;
            color:white;
               font-size: 70px;
               padding-top:200px;
               
            
}
           body{
               margin-bottom: 200px;
               background-image:url(New%20Adventure_1.jpg);
               background-position: center;
               background-repeat: no-repeat;
               background-size:cover; 
               font-family: 'Montserrat', sans-serif;
overflow-y: hidden; 
overflow-x: hidden; 
           }
       </style>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Logged-Out</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
   </head>
   <body>
      <header>
         <nav clas="navbar">
            <div class="nav-div">
               <a href="index.php">  <img id="imglogo" src="Prime.png"></a>
               <ul>
                  <h1 id="Title">Prime</h1>

               </ul>
            </div>
            <div>
                <h1 id="logged">You're Logged Out!</h1>
             </div>
             <div id="footer">
                 
             </div>
               <script
                  src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
                  integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
                  crossorigin="anonymous"
                  ></script>
               <script src="./slide.js"></script>            
           
         </nav>
      </header>
   </body>
</html>