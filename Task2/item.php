<?php  
if($_SERVER['REQUEST_METHOD']=='POST'){ 
     if(isset($_POST["itemName"])){
          $connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
          $number = count($_POST["itemName"]);  // to count the number of items coming
          if($number > 0)  
          {  
               for($i=0; $i<$number; $i++)  
               {  
                    if(trim($_POST["itemName"][$i] != ''))  
                    {  
                         $sql = "INSERT INTO items(itemName) VALUES('".mysqli_real_escape_string($connect, $_POST["itemName"][$i])."')";  
                         mysqli_query($connect, $sql);  
                    }  
               }  
          echo "Data Inserted";  
          }  
          else  
          {  
          echo "Please Enter Name";  
          } 
     }

     else{ 
          // sending checked chechBox item data to db
          if(isset($_POST['checkbox'][0])){
               $connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
               $number = count($_POST["checkbox"]);  // to count the number of items coming    
               if($number > 0)  
               {  for($i=0; $i<$number; $i++)  
                    {    //echo $_POST['checkbox'][$i];
                         if(trim($_POST["checkbox"][$i] != ''))  
                         {    $arrayString= explode("/",$_POST["checkbox"][$i]);
                              if($stmt=$connect->prepare('INSERT INTO selecteditem(selectedId,selectedItemName) VALUES (?,?)')){
                              $stmt->bind_param('is',$arrayString[0],$arrayString[1]);
                              $stmt->execute();
                              }                              
                         }  
                    }  
               echo "Data Inserted";  
               }  
               else  
               {  
               echo "Please Enter Name";  
               } 

          } 
     }
} 
else{
     if($_SERVER['REQUEST_METHOD']=='GET'){ 
          $connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
          if($connect->connect_error){
               die("Connection failed: ".$connect->connect_error);
          }
          $result = mysqli_query($connect, "SELECT * FROM items");
          $x=0;
          while ($row = mysqli_fetch_assoc($result)) 
          {    $x++;
               echo "
                    <tr>
                         <td><input type='checkbox' id='$row[id]' name='checkbox[]' value='$row[id]/$row[itemName]'/></td>
                         <td>$x</td>
                         <td>$row[itemName]</td>
                    </tr>";
          }
     }
}
?> 
