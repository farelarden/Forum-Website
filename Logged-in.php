<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <style>
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
         padding-right:720px;
         float:left;
         text-transform: uppercase;
         font-family: 'Josefin Sans', sans-serif;
         }
         #logged{
         justify-content: center;
         text-align: center;
         color:white;
         font-size: 70px;
         padding-top:200px;
         }
         body{
         margin-bottom: 200px;
         background-image:url(Image/New%20Adventure_1.jpg);
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover; 
         font-family: 'Montserrat', sans-serif;
         overflow-y: hidden; 
         overflow-x: hidden; 
             position:sticky;
          }
          .title{
              color:white;
              font-size: 70px;
              margin-left:25rem;
              margin-top: -3rem;
             
          }
  
      </style>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Logged-In</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
       <script language="javascript" type="text/javascript">
          history.pushState(null,null, location.href);
           window.onpopstate=function(){
               history.go(1);
           };
                </script>
   </head>
   <body>
      <header>
         <nav clas="navbar">
            <div class="nav-div">
               <a href="index.php">  <img id="imglogo" src="Image/Prime.png"></a>
               <ul>
                  <h1 id="Title">Prime</h1>
                  <li><a href="Portofolio_1.php">Home</a></li>
                  <li><a href="Forum_1.php">Forum</a></li>
                  <li><a href="Aboutme1.php">About Us</a></li>
                  <li><a href="Contact1.php">Contact</a></li>
                  <li><a href="Logged-out.inc.php">Log Out</a></li>
               </ul>
            </div>
            <div>
                
               <h1 id="logged"> <?php echo"<h1 class='title'>Welcome, ".$_SESSION['userUid']."!</h1>";?></h1>
            </div>
                    
         </nav>
      </header>
   </body>
</html>