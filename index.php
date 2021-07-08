<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Log In</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <style>
         li{
         display:inline-block;
         margin-left: 20px;
         padding-top: 43px;
         padding-right: 35px;
         position: relative;
         }
         #Title{
         color:white;
         margin-top:40px;
         font-size:35px;
         padding-right:620px;
         float:left;
         text-transform: uppercase;
         font-family: 'Josefin Sans', sans-serif;
         }
         .intro-text {
         color: white;
         font-family: 'Montserrat', sans-serif;
         font-size: 3rem;
         }
         .hide {
         background:black;
         overflow: hidden;
         }
         .hide span {
         transform: translateY(100%);
         display: inline-block;
         }
         #signin{
         font-size:40px;
         font-family: 'Montserrat', sans-serif;
         padding-top:-60px;
         padding-left:125px;
         }
         .intro{
         background-color: black;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         body{
         font-family: 'Montserrat', sans-serif;
         overflow-y: hidden;
         overflow-x: hidden;
         background-image: url("Image/New%20Adventure.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;

         }
         .success{
         color:#7DDEA2;
         margin-left:115px;
         padding-top: -20px;
         margin-top: -10px;
         }
         #footer{
         margin-top:40px;
         background-color:#232531;
         padding-top: 20px;
         padding-bottom: 20px;
         margin-left: -20px;
         margin-right: -20px;
         }
         #Title{
         margin-right: 25rem;
         }
      </style>
   </head>
   <body>
      <header>

            <div class="nav-div">
                <img id="imglogo" src="Image/Prime.png">
               <ul>
                  <h1 id="Title">prime</h1>
                  <li><a href="Aboutme_1.php">About us</a></li>
                  <li><a href="Contact_1.php">Contact</a></li>
               </ul>
            </div>
            <h2>"Creativity upon <br>
               Perfection"
            </h2>
            <div class="login-div">
               <h1 id="signin">- Welcome -</h1>
               <?php
                  if(isset($_GET['error'])){
                      if($_GET['error']=="wrongpwd"){
                         echo '<p class="errors7">Password does not match</p>';
                     }
                      if($_GET['error']=="nousername/email"){
                         echo '<p class="errors7">The Email/Password does not exist</p>';
                      }
                  }

                  ?>
               <form class="form-login" action="loginform.php" method="post">
                  <h5>Username:</h5>
                  <input type="text" name="mailuid" placeholder="Username/E-mail...">
                  <h5>Password:</h5>
                  <input type="password" name="pwd" placeholder="Password">
                  <button type="submit" name="login-submit">Login</button>
               </form>
               <a href="signup.php" id="signup1">Don't have an account?</a>
            </div>
            <?php
               if(isset($_SESSION['userId'])&&isset($_SESSION['userUid'])){
                  header("Location: Forum_1.php");
                   exit();
               }

               ?>
            <div class="intro">
               <div class="intro-text">
                  <h1 class="hide">
                     <span class="text">"Creativity</span>
                  </h1>
                  <h1 class="hide">
                     <span class="text">upon</span>
                  </h1>
                  <h1 class="hide">
                     <span class="text">Perfection."</span>
                  </h1>
               </div>
            </div>
            <div id="footer">
               <h1>Copyright © 2020 by PRIME</h1>
            </div>
            <script
               src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
               integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
               crossorigin="anonymous"
               ></script>
            <script src="slide.js"></script>

      </header>
   </body>
</html>
