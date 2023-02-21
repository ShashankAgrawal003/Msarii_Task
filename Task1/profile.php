<?php 
session_start();
//echo "sessionID:-".$_SESSION['user_id']. "<br>";;
$sessionId=$_SESSION['user_id'];
$pdo = new PDO("mysql:host=localhost;dbname=msarri_task_one", "root", "");

$stmt = $pdo->prepare("SELECT * FROM msariiuser WHERE id = ?");
$stmt->execute([$sessionId]);
$user = $stmt->fetch();


// echo "Name: " . $user['name'] . "<br>";
// echo "Email: " . $user['email'] . "<br>";
// echo "Phone: ".$user['phoneNo'] . "<br>";
// echo "Password: ".$user['password'] . "<br>";

$loginnedName=$user['name'];
$loginnedEmail=$user['email'];
$loginnedPhoneNo=$user['phoneNo'];
$loginnedPassword=$user['password'];
if(!empty($user['image'])){    
    //echo "success";
    $loginnedImage=$user['image'];
}
else{
    //echo "reached in else";
    $loginnedImage='profile2.jpg';
}

?>
