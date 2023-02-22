<?php  
$connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
 $number = count($_POST["subItemName"]);  // to count the number of items coming
 if($number > 0)  
 {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST["subItemName"][$i] != ''))  
           {  
                $sql = "INSERT INTO subitems(subItemName) VALUES('".mysqli_real_escape_string($connect, $_POST["subItemName"][$i])."')";  
                mysqli_query($connect, $sql);  
           }  
      }  
      echo "Data Inserted";  
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  


 
 ?> 