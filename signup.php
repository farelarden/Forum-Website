<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sign Up</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         overflow-y: hidden; /* Hide vertical scrollbar */
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image: url("Image/New\ Adventure.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;
         }
         li{
         display:inline-block;
         margin-left: 40px;
         padding-top: 43px;
         padding-right: 35px;
         position: relative;
         }
         #Title{
         margin-right: 7.5rem;
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
         .success{
         color:#7DDEA2;
         margin-left:115px;
         padding-top: -20px;
         margin-top: -80px;
         }
         #footer{
         margin-top:40px;
         background-color:#232531;
         padding-top: 20px;
         padding-bottom: 20px;
         margin-left: -20px;
         margin-right: -20px;
         }
      </style>
   </head>
   <body>
      <header>

            <div class="nav-div">
                 <img id="imglogo" src="Image/Prime.png">
               <ul>
                  <h1 id="Title">prime</h1>
                 <li><a href="Aboutme_1.php" >About Us</a></li>
                  <li><a href="Contact_1.php">Contact</a></li>
               </ul>
            </div>
            <h2>"Creativity upon <br>
               Perfection"
            </h2>
            <div class="login-div">
               <h1 id="signup-title">- Sign Up-</h1>
               <?php
                  if(isset($_GET['error'])){
                      if($_GET['error']=="emptyfields"){
                          echo '<p class="errors">Fill in all fields</p>';
                      }
                      if($_GET['error']=="invalidemailusername"){
                          echo '<p class="errors1">Invalid Email and Username</p>';
                      }
                      if($_GET['error']=="invalidemail"){
                          echo '<p class="errors2">Invalid Email</p>';
                      }
                      if($_GET['error']=="invalidusername"){
                          echo '<p class="errors3">Invalid Username</p>';
                      }
                      if($_GET['error']=="pwdcheck"){
                          echo '<p class="errors4">Password did not match</p>';
                      }
                      if($_GET['error']=="usernamehasbeenstaken"){
                          echo '<p class="errors5">Username has been taken</p>';
                      }
                      if($_GET['error']=="sqlerror"){
                          echo '<p class="errors">Sign up error</p>';
                      }
                      if($_GET['error']=="emailhasbeenstaken"){
                          echo '<p class="errors6">Email has been taken</p>';
                      }
                      if($_GET['error']=="pwdinvalidlength"){
                          echo '<p class="errors9">The Password is too short</p>';
                      }
                      if($_GET['error']=="usernameinvalidlength"){
                          echo '<p class="errors9">The Username is too short</p>';
                      }
                  }
                   else if(isset($_GET["signup"])){
                   if($_GET["signup"]=="success"){
                      echo'<p class=success>Signup Successful!</p>';

                  }
                   }

                  ?>
               <form class="signup-form" action="signupform.php" method="post">
                  <input type="text" name="user" placeholder="Username">
                  <input type="text" name="email" placeholder="E-mail">
                  <input type="password" name="pwd" placeholder="Password">
                  <input type="password" name="repwd" placeholder="Confirm Password">
                  <button type="submit" name="signup-submit">Signup</button>
               </form>
               <a href="index.php" id="signup">Have an account?</a>
            </div>
            <div id="footer">
               <h1>Copyright © 2020 by PRIME</h1>
            </div>

      </header>
   </body>
</html>
