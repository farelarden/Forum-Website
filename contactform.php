<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $mailFrom=$_POST['mail'];
    $message=$_POST['message'];
    
     if(empty($name)||empty($subject)||$mailFrom||empty($message)){
           header("Location: ContactUs.php?error=emptyfields");
           exit();
       }   
    
     else if(!filter_var($mailFrom,FILTER_VALIDATE_EMAIL)){
           header("Location: ContactUs.php?error=invalidemail");
           exit();
       }
    
    $mailTo="farelarden13@gmail.com";
    $headers="From: ".$mailFrom;
    $txt="You have recieved an e-mail from ".$name."\n\n".$message;
    
    mail($mailTo,$subject,$txt,$headers);
    header("Location:ContactUs.php?success=emailsend");
}