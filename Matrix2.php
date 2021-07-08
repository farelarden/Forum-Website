<html>
   <head>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <style>
         p{
         font-size: 40px;
         color: white;
         font-weight: bold;
         margin-top:100px;
         margin-left:300px;
         }
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
         #matrixresult{
         font-size:30px;
         text-align: center;
         justify-content: center;
         object-position: center;
         align-content: center;
         align-items: center;
         background-color: white;
         color:black;
         width: 67%; 
         margin-left:300px;
         margin-bottom:100px;
         }
         #return{
         color:white;
         font-size:20px;
         background-color: #6ACFF6; 
         text-decoration: none;
         margin-left:300px;
         margin-bottom:400px;
         padding: 30px 50px 30px 50px;
         }
         #return:hover{
         background-color: #2ebff4;
         }
      </style>
   </head>
   <body>
      <?php
         if(isset($_POST['submit-add'])){
                $row1=$_POST['rows1'];
                $column1=$_POST['Columns1'];
                $row2=$_POST['rows2'];
                $column2=$_POST['Columns2'];
          
            
            $arr=array(array());
            
                 for($i=0;$i<$row1;$i++){
                 for($j=0;$j<$column1;$j++){
                      
                      $arr[$i][$j]=$_POST['txt'.$i.$j];
                     if($_POST['txt'.$i.$j]==""){
                          $arr[$i][$j]=0;
                      }
                     
                }
               
                 
             }
         
           
            
            
            
            
             $arr1=array(array());
             
                 for($x=0;$x<$row2;$x++){
                 for($y=0;$y<$column2;$y++){
                      
                      $arr1[$x][$y]=$_POST['txta'.$x.$y];
                     if($_POST['txta'.$x.$y]==""){
                          $arr1[$x][$y]=0;
                      }
                     
                }
               
                 
             }
          
           
             
            $arr2=array(array());
            
             $r=count($arr);
             $c=count($arr1[0]);
             $p=count($arr1);
                       
                for ($i=0;$i<$r;$i++){
         	    for($j=0;$j<$c;$j++){
         		$arr2[$i][$j]=0;                    
         		for($k=0;$k<$p;$k++){
         			$arr2[$i][$j]+=$arr[$i][$k]*$arr1[$k][$j];
         		}
         	}
         }           
         
            }
           print"<p>The Result: </p><br>";
                print"<div id=matrixresult><br>";
                for ($i=0;$i<$r;$i++){
         	for($j=0;$j<$c;$j++){
         			echo $arr2[$i][$j];
                    print"&nbsp&nbsp";
         	}
                     print"<br><br>";
         }
                print"</div>";
         ?>
      <a id="Return" href="Matrix.php">Return</a>
   </body>
</html>