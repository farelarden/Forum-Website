<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact Us</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
 
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
        
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image:url("Image/New%20Adventure_1.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;   
         text-align: center;
         background-attachment: fixed;
         }
         li{
         display:inline-block;
         margin-left: 10px;
         padding-top: 43px;
         padding-right: 7px;
         position: relative;
         }
         #Title{
         color:white;
         margin-top:40px;
         font-size:35px;
         padding-right:890px;
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
         font-size:20px;
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
         margin-left:0px;
         height: 470px;
         margin-top:65px;
         float:left;
         }
         #image{
         width:40%;
         float:left;
         height:470px;
         margin-top:65px;
         margin-left:70px;
         }
         #footer{
         background-color:#232531;
         padding-top: 20px;
         padding-bottom: 20px;
         margin-left: -20px;
         margin-right: -20px;
         margin-top:400px;
         }
         #footer h1{
         margin-top: -3px;
         margin-left:0px;
         text-align: center;
         color:white;
         font-size: 15px;
         }
         
         #contactus{
         font-size:70px;
         color:white;
         margin-top: 120px;
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
margin-left: 40px;
width: 20%;
font-size: 20px;
font-family: 'Josefin Sans', sans-serif;
}
          #wat{
width: 30%;
color:#6ACFF6;
              font-size:20px;
padding: 12px 20px;
box-sizing: border-box;
margin-left: 40px;
background-color: rgba(24,24, 24, 1);
border:none;

}
          #send{
             color:white;
              font-size:30px;
              font-weight: bold;
          }
          #send1{
              margin-right:630px;
              color:white;
              font-size:30px;
              font-weight: bold;
          }
           #content{
         background-color: rgba(24,24, 24, 1);
         padding-top: 2px;
         width:30%;
         height: 490px;
         color:white;
         margin-left: 530px;
         margin-top:50px;
         margin-bottom:55px;
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);   
         }
          textarea{
         width: 80%;
         color:#6ACFF6;
         padding: 12px 20px;
         box-sizing: border-box;
         margin-bottom:20px;
         background-color: rgba(24,24, 24, 1);
         border:none;
         border-bottom:3px solid white;
         }
          #wats{
              background-color: #6ACFF6; 
         border: none;
         color: white;
         padding: 15px 32px;
              margin-right:40px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin-bottom:20px;
         cursor: pointer;
         width: 80%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
          }
          input[type=text]{
              margin-right:40px;
          }
          .errors{
             
              font-size:20px;
              margin-right:120px;
          }
          #circle1{
         margin-top:30px;
         height: 160px;
         width: 10%;
         background-color: #FFB3BA;
         border-radius: 50%;
         display: inline-block;
         position: absolute;
         margin-left:-450px;
              margin-bottom: 300px;
         }
         #img1{
         height: 160px;
         width: 100%;
         }
         #circle2{
         margin-top:30px;
         height: 160px;
         position: absolute;
         margin-left:-200px;
         width: 10%;
         background-color: #3A569C;
         border-radius: 50%;
         display: inline-block;
         text-align: center;
         }
         #img2{
         height: 110px;
         width: 70%;
         margin-top:22px;
         }
         #circle3{
         margin-top:30px;
         position: absolute;
         height: 160px;
         margin-left:50px;
         width: 10%;
         background-color:white;
         border-radius: 50%;
         display: inline-block;
         text-align: center;
         }
         #circle4{
         margin-top:30px;
         position: absolute;
         height: 160px;
         margin-left:300px;
         width: 10%;
         background-color:white;
         border-radius: 50%;
         display: inline-block;
         text-align: center;
         }
         #img3{
         height: 110px;
         width: 70%;
         margin-top:24px;
         }
         #img4{
         height: 110px;
         width: 70%;
         margin-top:24px;
         }
          #wat1{
              padding-bottom: 300px;
          }
      </style>
   </head>
   <body>
      <header>
         <nav clas="navbar">
            <div class="nav-div">
              
            </div>
            <h1 id="contactus">- Contact Us - </h1>
             
             <div id="content">
                 <p id="send">Send E-Mail to Us!</p>
                 <?php
                  if(isset($_GET['error'])){
                      if($_GET['error']=="emptyfields"){
                          echo '<p class="errors">Fill in all fields</p>';
                      }
                      if($_GET['error']=="invalidemail"){
                          echo '<p class="errors">Invalid Email</p>';
                      }
                  }
                      ?>
                 <form action="contactform.php" method="post">
                     <input type="text" name="name" Placeholder="Full Name">
                     <input type="text" name="email" Placeholder="Email">
                     <input type="text" name="subject" Placeholder="Subject">
                     <textarea name="message" Placeholder="Message"></textarea>
                     <button id="wats"name="submit" type="submit">Send Mail</button>
                     
                 </form></div>
                 
            <br>
      <a href="https://www.instagram.com/farelarden_/?hl=en">
               <div id=circle1>
                  <img id="img1" src="Image/pics-photos-instagram-logo-png-4.png">
               </div>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100010716490690">
               <div id=circle2>
                  <img id="img2" src="Image/d2e5359f8402cb8d3d7b22c463f9013b.png">
               </div>
            </a>
            <a href="https://www.behance.net/farelarden">
               <div id=circle3>
                  <img id="img4" src="Image/behance.png">
               </div>
            </a>
            <a href="mailto:farelarden13@gmail.com">
               <div id=circle4>
                  <img id="img3" src="Image/gmail.png">
               </div>
            </a>
         <div id="wat1">
             </div>


            
                    
         </nav>
      </header>
           <br><br>
   </body>
</html>