<?php
session_start();

if(isset($_POST['reply_submit'])){
    require 'db.inc.php';
$cid=$_POST['cid'];
$tid=$_POST['tid'];
$sql="SELECT * FROM topic WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
$res=mysqli_query($conn,$sql) or mysqli_connect_error();
$row=mysqli_fetch_assoc($res);
$words=array("anjing","fuck","goblok","bitch");
if(($_POST['reply_content']=="")){
header("Location:view_topic.php?error=emptyspaces&cid=".$cid."&tid=".$tid);
exit();
}
   
else{
    for($i=0;$i<3;$i++){
         $pos = strpos($_POST['reply_content'], $words[$i]);
        if($pos!== false){
         header("Location:view_topic.php?error=words&cid=".$cid."&tid=".$tid);
            exit();   
        }
    }
   

$creator=$_SESSION['userUid'];
$reply_content=$_POST['reply_content'];
    $reply_content=str_replace("'","\'",$reply_content);
$sql="INSERT INTO posts(category_id,topic_id,post_creator,post_content, post_date) VALUES ('".$cid."','".$tid."','".$creator."','".$reply_content."', now())";
$res=mysqli_query($conn,$sql);
$sql2="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."'LIMIT 1";
$res2=mysqli_query($conn,$sql2);
$sql3="UPDATE topic SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."'LIMIT 1";
$res3=mysqli_query($conn,$sql3);
if(($res)&&($res2)&&($res3)){
$replies1=$row['topic_replies'];
$replies2=$replies1 + 1;
$sql3="UPDATE topic SET topic_replies='".$replies2."' WHERE category_id='".$cid."'AND id='".$tid."' LIMIT 1";
$res3=mysqli_query($conn,$sql3) ;
header("Location:view_topic.php?cid=".$cid."&tid=".$tid);
}
else{
echo"There is a problem creating your topic, please try again";
}
}
}