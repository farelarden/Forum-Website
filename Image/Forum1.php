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
         body{
         font-family: 'Montserrat', sans-serif;
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-image:url("Image/background.jpg");
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;   
         background-attachment: fixed;
         } 
         #Titles{
         color: white;
         background-color: rgba(24,24, 24, 0.7);
         padding: 30px 20px 30px 20px;
         margin-top:70px;
         font-size:50px;
         margin-left:32rem;
         float:left;
         text-transform: uppercase;
         font-family: 'Josefin Sans', sans-serif;
         }
         .categories{
        vertical-align: middle;
  line-height: normal;

            text-align: center;
           
             padding-top:80px;
         
         display:block;
         background-color: black;
         width:400px;
         color:white;
         text-decoration: none;
         height: 150px;
         font-size:40px;
         margin-bottom: 5px;
         margin-left: 500px;
         }
          #Title{
              margin-bottom: 100px;
          }
      </style>
   </head>
   <body>
       <h1 id="Title1">hello</h1>
      <div id="content">
         <?php
            require 'db.inc.php';
            $sql= "SELECT * FROM categories ORDER BY category_title ASC";
            $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
            $categories="";
            if(mysqli_num_rows($res)>0){
                
                while($row=mysqli_fetch_assoc($res)){
                    $id=$row['id'];
                    $title=$row['category_title'];
                    $description=$row['category_description'];
                    $categories.="<a href='view_category.php?cid=".$id."' class='categories'>".$title."</font></a><br>";
                }
                echo $categories;
                
            }else{
                echo"<p>There are no categories</p>";
            }
            ?>
      </div>
   </body>
</html>