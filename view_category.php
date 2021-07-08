<?php
   session_start();
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Topics</title>
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
       
          #titlerow{
              background-color: black;
              
          }
          #titlerow td{
              color:white;
              height: 100px;
              font-size: 30px;
              font-weight: bold;
              margin-left: 20px;
          }
          table{
              margin-left: 380px;
          }
          #tablerow{
              background-color: #f7f5aa;
              height:100px;
          }
          #titlerow1{
              color:black;
              text-decoration: none;
              font-size:25px;
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
              margin-left: -80px;
              color:white;
              margin-top:30px;
          }
          #create:hover{
              color:#6acff6;
              cursor:pointer;
          }
          #create1{
             background-color: rgba(24,24, 24, 1);
              padding: 30px 50px 30px 50px;
              width:20%;
               font-size:20px;
              text-decoration: none;
             margin-left:-700px;
              margin-bottom: 500px;
              color:white;
              margin-right: 50px;
              margin-top:30px; 
          }
           #create1:hover{
              color:#6acff6;
              cursor:pointer;
          }
          #title{
              color:white;
              font-size:40px;
              background-color: rgba(24,24, 24, 0.7);
              padding: 30px 1px 30px 1px;
              width:30%;
              margin-left: 525px;
              margin-bottom:70px;
          }
         
          .title{
               background-color: black;
              color:white;
              height: 100px;
              font-size:35px;
              font-weight: bold;
              margin-left: 20px; 
          }
          .title:hover{
              background-color: black;
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
      </style>
       <script language="javascript" type="text/javascript">
          function preback(){
              window.history.forwad();
          }
           setTimeout("preback()",0);
           window.onunload=function(){null};
                </script>
   </head>
   <body>
      <header>
          <?php
           $cid=$_GET['cid'];
          ?>
            <div class="searchbar">
       <form class="form1" action="<?php 'view_category.php?cid=.$cid'; ?>" method="post">
         <input  id="input-search"type="text" name="search" placeholder="Search">
          <button id="submit-search"type="submit" name="search-submit">Search</button>
          
       </form>
       
     </div>
          <h1 id="title">- Topics -</h1>
          
         <div id="content">
            <?php
               require 'db.inc.php';
             
             
             if(isset($_POST['search-submit'])){
                 $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
                 $res=mysqli_query($conn,$sql) or mysqli_connect_error();
                   
                 
                  if(mysqli_num_rows($res)==1){
                 
                 $search=mysqli_real_escape_string($conn,$_POST['search']);
                 $sql2= "SELECT * FROM topic WHERE category_id='".$cid."' AND topic_title LIKE '%$search%' ";
                 $res2=mysqli_query($conn,$sql2) or die(mysqli_connect_error());
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit' class='title'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics according to your search</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
             
             
             
             
               else if(isset($_POST['topic-submit'])){
                    
                    $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_title DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."'><tr id='titlerow'><td width='65'><button class='title' name='topic-submit2'>Topic Title↓</button>
                       </td><td width='65' align='center'><button class='title'name='replies-submit'>Replies</button></td><td width='65' align='.center'><button class='title'name='views_submit'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
               }
             else if(isset($_POST['topic-submit2'])){
                    $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_title ASC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."'><tr id='titlerow'><td width='65'><button class='title' name='topic-submit3'>Topic Title↑</button>
                       </td><td width='65' align='center'><button class='title' name='replies-submit'>Replies</button></td><td width='65' align='.center'><button class='title'name='views_submit'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
               }
              else if(isset($_POST['topic-submit3'])){
                  $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_reply_date DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button></td><td width='65' align='center'><button class='title' name='replies-submit'>Replies</button></td><td width='65' align='.center'><button class='title'name='views_submit'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             } 
               else if(isset($_POST['replies-submit'])){
                   $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_replies DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit2'>Replies↓</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit' class='title'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
                else if(isset($_POST['replies-submit2'])){
                        $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_replies ASC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit3'>Replies↑</button>
                       
                       </td><td width='65' align='.center'><button class='title'name='views_submit'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }  
                 else if(isset($_POST['replies-submit3'])){
                     $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_reply_date DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit'class='title'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
                else if(isset($_POST['views_submit'])){
                    $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_views DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit2' class='title'>Views↓</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
             else if(isset($_POST['views_submit2'])){
                 $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_views ASC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit3' class='title'>Views↑</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
              }
             
                 else if(isset($_POST['views_submit3'])){
                  $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_reply_date DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit' class='title'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
                 
             else{
                 
                 $sql="SELECT id FROM categories WHERE id='".$cid."'LIMIT 1";
               $res=mysqli_query($conn,$sql) or mysqli_connect_error();
            
               if(mysqli_num_rows($res)==1){
                  $sql2="SELECT * FROM topic WHERE category_id='".$cid."'ORDER BY topic_reply_date DESC";
                               
                  $res2=mysqli_query($conn,$sql2) or mysqli_connect_error();
                   if(mysqli_num_rows($res2)>0){
                       $topics = "<table width='50%' style='border-collapse:collapse;'>";
                     
                       $topics .="<form method='post' action='view_category.php?cid=".$cid."''><tr id='titlerow'><td width='65'><button class='title' name='topic-submit'>Topic Title</button>
                       </td><td width='65' align='center'>
                       <button class='title' name='replies-submit'>Replies</button>
                       
                       </td><td width='65' align='.center'><button name='views_submit' class='title'>Views</button></td></tr></form>";
                       $topic = "<tr><td colspan='3'><hr/></td><tr>";
                       
                       while($row=mysqli_fetch_assoc($res2)){
                           $tid=$row['id'];
                           $title=$row['topic_title'];
                           $views=$row['topic_views'];
                           $date=$row['topic_date'];
                           $replies=$row['topic_replies'];
                           $creator=$row['topic_creator'];
                           $topics .= "<tr id='tablerow'><td><a id='titlerow1'href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$title."</a><br><br><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>".$replies."</td><td align='center'>".$views."</td></tr>";
                          
                       }
                       
                       $topics.="</table>";
                       echo $topics;
                       
                   }else{
                   
                       
                       echo"<p id='error'>There are no topics yet</p>";
                   }
               }
               else{
                  echo"<a href='Forum.php'>Return to Forum Index</a>";
               }
             }
               
               ?>
             
         </div> 
          <div>
          <h1>
             <?php echo"<br><a id='create' href='create_topic.php?cid=".$cid."'>Click here to create a topic</a><a id='create1' href='Forum.php'>Return to Categories</a><br><br>";?></h1></div>
          <div>
              
          </div>
          
      </header>
       
   </body>
</html>