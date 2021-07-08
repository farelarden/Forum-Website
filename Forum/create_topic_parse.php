<?php

session_start();
if(isset($_POST['topic_submit'])){
      $cid=$_POST['cid'];
        $title=$_POST['topic_title'];
    
    if(($_POST['topic_title']=="")&&($_POST['topic_content']=="")){
        header("Location:create_topic.php?error=emptyspaces&cid=".$cid);
        exit();
    }
 
    
    else{
      
        require 'db.inc.php';
      
        $content=$_POST['topic_content'];
        
        $creator=$_SESSION['userUid'];
        
        $sql="INSERT INTO topic (category_id,topic_title,topic_creator,topic_date,topic_reply_date) VALUES('".$cid."','".$title."','".$creator."',now(),now()) ";       
        $res=mysqli_query($conn,$sql);
         
        $new_topic_id=mysqli_insert_id($conn);
        
        $sql2="INSERT INTO posts (category_id,topic_id,post_creator,post_content,post_date) VALUES ('".$cid."','".$new_topic_id."','".$creator."','".$content."',now())";
 
        $res2=mysqli_query($conn,$sql2);
        $sql3="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."'WHERE id='".$cid."' LIMIT 1";
  
          $res3=mysqli_query($conn,$sql3);
        if(($res)&&($res2)&&($res3)){
            header("Location: view_category.php?cid=".$cid);
            }
        else{
            echo"There is a problem creating your topic, please try again";
        }
        
    }
}