<?php
session_start();
if(isset($_POST['reply_submit'])){
     $cid=$_POST['cid'];
    $tid=$_POST['tid'];
    if(($_POST['reply_content']=="")){
        header("Location:view_topic.php?error=emptyspaces&cid=".$cid."&tid=".$tid);
        exit();
    }
    else{
    require 'db.inc.php';
    $creator=$_SESSION['userUid'];
   
    $reply_content=$_POST['reply_content'];
    $sql="INSERT INTO posts(category_id,topic_id,post_creator,post_content, post_date) VALUES ('".$cid."','".$tid."','".$creator."','".$reply_content."', now())";
    $res=mysqli_query($conn,$sql);
    $sql2="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."'LIMIT 1";
    $res2=mysqli_query($conn,$sql2);
    $sql3="UPDATE topic SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."'LIMIT 1";
    $res3=mysqli_query($conn,$sql3);
  if(($res)&&($res2)&&($res3)){
             header("Location:view_topic.php?cid=".$cid."&tid=".$tid);
            }
        else{
            echo"There is a problem creating your topic, please try again";
        }
       
    
}
}