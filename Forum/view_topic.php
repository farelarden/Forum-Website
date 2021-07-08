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
     background-image: url(bg.jpg); 
         overflow-x: hidden; /* Hide horizontal scrollbar */

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
          table{
              margin-left:460px;
          }
          tr{
              background-color: black;
              color:white;
             
          }
          td{
              vertical-align:middle;
              
          }
          #content1{
              background-color: white;
              padding-top: 2px;
              width:40%;
              height: 360px;
              color:white;
              margin-left: 460px;
              margin-top:25px;
              margin-bottom:105px;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);   
          }
           textarea{
width: 80%;
color:black;;
padding: 12px 20px;
box-sizing: border-box;
margin-bottom:20px;
background-color: white;
border:none;
border-bottom:3px solid black;
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
          #title1{
              color:black;
              font-size:30px;
              font-weight: bold;
              font-family:
          }
          .errors8{
color:#F74F4F;
margin-left:5px;
padding-top: -20px;
margin-top: -10px;
              font-weight: bold;
}
             #title{
              color:white;
              font-size:40px;
              background-color: rgba(24,24, 24, 0.7);
              padding: 30px 1px 30px 1px;
              width:30%;
              margin-left: 525px;
              margin-bottom:-20px;
          }
         
      </style>
   </head>
   <body>
      <header>
<h1 id="title">- Post - </h1>
      <div id="content">
          <?php
          require 'db.inc.php';
          $cid=$_GET['cid'];
          $tid=$_GET['tid'];
          $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
          $res=mysqli_query($conn,$sql);
          if(mysqli_num_rows($res)==1){
              echo"<table width='40%'>";
            
                 
                  
               
                  while($row=mysqli_fetch_assoc($res)){
                      $sql2="SELECT * FROM posts WHERE category_id='".$cid."'AND topic_id='".$tid."'";
                      $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
                      while($row2=mysqli_fetch_assoc($res2)){
                          echo"<tr><td valign='middle' style='border:1px solid #000000;'><div style='min-height:125px;'><br/>  ".$row2['post_creator']." - ".$row2['post_date']."<hr/>".$row2['post_content']."</div></td></tr></tr><br>";
                      }
                      $old_views=$row['topic_views'];
                      $new_views=$old_views + 1;
                      $sql3="UPDATE topic SET topic_views='".$new_views."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
                      $res3=mysqli_query($conn,$sql3) ;
                  }
                  echo"</table>";
               
              }
          
          else{
              echo"<p>this topic doesnt exist</p>";
          }
          ?>
          </div> 
          
      <div id="content1">
          <form action="post_reply_parse.php" method="post">
              <p id="title1">- Reply Content -</p>
               <?php
                  if(isset($_GET['error'])){
                      if($_GET['error']=="emptyspaces"){
                         echo '<p class="errors8">Please input your reply!</p>';
                     }
                     
                  }
                  
                  ?>
              <textarea name="reply_content" rows="5" cols="75"></textarea>
              <br><br>
              <input type="hidden" name="cid" value="<?php echo $cid; ?>" />
              <input type="hidden" name="tid" value="<?php echo $tid; ?>" />
              <input type="submit" name="reply_submit" value="Post Your Reply"/>
          </form>
          </div>
        
      </header>
   </body>
</html>