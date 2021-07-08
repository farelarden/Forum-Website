<?php
if(isset($_POST['login-submit'])){
require "db.inc.php";
$email=$_POST['mailuid'];
$pwd=$_POST['pwd'];
if(empty($email)||empty($pwd)){
header("Location: index1.php?error=emptyfields");
exit();
}
else{
$sql="SELECT * FROM users WHERE userUsername=? OR emailUsers=?;";
$statement= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($statement,$sql)){
header("Location: index1.php?error=sqlerror");
exit();
}
else{
mysqli_stmt_bind_param($statement,"ss",$email,$email);
mysqli_stmt_execute($statement);
$res=mysqli_stmt_get_result($statement);
$reschk= mysqli_stmt_num_rows($statement);
if($row=mysqli_fetch_assoc($res)){
$pwdChk=password_verify($pwd,$row['pwdUsers']);
if( $pwdChk == false){
header("Location: index1.php?error=wrongpwd");
exit();
}
else if($pwdChk==true){
session_start();
$_SESSION['userId']=$row['IdUsers'];
$_SESSION['userUid']=$row['userUsername'];
     $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['IdUsers']."')
        ";
        
        $statement->execute();
        
header("Location: Forum_1.php");
exit();
}
else{
header("Location: index.php?error=wrongpwd");
exit();
}
}
if(!$reschk){
header("Location: index1.php?error=nousername/email");
exit();  
}
}
}}