<?php  
$connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
if($connect->connect_error){
     die("Connection failed: ".$connect->connect_error);
}
if($_SERVER['REQUEST_METHOD']=='POST'){
     if(isset($_POST["subItemName"])){
          $number = count($_POST["subItemName"]);  // to count the number of items coming
          if($number > 0)  
          {   for($i=0; $i<$number; $i++)  
               {   if(trim($_POST["subItemName"][$i] != ''))  
                    {    $sql = "INSERT INTO subitems(subItemName) VALUES('".mysqli_real_escape_string($connect, $_POST["subItemName"][$i])."')";  
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
          if(isset($_POST['checkbox1'][0])){
               $connect = mysqli_connect("localhost", "root", "", "msarii_task_two");  
               $number = count($_POST["checkbox1"]);  // to count the number of items coming    
               if($number > 0)  
               {  for($i=0; $i<$number; $i++)  
                    {    //echo $_POST['checkbox'][$i];
                         if(trim($_POST["checkbox1"][$i] != ''))  
                         {    $arrayString= explode("/",$_POST["checkbox1"][$i]);
                              if($stmt=$connect->prepare('INSERT INTO selectedsubitem(ItemsrowId,selectedSubItemsId,selectedSubItemsName) VALUES (?,?,?)')){
                              $stmt->bind_param('iis',$arrayString[0],$arrayString[1],$arrayString[2]);
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
else {
     if($_SERVER['REQUEST_METHOD']=='GET')
     {    //echo 'backhend'.$_GET['rowNumber'];
          $rowNo=$_GET['rowNumber'];
          $result = mysqli_query($connect, "SELECT * FROM subitems");
          $x=0;
          while ($row = mysqli_fetch_assoc($result)) 
          {    $x++;
               echo "<tr>
                    <td><input type='checkbox' id='$row[id]' name='checkbox1[]' value='$rowNo/$row[id]/$row[subItemName]'/></td>
                    <td>$x</td>
                    <td>$row[subItemName]</td>
                    </tr>";
          }
     }
}  
?> 
