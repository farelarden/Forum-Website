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
       
         table{
         margin-left:460px;
             margin-bottom: 20px;
         }
         tr{
         background-color: black;
         color:white;
            margin-bottom: 20px;
         }
         td{
         margin-bottom: 20px;
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
         margin-left: 550px;
        
         }
          #wat{
              margin-bottom: 20px;
          }
          #wat1{
              padding-left: -100px;
              margin-bottom: 20px;
              background-color: white;
              color:black;
          }
            #input-search{
               padding-top: 17px;
              margin-top:5px;
              background-color:white ;
              width:40%;
              color:black;
          }
          #submit-search{
               margin-left:-4px;
                width:10%;
             padding-bottom: 12px;
            
          }
          .searchbar{
              background-color: #202020;
              margin-top: -10px;
              margin-left:-10px;
              margin-right:-10px;
              padding-bottom: 5px;
              transform: translateY(0%);
          }
          #order-by1{
              width:10%;
           
        
          }
          #order-by2{
              width:10%;
          }
           #create{
               background-color: rgba(24,24, 24, 1);
                padding: 30px 50px 30px 50px;
              width:20%;
               font-size:20px;
              text-decoration: none;
             margin-left:-100px;
              margin-bottom: 500px;
              margin-left: -480px;
              color:white;
              margin-top:30px;
          }
          #create:hover{
              color:#6acff6;
              cursor:pointer;
          }
          #reply{
              color:white;
              text-decoration: none;
              margin-left:35rem;
                           padding: 10px 20px 10px 20px;
               background-color: #6ACFF6;
          }
          #reply:hover{
             background-color: #2ebff4; 
          }
          #range{
              background-color: black;
              width:39.8%;
              margin-left:28.9rem;
              margin-bottom: 40px;
          }
          #butdate{
              width:20%;
              padding: 10px 10px 10px 10px;
              margin-bottom: 30px;
          }
          input[type=date]{
              padding: 10px 10px 10px 10px;
              margin-left:20px;
          }
          
      </style>
   </head>
   <body>
       <?php
               $cid=$_GET['cid'];
               $tid=$_GET['tid'];
       ?>
      <header>
          <div class="searchbar"> 
       <form class="form1" action="<?php 'view_topic.php?cid=".$cid."&tid=".$tid'; ?>" method="post">
         <input  id="input-search"type="text" name="search" placeholder="Search">
          <button id="submit-search"type="submit" name="search-submit">Search</button>
          <button id="order-by1"type="submit" name="order-submit1">Newest</button>
            <button id="order-by2"type="submit" name="order-submit2">Oldest</button>
       </form>
          </div >
         <h1 id="title">- Post - </h1>
          <div id="range">
             <form  action="<?php 'view_topic.php?cid=".$cid."&tid=".$tid'; ?>" method="post">
                  <input type=date name="date1">
              <input type=date name="date2">
               <button id="butdate" type="submit" name="Range-Date">Range</button>
              </form>
          </div>
           
         <div id="content">
            <?php
               require 'db.inc.php';
             if(isset($_POST['Range-Date'])){
                 $date1=$_POST['date1'];
                 $date2=$_POST['date2'];              
                 
                 $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
               $res=mysqli_query($conn,$sql);
               if(mysqli_num_rows($res)==1){
                   echo"<table width='40%'>";                
                   while($row=mysqli_fetch_assoc($res)){
                    
                       
                           $sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'AND post_date BETWEEN '".$date1."' AND '".$date2."' ORDER BY post_date DESC";
                           $res2=mysqli_query($conn,$sql2);
                           while($row2=mysqli_fetch_assoc($res2)){
                               $id=$row2['id']; 
                               $sql3="SELECT * FROM reply WHERE category_id='".$cid."'AND topic_id='".$tid."'AND post_id='".$id."'";
                               $res3=mysqli_query($conn,$sql3) or die(mysqli_error());
                             
                               echo"<tr id='wat'><td ><div style='min-height:125px;'><br>  ".$row2['post_creator']." on ".$row2['post_date']."<hr/>".$row2['post_content']." <br/>
                               
                               <a id='reply' href='Reply.php?cid=".$cid."&tid=".$tid."&pid=".$id."'>Reply </a></div></td></tr>";
                             
                             while($row3=mysqli_fetch_assoc($res3)){
                                  echo"<tr   id='wat1'><td  width='20%'  ><div  style='min-height:100px'><br> Reply by ".$row3['reply_creator']." on ".$row3['reply_date']."<hr/>".$row3['reply_content']." <br/></tr></div></td>";
                             }
                           }
                           $views1=$row['topic_views'];
                           $views2=$views1 + 1;
                           $sql4="UPDATE topic SET topic_views='".$views2."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
                           $res4=mysqli_query($conn,$sql4) ;
                       }
                       echo"</table>";
                    
                   }
               
               else{
                   echo"<p>this topic doesnt exist</p>";
               } 
                 
             }
             
              else if(isset($_POST['search-submit'])){
                   $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
               $res=mysqli_query($conn,$sql);
               if(mysqli_num_rows($res)==1){
                   echo"<table width='40%'>";                
                   while($row=mysqli_fetch_assoc($res)){
                           $search=mysqli_real_escape_string($conn,$_POST['search']);                                               
                 $sql2= "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' AND post_content LIKE '%$search%'";
                 $res2=mysqli_query($conn,$sql2) or die(mysqli_connect_error());
                           while($row2=mysqli_fetch_assoc($res2)){
                              
                               echo"<tr id='wat'><td ><div style='min-height:125px;'><br>  ".$row2['post_creator']." on ".$row2['post_date']."<hr/>".$row2['post_content']." </div></td></tr>";
                            
                           }
                           
                       }
                       echo"</table>";
                    
                   }
               
               else{
                   echo"<p>There are no post according to your search</p>";
               }    
                  
                   
                  
                  
              }
             else if(isset($_POST['order-submit1'])){
                $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
               $res=mysqli_query($conn,$sql);
               if(mysqli_num_rows($res)==1){
                   echo"<table width='40%'>";                
                   while($row=mysqli_fetch_assoc($res)){
                           $sql2="SELECT * FROM posts WHERE category_id='".$cid."'AND topic_id='".$tid."'ORDER BY post_date DESC";
                           $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
                           while($row2=mysqli_fetch_assoc($res2)){
                               $id=$row2['id']; 
                               $sql3="SELECT * FROM reply WHERE category_id='".$cid."'AND topic_id='".$tid."'AND post_id='".$id."'";
                               $res3=mysqli_query($conn,$sql3) or die(mysqli_error());
                             
                               echo"<tr id='wat'><td ><div style='min-height:125px;'><br>  ".$row2['post_creator']." on ".$row2['post_date']."<hr/>".$row2['post_content']." <br/>
                               
                               <a id='reply' href='Reply.php?cid=".$cid."&tid=".$tid."&pid=".$id."'>Reply </a></div></td></tr>";
                             
                             while($row3=mysqli_fetch_assoc($res3)){
                                  echo"<tr   id='wat1'><td  width='20%'  ><div  style='min-height:100px'><br> Reply by ".$row3['reply_creator']." on ".$row3['reply_date']."<hr/>".$row3['reply_content']." <br/></tr></div></td>";
                             }
                           }
                           $views1=$row['topic_views'];
                           $views2=$views1 + 1;
                           $sql4="UPDATE topic SET topic_views='".$views2."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
                           $res4=mysqli_query($conn,$sql4) ;
                       }
                       echo"</table>";
                    
                   }
               
               else{
                   echo"<p>this topic doesnt exist</p>";
               }     
             }
              else if(isset($_POST['order-submit2'])){
                  $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
               $res=mysqli_query($conn,$sql);
               if(mysqli_num_rows($res)==1){
                   echo"<table width='40%'>";                
                   while($row=mysqli_fetch_assoc($res)){
                           $sql2="SELECT * FROM posts WHERE category_id='".$cid."'AND topic_id='".$tid."'ORDER BY post_date ASC";
                           $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
                           while($row2=mysqli_fetch_assoc($res2)){
                               $id=$row2['id']; 
                               $sql3="SELECT * FROM reply WHERE category_id='".$cid."'AND topic_id='".$tid."'AND post_id='".$id."'";
                               $res3=mysqli_query($conn,$sql3) or die(mysqli_error());
                             
                               echo"<tr id='wat'><td ><div style='min-height:125px;'><br>  ".$row2['post_creator']." on ".$row2['post_date']."<hr/>".$row2['post_content']." <br/>
                               
                               <a id='reply' href='Reply.php?cid=".$cid."&tid=".$tid."&pid=".$id."'>Reply </a></div></td></tr>";
                             
                             while($row3=mysqli_fetch_assoc($res3)){
                                  echo"<tr   id='wat1'><td  width='20%'  ><div  style='min-height:100px'><br> Reply by ".$row3['reply_creator']." on ".$row3['reply_date']."<hr/>".$row3['reply_content']." <br/></tr></div></td>";
                             }
                           }
                           $views1=$row['topic_views'];
                           $views2=$views1 + 1;
                           $sql4="UPDATE topic SET topic_views='".$views2."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
                           $res4=mysqli_query($conn,$sql4) ;
                       }
                       echo"</table>";
                    
                   }
               
               else{
                   echo"<p>this topic doesnt exist</p>";
               }     
              }
           
             else{
                 $sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
               $res=mysqli_query($conn,$sql);
               if(mysqli_num_rows($res)==1){
                   echo"<table width='40%'>";                
                   while($row=mysqli_fetch_assoc($res)){
                           $sql2="SELECT * FROM posts WHERE category_id='".$cid."'AND topic_id='".$tid."'";
                           $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
                           while($row2=mysqli_fetch_assoc($res2)){
                               $id=$row2['id']; 
                               $sql3="SELECT * FROM reply WHERE category_id='".$cid."'AND topic_id='".$tid."'AND post_id='".$id."'";
                               $res3=mysqli_query($conn,$sql3) or die(mysqli_error());
                             
                               echo"<tr id='wat'><td ><div style='min-height:125px;'><br>  ".$row2['post_creator']." on ".$row2['post_date']."<hr/>".$row2['post_content']." <br/>
                               
                               <a id='reply' href='Reply.php?cid=".$cid."&tid=".$tid."&pid=".$id."'>Reply </a></div></td></tr>";
                             
                             while($row3=mysqli_fetch_assoc($res3)){
                                  echo"<tr   id='wat1'><td  width='20%'  ><div  style='min-height:100px'><br> Reply by ".$row3['reply_creator']." on ".$row3['reply_date']."<hr/>".$row3['reply_content']." <br/></tr></div></td>";
                             }
                           }
                           $views1=$row['topic_views'];
                           $views2=$views1 + 1;
                           $sql4="UPDATE topic SET topic_views='".$views2."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
                           $res4=mysqli_query($conn,$sql4) ;
                       }
                       echo"</table>";
                    
                   }
               
               else{
                   echo"<p>this topic doesnt exist</p>";
               } 
             }
              
               ?>
         </div>
         <div id="content1">
            <form action="post_reply_form.php" method="post">
               <p id="title1">- Post Your Reply Here! -</p>
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
               <input type="submit" name="reply_submit" value="Post Your Reply"/>
            </form>
            
         </div>
           <?php echo"<a id='create' href='view_category.php?cid=".$cid."''>Go back to topics</a><br><br><br><br><br>";?>
      </header>
   </body>
</html>