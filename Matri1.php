<?php
   session_start();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Matrix</title>
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link href="google.com">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         /* Hide vertical scrollbar */
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-color: black;
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover; 
         color:white;
         }
         input[type=submit] {
         background-color: #6ACFF6; 
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin-top:60px;
         margin-bottom:20px;
         cursor: pointer;
         width: 50%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
         }
         p{
         font-size: 40px;
         color: white;
         }
         #mat1,#mat{
         font-size: 40px;
         color: white;
         }
         #matrix{
         font-size:40px;
         background-color: black;
         padding: 30px 50px 30px 50px;
         color:white;
         width:41%
         }
         #matrices{
         margin-left: 35rem;
         margin-top: 40px;
         }
         #wat,#wat1{
         width: 40px;
         font-size: 20px;
         }
         h1{
         color:white;
         font-size:60px;
         margin-left:17rem;
         }
         a{
         color:white;
         font-size:20px;
         }
         #size{
         background-color:   black;
         width: 50%;
         height:170px;
         font-size: 30px;
         }
         button {
         background-color: #6ACFF6; 
         border: none;
         color: white;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         margin-top:30px;
         margin-bottom:20px;
         cursor: pointer;
         margin-left: 0px;
         width: 64%;
         font-size: 20px;
         font-family: 'Josefin Sans', sans-serif;
         }
         h4{
         color:white;
         }
         h2{
         color:white;
         font-size:30px;
         }
      </style>
   </head>
   <body>
      <div id="matrices">
         <?php
            if(isset($_POST['size-submit'])){
               $row1=$_POST['rows1'];
               $column1=$_POST['Columns1'];
               $row2=$_POST['rows2'];
               $column2=$_POST['Columns2'];
                  if(empty($row1)||empty($row2)||empty($column1)||empty($column2)){
            header("Location: Matrix.php?error=emptyspaces");
            exit();
            }
            if($row2!=$column1){
              header("Location: Matrix.php?error=no");
            exit();  
            }
            
            }
                
            ?>
         <form method=post action=Matrix2.php>
            <?php
               print"<h2>Matrix 1 </h2>";
               for($i=0;$i<$row1;$i++){
               for($j=0;$j<$column1;$j++){
                  print"<input name=txt$i$j type=text/>";
                 print"&nbsp&nbsp";
               }
               print"<br><br>";
               
               }
               print"<br>";
               print"<h2>Matrix 2 </h2>";
               for($x=0;$x<$row2;$x++){
               for($y=0;$y<$column2;$y++){
                  print"<input name=txta$x$y type=text/>";
                  print"&nbsp&nbsp";
               }
               print"<br><br>";
               
               }
               ?>
            <input type="hidden" name="rows1" value="<?php echo $row1;?>" >
            <input type="hidden" name="rows2" value="<?php echo $row2;?>">
            <input type="hidden" name="Columns1" value="<?php echo $column1;?>"> 
            <input type="hidden" name="Columns2" value="<?php echo $column2;?>"> 
            <button name='submit-add'>Submit</button>
         </form>
      </div>
   </body>
</html>