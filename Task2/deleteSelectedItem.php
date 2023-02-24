<script>
    alert("Are You Sure You want to delete");
</script>

<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
    if($conn->connect_error) {  die("Connection failed: ".$conn->connect_error); }
    $query="DELETE from selecteditem where id=$id";
    if(mysqli_query($conn,$query)){
        header('location:mainTask.html');
    } 
}


?>