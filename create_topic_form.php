<?php
session_start();
if(isset($_POST['topic_submit'])){
$cid=$_POST['cid'];
if((empty($_POST['topic_content']))||(empty($_POST['topic_title']))){
header("Location:create_topic.php?error=emptyspaces&cid=".$cid);
exit();
}
else{
require 'db.inc.php';

$title=$_POST['topic_title'];
$content=$_POST['topic_content'];
    $words=array("anjing","fuck","goblok","bitch");
    
       for($i=0;$i<3;$i++){
         $pos = strpos($_POST['topic_content'], $words[$i]);
        if($pos!== false){
        header("Location:create_topic.php?error=words&cid=".$cid);
            exit();   
        }
    }
    
$creator=$_SESSION['userUid'];
$content=str_replace("'","\'",$content);
$sql="INSERT INTO topic (category_id,topic_title,topic_creator,topic_date,topic_reply_date) VALUES('".$cid."','".$title."','".$creator."',now(),now()) ";       
$res=mysqli_query($conn,$sql) or die(mysqli_error($conn));
$new_topic_id=mysqli_insert_id($conn);
    
$sql2="INSERT INTO posts (category_id,topic_id,post_creator,post_content,post_date) VALUES('".$cid."','".$new_topic_id."','".$creator."','".$content."',now())";
$res2=mysqli_query($conn,$sql2)or die(mysqli_error($conn));
    
$sql3="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."'WHERE id='".$cid."' LIMIT 1";
$res3=mysqli_query($conn,$sql3)or die(mysqli_error($conn));

if(($res)&&($res2)&&($res3)){
header("Location: view_category.php?cid=".$cid);
}
else{
echo"There is a problem creating your topic, please try again";
}
}
}