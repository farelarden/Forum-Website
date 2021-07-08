<?php
   session_start();

   ?>
<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Portofolio</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link href="google.com">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
     
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image:url("Image/background.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;   
           text-align: center;
             justify-content: center;
               background-attachment: fixed;
      
         }     
          
        
        
     
      
          /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
          #circle1{
              margin-top:30px;
                height: 100px;
  width: 6.5%;
  background-color: #FFB3BA;
  border-radius: 50%;
  display: inline-block;
               position: absolute;
             
             
              
             
          } #img1{
              width:80%;
             height: 770px;
             margin-top: 200px;
margin-bottom: 200px;
           box-shadow: 15px 15px 41px 0px rgba(0,0,0,0.75);
            
        transition:ease 5m;
          } 
          #img2{
              
              height: 100px;
              width: 100%;
               border-radius: 50%;
          }
      </style>
   </head>
   <body>
      <header>

         <div id=circle1>
               <img id="img2" src="Image/arrow.png">
            </div>
                <img  id="img1" src="Image/Ngopi_1.jpg">
          <div id="forum1"></div>
       
            <script
               src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"
               integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ=="
               crossorigin="anonymous"
               ></script>
            <script src="./slide.js"></script>            
        
      </header>
   </body>
</html>