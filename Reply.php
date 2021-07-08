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
         background-position: center;
         background-image:url(bg.jpg);
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
         #title1{
         color:white;
         font-size:30px;
         margin-bottom:50px;
         width:100%;
         }
         #content{
         background-color: rgba(24,24, 24, 1);
         padding-top: 2px;
         width:30%;
         height: 490px;
         color:white;
         margin-left: 545px;
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
         input[type=text]{
         width: 80%;
         color:#6ACFF6;
         padding: 12px 20px;
         box-sizing: border-box;
         margin-bottom:20px;
         background-color: rgba(24,24, 24, 1);
         border:none;
         border-bottom:3px solid white;
         margin-left:1px;
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
         margin-bottom:20px;
         cursor: pointer;
         width: 80%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
         }
         input[type=submit]:hover {
         background-color: #2ebff4;
         }
         #p1{
         margin-left:-280px; 
         }
         #p2{
         margin-left:-250px;  
         }
         .errors8{
         color:#F74F4F;
         margin-left:5px;
         padding-top: -20px;
         margin-top: -30px;
         margin-bottom: 20px;
         font-weight: bold;
         }
          #create{
               background-color: rgba(24,24, 24, 1);
              padding: 30px 50px 30px 50px;
              width:20%;
               font-size:20px;
              text-decoration: none;
             margin-left:-100px;
              margin-bottom: 500px;
              margin-left: -320px;
              color:white;
              margin-top:30px;
          }
          #create:hover{
              color:#6acff6;
              cursor:pointer;
          }
      </style>
   </head>
   <body>
      <header>
         <?php
            $cid=$_GET['cid'];
          $tid=$_GET['tid'];
          $pid=$_GET['pid'];
            
            ?>
           
         <div id="content">
            <h1 id="title1"><u></u></h1>
             
            
            <?php
               if(isset($_GET['error'])){
                   if($_GET['error']=="emptyspaces"){
                      echo '<p class="errors8">Please fill in every fields!</p>';
                  }
                  
               }
               ?>
           <form action="reply_form.php" method="post">
               <p id="title1">- Post Your replies on other's post here -</p>
               <?php
                  if(isset($_GET['error'])){
                      if($_GET['error']=="emptyspaces"){
                         echo '<p class="errors8">Please input your reply!</p>';
                     }
                     if($_GET['error']=="words"){
                          echo '<p class="errors8">Please use appropriate words!</p>';
                      }   
                  
                  }
                  
                  ?>
               <textarea name="reply_content" rows="5" cols="75"></textarea>
               <br><br>
               <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
               <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
               <input type="hidden" name="pid" value="<?php echo $pid; ?>" />
               <input type="submit" name="reply_submit" value="Post Your Reply"/>
            </form>
         </div>
          <?php echo"<br><a id='create' href='view_category.php?cid=".$cid."''>Go back to topics</a><br><br>";?>
      </header>
   </body>
</html>