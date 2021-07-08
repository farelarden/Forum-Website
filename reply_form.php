<?php
session_start();

if(isset($_POST['reply_submit'])){
    require 'db.inc.php';
$cid=$_POST['cid'];
$tid=$_POST['tid'];
$pid=$_POST['pid'];
$sql="SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."' AND id='".$pid."' LIMIT 1";
    $words=array("anjing","fuck","goblok","bitch");
$res=mysqli_query($conn,$sql) or mysqli_connect_error();
$row=mysqli_fetch_assoc($res);
if(($_POST['reply_content']=="")){
header("Location:Reply.php?error=emptyspaces&cid=".$cid."&tid=".$tid."&pid=".$pid);
exit();
}
else{ 
$creator=$_SESSION['userUid'];
$reply_content=$_POST['reply_content'];
    
   for($i=0;$i<3;$i++){
         $pos = strpos($_POST['reply_content'], $words[$i]);
        if($pos!== false){
         header("Location:Reply.php?error=words&cid=".$cid."&tid=".$tid."&pid=".$pid);
         exit();   
        }
    }
   

$reply_content=str_replace("'","\'",$reply_content);
    
    
$sql4="INSERT INTO reply(category_id,topic_id,post_id,reply_creator,reply_content, reply_date) VALUES ('".$cid."','".$tid."','".$pid."','".$creator."','".$reply_content."', now())";
$res4=mysqli_query($conn,$sql4) ;
    
    
$sql2="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."'LIMIT 1";
$res2=mysqli_query($conn,$sql2) or die(mysqli_error());
$sql3="UPDATE topic SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."'LIMIT 1";
$res3=mysqli_query($conn,$sql3) or die(mysqli_error());
    
    
if(($res4)&&($res2)&&($res3)){
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