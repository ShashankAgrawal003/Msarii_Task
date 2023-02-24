<?php
$conn = mysqli_connect("localhost", "root", "", "msarii_task_two");
if($conn->connect_error) {  die("Connection failed: ".$conn->connect_error); }

if($_SERVER['REQUEST_METHOD']=='GET'){   
    $id=$_GET['id']; 
    $result = mysqli_query($conn, "SELECT * FROM subitems where id=$id");
    $row=$result->fetch_assoc();
    if(!$row){
        header("location:subitem.php");
        exit;
    }
    $SubItemName=$row['subItemName'];
}
// post method
else{
    $id=$_POST['id'];
    $SubItemName=$_POST['editSubItemName'];
    $query="UPDATE subitems set subItemName='$SubItemName' where id='$id'";
    if(mysqli_query($conn,$query)){
        header('location:subitem.php');
    }    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Edit Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Shashank Agrawal</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Item Page</a></li>
            <li class="active"><a href="subitem.php">Subitem Page</a></li>  
            <li><a href="mainTask.html">Main Page</a></li>         
          </ul>
        </div>
      </nav>
    <div class="container">
        <h2>SubItem Edit Page</h2>
        <div class="form-group">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="text" id="editSubItemName" name="editSubItemName" value="<?php echo $SubItemName;?>"/>
                <input type="submit"  class="btn btn-success btn-lg" id="submit" value="Save Changes">                
            </form>
        </div>
    </div>      
</body>
</html>