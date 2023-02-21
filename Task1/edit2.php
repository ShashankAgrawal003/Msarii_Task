<?php
$DATABASE_HOST="localhost";
$DATABASE_USER="root";
$DATABASE_PASS="";
$DATABASE_NAME="msarri_task_one";
$sessionId=$_SESSION['user_id'];
echo $sessionId;
$con=mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Error connection to the Database'.mysqli_connect_error());
}
if($stmt=$con->prepare('update msariiuser set name=?,email=?,phoneNo=?,password=? where id=?')){
    $stmt->bind_param('ssisi',$_POST['editedName'],$_POST['editedEmail'],$_POST['editedPhoneNo'],$_POST['editedPassword'],$sessionId);
    $stmt->execute();
    echo 'Successfully Edited';

    if(isset($stmt)){
        header("location: home.php");//yaha error aarha hai
        exit;
    }
    
    }
else{
    echo 'Error Occurred';
    }

$stmt->close();
$con->close();
?>