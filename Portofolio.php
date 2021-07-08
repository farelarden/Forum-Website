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
    
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image:url("Image/New%20Adventure.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;             
         background-attachment: fixed;
         }
       
         #Title{
         color: white;
         background-color: rgba(24,24, 24, 0.7);
         padding: 30px 20px 30px 20px;
         margin-top:70px;
         font-size:50px;
         margin-left:33rem;
             width:28.5%;
         text-transform: uppercase;
         font-family: 'Josefin Sans', sans-serif;
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
          #send1{
              font-size:30px;
              margin-left:50px;
              padding-top:30px;
          }
           #send2{
              font-size:30px;
              margin-left:50px;
              padding-top:10px;
          }
          #uploads{
              background-color: black;
              color:white;
              width:35%;
               margin-left:30.5em;
              padding-bottom: 20px;
             
          }
          #wat1{
              margin-left:55px;
          }
         
          #wat2{
              margin-left:55px;
          }
          .imglist{
              margin-left:19.5rem;
          }
          .imglist_img{
              width:70%;background-color: black;height:30%;
          }
        
          img{
              width:100%;
              height:100%;
          }
          .imglist_user{
              color:white;
              background-color: black;
              width:70%;
              text-align: center;
              padding-top:1px;
              padding-bottom: 1px;
              font-size:30px;
              font-weight: bold;

          }
          .imglist_caption{
              color:black;
              background-color: white;
              width:70%;
           
              padding-top:1px;
              padding-bottom: 1px;
              font-size:30px;
              font-weight: bold;
          }
          #caption{
              margin-left: 20px;
          }
          #sort1{
              width:20%;
              font-size:30px;
              background-color: rgba(24,24, 24, 1);
              padding: 30px 50px 30px 50px;
              background-color: black;
              float:left;
              margin-left:420px;
          }
           #sort1:hover,#sort2:hover{
              color:#6acff6;
              cursor:pointer;
          }
          #sort2{
              width:20%;
              font-size:30px;
              background-color: rgba(24,24, 24, 1);
              padding: 30px 50px 30px 50px;
              background-color: black;
          }
      </style>
   </head>
   <body>
       <h1 id="Title"> Community Page</h1>
      <header>
         
          
          <div id="uploads">
         <p id="send1">Upload here ↓ </p>
             <form action="Uploads.php" method="post" enctype="multipart/form-data">
            <input id="wat1" type="file" name="file">
                 <p id="send2">Caption:</p>
                 <input id="wat2" name="content" type="text">
            <button id="wat2" type="submit" name="submit">Upload</button>
        </form></div>
          <form action="Portofolio.php" method="post" >
            <button id="sort1" type="submit" name="sort-submit1">Oldest</button>
        </form>
          <form action="Portofolio.php" method="post" >
            <button id="sort2" type="submit" name="sort-submit2">Newest</button>
        </form>
          <br><br>
       <?php
 require "db.inc.php";  
         if(isset($_POST['sort-submit1'])){
              $img = "SELECT * FROM imagelist ORDER BY id ASC";
   $result2 =mysqli_query($conn,$img);
   echo "<div class='wrapper'>";
   while ($row2 = mysqli_fetch_assoc($result2)) {
     $id2 = $row2['id'];
     echo "<div class='imglist'>";
    echo "<div class='imglist1'>";
              
    echo "<div class='imglist_img'>";
     echo "<img src='Uploads/".$row2['img']."'>";
     echo "</div>";

     echo "<div class='imglist_user'>";
     echo "<p>".$row2['userUsername']."</p>";
     echo "</div>";

     echo "<div class='imglist_caption'>";
     echo "<p id='caption'>".$row2['caption']."</p>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
     echo "</br><br><br>";    
   }
         }
          else if(isset($_POST['sort-submit2'])) {
              $img = "SELECT * FROM imagelist ORDER BY id DESC";
   $result2 =mysqli_query($conn,$img);
   echo "<div class='wrapper'>";
   while ($row2 = mysqli_fetch_assoc($result2)) {
     $id2 = $row2['id'];
     echo "<div class='imglist'>";
    echo "<div class='imglist1'>";
              
    echo "<div class='imglist_img'>";
     echo "<img src='Uploads/".$row2['img']."'>";
     echo "</div>";

     echo "<div class='imglist_user'>";
     echo "<p>".$row2['userUsername']."</p>";
     echo "</div>";

     echo "<div class='imglist_caption'>";
     echo "<p id='caption'>".$row2['caption']."</p>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
     echo "</br><br><br>";    
   }
          }
          else{
               $img = "SELECT * FROM imagelist";
   $result2 =mysqli_query($conn,$img);
   echo "<div class='wrapper'>";
   while ($row2 = mysqli_fetch_assoc($result2)) {
     $id2 = $row2['id'];
     echo "<div class='imglist'>";
    echo "<div class='imglist1'>";
              
    echo "<div class='imglist_img'>";
     echo "<img src='Uploads/".$row2['img']."'>";
     echo "</div>";

     echo "<div class='imglist_user'>";
     echo "<p>".$row2['userUsername']."</p>";
     echo "</div>";

     echo "<div class='imglist_caption'>";
     echo "<p id='caption'>".$row2['caption']."</p>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
     echo "</br><br><br>";    
   }
              
          }
  

    ?>        
      </header>
   </body>
</html>