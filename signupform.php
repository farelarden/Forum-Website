<?php
   if(isset($_POST['signup-submit'])){
       require 'db.inc.php';
      
       $username=$_POST['user'];
       $email=$_POST['email'];
       $pwd=$_POST['pwd'];
       $repwd=$_POST['repwd'];
       
       if(empty($username)||empty($email)||empty($pwd)||empty($repwd)){
           header("Location: signup.php?error=emptyfields&username=".$username."&email=".$email);
           exit();
       }
               
       else if(strlen($username)<6){
           header("Location: signup.php?error=usernameinvalidlength&username=".$username."&email=".$email);
           exit();
       }
     //below here is a search pattern basicly
       else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
           header("Location: signup.php?error=invalidusername&email=".$email);
           exit();
       }
      
       else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           header("Location: signup.php?error=invalidemail&username=".$username);
           exit();
       }
       else if($pwd !==$repwd){
           header("Location: signup.php?error=pwdcheck&username=".$username."&email=".$email);
           exit();
       }
       
       else if(strlen($pwd)<6){
           header("Location: signup.php?error=pwdinvalidlength&username=".$username."&email=".$email);
           exit();
       }
       
       else{
           $sql="SELECT userUsername FROM users WHERE userUsername=?";
           $statement = mysqli_stmt_init($conn);
           if(!mysqli_stmt_prepare( $statement,$sql)){
               header("Location: signup.php?error=sqlerror");
               exit();
           }
           else{
               mysqli_stmt_bind_param( $statement,"s",$username);
               mysqli_stmt_execute( $statement);
               mysqli_stmt_store_result( $statement);
               $resultcheck= mysqli_stmt_num_rows( $statement);
               if($resultcheck>0){
                   header("Location: signup.php?error=usernamehasbeenstaken&email=".$email);
                   exit(); 
               }
               else{
                   $sql1="SELECT emailUsers FROM users WHERE emailUsers=?";
                   $statement1=mysqli_stmt_init($conn);
                   if(!mysqli_stmt_prepare($statement1,$sql1)){
                       header("Location: signup.php?error=sqlerror");
                       exit();
                   }
                   else{
                       mysqli_stmt_bind_param($statement1,"s",$email);
                       mysqli_stmt_execute($statement1);
                       mysqli_stmt_store_result($statement1);
                       $resultcheck1= mysqli_stmt_num_rows($statement1);
                       if($resultcheck1>0){
                           header("Location: signup.php?error=emailhasbeenstaken&username=".$username);
                           exit(); 
               }
                   }
                   
                   $sql="INSERT INTO users(userUsername,emailUsers,pwdUsers) VALUES (?,?,?)";
                   if(!mysqli_stmt_prepare($statement,$sql)){
               header("Location: signup.php?error=sqlerror");
           exit();
           }
                   else{
                        $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($statement,"sss",$username,$email,$hashedPwd);
                        mysqli_stmt_execute($statement);
                   header("Location: signup.php?signup=success");
                   exit(); 
                   }
               }
           }
       }
       mysqli_stmt_close($statement);
       mysqli_close($conn);
   }
   else{
       header("Location: signup.php?");
                   exit(); 
   }
   
   ?>