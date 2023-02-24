<?php

if(isset($_GET['selectedSubItemsId']) && isset($_GET['ItemsrowId']) ){
    $subItemId=$_GET['selectedSubItemsId']; // this is that particular subitem id
    $rowId=$_GET['ItemsrowId']; // this is the row id
    $conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
    if($conn->connect_error) {  die("Connection failed: ".$conn->connect_error); }
    $query="DELETE from selectedsubitem where ItemsrowId=$rowId AND selectedSubItemsId=$subItemId";
    if(mysqli_query($conn,$query)){
        header('location:mainTask.html');
    } 
}


?>