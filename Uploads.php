<?php
session_start();
require "db.inc.php";
if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    $id = $_SESSION['userId'];
    $caption = $_POST['content'];
    $creator=$_SESSION['userUid'];
    
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
       
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    
    $allowed=array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<90000000){
                $sql2 = "INSERT INTO imagelist (IdUsers,userUsername,img,caption)VALUES ('".$id."','".$creator."','".$fileName."','".$caption."')";
            $result2 = mysqli_query($conn, $sql2);
                  $fileDestination = 'Uploads/'.basename($_FILES['file']['name']);
                
                $sql3= "SELECT * FROM imagelist WHERE id = (SELECT MAX(id) FROM imagelist) LIMIT 1";
                 $result3 =mysqli_query($conn,$sql3);
                $row2 = mysqli_fetch_assoc($result3);
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location:Image.php?id=".$row2['id']."&userId=".$id);
              
            }
            else{
                echo"Your file is too big!";
            }
        }
        else{
            echo"There was an error uploading your file!";
        }
    }
    else{
        echo"You cannot upload files of this type!";
    }
    
}